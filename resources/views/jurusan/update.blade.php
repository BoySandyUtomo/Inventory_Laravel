@extends('layout/layout')
@section('title', 'Update ')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Jurusan</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

          <form method="post" action="{{ url('/update/' . $jurusan->id_jur) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                    <label for="nama_cat">Fakultas</label>
                    <select class="form-control" id="id_fak" name="id_fak">
                        <option value="" hidden> -- Pilih Fakultas -- </option>
                        @foreach($fakultas as $fak)
                            <option value="{{ $fak->id_fak }}" {{ ($jurusan->id_fak == $fak->id_fak) ? 'selected' : ''}} >{{ $fak->nama_fak }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group">
                  <label for="nama_jur">Jurusan</label>
                  <input type="text" class="form-control" id="nama_jur" name="nama_jur" value="{{ $jurusan->nama_jur }}">
             </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div>

          </div>

      </div>
      <!-- End of Main Content -->
      @endsection
