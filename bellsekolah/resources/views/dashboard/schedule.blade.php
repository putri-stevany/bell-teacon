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
                    </tr>
                </thead>
                <tbody>
                    @foreach($daySchedule as $index => $schedule)
                        <tr>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $index + 1 }}</td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $schedule->hari }}</td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2 align-middle">{{ date('H:i', strtotime($schedule->jam)) }}</td>
                            <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $schedule->jadwal }}</td>
                            <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder align-middle">{{ $schedule->audio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
