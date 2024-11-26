<!-- Edit Student Modal -->
<div class="modal fade @if ($errors->any() && session('editModal', false)) show @endif" id="EditStudents{{ $item->id }}" tabindex="-1" 
    aria-labelledby="editStudentLabel" aria-hidden="true" @if ($errors->any() && session('editModal', false)) style="display: block;" @endif>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentLabel">{{ __('Edit Data Siswa') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && session('editModal', false))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('student-data.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="editStudentName" 
                            placeholder="Nama Siswa" value="{{ old('name', $item->name) }}" required>
                        <label for="editStudentName">{{ __('Nama Siswa') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="rombel_id" id="editStudentRombel" required>
                            <option value="" disabled>{{ __('Pilih Rombel') }}</option>
                            @foreach ($rombels as $rombel)
                                <option value="{{ $rombel->id }}" 
                                    {{ old('rombel_id', $item->rombel_id) == $rombel->id ? 'selected' : '' }}>{{ $rombel->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="editStudentRombel">{{ __('Rombel') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="rayon_id" id="editStudentRayon" required>
                            <option value="" disabled>{{ __('Pilih Rayon') }}</option>
                            @foreach ($rayons as $rayon)
                                <option value="{{ $rayon->id }}" 
                                    {{ old('rayon_id', $item->rayon_id) == $rayon->id ? 'selected' : '' }}>{{ $rayon->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="editStudentRayon">{{ __('Rayon') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="nis" class="form-control" id="editStudentNIS" 
                            placeholder="NIS" value="{{ old('nis', $item->nis) }}" required>
                        <label for="editStudentNIS">{{ __('NIS') }}</label>
                    </div>

                    <!-- Gender Select -->
                    <div class="form-floating mb-3">
                        <select class="form-select" name="gender" id="editStudentGender" required>
                            <option value="" disabled>{{ __('Pilih Gender') }}</option>
                            <option value="laki-laki" {{ old('gender', $item->gender) == 'laki-laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                            <option value="perempuan" {{ old('gender', $item->gender) == 'perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
                            <option value="other" {{ old('gender', $item->gender) == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                        </select>
                        <label for="editStudentGender">{{ __('Gender') }}</label>
                    </div>

                    <!-- Email Input -->
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="editStudentEmail" 
                            placeholder="Email" value="{{ old('email', $item->email) }}" required>
                        <label for="editStudentEmail">{{ __('Email') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Student Modal -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Show modal only for edit form if there are errors
        @if ($errors->any() && session('editModal', false))
        var editModal = new bootstrap.Modal(document.getElementById('EditStudents{{ $item->id }}'), {
            keyboard: false,
        });
        editModal.show();
        @endif
    });
</script>
