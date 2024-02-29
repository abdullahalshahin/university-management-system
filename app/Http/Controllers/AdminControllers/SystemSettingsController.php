<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    public function index() {
        return view('admin_panel.system_settings.index');
    }

    public function application_cache_clear() {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        
        return redirect()->to('admin-panel/dashboard/system-settings')
            ->with('success', 'Cache Clear Successfully !!!');
    }
}
