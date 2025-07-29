<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RECPHistory;
use App\Models\RECP_areas_of_benefit;
use App\Models\RECP_human_and_environmental_health_benefit;
use App\Models\RECP_innovation_areas;
use App\Models\RECP_areas_of_improvement;
use App\Models\RECP_harzardous_materials;
use App\Models\RECP_house_keep_practice;
use App\Models\RECP_unit_of_process;
use App\Models\RECP_problem_and_solution;
use App\Models\RECP_waste_management_method;
use App\Models\RECP_waste_reduction_measure;
use App\Models\RECP_product_recovery_method;
use App\Models\Policy;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RECPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // utmost benefit
    public function add_utmost_benefit(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'areas_of_company_benefit'  =>  ['nullable', 'string', Rule::unique('recp_areas_of_benefits', 'benefit_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        // dd($request->all());
        RECP_areas_of_benefit::create([
            'companyID' => $request['company'],
            'benefit_title' => $request['areas_of_company_benefit']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Area of benefit to company added successfully.',
            'areas_of_company_benefit' => $request->areas_of_company_benefit
        ]);
    }

    public function remove_utmost_benefit(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'areas_of_company_benefit' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_areas_of_benefit::where('companyID', $request->company)
        ->where('benefit_title',$request->areas_of_company_benefit)
        ->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Area of benefit removed successfully.',
            'areas_of_company_benefit' => $request->areas_of_company_benefit
        ]);
    }

    // environmental and health benefit
    public function add_environmental_benefit(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'company'                     =>  ['required', 'numeric'],
            'enviromental_benefit_title'  =>  ['nullable', 'string', Rule::unique('recp_human_and_environmental_health_benefits', 'environmental_benefit_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        
        // dd($request->all());
        RECP_human_and_environmental_health_benefit::create([
            'companyID' => $request['company'],
            'environmental_benefit_title' => $request['enviromental_benefit_title']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Human and environmental health benefit added successfully.',
            'enviromental_benefit_title' => $request->areas_of_company_benefit
        ]);
    }

    public function remove_environmetal_benefit(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'enviromental_benefit_title' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_human_and_environmental_health_benefit::where('companyID', $request->company)
        ->where('environmental_benefit_title',$request->enviromental_benefit_title)
        ->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Human and environmental health benefit removed successfully.',
            'environmental_benefit_title' => $request->enviromental_benefit_title
        ]);
    }
    
    // house_keeping
    public function add_house_keeping(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                     =>  ['required', 'numeric'],
            'house_keeping_title'  =>  ['nullable', 'string', Rule::unique('recp_house_keep_practices', 'practice_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        RECP_house_keep_practice::create([
            'companyID' => $request['company'],
            'practice_title' => $request['house_keeping_title']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'House keeping practice added successfully.',
            'house_keeping_title' => $request->areas_of_company_benefit
        ]);
    }

    // house keeping 
    public function remove_house_keeping(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'house_keeping_title' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_house_keep_practice::where('companyID', $request->company)
        ->where('practice_title',$request->house_keeping_title)
        ->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'House keeping practice removed successfully.',
            'house_keeping_title' => $request->house_keeping_title
        ]);
    }
    
    // Waste reduction measures
    public function add_waste_reduction_measure(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'waste_reduction_measure'   =>  ['nullable', 'string', Rule::unique('recp_waste_reduction_measures', 'waste_reduction_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        RECP_waste_reduction_measure::create([
            'companyID' => $request['company'],
            'waste_reduction_title' => $request['waste_reduction_measure']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Waste reduction measure added successfully.',
            'waste_reduction_measure' => $request->waste_reduction_measure
        ]);
    }

    // Waste reduction measures
    public function remove_waste_reduction_measure(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'waste_reduction_measure' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_waste_reduction_measure::where('companyID', $request->company)
        ->where('waste_reduction_title',$request->waste_reduction_measure)
        ->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Waste reduction measure removed successfully.',
            'waste_reduction_measure' => $request->waste_reduction_measure
        ]);
    }
    
    // Waste management and disposal methods
    public function add_waste_management_method(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'waste_management_method'   =>  ['nullable', 'string', Rule::unique('recp_waste_management_methods', 'management_method_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        RECP_waste_management_method::create([
            'companyID' => $request['company'],
            'management_method_title' => $request['waste_management_method']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Waste management method added successfully.',
            'waste_management_method' => $request->waste_management_method
        ]);
    }

    // waste management and disposal methods
    public function remove_waste_management_method(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'waste_management_method' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_waste_management_method::where('companyID', $request->company)
        ->where('management_method_title',$request->waste_management_method)
        ->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Waste management removed successfully.',
            'waste_management_method' => $request->waste_management_method
        ]);
    }
    
    // Product recovery measure
    public function add_product_recovery_measure(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'product_recovery_measure'   =>  ['nullable', 'string', Rule::unique('recp_product_recovery_methods', 'recovery_method_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        RECP_product_recovery_method::create([
            'companyID' => $request['company'],
            'recovery_method_title' => $request['product_recovery_measure']
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Product recovery measure added successfully.',
            'product_recovery_measure' => $request->product_recovery_measure
        ]);
    }

    // Product recovery measure
    public function remove_product_recovery_measure(Request $request) {
        $validator = Validator::make($request->all(),[
            'company'       =>  ['required', 'numeric'],
            'product_recovery_measure' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }
        RECP_product_recovery_method::where('companyID', $request->company)
        ->where('recovery_method_title',$request->product_recovery_measure)
        ->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product recovery method removed successfully.',
            'product_recovery_measure' => $request->product_recovery_measure
        ]);
    }

    // Key Area For Improvement
    // create
    public function add_improvement_key_area(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'key_area'   =>  ['nullable', 'string', Rule::unique('recp_areas_of_improvements', 'area_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        RECP_areas_of_improvement::create([
            'companyID' => $request['company'],
            'area_title' => $request['key_area']
        ]);
        $areas_of_improvement  = RECP_areas_of_improvement::where('companyID', $request['company'])
                                    ->where('status', 'active')
                                    ->select('improvementAreaID', 'area_title')
                                    ->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Key area for performance improvement added successfully.',
            'key_areas' => $areas_of_improvement,
        ]);
    }

    // update
    public function update_improvement_key_area(Request $request)
    {
        $company    = $request->input('company');
        $keyAreaId  = $request->input('key_area_id');
        $messages   = [
            'company.required' => 'The company field is required.',
            'company.numeric' => 'The company field must be a number.',
            'key_area_id.required' => 'The key area ID field is required.',
            'key_area_id.numeric' => 'The key area ID field must be a number.',
            'key_area.unique' => 'The key area title must be unique within the company.',
        ];

        $validator = Validator::make($request->all(), [
            'company'     =>  ['required', 'numeric'],
            'key_area_id' =>  ['required', 'numeric'],
            'key_area'    =>  ['nullable', 'string', Rule::unique('recp_areas_of_improvements', 'area_title')
                                                        ->where(function ($query) use ($company) {
                                                            return $query->where('companyID', $company);
                                                        })
                                                        ->ignore($keyAreaId, 'improvementAreaID')]
        ], $messages);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ], 422);
        }

       $result = RECP_areas_of_improvement::where('improvementAreaID', $request->key_area_id)->update([
            'area_title' => $request['key_area']
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Key area for performance improvement updated successfully.',
            ], 200);
        }else{
            $validator->errors()->add('update_error', 'Key area for performance improvement failed to update.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // Key Area For Improvement
    public function remove_improvement_key_area(Request $request) {
        $validator = Validator::make($request->all(),[
            'key_area_id'      =>  ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_areas_of_improvement::where('improvementAreaID', $request['key_area_id'])
        ->delete();

        if ($result) {
            # code...
            return response()->json([
                'status'            =>  'success',
                'message'           =>  'Area of performance improvement removed successfully.',
            ], 200);
        }else{
            $validator->errors()->add('delete_error', 'Key area for performance improvement failed to delete.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

    }

    // Product Innovation
    // create
    public function add_product_innovation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'key_product_innovation'   =>  ['nullable', 'string', Rule::unique('recp_innovation_areas', 'innovation_area_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        RECP_innovation_areas::create([
            'companyID' => $request['company'],
            'innovation_area_title' => $request['key_product_innovation']
        ]);

        $product_innovation  = RECP_innovation_areas::where('companyID', $request['company'])
                                    ->where('status', 'active')
                                    ->select('innovationAreaID', 'innovation_area_title')
                                    ->get();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Key produuct innovation added successfully.',
            'product_innovation' => $product_innovation,
        ]);
    }

    // update
    public function update_product_innovation(Request $request)
    {
        $company    = $request->input('company');
        $keyProductInnovationId  = $request->input('key_product_innovation_id');
        $messages   = [
            'company.required' => 'The company field is required.',
            'company.numeric' => 'The company field must be a number.',
            'key_product_innovation_id.required' => 'The product innovation ID field is required.',
            'key_product_innovation_id.numeric' => 'The product innovation ID field must be a number.',
            'key_product_innovation.unique' => 'The product innovation title must be unique within the company.',
        ];

        $validator = Validator::make($request->all(), [
            'company'     =>  ['required', 'numeric'],
            'key_product_innovation_id' =>  ['required', 'numeric'],
            'key_product_innovation'    =>  ['nullable', 'string', Rule::unique('recp_innovation_areas', 'innovation_area_title')
                                                        ->where(function ($query) use ($company) {
                                                            return $query->where('companyID', $company);
                                                        })
                                                        ->ignore($keyProductInnovationId, 'innovationAreaID')]
        ], $messages);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ], 422);
        }

       $result = RECP_innovation_areas::where('innovationAreaID', $keyProductInnovationId)->update([
            'innovation_area_title' => $request['key_product_innovation']
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Key produuct innovation updated successfully.',
            ], 200);
        }else{
            $validator->errors()->add('update_error', 'Key produuct innovation failed to update.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // delete
    public function remove_product_innovation(Request $request) {
        $validator = Validator::make($request->all(),[
            'key_product_innovation_id'      =>  ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_innovation_areas::where('innovationAreaID', $request['key_product_innovation_id'])
                    ->delete();

        if ($result) {
            # code...
            return response()->json([
                'status'            =>  'success',
                'message'           =>  'Key produuct innovation removed successfully.',
            ], 200);
        }else{
            $validator->errors()->add('delete_error', 'Key produuct innovation failed to delete.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

    }

    // Hazarduous material
    // create
    public function add_hazarduous_material(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'hazarduous_material'   =>  ['nullable', 'string', Rule::unique('recp_harzardous_materials', 'material_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_harzardous_materials::create([
            'companyID' => $request['company'],
            'material_title' => $request['hazarduous_material']
        ]);

        $hazardous_materials  = RECP_harzardous_materials::where('companyID', $request['company'])
                                    ->where('status', 'active')
                                    ->select('hazarduousMaterialID', 'material_title')
                                    ->get();
        
                                    
        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Hazarduous material added successfully.',
                'hazarduous_materials' => $hazardous_materials,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Hazarduous material failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // update
    public function update_hazarduous_material(Request $request)
    {
        $company                    = $request->input('company');
        $hazarduousMaterialId       = $request->input('hazarduous_material_id');
        $messages   = [
            'company.required' => 'The company field is required.',
            'company.numeric' => 'The company field must be a number.',
            'hazarduous_material_id.required' => 'The hazardous material ID field is required.',
            'hazarduous_material_id.numeric' => 'The hazarduous material ID field must be a number.',
            'hazarduous_material.unique' => 'The hazarduous material title must be unique within the company.',
        ];

        $validator = Validator::make($request->all(), [
            'company'     =>  ['required', 'numeric'],
            'hazarduous_material_id' =>  ['required', 'numeric'],
            'hazarduous_material'    =>  ['nullable', 'string', Rule::unique('recp_harzardous_materials', 'material_title')
                                                        ->where(function ($query) use ($company) {
                                                            return $query->where('companyID', $company);
                                                        })
                                                        ->ignore($hazarduousMaterialId, 'hazarduousMaterialID')]
        ], $messages);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ], 422);
        }

       $result = RECP_harzardous_materials::where('hazarduousMaterialID', $hazarduousMaterialId)->update([
            'material_title' => $request['hazarduous_material']
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Hazarduous material updated successfully.',
            ], 200);
        }else{
            $validator->errors()->add('update_error', 'Hazarduous material failed to update.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // delete
    public function remove_hazarduous_material(Request $request) {
        $validator = Validator::make($request->all(),[
            'hazarduous_material_id'      =>  ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_harzardous_materials::where('hazarduousMaterialID', $request['hazarduous_material_id'])
                    ->delete();

        if ($result) {
            # code...
            return response()->json([
                'status'            =>  'success',
                'message'           =>  'Hazarduous material removed successfully.',
            ], 200);
        }else{
            $validator->errors()->add('delete_error', 'Hazarduous material failed to delete.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

    }

    // UnitProcess
    // create
    public function add_unit_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'unit_process'   =>  ['nullable', 'string', Rule::unique('recp_unit_of_processes', 'unit_process_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })]
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_unit_of_process::create([
            'companyID' => $request['company'],
            'unit_process_title' => $request['unit_process']
        ]);

        $unit_processes  = RECP_unit_of_process::where('companyID', $request['company'])
                                    ->where('status', 'active')
                                    ->select('unitProcessID', 'unit_process_title')
                                    ->get();
        
                                    
        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Unit process added successfully.',
                'unit_processes' => $unit_processes,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Unit process failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // update
    public function update_unit_process(Request $request)
    {
        $company    = $request->input('company');
        $unitProcessId  = $request->input('unit_process_id');
        $messages   = [
            'company.required' => 'The company field is required.',
            'company.numeric' => 'The company field must be a number.',
            'unit_process_id.required' => 'The unit process ID field is required.',
            'unit_process_id.numeric' => 'The unit process ID field must be a number.',
            'unit_process.unique' => 'The unit process title must be unique within the company.',
        ];

        $validator = Validator::make($request->all(), [
            'company'     =>  ['required', 'numeric'],
            'unit_process_id' =>  ['required', 'numeric'],
            'unit_process'    =>  ['nullable', 'string', Rule::unique('recp_unit_of_processes', 'unit_process_title')
                                                        ->where(function ($query) use ($company) {
                                                            return $query->where('companyID', $company);
                                                        })
                                                        ->ignore($unitProcessId, 'unitProcessID')]
        ], $messages);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ], 422);
        }

       $result = RECP_unit_of_process::where('unitProcessID', $unitProcessId)->update([
            'unit_process_title' => $request['unit_process']
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Unit process updated successfully.',
            ], 200);
        }else{
            $validator->errors()->add('update_error', 'Unit process failed to update.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // delete
    public function remove_unit_process(Request $request) {
        $validator = Validator::make($request->all(),[
            'unit_process_id'      =>  ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_unit_of_process::where('unitProcessID', $request['unit_process_id'])
                    ->delete();

        if ($result) {
            # code...
            return response()->json([
                'status'            =>  'success',
                'message'           =>  'Unit process removed successfully.',
            ], 200);
        }else{
            $validator->errors()->add('delete_error', 'Unit process failed to delete.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

    }

    // Problems and Solution
    // create
    public function add_problem_solution(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'                   =>  ['required', 'numeric'],
            'problem_summary'   =>  ['nullable', 'string', Rule::unique('recp_problem_and_solutions', 'problem_title')->where(function ($query) use ($request) {
                return $query->where('companyID', $request['company']);
            })],
            'suggested_solution' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_problem_and_solution::create([
            'companyID' => $request['company'],
            'problem_title' => $request['problem_summary'],
            'solution_title' => $request['suggested_solution'],
        ]);

        $problemSolution  = RECP_problem_and_solution::where('companyID', $request['company'])
                                    ->where('status', 'active')
                                    ->select('problemSolutionID', 'problem_title', 'solution_title')
                                    ->get();
    
        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Problem summary and suggested solution added successfully.',
                'problems_solutions' => $problemSolution,
            ]);
        }else{
            $validator->errors()->add('creation_error', 'Problem summary and suggested solution failed to create.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // update problem
    public function update_problem(Request $request)
    {
        $company    = $request->input('company');
        $problemSolutionId  = $request->input('problem_solution_id');
        $messages   = [
            'company.required' => 'The company field is required.',
            'company.numeric' => 'The company field must be a number.',
            'problem_solution_id.required' => 'The problem and solution ID field is required.',
            'problem_solution_id.numeric' => 'The problem and solution ID field must be a number.',
            'problem_summary.unique' => 'The problem summary title must be unique within the company.',
        ];

        $validator = Validator::make($request->all(), [
            'company'   =>  ['required', 'numeric'],
            'problem_solution_id'   =>  ['required', 'numeric'],
            'problem_summary'   =>  ['nullable', 'string', Rule::unique('recp_problem_and_solutions', 'problem_title')->where(function ($query) use ($company) {
                return $query->where('companyID', $company);
            })->ignore($problemSolutionId, 'problemSolutionID')],
        ], $messages);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ], 422);
        }

       $result = RECP_problem_and_solution::where('problemSolutionID', $problemSolutionId)->update([
            'problem_title' => $request['problem_summary'],
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Problem summary updated successfully.',
            ], 200);
        }else{
            $validator->errors()->add('update_error', 'Problem summary failed to update.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }

    // update solution
    public function update_solution(Request $request)
    {
        $company    = $request->input('company');
        $problemSolutionId  = $request->input('problem_solution_id');
        $messages   = [
            'company.required' => 'The company field is required.',
            'company.numeric' => 'The company field must be a number.',
            'problem_solution_id.required' => 'The problem and solution ID field is required.',
            'problem_solution_id.numeric' => 'The problem and solution ID field must be a number.',
        ];

        $validator = Validator::make($request->all(), [
            'company'   =>  ['required', 'numeric'],
            'problem_solution_id'   =>  ['required', 'numeric'],
            'suggested_solution' => ['nullable', 'string']
        ], $messages);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ], 422);
        }

       $result = RECP_problem_and_solution::where('problemSolutionID', $problemSolutionId)->update([
            'solution_title' => $request['suggested_solution'],
        ]);

        if ($result) {
            # code...
            return response()->json([
                'status' => 'success',
                'message' => 'Suggested solution updated successfully.',
            ], 200);
        }else{
            $validator->errors()->add('update_error', 'Suggested solution failed to update.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }
    }
    // delete
    public function remove_problem_solution(Request $request) {
        $validator = Validator::make($request->all(),[
            'problem_solution_id'      =>  ['required', 'numeric']
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status'    => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors()
            ]);
        }

        $result = RECP_problem_and_solution::where('problemSolutionID', $request['problem_solution_id'])
                    ->delete();

        if ($result) {
            # code...
            return response()->json([
                'status'            =>  'success',
                'message'           =>  'Problem summary and suggested solution removed successfully.',
            ], 200);
        }else{
            $validator->errors()->add('delete_error', 'Problem summary and suggested solution failed to delete.');
            return response()->json([
                'status' => 'error',
                'message'   => 'Validation failed.',
                'errors'    => $validator->errors(),
            ], 400);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function store_status(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'company' => ['required', 'numeric'],
            'status' => ['required', 'string', Rule::in(['approved', 'disapproved', 'pending'])],
            'remark' => ['nullable', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
