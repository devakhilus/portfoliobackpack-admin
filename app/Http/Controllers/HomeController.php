<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Career;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $about = About::first();
        $skills = Skill::all();
        $projects = Project::latest()->paginate(5);
        $careers = Career::latest()->get();
        $contacts = Contact::all();

        if ($request->ajax()) {
            return view('partials.projects', compact('projects'))->render();
        }

        return view('home', compact('settings', 'about', 'skills', 'projects', 'careers', 'contacts'));
    }
}
