@foreach ($students as $item)
    <!-- Edit Student Modal -->
    <div class="modal fade" id="EditStudents{{ $item->id }}" tabindex="-1" aria-labelledby="EditStudentLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditStudentLabel{{ $item->id }}">{{ __('Edit Data Siswa') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student-data.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="editStudentName" 
                                placeholder="Nama Siswa" value="{{ $item->name }}" required>
                            <label for="editStudentName">{{ __('Nama Siswa') }}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="rombel_id" id="editStudentRombel" required>
                                <option value="" disabled>{{ __('Pilih Rombel') }}</option>
                                @foreach ($rombels as $rombel)
                                    <option value="{{ $rombel->id }}" 
                                        {{ $item->rombel_id == $rombel->id ? 'selected' : '' }}>{{ $rombel->name }}
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
                                        {{ $item->rayon_id == $rayon->id ? 'selected' : '' }}>{{ $rayon->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="editStudentRayon">{{ __('Rayon') }}</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nis" class="form-control" id="editStudentNIS" 
                                placeholder="NIS" value="{{ $item->nis }}" required>
                            <label for="editStudentNIS">{{ __('NIS') }}</label>
                        </div>

                        <!-- Gender Select -->
                        <div class="form-floating mb-3">
                            <select class="form-select" name="gender" id="editStudentGender" required>
                                <option value="" disabled>{{ __('Pilih Gender') }}</option>
                                <option value="laki-laki" {{ $item->gender == 'laki-laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                                <option value="perempuan" {{ $item->gender == 'perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
                            </select>
                            <label for="editStudentGender">{{ __('Gender') }}</label>
                        </div>

                        <!-- Email Input -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="editStudentEmail" 
                                placeholder="Email" value="{{ $item->email }}" required>
                            <label for="editStudentEmail">{{ __('Email') }}</label>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach