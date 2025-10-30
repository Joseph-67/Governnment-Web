<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Company;
use App\Models\User;
use App\Models\CompanyUsers;
use App\Models\recp;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Jetstream\Jetstream;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getAllAdmins(Request $request)
    {
        $query = $request->input('query');
        $adminDetails = Admins::where('email', 'like', "%{$query}%")->where('status', '=', 'active')->limit(10)->get(['id', 'email', 'profile_photo_path', 'first_name', 'last_name']);
        $userDetails = User::where('email', 'like', "%{$query}%")->where('status', '=', 'active')->limit(10)->get(['id', 'email', 'profile_photo_path', 'first_name', 'last_name']);
        return response()->json(['admin'=>$adminDetails, 'users' => $userDetails]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_register()
    {
        //
        return view('auth.register')->with(['guard' => 'admin']);
    }

    public function create_login()
    {
        //
        return view('auth.login')->with(['guard' => 'admin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:2', 'max:255'],
            'other_name' => ['nullable', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'min:4', 'max:255', 'unique:Admins'],
            'password' => ['required', 'string', 'min:6', Password::min(6)->mixedCase()->letters()->symbols()->numbers()->uncompromised(), 'confirmed'],
            'mobile_number' => ['nullable', 'numeric', 'min:12'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $admin = Admins::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'other_name' => $request['other_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'mobile_number' => $request['mobile_number'],
        ]);

        event(new Registered($admin));
        Auth::guard('admin')->login($admin);
        return redirect(route('admin.dashboard', absolute: false));
    }

    public function process_login(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'email'     => ['required', 'string', 'lowercase', 'email'],
            'password'  => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {
            # code...
            // Auth::guard('admin')->user()->update([
            //     'last_login_at' => now(),
            // ]);
            
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard', ['admin' => 'admin']));
        }
            // $request->session()->regenerate();
        return back()->withErrors('User not registered.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    private function countActiveCompanies()
    {
        $activeCompanyCount = Company::totalActiveCompanies();
        return $activeCompanyCount;
    }

    private function newCompaniesByWeek() {
        $companyCount = Company::totalNewCompaniesThisWeek();
        return $companyCount;
    }

    private function ActiveCompaniesOnRECP()  {
        $recpApprovedCompanies = recp::totalRegisteredCompanies();
        return $recpApprovedCompanies;
    }


    private function ActiveCompaniesOnRECPThisWeek()  {
        $recpApprovedCompanies = recp::totalRegisteredCompaniesThisWeek();
        return $recpApprovedCompanies;
    }

    private function DisapprovedCompaniesOnRECP()  {
        $recpDisapprovedCompanies = recp::totalDisapprovedCompanies();
        return $recpDisapprovedCompanies;
    }

    private function DisapprovedCompaniesOnRECPThisWeek()  {
        $recpDisapprovedCompanies = recp::totalDisapprovedCompaniesThisWeek();
        return $recpDisapprovedCompanies;
    }

    private function PendingCompaniesOnRecp() {
        $recpPendingCompanies = recp::totalPendingCompanies();
        return $recpPendingCompanies;
    }

    private function PendingCompaniesOnRECPThisWeek()  {
        $recpPendingCompanies = recp::totalPendingCompaniesThisWeek();
        return $recpPendingCompanies;
    }

    private function RECPCompanies() {
        return recp::with('company')->paginate(5);
    }

    private function fetchAdmins()  {
        $admins = Admins::activeAdmin()->get(['id', 'first_name', 'last_name', 'email', 'last_login_at', 'profile_photo_path', 'status', 'updated_at']);
        return $admins;
    }
   private function fetchUsers()
{
    return CompanyUsers::with('user', 'company')->get(); // eager load user details
}


    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function display_dashboard() {
        $data['activeCompanyCount'] = $this->countActiveCompanies();
        $data['newCompanies'] = $this->newCompaniesByWeek();
        $data['approvedCompanies'] = $this->ActiveCompaniesOnRECP();
        $data['approvedCompaniesThisWeek'] = $this->ActiveCompaniesOnRECPThisWeek();
        $data['disapprovedCompanies'] = $this->DisapprovedCompaniesOnRECP();
        $data['disapprovedCompaniesThisWeek'] = $this->DisapprovedCompaniesOnRECPThisWeek();
        $data['pendingCompanies'] = $this->PendingCompaniesOnRecp();
        $data['pendingCompaniesThisWeek'] = $this->PendingCompaniesOnRECPThisWeek();
        $data['recpCompanies'] = $this->RECPCompanies();
        $data['activeAdmins'] = $this->fetchAdmins();
        $data['activeUsers'] = $this->fetchUsers();

        // Last 12 months
        $months = collect(range(0, 11))->map(function($i) {
            return now()->subMonths($i)->format('M Y');
        })->reverse();

        // Initialize data arrays
        $trendData = [
            'compliant' => [],
            'review' => [],
            'non_compliant' => []
        ];

        foreach ($months as $month) {
            $monthNum = date('m', strtotime($month));
            $yearNum = date('Y', strtotime($month));

            $trendData['compliant'][] = recp::whereMonth('created_at', $monthNum)
                ->whereYear('created_at', $yearNum)
                ->where('status', 'approved')
                ->count();

            $trendData['review'][] = recp::whereMonth('created_at', $monthNum)
                ->whereYear('created_at', $yearNum)
                ->where('status', 'pending')
                ->count();

            $trendData['non_compliant'][] = recp::whereMonth('created_at', $monthNum)
                ->whereYear('created_at', $yearNum)
                ->where('status', 'disapproved')
                ->count();
        }

        $data['recpTrendData'] = $trendData;
        $data['recpTrendMonths'] = $months;

        return view('components.admin.dashboard', $data);
    }

    public function recpTrendData(Request $request)
    {
        $monthsCount = (int) $request->get('months', 12); // default 12 months

        // Generate month labels
        $months = collect(range(0, $monthsCount - 1))
            ->map(fn($i) => now()->subMonths($i)->format('M Y'))
            ->reverse();

        // Initialize trend arrays
        $trendData = [
            'compliant' => [],
            'review' => [],
            'non_compliant' => []
        ];

        foreach ($months as $month) {
            $monthNum = date('m', strtotime($month));

            $trendData['compliant'][] = recp::whereMonth('created_at', $monthNum)
                ->where('status', 'approved')->count();

            $trendData['review'][] = recp::whereMonth('created_at', $monthNum)
                ->where('status', 'pending')->count();

            $trendData['non_compliant'][] = recp::whereMonth('created_at', $monthNum)
                ->where('status', 'disapproved')->count();
        }

        return response()->json([
            'months' => $months,
            'compliant' => $trendData['compliant'],
            'review' => $trendData['review'],
            'non_compliant' => $trendData['non_compliant']
        ]);
    }



    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(Admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
