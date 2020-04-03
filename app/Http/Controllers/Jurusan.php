<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\JurusanModel;
use App\FakultasModel;

class Jurusan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jurusan = JurusanModel::when($request->search, function($query) use($request){
            $query->where('nama_jur', 'LIKE', '%'.$request->search.'%');
        })->paginate(5);
        return view('jurusan/index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = FakultasModel::all();
        return view('jurusan/create', compact('fakultas'));
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
            'id_fak' => 'required',
            'nama_jur' => 'required'
        ]);

        JurusanModel::create([
            'id_fak' => $request->id_fak,
            'nama_jur' => $request->nama_jur
        ]);

        return redirect('/jurusan');
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
    public function update(Request $request, $id_jur)
    {
        $jurusan = JurusanModel::all()->where('id_jur', '=', $id_jur)
                                    ->first();
        $fakultas = FakultasModel::all();
        return view('jurusan/update', compact('jurusan', 'fakultas'));
    }


    public function updateStore(Request $request, $id_jur){
        $this->validate($request, [
            'nama_jur' => 'required'
        ]);

        $table = JurusanModel::find($id_jur);

        $update = JurusanModel::where('id_jur', $id_jur)->first();
        $update->id_fak = $request['id_fak'];
        $update->nama_jur = $request['nama_jur'];
        $update->update();

        return redirect('/jurusan');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jur)
    {
        $delete = JurusanModel::find($id_jur);
        $delete->delete();

        return redirect('/jurusan');
    }
}
