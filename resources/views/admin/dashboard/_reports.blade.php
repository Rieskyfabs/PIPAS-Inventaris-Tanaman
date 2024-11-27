<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{__('Laporan Status Tanaman')}}</h5>
            @if(empty($dataBelumDipanen) && empty($dataSiapDipanen) && empty($dataSudahDipanen))
                <p>{{ __('Belum ada data lokasi yang tersedia.') }}</p>
            @else
                <!-- Column Chart -->
                <div id="columnChart"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#columnChart"), {
                            series: [{
                                name: 'Belum Panen',
                                data: @json($dataBelumDipanen)
                            }, {
                                name: 'Siap Dipanen',
                                data: @json($dataSiapDipanen)
                            }, {
                                name: 'Sudah Dipanen',
                                data: @json($dataSudahDipanen)
                            }],
                            chart: { type: 'bar', height: 350 },
                            plotOptions: { bar: { horizontal: false, columnWidth: '55%', endingShape: 'rounded' }},
                            dataLabels: { enabled: false },
                            stroke: { show: true, width: 2, colors: ['transparent'] },
                            xaxis: {
                                categories: @json(array_values($ruangan)),
                                title: { text: 'Lokasi Penyimpanan' }
                            },
                            yaxis: { title: { text: 'Jumlah Tanaman' }},
                            fill: { opacity: 1 },
                            tooltip: {
                                y: { formatter: function(val) { return val + " Tanaman" }}
                            }
                        }).render();
                    });
                </script>
                <!-- End Column Chart -->
            @endif
        </div>
    </div>
</div>
