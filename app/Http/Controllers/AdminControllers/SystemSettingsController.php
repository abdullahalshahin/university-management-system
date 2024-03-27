<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    public function index() {
        $email_gateway_data = [
            'mail_host' => env('MAIL_HOST'),
            'mail_port' => env('MAIL_PORT'),
            'mail_username' => env('MAIL_USERNAME'),
            'mail_password' => env('MAIL_PASSWORD'),
            'mail_encryption' => env('MAIL_ENCRYPTION'),
            'mail_from_address' => env('MAIL_FROM_ADDRESS'),
        ];

        return view('admin_panel.system_settings.index', compact('email_gateway_data'));
    }

    public function email_gateway_update(Request $request) {
        $request->validate([
            'mail_host' => ['required', 'string', 'max:255'],
            'mail_port' => ['required', 'string', 'max:255'],
            'mail_username' => ['required', 'string', 'max:255'],
            'mail_password' => ['required', 'string', 'max:255'],
            'mail_encryption' => ['required', 'string', 'max:255'],
            'mail_from_address' => ['required', 'string', 'max:255']
        ]);

        $this->update_env_file("MAIL_HOST", $request->mail_host ?? "");
        $this->update_env_file("MAIL_PORT", $request->mail_port ?? "");
        $this->update_env_file("MAIL_USERNAME", $request->mail_username ?? "");
        $this->update_env_file("MAIL_PASSWORD", $request->mail_password ?? "");
        $this->update_env_file("MAIL_ENCRYPTION", $request->mail_encryption ?? "");
        $this->update_env_file("MAIL_FROM_ADDRESS", $request->mail_from_address ?? "");

        // Clear the config cache
        \Illuminate\Support\Facades\Artisan::call('config:clear');

        return back()->with('success', 'Update Successfully!!!');
    }

    public function application_cache_clear() {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        
        return redirect()->to('admin-panel/dashboard/system-settings')
            ->with('success', 'Cache Clear Successfully !!!');
    }

    private function update_env_file($key, $value) {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}
