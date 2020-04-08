@extends('layout/layout')
@section('title', 'Barang')

@section('content')
<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            <h1 class="h3 mb-0 text-gray-800">Barang</h1>
          </div>

          <div class="d-sm-flex align-items-center mb-4">
          @if(auth()->user()->role == "admin")
            <a type="submit" class="btn btn-success" href="/exportExcel">Export</a>
            <a type="submit" class="btn btn-primary ml-2" href="/createBar">Add</a>
          @endif
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
                  <td>
                  @foreach($user as $u)
                    @if($u->id == $bar->created_by)
                      {{ $u->name }}
                    @endif
                  @endforeach</td>
                  <td>
                  @foreach($user as $u)
                    @if($u->id == $bar->updated_by)
                      {{ $u->name }}
                    @endif
                  @endforeach</td>
                  <td>
                  <a href="{{ url('/updateBar', $bar->id_bar) }}" class="badge badge-success">Edit</a>
                @if(auth()->user()->role == "admin")
                  <a href="{{ url('/deleteBar', $bar->id_bar) }}" class="badge badge-danger">Delete</a>
                @endif
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

      