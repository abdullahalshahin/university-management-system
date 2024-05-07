<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $branches = Branch::query()
            ->latest()
            ->get();

        return view('admin_panel.branches.index', compact('branches'));
    }

    private function data(Branch $branch) {
        return [
            'branch' => $branch
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.branches.create', $this->data(new Branch()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:branches'],
            'name' => ['required', 'string', 'max:255'],
            'contact_number_1' => ['required', 'string', 'max:255'],
            'contact_number_2' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'domain' => ['nullable', 'string', 'max:255'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
            'address' => ['required', 'string', 'max:255'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($thumbnail_image = $request->file('thumbnail_image')) {
            $extension = $thumbnail_image->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                $destination_path = 'images/branches/';
                $thumbnail_image_name = date('YmdHis') . "." . $thumbnail_image->getClientOriginalExtension();
                $thumbnail_image->move($destination_path, $thumbnail_image_name);
                $thumbnail_image_name = "$thumbnail_image_name";
            }
            else {
                $thumbnail_image_name = NULL;
            }
        }

        Branch::create([
            'code' => $request->code,
            'name' => $request->name,
            'contact_number_1' => $request->contact_number_1,
            'contact_number_2' => $request->contact_number_2,
            'email' => $request->email,
            'domain' => $request->domain,
            'thumbnail_image' => ($request->file('thumbnail_image')) ? $thumbnail_image_name : null,
            'address' => $request->address,
            'status' => $request->input_status,
        ]);

        return redirect()->to('admin-panel/dashboard/branches')
            ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch) {
        return view('admin_panel.branches.show', $this->data($branch));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch) {
        return view('admin_panel.branches.edit', $this->data($branch));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch) {
        $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:branches,'.$branch->id],
            'name' => ['required', 'string', 'max:255'],
            'contact_number_1' => ['required', 'string', 'max:255'],
            'contact_number_2' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'domain' => ['nullable', 'string', 'max:255'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
            'address' => ['required', 'string', 'max:255'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($thumbnail_image = $request->file('thumbnail_image')) {
            $extension = $thumbnail_image->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                if ($branch->thumbnail_image && file_exists('images/branches/' . $branch->thumbnail_image)) {
                    unlink('images/branches/' . $branch->thumbnail_image);
                }

                $destination_path = 'images/branches/';
                $thumbnail_image_name = date('YmdHis') . "." . $thumbnail_image->getClientOriginalExtension();
                $thumbnail_image->move($destination_path, $thumbnail_image_name);
                $thumbnail_image_name = "$thumbnail_image_name";
            }
            else {
                $thumbnail_image_name = NULL;
            }
        }

        $branch->update([
            'code' => $request->code,
            'name' => $request->name,
            'contact_number_1' => $request->contact_number_1,
            'contact_number_2' => $request->contact_number_2,
            'email' => $request->email,
            'domain' => $request->domain,
            'thumbnail_image' => ($request->file('thumbnail_image')) ? $thumbnail_image_name : $branch->thumbnail_image,
            'address' => $request->address,
            'status' => $request->input_status,
        ]);

        return redirect()->to('admin-panel/dashboard/branches')
            ->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch) {
        if ($branch->thumbnail_image && file_exists('images/branches/' . $branch->thumbnail_image)) {
            unlink('images/branches/' . $branch->thumbnail_image);
        }

        $branch->delete();

        return redirect()->to('admin-panel/dashboard/branches')
            ->with('success', 'Deleted Successfully.');
    }
}
