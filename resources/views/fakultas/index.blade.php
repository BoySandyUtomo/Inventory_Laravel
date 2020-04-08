
@extends('layout/layout')
@section('title', 'Fakultas')

@section('content')
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fakultas</h1>
          </div>

          <div class="d-sm-flex align-items-center mb-4">
            <a type="submit" class="btn btn-success" href="{{ url('/exportExcel') }}">Export</a>
            <a type="submit" class="btn btn-primary ml-2" href="{{ url('/createFak') }}">Add</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

          <table class="table">

          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach( $fakultas as $fak)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
              <td>{{$fak->nama_fak}}</td>
              <td>
             <a href="{{ url('/updateFak', $fak->id_fak) }}" class="badge badge-success">Edit</a>
             <a href="{{ url('/deleteFak', $fak->id_fak) }}" class="badge badge-danger">Delete</a>
             </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        {{ $fakultas->links() }}
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @endsection

      