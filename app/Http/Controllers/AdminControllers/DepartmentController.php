<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $departments = Department::query()
            ->latest()
            ->get();

        return view('admin_panel.departments.index', compact('departments'));
    }

    private function data(Department $department) {
        $branches = Branch::query()
            ->where('status', "active")
            ->orderBy('name', "asc")
            ->get();

        return [
            'department' => $department,
            'branches' => $branches
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.departments.create', $this->data(new Department()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:departments'],
            'name' => ['required', 'string', 'max:255'],
            'branch_id' => ['required', 'numeric'],
            'department_head_id' => ['nullable', 'numeric'],
            'department_assistant_head_id' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        Department::create([
            'branch_id' => $request->branch_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'department_head_id' => $request->department_head_id,
            'department_assistant_head_id' => $request->department_assistant_head_id,
            'status' => $request->input_status,
        ]);

        return redirect()->to('admin-panel/dashboard/departments')
            ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department) {
        return view('admin_panel.departments.show', $this->data($department));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department) {
        return view('admin_panel.departments.edit', $this->data($department));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department) {
        $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:departments,code,'.$department->id],
            'name' => ['required', 'string', 'max:255'],
            'branch_id' => ['required', 'numeric'],
            'department_head_id' => ['nullable', 'numeric'],
            'department_assistant_head_id' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        $department->update([
            'branch_id' => $request->branch_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'department_head_id' => $request->department_head_id,
            'department_assistant_head_id' => $request->department_assistant_head_id,
            'status' => $request->input_status,
        ]);

        return redirect()->to('admin-panel/dashboard/departments')
            ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department) {
        $department->delete();

        return redirect()->to('admin-panel/dashboard/departments')
            ->with('success', 'Deleted Successfully.');
    }
}
