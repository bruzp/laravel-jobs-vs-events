<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Jobs\ProcessVideoJob;

class JobsController extends Controller
{
    public function index()
    {
        return Inertia::render('Jobs');
    }

    public function store(Request $request)
    {
        #some business logic

        ProcessVideoJob::dispatch([
            'name' => 'somevideoname.mp4',
            'size' => '2GB'
        ]);

        return redirect()->route('jobs.index')->with('message', 'Your video is being processed.');
    }
}
