<div class="card">
    <div class="card-body">
        <h5 class="card-title">Kondisi Tanaman Per Lokasi</h5>

        @if(empty($dataPerLocation) || count($dataPerLocation) === 0)
            <p class="text-center">{{__('Belum ada data tersedia')}}</p>
        @else
            <div id="donutChart" style="min-height: 350px;" class="echart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const chartData = @json($dataPerLocation);

                    const formattedData = Object.entries(chartData).map(([location, count]) => ({
                        name: location,
                        value: count
                    }));

                    echarts.init(document.querySelector("#donutChart")).setOption({
                        tooltip: {
                            trigger: 'item'
                        },
                        legend: {
                            top: '5%',
                            left: 'center'
                        },
                        series: [{
                            name: 'Jumlah Tanaman',
                            type: 'pie',
                            radius: ['40%', '70%'],
                            avoidLabelOverlap: false,
                            label: {
                                show: false,
                                position: 'center'
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    fontSize: '18',
                                    fontWeight: 'bold'
                                }
                            },
                            labelLine: {
                                show: false
                            },
                            data: formattedData
                        }]
                    });
                });
            </script>
        @endif
    </div>
</div>
