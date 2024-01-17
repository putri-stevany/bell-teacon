@extends('includes.master')
@section('container')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sesi 2 Schedules</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Sesi 2 Schedules</h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group input-group-outline">
                <label class="form-label">Type here...</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
  
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0">
                  <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
              </li>
              
              <li class="nav-item d-flex align-items-center">
                <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Sign In</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-stats card-warning" data-target="normal">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-users fa-2x text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <h4 class="card-title">Normal</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-success" data-target="ujian">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-bar-chart fa-2x text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <h4 class="card-title">Ujian</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-danger" data-target="sesi2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-newspaper fa-2x text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <h4 class="card-title">Sesi 2</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-primary" data-target="balik">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-check-circle fa-2x text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <h4 class="card-title">Balik</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-body">
                            <div id="digitalClock" class="text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Blade File -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form input -->
                    <form action="{{route('normal')}}" method="POST" enctype="multipart/form-data" class="form-inline d-flex justify-content-between">
                        {{ csrf_field() }}
        
                        <div class="form-group mb-2">
                            <label for="hari" class="sr-only">Hari</label>
                            <select class="form-control" id="hari" name="hari">
                                <!-- Tambahkan pilihan hari sesuai kebutuhan -->
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <!-- ... -->
                            </select>
                        </div>
        
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="jam" class="sr-only">Jam</label>
                            <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam">
                            @error('jam')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control @error('jadwal') is-invalid @enderror" id="jadwal" name="jadwal" placeholder="Jadwal">
                            @error('jadwal')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="audio-add" class="form-label mr-3"><i class="fas fa-volume-up"></i></label>
                            <audio controls id="audioPreview" class="mb-3" style="display: none;"></audio>
                            <input type="file" class="form-control @error('audio') is-invalid @enderror" id="audio-add" name="audio" accept="audio/*" onchange="previewAudio()">
                            @error('audio')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <button type="submit" class="btn btn-primary mb-2 add_data">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection