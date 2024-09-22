<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->with(["employer", "tags"])->get()->groupBy("featured");

        return view("job.index", ["jobs" => $jobs[0], "featuredJobs" => $jobs[1], "tags" => Tag::all()]);
    }

    public function create()
    {
        return view("job.create");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "title" => "required",
            "salary" => "required",
            "location" => "required",
            "schedule" => ["required", Rule::in(["Part Time", "Full Time"])],
            "url" => ["required", "active_url"],
            "tags" => ["nullable"],
        ]);

        $attributes["featured"] = $request->has("featured");

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, "tags"));

        if ($attributes["tags"] ?? false) {
            foreach (explode(",", $attributes["tags"]) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect("/");
    }
}
