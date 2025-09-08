<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\User;
use App\Http\Services\ResumeService;
use App\Http\Requests\ResumeStoreRequest;
use App\Http\Requests\ResumeUpdateRequest;
use App\Http\Requests\AdminRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class ResumeController extends Controller
{
    public function index(Request $request): Response
    {
        $resumes = Resume::with('user')->paginate(10);
        return Inertia::render('Admin/Resume/Index', compact('resumes'));
    }

    public function create(AdminRequest $request): Response
    {
        $users = User::orderBy('name')->pluck('name', 'id');
        return Inertia::render('Admin/Resume/Create', compact('users'));
    }

    public function store(ResumeStoreRequest $request): RedirectResponse
    {
        $validated = (object) $request->validated();
        $resume = ResumeService::update(new Resume(), $validated);

        return redirect()->route('admin.resume.show', $resume);
    }

    public function show(Request $request, Resume $resume): Response
    {
        return Inertia::render('Admin/Resume/Show', compact('resume'));
    }

    public function edit(Resume $resume): Response
    {
        $users = User::orderBy('name')->pluck('name', 'id');
        return Inertia::render('Admin/Resume/Edit', compact('resume', 'users'));
    }

    public function update(ResumeUpdateRequest $request, Resume $resume): RedirectResponse
    {
        $validated = (object) $request->validated();
        $resume = ResumeService::update($resume, $validated);

        return redirect()->route('admin.resume.show', $resume);
    }

    public function destroy(AdminRequest $request, Resume $resume): RedirectResponse
    {
        $resume->delete();
        return redirect()->route('admin.resume.index');
    }
}
