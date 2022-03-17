<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

if (!function_exists('set_active')) {
    function set_active($url, $output = 'active')
    {
        if (is_array($url)) {
            foreach ($url as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($url)) {
                return $output;
            }
        }
    }
}

if(!function_exists('format_rupiah')){
    function format_rupiah($angka){
        $hasil_rupiah = "Rp. " . number_format($angka, 0,'','.');
        return $hasil_rupiah;
    }

}

if(!function_exists('bulan')){
    function bulan($bulan){
        return Carbon::parse($bulan)->isoFormat('MMMM');
    }
}
