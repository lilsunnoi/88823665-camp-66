<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function myfunction(Request $reg, $var1 = null)
    {
        $data['myinput'] = $reg->input('myinput');

        // ตรวจสอบว่ามีการส่งค่า input และเป็นตัวเลข
        if ($reg->has('myinput') && is_numeric($reg->input('myinput'))) {
            $num = intval($reg->input('myinput'));
            $table = [];
            for ($i = 1; $i <= 12; $i++) {
                $table[] = "$num x $i = " . ($num * $i);
            }
            $data['table'] = $table;
        } else {
            $data['table'] = null; // ไม่มีตารางหากยังไม่กรอกหรือกรอกไม่ถูกต้อง
        }

        return view('myview', $data);
    }
}

