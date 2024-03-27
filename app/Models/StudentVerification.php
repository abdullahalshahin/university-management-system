<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentVerification extends Model {
    use HasFactory;

    protected $guarded = [];

    public static function save_and_get_otp($email) {
        $code = rand(1111, 9999);

        self::updateOrCreate([
                'email' => $email
            ], [
                'otp' => $code,
                'total_sent' => DB::raw('total_sent + 1'),
                'otp_expire_time' => now()->addMinutes(10),
            ]
        );

        return $code;
    }
}
