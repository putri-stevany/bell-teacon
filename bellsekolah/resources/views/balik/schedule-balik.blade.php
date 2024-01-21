<div class="card-header col mb-6">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">{{ $day }} Activity Schedule</h6>
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
                    @foreach($daySchedule as $index => $balik)
                        <tr>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $index + 1 }}</td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $balik->hari }}</td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($balik->jam)) }}</td>
                            <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $balik->jadwal }}</td>
                            <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $balik->audio }}</td>
                            <td align="center" class="align-middle">
                                <div class="btn-group" role="group" aria-label="Aksi">
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $balik->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('balik.destroy', ['balik' => $balik->id]) }}" method="post">
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

                        <!-- Start Modal Edit -->
                        <div class="modal fade" id="editModal-{{ $balik->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
                                        <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <!-- Input hidden untuk audioPath -->
                                    <input type="hidden" id="audioPath-{{ $balik->id }}" value="{{ asset('storage/' . $balik->audio) }}">
                    
                                    <form action="{{ route('balik.update', ['balik' => $balik->id]) }}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden" value="{{$balik->id}}" id="schedule_id">
                    
                                                    {{-- Hari --}}
                                                    <div class="mb-3">
                                                        <label for="hari-edit" class="form-label"><i class="fas fa-calendar"></i> Hari</label>
                                                        <input type="text" class="form-control" id="hari-edit" name="hari" value="{{ $balik->hari }}" readonly>
                                                        @error('hari')
                                                            <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                    
                                                    {{-- Jam --}}
                                                    <div class="form-group">
                                                        <label for="jam-edit" class="control-label">
                                                            <i class="fas fa-clock"></i> Jam
                                                        </label>
                                                        <input type="time" class="form-control @error('jam') is-invalid @enderror" value="{{ $balik->jam }}" id="jam-edit" name="jam">
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
                                                        <input type="text" class="form-control @error('jadwal') is-invalid @enderror" id="jadwal-edit" name="jadwal" value="{{ $balik->jadwal }}" placeholder="Jadwal">
                                                        @error('jadwal')
                                                            <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                    
                                                    {{-- Audio --}}
                                                    <div class="mb-3">
                                                      <label for="audio-edit" class="form-label"><i class="fas fa-volume-up"></i> Choose Audio</label>
                                                      <input type="file" class="form-control @error('audio') is-invalid @enderror" id="audio-edit-{{ $balik->id }}" name="audio" accept="audio/*" onchange="previewAudio('{{ $balik->id }}')">
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
                </tbody>
            </table>
        </div>
    </div>
</div>
