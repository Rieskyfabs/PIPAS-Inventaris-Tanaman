<!-- Create Student Modal -->
<div class="modal fade" id="Students" tabindex="-1" aria-labelledby="createStudentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentLabel">{{ __('Tambah Data Siswa Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('student-data.store') }}" method="POST">
                    @csrf
                    <!-- Nama Siswa -->
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="studentName" 
                            placeholder="Nama Siswa" data-value="" required>
                        <label for="studentName">{{ __('Nama Siswa') }}</label>
                    </div>

                    <!-- Rombel -->
                    <div class="form-floating mb-3">
                        <select class="form-select" name="rombel_id" id="studentRombel" data-value="" required>
                            <option value="" disabled selected>{{ __('Pilih Rombel') }}</option>
                            @foreach ($rombels as $rombel)
                                <option value="{{ $rombel->id }}">{{ $rombel->name }}</option>
                            @endforeach
                        </select>
                        <label for="studentRombel">{{ __('Rombel') }}</label>
                    </div>

                    <!-- Rayon -->
                    <div class="form-floating mb-3">
                        <select class="form-select" name="rayon_id" id="studentRayon" data-value="" required>
                            <option value="" disabled selected>{{ __('Pilih Rayon') }}</option>
                            @foreach ($rayons as $rayon)
                                <option value="{{ $rayon->id }}">{{ $rayon->name }}</option>
                            @endforeach
                        </select>
                        <label for="studentRayon">{{ __('Rayon') }}</label>
                    </div>

                    <!-- NIS -->
                    <div class="form-floating mb-3">
                        <input type="text" name="nis" class="form-control" id="studentNIS" 
                            placeholder="NIS" data-value="" required>
                        <label for="studentNIS">{{ __('NIS') }}</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="studentEmail" 
                            placeholder="Email" data-value="" required>
                        <label for="studentEmail">{{ __('Email') }}</label>
                    </div>

                    <!-- Gender -->
                    <div class="form-floating mb-3">
                        <select class="form-select" name="gender" id="studentGender" data-value="" required>
                            <option value="" disabled selected>{{ __('Pilih Gender') }}</option>
                            <option value="laki-laki">{{ __('Laki-laki') }}</option>
                            <option value="perempuan">{{ __('Perempuan') }}</option>
                        </select>
                        <label for="studentGender">{{ __('Gender') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Tambah') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Student Modal -->
