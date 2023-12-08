<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {


        $vacancies = Vacancy::where('active',true)->get();
        $jobs = new Collection();
        $uid = Auth::user()->id;
        foreach ($vacancies as $vacancy) {
            $application = Application::where('vacancy_id', $vacancy->id)->where('applicant_id',$uid)->get(['status','id'])->first();
            $vacancy->status = $application==null?'NA':$application->status;
            $vacancy->application_id = $application==null?'NA':$application->id;
            $jobs->push($vacancy);
        }
        return view('user.dashboard', ['jobs'=>$jobs]);
    }
    public function showApplyForm(Request $request)
    {
        $vacancy = Vacancy::where('id', $request->id)->first();
        return view('user.dashboard', ['vacancy' => $vacancy]);
    }
    function apply(Request $request)
    {
        $application = new Application;
        $application->applicant_id = $request->user()->id;
        $application->vacancy_id = $request->vacancy_id;
        $application->time = Carbon::now();
        $application->status = "pending";
        $application->cover_letter = $request->cover_letter;
        $path = $request->file('cv')->store('public/cvs');
        $application->cv = $path;
        $application->save();
        return redirect('/user/my_applications');
    }
    function showMyApplications(Request $request)
    {
        $applications = Vacancy::join('applications','applications.vacancy_id', '=' ,'vacancies.id')->where('applicant_id',$request->id)->get();
        return view('user.dashboard', ['applications' => $applications]);
    }

    function applicationDetails(Request $request) {
        $application = Vacancy::join('applications','applications.vacancy_id', '=' ,'vacancies.id')->where('applications.id',$request->id)->first();
        return view('user.dashboard', ['application' => $application ]);
    }

    function jobInfo(Request $request) {
        $vacancy = Vacancy::where('id', $request->id)->first();
        return view('user.dashboard', ['vacancy' => $vacancy]);
    }
    function getComment(Request $request) {
        $application = Application::where('applicant_id', $request->uid)->where('vacancy_id',$request->id)->get(['status','comment'])->first();
        return view('user.dashboard', ['application' => $application]);
    }
}
