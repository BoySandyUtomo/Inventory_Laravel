@extends('layout/layout')
@section('title', 'Update ')

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

                <input type="hidden" name="created_by" value="{{$barang->created_by}}">

                <input type="hidden" name="updated_by" value="{{auth()->user()->id}}">


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div>

          </div>

      </div>
      <!-- End of Main Content -->
      @endsection
