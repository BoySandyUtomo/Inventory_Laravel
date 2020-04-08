
@extends('layout/layout')
@section('title', 'Ruangan')

@section('content')
 <!-- Topbar Search -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ruangan</h1>
          </div>

          <div class="d-sm-flex align-items-center mb-4">
            <a type="submit" class="btn btn-success" href="/exportExcel">Export</a>
            <a type="submit" class="btn btn-primary ml-2" href="/createRu">Add</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

          <table class="table">

          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Ruangan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($ruangan as $ru)
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
                  <td>
                  @foreach($jurusan as $jur)
                      @if($jur->id_jur == $ru->id_jur)
                          {{ $jur->nama_jur }}
                      @endif
                  @endforeach</td>
                  <td>{{ $ru->nama_ru }}</td>
                  <td>
                  <a href="{{ url('/updateRu', $ru->id_ru) }}" class="badge badge-success">Edit</a>
                  <a href="{{ url('/deleteRu', $ru->id_ru) }}" class="badge badge-danger">Delete</a>
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

      