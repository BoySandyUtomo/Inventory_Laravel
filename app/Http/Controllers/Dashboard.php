<?php

namespace App\Http\Controllers;
use App\BarangModel;
use App\RuanganModel;
use App\JurusanModel;
use App\FakultasModel;
use App\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totalfakultas = FakultasModel::count();
    	$totaljurusan = RuanganModel::count();
    	$totalruangan = JurusanModel::count();
    	$totalbarang = BarangModel::count();
        return view('dashboard/index', compact('totalfakultas', 'totaljurusan', 'totalruangan', 'totalbarang'));
        
    }


    public function hitung(){
    	
    }

}
