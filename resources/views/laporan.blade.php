@include('header')

<page size="A4">
    <div class="container mx-auto px-3 my-2">
        <header class="mx-auto items-center justify-center content-center text-center mb-4">
            <img src="/storage/assets/logokampus.jpg" alt="logo kampus" class="items-center w-36 mx-auto">
            <h2 class="font-bold">Indeks Keamanan Informasi</h2>
        </header>

        <div class="grid md:grid-cols-2 gap-x-10 grid-cols-1 justify-items-center">
            <div class="leading-9">
                <h4 class="mb-2"><b>Responden :</b></h4>

                <div class="grid grid-cols-2 gap-x-14">
                    <p class="font-weight-bold">Satuan Kerja</p>
                    <p class="font-weight-bold">: Departemen</p>

                    <p class="font-weight-bold">Alamat</p>
                    <p class="font-weight-bold">: AKu gk tau</p>

                    <p class="font-weight-bold">Kota Kode Pos</p>
                    <p class="font-weight-bold">: 76119</p>

                    <p class="font-weight-bold">No. Telp</p>
                    <p class="font-weight-bold">: 081234567890</p>

                    <p class="font-weight-bold">Email</p>
                    <p class="font-weight-bold">: user@mail.com</p>

                    <p class="font-weight-bold">Tanggal</p>
                    <p class="font-weight-bold">: Jun 2025</p>
                </div>
            </div>
            <div class="leading-9">
                <h4 class="mb-2"><b>Hasil Evaluasi :</b></h4>

                <div class="grid grid-cols-3 gap-x-11">
                    <p class="font-weight-bold col-span-2">Peran/Tingkat Kepentingan TIK</p>
                    <p class="font-weight-bold">: 27</p>

                    <p class="font-weight-bold col-span-2">Tata Kelola</p>
                    <p class="font-weight-bold">: 63</p>

                    <p class="font-weight-bold col-span-2">Pengelolaan Resiko</p>
                    <p class="font-weight-bold">: 40</p>

                    <p class="font-weight-bold col-span-2">Kerangka Kerja Keamananan Informasi</p>
                    <p class="font-weight-bold">: 87</p>

                    <p class="font-weight-bold col-span-2">Pengelolaan Aset</p>
                    <p class="font-weight-bold">: 79</p>

                    <p class="font-weight-bold col-span-2">Teknologi dan Keamanan Informasi</p>
                    <p class="font-weight-bold">: 59</p>
                </div>
            </div>
        </div>

        <div class="mx-auto items-center justify-center content-center text-center w-3/4 mt-12">
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
