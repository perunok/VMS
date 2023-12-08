<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vacancy;
use Illuminate\View\View;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.dashboard');
    }
    function listApplicants(Request $request)
    {
        $applicants = Vacancy::join('users', 'applications.applicant_id', '=', 'users.id')->join('applications', 'applications.vacancy_id', '=', 'vacancies.id')->where('vacancy_id', $request->v_id)->get();
        return view('admin.dashboard', ['applicants' => $applicants]);
    }
    function listPublished(Request $request)
    {
        $vacancies = Vacancy::all();
        $numbers = [];
        foreach ($vacancies as $vacancy) {
            $numbers[$vacancy->id] = Application::where('vacancy_id', $vacancy->id)->count();
        }
        return view('admin.dashboard', ['vacancies' => $vacancies, 'numbers' => $numbers]);
    }
    function applicationDetails(Request $request)
    {
        $application = Application::find($request->id);
        return view('admin.dashboard', ['application' => $application]);
    }
    function publish(Request $request)
    {
        $vacancy = new Vacancy;
        $vacancy->title = $request->title;
        $vacancy->positions = $request->positions;
        $vacancy->salary_range = $request->salary;
        $vacancy->description = $request->description;
        $vacancy->deadline = $request->deadline;
        $vacancy->active = false;
        $vacancy->save();
        return redirect('/admin/vacancy/published');
    }
    function respondToApplication(Request $request)
    {
        $application = Application::find($request->id);
        $application->status = $request->status;
        $application->comment = $request->comment;
        $application->save();
        return back();
    }

    function edit(Request $request)
    {
        $vacancy = Vacancy::find($request->id);
        $vacancy->title = $request->title;
        $vacancy->positions = $request->positions;
        $vacancy->salary_range = $request->salary;
        $vacancy->description = $request->description;
        $vacancy->deadline = $request->deadline;
        $vacancy->save();
        return redirect('/admin/vacancy/published');
    }
    function showEditForm(Request $request)
    {
        $vacancy = Vacancy::find($request->id);
        return view('admin.dashboard', ['vacancy' => $vacancy]);
    }
    function toggleActive(Request $request)
    {
        $vacancy = Vacancy::find($request->id);
        $vacancy->active = $vacancy->active ? false : true;
        $vacancy->save();
        return redirect("/admin/vacancy/published");
    }
    function showReportsForm(Request $request)
    {
        return view('admin.dashboard');
    }
    function reports(Request $request)
    {
        $from = Carbon::parse(date($request->from))->toDatetimeString();
        $to = Carbon::parse(date($request->to))->toDatetimeString();
        $application = Vacancy::join('applications', 'vacancies.id', '=', 'applications.vacancy_id')->whereBetween('vacancies.created_at',[$from,$to])->get();

        return view('admin.dashboard', ['rep'=>$application,'applied'=>$request->exists('applied')?true:false ,'accepted'=>$request->exists('accepted')?true:false]);
    }

}
