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
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray(); // Loads all key-value settings
        $about = About::first(); // Optional: use ->latest()->first() if multiple exist
        $skills = Skill::orderBy('id')->get();
        $projects = Project::latest()->get();
        $careers = Career::latest()->get();
        $contacts = Contact::all();

        return view('home', compact(
            'settings',
            'about',
            'skills',
            'projects',
            'careers',
            'contacts'
        ));
    }
}
