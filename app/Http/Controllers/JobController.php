<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::query()->with('company')->paginate(10);
        $tags = array_unique(array_merge(...Job::query()->get()->pluck('tags')->toArray()));

        return view('job.index', [
            'jobs' => $jobs,
            'tags' => $tags,
        ]);
    }

    public function show($slug)
    {
        $job = Job::query()->where('slug', $slug)->with('company')->firstOrFail();

        return view('job.show', [
            'job' => $job,
        ]);
    }



}
