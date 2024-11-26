<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">{{__('Tanaman Terbaru')}}</h5>
            <table class="table table-borderless table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">{{ __('KODE TANAMAN MASUK') }}</th>
                        <th scope="col">{{ __('KODE TANAMAN') }}</th>
                        <th scope="col">{{ __('NAMA TANAMAN') }}</th>
                        <th scope="col">{{ __('KATEGORI TANAMAN') }}</th>
                        <th scope="col">{{ __('LOKASI TANAMAN') }}</th>
                        <th scope="col">{{ __('TANGGAL MASUK') }}</th>
                        <th scope="col">{{ __('STATUS') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plants as $plant)
                        <tr>
                            <td>{{ $plant->tanamanMasuk->kode_tanaman_masuk ?? 'Data Kode Tanaman Masuk Tidak Tersedia' }}</td>
                            <td>{{ $plant->plantAttribute->plant_code ?? 'Data Kode Tanaman Tidak Tersedia'}}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('plants.show', ['plantAttribute' => $plant->plantAttribute->plant_code]) }}">
                                        {{ $plant->plantAttribute->name }}
                                    </a>
                                    <small>{{ $plant->plantAttribute->scientific_name ?? 'Data Nama Ilmiah Tanaman Tidak Tersedia' }}</small>
                                </div>
                            </td>
                            <td>{{ $plant->category->name ?? 'Data Kategori tidak ditemukan' }}</td>
                            <td>{{ $plant->location->name ?? 'Data Lokasi tidak ditemukan' }}</td>
                            <td>{{ $plant->tanamanMasuk->tanggal_masuk }}</td>
                            <td>
                                <span class="badge 
                                    @if ($plant->harvest_status === 'sudah dipanen') badge-soft-green 
                                    @elseif ($plant->harvest_status === 'siap panen') badge-soft-primary 
                                    @elseif ($plant->harvest_status === 'belum panen') badge-soft-warning 
                                    @else bg-secondary @endif">
                                    {{ $plant->harvest_status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
