<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct() {
    //     $this->middleware('permission:user_view|user_create|user_edit|user_delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:user_create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:user_edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:user_delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $users = User::query()
            ->with([
                'department:id,name',
            ])
            ->where('id', '!=', 1)
            ->latest()
            ->get();

        return view('admin_panel.users.index', compact('users'));
    }

    private function data(User $user) {
        $departments = Department::query()
            ->where('status', "active")
            ->orderBy('name', "asc")
            ->get();

        return [
            'user' => $user,
            'departments' => $departments,
            'roles' => Role::get(['id', 'name'])
        ];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.users.create', $this->data(new User()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'department_id' => ['nullable', 'numeric'],
            'degree' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_ids' => ['required', 'array'],
            'address' => ['nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
            'input_status' => ['required', 'string', 'max:255']
        ]);

        if ($profile_image = $request->file('profile_image')) {
            $extension = $profile_image->getClientOriginalExtension();

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                $destination_path = 'images/users/';
                $profile_image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
                $profile_image->move($destination_path, $profile_image_name);
                $profile_image_name = "$profile_image_name";
            }
            else {
                $profile_image_name = NULL;
            }
        }

        $user = User::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'degree' => $request->degree,
            'position' => $request->position,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security' => $request->password,
            'department_id' => $request->department_id,
            'address' => $request->address,
            'profile_image' => ($request->file('profile_image')) ? $profile_image_name : NULL,
            'status' => $request->input_status
        ]);

        if ($request->role_ids) {
            $user->assignRole($request->role_ids);
        }

        return redirect()->to('admin-panel/dashboard/users')
            ->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        if ($user->id != 1) {
            return view('admin_panel.users.show', $this->data($user));
        }
        else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        if ($user->id != 1) {
            $user_roles = $user->roles ?? [];
            $user_role_ids = Array();
    
            foreach($user_roles as $user_role) {
                $user_role_ids[] = $user_role->id;
            }

            return view('admin_panel.users.edit', $this->data($user) + [
                'role_ids' => $user_role_ids
            ]);
        }
        else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        if ($user->id != 1) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'date_of_birth' => ['nullable', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255'],
                'department_id' => ['nullable', 'numeric'],
                'degree' => ['nullable', 'string', 'max:255'],
                'position' => ['nullable', 'string', 'max:255'],
                'mobile_number' => ['required', 'string', 'max:255', 'unique:users,mobile_number,'.$user->id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role_ids' => ['required', 'array'],
                'address' => ['nullable', 'string', 'max:255'],
                'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
                'input_status' => ['required', 'string', 'max:255']
            ]);

            if ($profile_image = $request->file('profile_image')) {
                $extension = $profile_image->getClientOriginalExtension();

                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                    if ($user->profile_image && file_exists('images/users/' . $user->profile_image)) {
                        unlink('images/users/' . $user->profile_image);
                    }

                    $destination_path = 'images/users/';
                    $profile_image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
                    $profile_image->move($destination_path, $profile_image_name);
                    $profile_image_name = "$profile_image_name";
                }
                else {
                    $profile_image_name = NULL;
                }
            }

            $user->update([
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'degree' => $request->degree,
                'position' => $request->position,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'security' => $request->password,
                'department_id' => $request->department_id,
                'address' => $request->address,
                'profile_image' => ($request->file('profile_image')) ? $profile_image_name : $user->profile_image,
                'status' => $request->input_status
            ]);

            if ($request->role_ids) {
                DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                $user->assignRole($request->role_ids);
            }

            return redirect()->to('admin-panel/dashboard/users')
                ->with('success', 'Created Successfully.');
        }
        else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        if ($user->id != 1) {
            $user->delete();

            return redirect()->to('admin-panel/dashboard/users')
                ->with('success', 'Deleted Successfully.');
        }
        else {
            return abort(404);
        }
    }

    public function users_change_status(Request $request) {
        $user = User::find($request->user_id);

        if ($user) {
            $user->update([
                'status' => $request->status,
            ]);

            return response([
                'status' => true,
                'message' => "Updated Successfully"
            ], 200);
        } 
        else {
            return response([
                'status' => true,
                'message' => "Data Not Found !!!"
            ], 200);
        }
    }
}
