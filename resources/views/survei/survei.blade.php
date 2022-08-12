<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Form Penilaian Sistem Informasi Universitas Wahidiyah</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                <a class="nav-link" href="https://ecampus.uniwa.ac.id/uniwa/login.jsp" target="_blank">e-Campus</a>
                <a class="nav-link" href="/login">Login</a>
            </nav>
        </div>
    </header>

    <main class="px-3">
        <h1>Survei </h1>
        <p class="lead">Mulai isi data dibawah ini dengan sungguh-sungguh dan apa adanya</p>

        <form method="POST" action="{{ route('survey.save') }}" class="container">
            @csrf

            @include('survey::standard', ['survey' => $data])
        </form>
    </main>

    <footer class="mt-auto text-white-50">
        <p class="text-white">Copyright &copy; {{ date_format(date_create(), 'Y') }} Universitas Wahidiyah</p>
    </footer>
</div>
