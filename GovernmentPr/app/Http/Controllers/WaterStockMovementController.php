<?php

namespace App\Http\Controllers;

use App\Models\WaterStockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class WaterStockMovementController extends Controller
{
    public function getTotalCheckIn($companyId)
    {
        $totalCheckIn = WaterStockMovement::where('company_id', $companyId)
            ->where('movement_type', 'in')->sum('volume');
        return $totalCheckIn;
    }

    public function getTotalTransfer($companyId)
    {
        $totalTransfer = WaterStockMovement::where('company_id', $companyId)
            ->where('movement_type', 'transfer')->sum('volume');
        return $totalTransfer;
    }

    public function getTotalRecycle($companyId)
    {
        $totalAdjustment = WaterStockMovement::where('company_id', $companyId)
            ->where('movement_type', 'adjustment')->sum('volume');
        return $totalAdjustment;
    }

    public function getTotalCheckOut($companyId)
    {
        $totalCheckOut = WaterStockMovement::where('company_id', $companyId)
            ->where('movement_type', 'out')->sum('volume');
        return $totalCheckOut;
    }

    public function getWaterBalance($companyId) {
        $balance = $this->getTotalCheckIn($companyId) - $this->getTotalTransfer($companyId) + $this->getTotalRecycle($companyId) - $this->getTotalCheckOut($companyId);
        return $balance; 
    }

    public function store_water_checkin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id'    => ['required', 'numeric'],
            'water_source'  => ['required', 'numeric'],
            'volume'        => ['required', 'numeric', 'min:1'],
            'date'          => ['required', 'date'],
            'calendar_year' => ['required', 'integer'],
            'remark'        => ['nullable', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = WaterStockMovement::create([
            'water_source_id'   => $request['water_source'], // Assuming water_source maps to water_id
            'company_id'        => $request['company_id'],
            'movement_type'     => 'in',
            'volume'            => $request['volume'],
            'calendar_year_id'  => $request['calendar_year'],
            'movement_date'     => $request['date'],
            'remark'            => $request['remark'],
        ]);

        $water_stock_movements = WaterStockMovement::where('company_id', $request['company_id'])->with([
            'companyWaterSources.waterSource',
            'calendarYear'
        ])->get(['waterStockID', 'water_source_id', 'movement_type', 'volume', 'calendar_year_id', 'movement_date', 'remark', 'status']);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Water checked in successfully.',
                'water_stock_movements' => $water_stock_movements
            ])->setStatusCode(201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to check in water.',
            ], 400);
        }
    }

    public function store_water_checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id'    => ['required', 'numeric'],
            'volume_used'   => ['required', 'numeric', 'min:1'],
            'date'          => ['required', 'date'],
            'calendar_year' => ['required', 'integer'],
            'purpose'        => ['nullable', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $availableBalance = $this->getWaterBalance($request['company_id']);

        if ($availableBalance <= 0) {
            $validator->errors()->add('balance_error', 'No water stock is available. The balance is 0.');
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
                'available_balance' => $availableBalance
            ], 400);
        } elseif ($request['volume_used'] > $availableBalance) {
            $validator->errors()->add('balance_error', 'The volume demanded exceeds the available water stock balance.');
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
                'available_balance' => $availableBalance
            ], 400);
        }

        $result = WaterStockMovement::create([
            'water_source_id'   => $request['water_source'], // Assuming water_source maps to water_id
            'company_id'        => $request['company_id'],
            'movement_type'     => 'out',
            'volume'            => $request['volume_used'],
            'calendar_year_id'  => $request['calendar_year'],
            'movement_date'     => $request['date'],
            'remark'            => $request['purpose'],
        ]);

        $water_stock_movements = WaterStockMovement::where('company_id', $request['company_id'])->with([
            'companyWaterSources.waterSource',
            'calendarYear'
        ])->get(['waterStockID', 'water_source_id', 'movement_type', 'volume', 'calendar_year_id', 'movement_date', 'remark', 'status']);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Water checked out successfully.',
                'water_stock_movements' => $water_stock_movements
            ])->setStatusCode(201);
        } else {
            $validator->errors()->add('creation_error', 'Water failed to check out.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

       
    }

    public function getWaterStockAnalysis(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'period' => 'nullable|string|in:today,this_week,last_week,this_month,last_month,this_year,last_year',
            'company_water_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $query = $request->query('period');
        $companyWaterId = $request->query('company_water_id');
        
        $movements = WaterStockMovement::where('company_water_id', $companyWaterId);

        switch ($query) {
            case 'today':
                $movements->whereDate('movement_date', Carbon::today());
                break;
            case 'this_week':
                $movements->whereBetween('movement_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $movements->whereBetween('movement_date', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
                break;
            case 'this_month':
                $movements->whereMonth('movement_date', Carbon::now()->month)
                          ->whereYear('movement_date', Carbon::now()->year);
                break;
            case 'last_month':
                $movements->whereMonth('movement_date', Carbon::now()->subMonth()->month)
                          ->whereYear('movement_date', Carbon::now()->subMonth()->year);
                break;
            case 'this_year':
                $movements->whereYear('movement_date', Carbon::now()->year);
                break;
            case 'last_year':
                $movements->whereYear('movement_date', Carbon::now()->subYear()->year);
                break;
        }

        if ($movements->doesntExist()) {
            return response()->json(['message' => 'No movements found for the given parameters.'], 404);
        }

        return response()->json($movements->get());
    }
}
