
@extends('layout/layout')
@section('title', 'Barang')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Barang</h1>
          </div>

          <div class="d-sm-flex align-items-center mb-4">
            <a type="submit" class="btn btn-success" href="/exportExcel">Export</a>
            <a type="submit" class="btn btn-primary ml-2" href="/createBar">Add</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

          <table class="table">

          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Barang</th>
              <th scope="col">Ruangan</th>
              <th scope="col">Total</th>
              <th scope="col">Rusak</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Diupdate</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($barang as $bar)
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $bar->nama_bar }}</td>
                  <td>
                  @foreach($ruangan as $ru)
                      @if($ru->id_ru == $bar->id_ru)
                          {{ $ru->nama_ru }}
                      @endif
                  @endforeach</td>
                  <td>{{ $bar->total_bar }}</td>
                  <td>{{ $bar->rusak_bar }}</td>
                  <td>{{ $bar->created_by }}</td>
                  <td>{{ $bar->updated_by }}</td>
                  <td>
                  <a href="{{ url('/updateBar', $bar->id_bar) }}" class="badge badge-success">Edit</a>
                  <a href="{{ url('/deleteBar', $bar->id_bar) }}" class="badge badge-danger">Delete</a>
             </td>
             </tr>
          @endforeach
          </tbody>
        </table>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @endsection

      