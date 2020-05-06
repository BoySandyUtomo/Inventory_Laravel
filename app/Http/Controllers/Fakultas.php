<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\FakultasModel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use App\Imports\FakultasImport;

class Fakultas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fakultas = FakultasModel::when($request->search, function($query) use($request){
            $query->where('nama_fak', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        return view('fakultas/index', compact('fakultas'));
    }


    public function import(Request $request)
    {
        $file = $request->file('excel');
        $filename = rand().$file->getClientOriginalName();
        $file->move('excel/fakultas', $filename);

        Excel::import(new FakultasImport, public_path('/excel/fakultas/'.$filename));

        return redirect('/fakultas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = FakultasModel::all();
    	return view('fakultas/create', compact('fakultas'));
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
			'nama_fak' => 'required'
		]);

		FakultasModel::create([
			'nama_fak' => $request->nama_fak
		]);

    	return redirect('/fakultas');
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
    public function update(Request $request, $id_fak)
    {
        $fakultas = FakultasModel::all()->where('id_fak', '=', $id_fak)
                                    ->first();
        return view('fakultas/update', compact('fakultas'));
    }

    public function updateStore(Request $request, $id_fak)
    {
         $this->validate($request, [
            'nama_fak' => 'required'
        ]);

        $fakultas = FakultasModel::find($id_fak);

        $id_fak = $request['id_fak'];
        $update = FakultasModel::where('id_fak', $id_fak)->first();
        $update->nama_fak = $request['nama_fak'];
        $update->update();

        return redirect('/fakultas');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_fak){
        $delete = FakultasModel::find($id_fak);
        $delete->delete();

        return redirect('/fakultas');
    }
}
