<?php

namespace App\Http\Controllers;
use App\BarangModel;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use App\RuanganModel;
use App\User;
use Illuminate\Http\Request;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barang = BarangModel::when($request->search, function($query) use($request){
            $query->where('nama_bar', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $ruangan = RuanganModel::all();
        $user = User::all();

        return view('barang/index', compact('barang','ruangan', 'user'));
    }

    public function exportExcel(Request $request)
	{
		return Excel::download(new BarangExport, 'Barang-'.date("Y-m-d").'.xlsx');
    }

    public function indexStaff()
    {
        $ruangan = RuanganModel::all();
        $barang = BarangModel::paginate(10);

        return view('barangStaff/index', compact('barang','ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = RuanganModel::all();
        return view('barang/create', compact('ruangan'));
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
            'nama_bar' => 'required',
            'id_ru' => 'required',
            'total_bar' => 'required',
            'rusak_bar' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        $file = $request->file('image');
		$destinationPath = 'image/'; // upload path
        $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        $insert['image'] = "$profileImage";

        BarangModel::create([
            'nama_bar' => $request->nama_bar,
            'id_ru' => $request->id_ru,
            'total_bar' => $request->total_bar,
            'rusak_bar' => $request->rusak_bar,
            'image' => $insert['image'] = "$profileImage",
            'created_by' => $request->created_by,
        ]);

        return redirect('/barang');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bar)
    {
        $barang = BarangModel::all()->where('id_bar', '=', $id_bar)
        ->first();
        
        $ruangan = RuanganModel::all();
        return view('barang/update', compact('barang', 'ruangan'));
    }


    public function updateStore(Request $request, $id_bar){

        $this->validate($request, [
            'nama_bar' => 'required',
            'id_ru' => 'required',
            'total_bar' => 'required',
            'rusak_bar' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096'

        ]);

        $table = BarangModel::find($id_bar);

        if ($files = $request->file('image')){
            $usersImage = public_path("image/{$table->image}"); // get previous image from folder
        
         if (File::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }

        $file = $request->file('image');
		$destinationPath = 'image/'; // upload path
        $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        $insert['image'] = "$profileImage";
		// $insert['foto'] = "$imageKaryawan";

        $update = BarangModel::where('id_bar', $id_bar)->first();
        $update->nama_bar = $request['nama_bar'];
        $update->id_ru = $request['id_ru'];
        $update->total_bar = $request['total_bar'];
        $update->rusak_bar = $request['rusak_bar'];
        $update->image = $insert['image'] = "$profileImage";
        $update->created_by = $request['created_by'];
        $update->updated_by = $request['updated_by'];
        $update->update();

    }

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bar)
    {

        $gambar = BarangModel::where('id_bar',$id_bar)->first();
        File::delete('image/'.$gambar->image);

        $delete = BarangModel::find($id_bar);
        $delete->delete();

        return redirect('/barang');
    }
}
