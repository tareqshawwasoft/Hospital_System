<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('userstyle/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('userstyle/css/styles.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('adminstyle/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;

            margin-top: 80px;


        }


        .container {

            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;

        }

        h5 {
            margin: 12px;
        }


        img {
            width: 10%;
            height: 60%
        }


        .card-title {
            text-align: center;
        }

        .card-department {
            text-align: center;
            font-size: 1rem;
        }

        .card-email {
            text-align: center;
            font-size: 1rem;
        }

    </style>
</head>



<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="{{ route('homepage') }}">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('homepage') . '#departments' }}">Departments</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('homepage') . '#doctors' }}">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('homepage') . '#Covid' }}">Covid-19 Cases</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('homepage') . '#contact' }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <h2 class="container px-4 text-center my-5">The {{ $department->name_en }}'s Doctors</h2>
        <div class="container my-5">
            {{-- @if (false)
            this will print if it is true --}}
            <div class="grid-container">
                @forelse ($doctors as $doc)
                    <div class="card" style="width: 17rem; height: 22rem;">

                        <img class="card-img-top" src="{{ asset('uploads') . '/' . $doc->image }}" alt="doc-pic">
                        <div class="card-body">
                            <h5 class="card-title">Dr. {{ ' ' . $doc->user->name }}</h5>
                            <h5 class="card-department">{{ $doc->department->name_en }}</h5>
                            <h5 class="card-email"><a
                                    href="mailto:{{ $doc->user->email }}">{{ $doc->user->email }}</a></h5>

                        </div>
                    </div>
                @empty

                        <h6 hidden>{{ $info = "There are still no doctors for $department->name_en yet!" }}</h6>

                @endforelse
            </div>
            @if (isset($info))
            <div class="container px-4 text-center my-5 p-3">
                <h3 class="my-3">Sorry!</h3>
                <h3>{{ $info }}</h3>
            </div>@endif


        </div>

    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark mt-5">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
