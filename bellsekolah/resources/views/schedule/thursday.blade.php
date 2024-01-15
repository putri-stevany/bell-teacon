@extends('includes.master')
@section('container')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thursday Schedules</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Thursday Schedules</h6>
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
                                  @foreach($thursday as $thu)
                                  <tr>
                                      <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                                      <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $thu->hari }}</td>
                                      <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($thu->jam)) }}</td>
                                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $thu->jadwal }}</td>
                                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $thu->audio }}</td>
                                      <td align="center" class="align-middle">
                                          <div class="btn-group" role="group" aria-label="Aksi">
                                              <!-- Tombol Edit -->
                                              <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $thu->id }}">
                                                  <i class="fas fa-edit"></i> Edit
                                              </button>
  
                                              <!-- Tombol Delete -->
                                              <form action="{{ route('thursday.destroy', ['thursday' => $thu->id]) }}" method="post">
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
  
    <!-- Start Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
              <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="#" method="POST" enctype="multipart/form-data" class="add-form">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                          <input type="hidden" id="id">

                          <div class="mb-3">
                              <label for="hari-add" class="form-label"><i class="fas fa-calendar"></i> Hari</label>
                              <input type="text" class="form-control" id="hari-add" name="hari" value="Thursday" readonly>
                              @error('hari')
                                  <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="jam" class="control-label">
                                  <i class="fas fa-clock"></i> Jam
                              </label>
                              <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam">
                              @error('jam')
                                  <div class="alert alert-danger mt-2" role="alert">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                      </div>
                      <div class="col-md-6">
                          <div class="mb-3">
                              <label for="jadwal-add" class="form-label"><i class="fas fa-calendar-alt"></i> Jadwal</label>
                              <input type="text" class="form-control @error('jadwal') is-invalid @enderror" id="jadwal-add" name="jadwal" placeholder="Jadwal">
                              @error('jadwal')
                                  <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="audio-add" class="form-label"><i class="fas fa-volume-up"></i> Choose Audio</label>
                              <audio controls id="audioPreview" class="mb-3" style="display: none;"></audio>
                              <input type="file" class="form-control @error('audio') is-invalid @enderror" id="audio-add" name="audio" accept="audio/*" onchange="previewAudio()">
                              @error('audio')
                                  <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success add_data" id="add">Tambah</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              </div>
          </form>
      </div>
  </div>
</div>
<!-- End Modal Add -->




    @foreach($thursday as $thur)
    <!-- Start Modal Edit -->
    <div class="modal fade" id="editModal-{{ $thur->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Input hidden untuk audioPath -->
                <input type="hidden" id="audioPath-{{ $thur->id }}" value="{{ asset('storage/' . $thur->audio) }}">

                <form action="{{ route('thursday.update', ['thursday' => $thur->id]) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="{{$thur->id}}" id="thur_id">

                                {{-- Hari --}}
                                <div class="mb-3">
                                    <label for="hari-edit" class="form-label"><i class="fas fa-calendar"></i> Hari</label>
                                    <input type="text" class="form-control" id="hari-edit" name="hari" value="{{ $thur->hari }}" readonly>
                                    @error('hari')
                                        <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Jam --}}
                                <div class="form-group">
                                    <label for="jam-edit" class="control-label">
                                        <i class="fas fa-clock"></i> Jam
                                    </label>
                                    <input type="time" class="form-control @error('jam') is-invalid @enderror" value="{{ $thur->jam }}" id="jam-edit" name="jam">
                                    @error('jam')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- Jadwal --}}
                                <div class="mb-3">
                                    <label for="jadwal-edit" class="form-label"><i class="fas fa-calendar-alt"></i> Jadwal</label>
                                    <input type="text" class="form-control @error('jadwal') is-invalid @enderror" id="jadwal-edit" name="jadwal" value="{{ $thur->jadwal }}" placeholder="Jadwal">
                                    @error('jadwal')
                                        <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Audio --}}
                                <div class="mb-3">
                                  <label for="audio-edit" class="form-label"><i class="fas fa-volume-up"></i> Choose Audio</label>
                                  <audio controls id="audioPreview-{{ $thur->id }}" class="mb-3" style="display: none;">
                                      @if($thur->audio)
                                      <source src="{{ asset('storage/audio_thursday/' . $thur->audio) }}" type="audio/*">
                                      @endif
                                  </audio>
                                  <input type="file" class="form-control @error('audio') is-invalid @enderror" id="audio-edit-{{ $thur->id }}" name="audio" accept="audio/*" onchange="previewAudio('{{ $thur->id }}')">
                                  @error('audio')
                                      <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                                  @enderror
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success edit_data">Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  @endforeach
  <!-- End Modal Edit -->

      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>    
@endsection