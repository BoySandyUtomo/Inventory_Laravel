
@extends('layout/layout')
@section('title', 'Jurusan')

@section('content')
 
 <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ url('/search')}}" method="GET">
            <div class="input-group">
              <input type="text" name="search" class="form-control bg-light border-0 small" value="" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Boy Sandy</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=""
                   onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                      <form id="logout-form" action="" method="POST" style="display: none;">
                                        @csrf
                        </form>
                
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

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
              <th scope="row">{{ $loop->iteration }}</th>
                  <td>
                  @foreach($fakultas as $fak)
                      @if($fak->id_fak == $jur->id_fak)
                          {{ $fak->nama_fak }}
                      @endif
                  @endforeach</td>
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

      