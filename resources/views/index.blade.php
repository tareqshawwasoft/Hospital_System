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

</head>
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
                    <li class="nav-item"><a class="nav-link" href="#departments">Departments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#doctors">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Covid">Covid-19 Cases</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-primary bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">Welcome to Our Hospital</h1>
            <p class="lead">This is not the final product, I am still working on this website</p>
            <a class="btn btn-lg btn-light" href="{{ route('home') }}">Sign In / Sign Up!</a>
        </div>
    </header>
    <!-- About section-->
    <section id="departments">

        <div class="container">
            <h2 class="container px-4 text-center my-5">Our Departments</h2>
            <div class="grid-container">
                @foreach ($departments as $dep)
                    <div class="card" style="width: 15rem; height: 8rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dep->name_en }}</h5>
                            <div class="container" style="align-content: center;">
                                <a class="d-flex justify-content-center"
                                    href="{{ route('doctors-of-department', $dep->id) }}"> View Doctors</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="doctors">
        <h2 class="container px-4 text-center my-5">Our Doctors</h2>
        <div class="container">
            <div class="grid-container">
                @foreach ($doctors as $doc)
                    <div class="card" style="width: 15rem; height: 22rem;">

                        <img class="card-img-top" src="{{ asset('uploads') . '/' . $doc->image }}" alt="doc-pic">
                        <div class="card-body">
                            <h5 class="card-title">Dr. {{ ' ' . $doc->user->name }}</h5>
                            <h5 class="card-department">{{ $doc->department->name_en }}</h5>
                            <h5 class="card-email"><a
                                    href="mailto:{{ $doc->user->email }}">{{ $doc->user->email }}</a></h5>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- Covid section-->
    <section class="bg-light" id="Covid">
        <div class="container my-5">
            <h2 class="container px-1 text-center">COVID-19 Cases</h2>
            <h6 class=" px-1 text-center mb-5">get the number of COVID-19 cases by country for today! </h6>



            <div class="row justify-content-center">

                <div class="col-md-6">
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Country Name"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="load-data"> Covid-19
                                cases</button>
                        </div>
                    </form>


                </div>
            </div>



            <div class="data-wrapper ">
            </div>

        </div>

        <!-- Covid Palestine section-->
        <div class="bg-light" id="Covid-ps" style="margin-top: 10%">
            <div class="container my-5">
                <h2 class="container px-1 text-center">COVID-19 Cases in Palestine</h2>
                <h6 class=" px-1 text-center mb-5">COVID-19 statistics in Palestine </h6>
                <div class="data-wrapper-ps">
                </div>

            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section id="contact">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="container px-4 text-center my-2">Contact Me</h2>
                    <p class="lead text-center">Contact me at <a
                            href="mailto:tareqsoftwork@gmail.com">tareqsoftwork@gmail.com</a><br> Made by <a
                            href="https://github.com/tareqshawwasoft" target="_blank">Tareq AlShawwa</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('userstyle/js/scripts.js') }}"></script>
    <script>
        $('#load-data').click(function() {
            $('#load-data').prop('disabled', true);
            // get all posts from url
            let country = $('form input').val();


            $.ajax({
                type: 'get',
                url: 'https://covid-api.mmediagroup.fr/v1/cases?country=' + country,
                success: function(res) {


                    var card = `<div class="card mb-4" style="display: flex">
                            <div  class="card-header d-flex justify-content-between align-items-center ">
                               <span> Confirmed Cases: </span> <div>${res.All.confirmed}</div>
                            </div>
                            <div  class="card-body d-flex justify-content-between align-items-center ">
                                <span> Recovered Cases: </span> <div>${res.All.confirmed}</div>
                            </div>
                            </div>`;

                    $('.data-wrapper').append(card);


                }
            })
            // dispaly all posts in div

        })
        $.ajax({
            type: 'get',
            url: 'https://api.apify.com/v2/key-value-stores/SbribCOVf2wgR868y/records/LATEST?disableRedirect=true',
            success: function(res) {


                var card = `<div class="card mb-4" style="display: flex">


                            <div  class="card-header d-flex justify-content-between align-items-center ">
                            <span> Infected Cases: </span> <div>${res.infected}</div>
                            </div>

                            <div  class="card-body d-flex justify-content-between align-items-center ">
                            <span> Tested Cases: </span> <div>${res.tested}</div>
                            </div>


                            <div  class="card-body d-flex justify-content-between align-items-center ">
                            <span> Recovered Cases: </span> <div>${res.recovered}</div>
                            </div>

                            <div  class="card-body d-flex justify-content-between align-items-center ">
                            <span> Active Cases: </span> <div>${res.active}</div>
                            </div>


                            <div  class="card-body d-flex justify-content-between align-items-center ">
                            <span> New Cases: </span> <div>${res.newCases}</div>
                            </div>

                            </div>`;

                $('.data-wrapper-ps').append(card);


            }
        })
    </script>


</body>

</html>

