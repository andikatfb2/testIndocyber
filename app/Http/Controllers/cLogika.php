<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cLogika extends Controller
{
    /**
     * fungsi untuk soal nomor 1.
     */
    public function soalNoSatu() {
        $data = array();
        for($i=1; $i<10; $i++) {
            if($i == 1) {
                $data[$i] = "<br>-";
            }
            if($i == 2) {
                $data[$i] = "<br>--";
            }
            if($i == 3) {
                $data[$i] = "<br>***";
            }

            if($i == 4) {
                $data[$i] = "<br>++++";
            }

            if($i == 5) {
                $data[$i] = "<br>-----";
            }
            if($i == 6) {
                $data[$i] = "<br>****";
            }
            if($i == 7) {
                $data[$i] = "<br>+++";
            }
            if($i == 8) {
                $data[$i] = "<br>--";
            }
            if($i == 9) {
                $data[$i] = "<br>*";
            }
        }
    return view('soalNoSatu', compact('data'));
    }

    /**
     * fungsi untuk soal nomor 2.
     */
    public function soalNoDua()
    {
        return view('soalNoDua');
    }

}
