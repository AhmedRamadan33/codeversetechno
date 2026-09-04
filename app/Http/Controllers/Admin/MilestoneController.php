<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MilestoneController extends Controller
{
    public function index(): View
    {
        $milestones = Milestone::ordered()->get();

        return view('admin.milestones.index', compact('milestones'));
    }

    public function create(): View
    {
        return view('admin.milestones.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        Milestone::create($data);

        return redirect()->route('admin.milestones.index')->with('status', 'Milestone added.');
    }

    public function edit(Milestone $milestone): View
    {
        return view('admin.milestones.edit', compact('milestone'));
    }

    public function update(Request $request, Milestone $milestone): RedirectResponse
    {
        $data = $this->validated($request);

        $milestone->update($data);

        return redirect()->route('admin.milestones.index')->with('status', 'Milestone updated.');
    }

    public function destroy(Milestone $milestone): RedirectResponse
    {
        $milestone->delete();

        return back()->with('status', 'Milestone removed.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 5)],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
