<!-- schedule-day.blade.php -->
<div class="card my-4">
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
                    @foreach($daySchedule as $schedule)
                        <tr>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $loop->index+1 }}</td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $schedule->hari }}</td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($schedule->jam)) }}</td>
                            <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $schedule->jadwal }}</td>
                            <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $schedule->audio }}</td>
                            <td align="center" class="align-middle">
                                <div class="btn-group" role="group" aria-label="Aksi">
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-info mx-1 rounded-pill edit-button" data-toggle="modal" data-target="#editModal-{{ $schedule->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Tombol Delete -->
                                    <form action="" method="post">
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
