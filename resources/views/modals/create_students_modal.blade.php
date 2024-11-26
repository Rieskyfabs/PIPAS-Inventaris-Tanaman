<!-- Create Student Modal -->
<div class="modal fade @if ($errors->any() && !session('editModal')) show @endif" id="Students" tabindex="-1" 
  aria-labelledby="createStudentLabel" aria-hidden="true" @if ($errors->any() && !session('editModal')) style="display: block;" @endif>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentLabel">{{ __('Tambah Data Siswa Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && !session('editModal'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('student-data.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="studentName" 
                            placeholder="Nama Siswa" value="{{ old('name') }}" required>
                        <label for="studentName">{{ __('Nama Siswa') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="rombel_id" id="studentRombel" required>
                            <option value="" disabled selected>{{ __('Pilih Rombel') }}</option>
                            @foreach ($rombels as $rombel)
                                <option value="{{ $rombel->id }}" 
                                    {{ old('rombel_id') == $rombel->id ? 'selected' : '' }}>{{ $rombel->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="studentRombel">{{ __('Rombel') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="rayon_id" id="studentRayon" required>
                            <option value="" disabled selected>{{ __('Pilih Rayon') }}</option>
                            @foreach ($rayons as $rayon)
                                <option value="{{ $rayon->id }}" 
                                    {{ old('rayon_id') == $rayon->id ? 'selected' : '' }}>{{ $rayon->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="studentRayon">{{ __('Rayon') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="nis" class="form-control" id="studentNIS" 
                            placeholder="NIS" value="{{ old('nis') }}" required>
                        <label for="studentNIS">{{ __('NIS') }}</label>
                    </div>

                    <!-- Email Input -->
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="studentEmail" 
                            placeholder="Email" value="{{ old('email') }}" required>
                        <label for="studentEmail">{{ __('Email') }}</label>
                    </div>

                    <!-- Gender Select -->
                    <div class="form-floating mb-3">
                        <select class="form-select" name="gender" id="studentGender" required>
                            <option value="" disabled selected>{{ __('Pilih Gender') }}</option>
                            <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                            <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
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
