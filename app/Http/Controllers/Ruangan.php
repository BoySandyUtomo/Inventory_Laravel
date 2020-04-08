<?php

namespace App\Http\Controllers;
use App\JurusanModel;
use App\RuanganModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Ruangan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $jurusan = JurusanModel::all();
        $ruangan = RuanganModel::paginate(10);

        return view('ruangan/index', compact('jurusan','ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = JurusanModel::all();
        return view('ruangan/create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_jur' => 'required',
            'nama_ru' => 'required'
        ]);

        RuanganModel::create([
            'id_jur' => $request->id_jur,
            'nama_ru' => $request->nama_ru
        ]);

        return redirect('/ruangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ru)
    {
        $ruangan = RuanganModel::all()->where('id_ru', '=', $id_ru)
                                    ->first();
        $jurusan = JurusanModel::all();
        return view('ruangan/update', compact('ruangan', 'jurusan'));
    }


    public function updateStore(Request $request, $id_ru){
        $this->validate($request, [
            'nama_ru' => 'required'
        ]);

        $table = RuanganModel::find($id_ru);

        $update = RuanganModel::where('id_ru', $id_ru)->first();
        $update->id_jur = $request['id_jur'];
        $update->nama_ru = $request['nama_ru'];
        $update->update();

        return redirect('/ruangan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ru)
    {
        $delete = RuanganModel::find($id_ru);
        $delete->delete();

        return redirect('/ruangan');
    }
}
