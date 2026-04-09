<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Resume;

class PortfolioController extends Controller
{
    public function index()
    {

        $resumes = Resume::all()->map(function ($resume) {
            $resume->file_url = $resume->file ? Storage::url($resume->file) : null;
            return $resume;
        });

        $profile = Profile::first();
        if ($profile && $profile->image) {
            $profile->image_url = Storage::url($profile->image);
        }
        if ($profile && $profile->favicon) {
            $profile->favicon_url = Storage::url($profile->favicon);
        }

        $projects = Project::all()->map(function ($project) {
            if ($project->image) {
                $project->image_url = Storage::url($project->image); // generates public URL
            }
            return $project;
        });

        $certificates = Certificate::all()->map(function ($cert) {
            if ($cert->image) {
                $cert->image_url = Storage::url($cert->image);
            }
            return $cert;
        });

        return response()->json([
            'profile' => $profile,
            'projects' => $projects,
            'featured_projects' => $projects->where('is_featured', true)->values(),
            'skills' => Skill::orderBy('order')->get(),
            'experiences' => Experience::where('is_visible', true)
                ->orderBy('is_current', 'desc')
                ->orderBy('start_date', 'desc')
                ->get(),
            'certificates' => $certificates,
            'resumes' => $resumes, 
        ]);
    }
}