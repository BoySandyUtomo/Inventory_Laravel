<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexFakultas(Request $request)
    {
        $fakultas = FakultasModel::when($request->search, function($query) use($request){
            $query->where('nama_fak', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        return view('fakultas/index', compact('fakultas'));
    }

}
