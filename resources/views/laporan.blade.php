@include('header')

<page size="A4">
    <div class="container px-3 mx-auto my-2">
        <header class="items-center content-center justify-center mx-auto mb-4 text-center">
            <img src="/storage/assets/logokampus.jpg" alt="logo kampus" class="items-center mx-auto w-36">
            <h2 class="font-bold">Indeks Keamanan Sistem Informasi</h2>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 justify-items-center">
            <div class="leading-9">
                <h4 class="mb-2"><b>Responden :</b></h4>

                <div class="grid grid-cols-2">
                    <p class="font-weight-bold">Satuan Kerja</p>
                    <p class="font-weight-bold">: Departemen</p>

                    <p class="font-weight-bold">Alamat</p>
                    <p class="font-weight-bold">: Somewhere St. No. 09</p>

                    <p class="font-weight-bold">Kota Kode Pos</p>
                    <p class="font-weight-bold">: 76119</p>

                    <p class="font-weight-bold">No. Telp</p>
                    <p class="font-weight-bold">: 081234567890</p>

                    <p class="font-weight-bold">Email</p>
                    <p class="font-weight-bold">: user@mail.com</p>

                    <p class="font-weight-bold">Tanggal</p>
                    <p class="font-weight-bold">: Aug 2022</p>
                </div>
            </div>
            <div class="leading-9">
                <h4 class="mb-2"><b>Hasil Evaluasi :</b></h4>

                <div class="grid grid-cols-3 gap-x-11">
                    <p class="col-span-2 font-weight-bold">Peran/Tingkat Kepentingan TIK</p>
                    <p class="font-weight-bold">: 27</p>

                    <p class="col-span-2 font-weight-bold">Tata Kelola</p>
                    <p class="font-weight-bold">: 63</p>

                    <p class="col-span-2 font-weight-bold">Pengelolaan Resiko</p>
                    <p class="font-weight-bold">: 40</p>

                    <p class="col-span-2 font-weight-bold">Kerangka Kerja Keamananan Informasi</p>
                    <p class="font-weight-bold">: 87</p>

                    <p class="col-span-2 font-weight-bold">Pengelolaan Aset</p>
                    <p class="font-weight-bold">: 79</p>

                    <p class="col-span-2 font-weight-bold">Teknologi dan Keamanan Informasi</p>
                    <p class="font-weight-bold">: 59</p>
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
        'Tata Kelola',
        'Pengelolaan Resiko',
        'Kerangka Kerja',
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
            data: [27, 63, 40, 87, 79]
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
            }
        }
    };

    const thechart = new Chart(document.getElementById('thechart'), config);
</script>
@include('footer')
