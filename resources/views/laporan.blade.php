@include('header')

<page size="A4">
    <div class="container px-3 mx-auto my-2">
        <header class="items-center content-center justify-center mx-auto mb-4 text-center">
            <img src="/assets/logo.png" alt="logo kampus" class="items-center mx-auto w-36">
            <h2 class="font-bold">Indeks Keamanan Sistem Informasi</h2>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 justify-items-center">
            <div class="leading-9">
                <h4 class="mb-2"><b>Responden :</b></h4>

                <div class="grid grid-cols-2">
                    <p class="font-weight-bold">Fakultas/Departemen</p>
                    <p class="font-weight-bold">: {{$data->answers[1]['value'] ?? '-'}}</p>

                    <p class="font-weight-bold">Nama</p>
                    <p class="font-weight-bold">: {{$data->answers[0]['value'] ?? '-'}}</p>

                    <p class="font-weight-bold">Email</p>
                    <p class="font-weight-bold">: {{$data->answers[2]['value'] ?? '-'}}</p>

                    <p class="font-weight-bold">Tanggal</p>
                    <p class="font-weight-bold">: {{\Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</p>
                </div>
            </div>
            <div class="leading-9">
                <h4 class="mb-2"><b>Hasil Evaluasi :</b></h4>

                <div class="grid grid-cols-3 gap-x-11">
                    <p class="col-span-2 font-weight-bold">Peran/Tingkat Kepentingan TIK</p>
                    <p class="font-weight-bold">: {{$summary['peran_tik'] ?? '-'}}</p>

                    <p class="col-span-2 font-weight-bold">Tata Kelola</p>
                    <p class="font-weight-bold">: {{$summary['tata_kelola'] ?? '-'}}</p>

                    <p class="col-span-2 font-weight-bold">Pengelolaan Resiko</p>
                    <p class="font-weight-bold">: {{$summary['pengelola_resiko'] ?? '-'}}</p>

                    <p class="col-span-2 font-weight-bold">Kerangka Kerja Keamananan Informasi</p>
                    <p class="font-weight-bold">: {{$summary['kerangka_kerja'] ?? '-'}}</p>

                    <p class="col-span-2 font-weight-bold">Pengelolaan Aset</p>
                    <p class="font-weight-bold">: {{$summary['pengelola_aset'] ?? '-'}}</p>

                    <p class="col-span-2 font-weight-bold">Teknologi dan Keamanan Informasi</p>
                    <p class="font-weight-bold">: {{$summary['tki'] ?? '-'}}</p>
                </div>
            </div>
        </div>

        <div class="items-center content-center justify-center w-3/4 mx-auto mt-12 text-center">
            <canvas id="thechart"></canvas>
        </div>
    </div>
</page>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = [
        'Peran/Tingkat Kepentingan TIK',
        'Tata Kelola',
        'Pengelolaan Resiko',
        'Kerangka Kerja Informasi',
        'Pengelolaan Aset',
        'Aspek Teknologi'
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Indeks Keamanan',
            fill: true,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointBackgroundColor: 'rgb(255, 99, 132)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 99, 132)',
            data: @json($data_chart)
        }]
    };

    const config = {
        type: 'radar',
        data: data,
        options: {
            elements: {
                line: {
                    borderWidth: 3
                }
            },
            scale: {
                beginAtZero: true,
                min: 0,
                stepSize: 4
            }
        }
    };

    const thechart = new Chart(document.getElementById('thechart'), config);
</script>
@include('footer')
