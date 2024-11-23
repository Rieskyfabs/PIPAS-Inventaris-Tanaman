<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ __('Total Tanaman Per Lokasi') }}</h5>
        @if(count($dataPerLocation) > 0)
            <canvas id="DataTanaman" style="max-height: 400px;"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const labels = @json(array_keys($dataPerLocation));
                    const dataValues = @json(array_values($dataPerLocation));
                    new Chart(document.querySelector('#DataTanaman'), {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total',
                                data: dataValues,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgb(75, 192, 192)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        callback: function(value) {
                                            return value;
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
        @else
            <p>{{ __('Tidak ada data tersedia untuk lokasi tanaman.') }}</p>
        @endif
    </div>
</div>
