
@extends('layout/layout')
@section('title', 'Jurusan')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jurusan</h1>
          </div>

          <div class="d-sm-flex align-items-center mb-4">
            <a type="submit" class="btn btn-success" href="/exportExcel">Export</a>
            <a type="submit" class="btn btn-primary ml-2" href="/createJur">Add</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

          <table class="table">

          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($jurusan as $jur)
              <tr>
                  <td>{{ $jur->id_jur }}</td>
                  <td>{{ $jur->fakultas->nama_fak }}</td>
                  <td>{{ $jur->nama_jur }}</td>
                  <td>
                  <a href="{{ url('/updateJur', $jur->id_jur) }}" class="badge badge-success">Edit</a>
                  <a href="{{ url('/deleteJur', $jur->id_jur) }}" class="badge badge-danger">Delete</a>
             </td>
          @endforeach
          </tbody>
        </table>
        {{ $jurusan->links() }}
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @endsection

      