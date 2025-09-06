<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;
use Illuminate\Http\Client\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::all()->map(function ($resume) {
            return [
                'id' => $resume->id,
                'name' => $resume->name,
                'headline' => $resume->headline,
                'summary' => $resume->summary,
                'email' => $resume->email,
                'phone' => $resume->phone,
                'location' => $resume->location,
                'linkedin' => $resume->linkedin,
                'created_at' => $resume->created_at->format('M d, Y'),
                'photoUrl' => $resume->getFirstMediaUrl('avatar'), // if using Spatie Media Library
            ];
        });

        return Inertia::render('Admin/Resume/Index', [
            'resumes' => $resumes,
            'flash' => [
                'success' => session('success'),
            ]
        ]);
    }


    public function create(): Response
    {
        // Only show form, no Resume model passed
        return Inertia::render('Admin/Resume/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'headline' => 'nullable|string',
            'summary' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048'
        ]);
        $resume = Resume::create($validated);

        if ($request->hasFile('avatar')) {
            $resume->addMediaFromRequest('avatar')->toMediaCollection('avatar', 'public');
        }
        return redirect()->route('admin.resumes.index')->with('success', 'Resume created successfully!');
    }


    public function show(Resume $resume)
    {
        return Inertia::render('Admin/Resume/Show', [
            'resume' => [
                'id' => $resume->id,
                'name' => $resume->name,
                'headline' => $resume->headline,
                'summary' => $resume->summary,
                'email' => $resume->email,
                'phone' => $resume->phone,
                'location' => $resume->location,
                'linkedin' => $resume->linkedin,
            ],
            'photoUrl' => $resume->getFirstMediaUrl('avatar'),
        ]);
    }


    public function edit(Resume $resume): Response
    {
        // Show edit form, include experiences and education for context
        $resume->load(['experiences', 'education']);
        return Inertia::render('Admin/Resume/Edit', [
            'resume' => $resume
        ]);
    }

    public function update(Request $request, Resume $resume)
    {
        $validated = $request->validate([
            // Same as above
        ]);
        $resume->update($validated);

        if ($request->hasFile('avatar')) {
            $resume->clearMediaCollection('avatar');
            $resume->addMediaFromRequest('avatar')->toMediaCollection('avatar', 'public');
        }
        return redirect()->route('admin.resumes.index')->with('success', 'Resume updated successfully!');
    }

    public function destroy(Resume $resume): RedirectResponse
    {
        $resume->delete();
        return redirect()
            ->route('admin.resume.index')
            ->with('success', 'Resume deleted successfully!');
    }
}
