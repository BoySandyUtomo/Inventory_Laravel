<?php

namespace App\Http\Controllers;
use App\BarangModel;
use App\RuanganModel;
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

        return view('dashboard/index');
    }

}