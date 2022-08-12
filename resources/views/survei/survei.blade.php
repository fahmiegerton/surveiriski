@include('survei.header')

<div class="p-3 mx-auto cover-container d-flex w-100 h-100 flex-column">
    <header class="mb-auto">
        <div>
            {{-- <h3 class="mb-0 float-md-start">Form Penilaian Sistem Informasi Universitas Wahidiyah</h3> --}}
            <h3 class="mb-0 float-md-start">Form Penilaian Sistem Informasi Universitas Wahidiyah</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                <a class="nav-link" href="https://ecampus.uniwa.ac.id/uniwa/login.jsp" target="_blank">e-Campus</a>
                <a class="nav-link" href="/login">Login</a>
            </nav>
        </div>
    </header>

    <main class="px-3 mt-2">

        <h1>{{$data->name}}</h1>
        <p class="lead">Mulai isi data dibawah ini dan bantu kami sempurnakan sistem informasi kami!</p>

        @if (session('success'))
            <div class="alert alert-success">{{session('success')}} <a href="/">Kembali ke beranda</a></div>
        @else
        <form method="POST" action="{{ route('survey.save') }}" class="container p-3 text-bg-light">
            @csrf

            @include('survey::standard', ['survey' => $data])
        </form>
        @endif
    </main>

    <footer class="mt-auto text-white-50">
        <p class="text-white">Copyright &copy; {{ date_format(date_create(), 'Y') }} Universitas Wahidiyah</p>
    </footer>
</div>

@include('survei.footer')
