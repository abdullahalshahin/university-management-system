<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function get_new_student_registration_number() {
        $last = DB::table('students')->latest('id')->first();

        if ($last) {
            $item = $last->registration_number;
            $nwMsg = explode("-", $item);
            $inMsg = $nwMsg[1] + 1;
            $registration_number = $nwMsg[0] . '-' . $inMsg;

        }
        else {
            $registration_number = 'ST-10000001';
        }

        return $registration_number;
    }
}
