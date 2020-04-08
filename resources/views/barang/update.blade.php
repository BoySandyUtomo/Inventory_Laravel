@extends('layout/layout')
@section('title', 'Update ')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Ruangan</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

          <form method="post" action="{{ url('/updateBar/' . $barang->id_bar) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                    <label >Barang</label>
                    <input type="text" class="form-control" id="nama_bar" name="nama_bar" value="{{ $barang->nama_bar }}">
            </div>

            <div class="form-group">
                    <label>Ruangan</label>
                    <select class="form-control" id="id_ru" name="id_ru">
                        <option value="" hidden> -- Pilih Ruangan -- </option>
                        @foreach($ruangan as $ru)
                        <option value="{{ $ru->id_ru }}" {{ ($barang->id_ru == $ru->id_ru) ? 'selected' : ''}} >{{ $ru->nama_ru }}
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <label>Total</label>
                    <input type="number" class="form-control" id="total_bar" name="total_bar" value="{{ $barang->total_bar }}">
                </div>

                <div class="form-group">
                    <label>Rusak</label>
                    <input type="number" class="form-control" id="rusak_bar" name="rusak_bar" value="{{ $barang->rusak_bar }}">
                </div>

                <input type="hidden" name="created_by" value="">


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div>

          </div>

      </div>
      <!-- End of Main Content -->
      @endsection
