<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

use App\Exports\Statistik;
use App\Exports\Terima;
use App\Exports\Raw;
use App\Exports\RawTerima;

class CalonHasilController extends Controller
{
    public function statistik($id)
    {
        if (auth()->user()->isAdmin()){
            if($id === 'mentah'){
                return Excel::download(new Raw, 'Data Mentah PSB.xlsx');
            }

            if($id === 'mentah_terima'){
                return Excel::download(new RawTerima, 'Data Mentah PSB Diterima.xlsx');
            }

            if($id === 'all' || $id === 'aktif'){
                return Excel::download(new Statistik($id), 'Statistik-'.$id.'.xlsx');
            }

            if($id === 'terima'){
                return Excel::download(new Terima($id), 'Statistik-'.$id.'.xlsx');
            }
        }
    }
}
