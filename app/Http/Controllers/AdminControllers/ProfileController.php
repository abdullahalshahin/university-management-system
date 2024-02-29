<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct() {
    //     $this->middleware('permission:profile_view|profile_edit', ['only' => ['my_account']]);
    //     $this->middleware('permission:profile_edit', ['only' => ['my_account_edit', 'my_account_update']]);
    // }

    public function my_account() {
        $user = Auth::user();

        return view('admin_panel.my_account.index', compact('user'));
    }
    
    public function my_account_edit() {
        $user = Auth::user();

        return view('admin_panel.my_account.edit', compact('user'));
    }

    public function my_account_update(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string'],
        ]);

        $user = Auth::user();

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

        $user_data = User::find($user->id);
        
        $user_data->update([
            'name' => $request->name,
            // 'mobile_number' => $request->mobile_number,
            // 'email' => $request->email,
            'password' => Hash::make($request->password),
            'security' => $request->password,
            'address' => $request->address,
            'profile_image' => ($request->file('profile_image')) ? $profile_image_name : $user->profile_image,
        ]);

        return redirect()->to('admin-panel/dashboard/my-account')
            ->with('success', "Profile Update Successfully!!!");
    }
}
