<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $notices  = Notice::query()
            ->latest()
            ->get();

        return view('admin_panel.notices.index', compact('notices'));
    }

    private function data(Notice $notice) {
        return [
            'notice' => $notice
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.notices.create', $this->data(new Notice()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_from' => ['required', 'string', 'max:255'],
            'date_to' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        Notice::create([
            'name' => $request->name,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'details' => $request->details,
            'status' => $request->input_status
        ]);

        return redirect()->to('admin-panel/dashboard/notices')
            ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice) {
        return view('admin_panel.notices.show', $this->data($notice));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice) {
        return view('admin_panel.notices.edit', $this->data($notice));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_from' => ['required', 'string', 'max:255'],
            'date_to' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        $notice->update([
            'name' => $request->name,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'details' => $request->details,
            'status' => $request->input_status
        ]);

        return redirect()->to('admin-panel/dashboard/notices')
            ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice) {
        $notice->delete();

        return redirect()->to('admin-panel/dashboard/notices')
            ->with('success', 'Deleted Successfully.');
    }
}
