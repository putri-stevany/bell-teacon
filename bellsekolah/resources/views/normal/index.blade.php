@extends('includes.master')
@section('container')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Normal Schedules</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Normal Schedules</h6>
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
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-users"></i>
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
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-bar-chart"></i>
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
                                                <i class="la la-newspaper-o"></i>
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
                            <div class="card card-stats card-primary" data-target="balik">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-check-circle"></i>
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
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Monday Activity Schedule</h6>
                        </div>
                        <div class="border-radius-lg pt-4 pb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Hari</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jam</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jadwal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Audio</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($monday as $mondayy)
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->hari }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($mondayy->jam)) }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->jadwal }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->audio }}</td>
                                        <td align="center" class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $mondayy->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
    
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('monday.destroy', ['monday' => $mondayy->id]) }}" method="post">
                                                    <div class="d-flex justify-content-center">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger mx-1 rounded-pill show_confirm">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tuesday Activity Schedule</h6>
                        </div>
                        <div class="border-radius-lg pt-4 pb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Hari</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jam</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jadwal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Audio</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tuesday as $mondayy)
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->hari }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($mondayy->jam)) }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->jadwal }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->audio }}</td>
                                        <td align="center" class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $mondayy->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
    
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('monday.destroy', ['monday' => $mondayy->id]) }}" method="post">
                                                    <div class="d-flex justify-content-center">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger mx-1 rounded-pill show_confirm">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Wednesday Activity Schedule</h6>
                        </div>
                        <div class="border-radius-lg pt-4 pb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Hari</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jam</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jadwal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Audio</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wednesday as $wednesdayy)
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $wednesdayy->hari }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($wednesdayy->jam)) }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $wednesdayy->jadwal }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $wednesdayy->audio }}</td>
                                        <td align="center" class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $wednesdayy->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
    
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('monday.destroy', ['monday' => $wednesdayy->id]) }}" method="post">
                                                    <div class="d-flex justify-content-center">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger mx-1 rounded-pill show_confirm">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Thursday Activity Schedule</h6>
                        </div>
                        <div class="border-radius-lg pt-4 pb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Hari</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jam</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jadwal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Audio</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($thursday as $mondayy)
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->hari }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($mondayy->jam)) }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->jadwal }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $mondayy->audio }}</td>
                                        <td align="center" class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $mondayy->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
    
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('monday.destroy', ['monday' => $mondayy->id]) }}" method="post">
                                                    <div class="d-flex justify-content-center">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger mx-1 rounded-pill show_confirm">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Friday Activity Schedule</h6>
                        </div>
                        <div class="border-radius-lg pt-4 pb-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Hari</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jam</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jadwal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Audio</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($friday as $fridayy)
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $fridayy->hari }}</td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($mondayy->jam)) }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $fridayy->jadwal }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $fridayy->audio }}</td>
                                        <td align="center" class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $mondayy->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
    
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('monday.destroy', ['monday' => $mondayy->id]) }}" method="post">
                                                    <div class="d-flex justify-content-center">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger mx-1 rounded-pill show_confirm">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

</main>
@endsection