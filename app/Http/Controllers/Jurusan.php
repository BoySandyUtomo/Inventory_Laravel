<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\JurusanModel;
use App\FakultasModel;
use Illuminate\Support\Facades\DB;


class Jurusan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
    	$fakultas = FakultasModel::all();
        $search = $request->search;
        $searchFakultas = DB::table('fakultas')
        					->select('id_fak')
                            ->where('nama_fak', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $jurusan = DB::table('Jurusan')->where('id_fak', '=', $src)->paginate(10);

            return view('jurusan.index', compact('jurusan','fakultas'));
        }

        else{
            $jurusan = DB::table('jurusan')
                            ->where('id_fak', '=', null)
                            ->paginate(5);
            return view('jurusan.index', compact('jurusan','fakultas'));
        }
    }


    public function index(Request $request){
        $jurusan = JurusanModel::paginate(10);
        $fakultas = FakultasModel::all();

        return view('jurusan/index', compact('jurusan','fakultas'));
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
