<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{env('APP_NAME')}}</title>
        <link rel="icon" type="image/x-icon" href="{{asset('userstyle/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('userstyle/css/styles.css')}}" rel="stylesheet" />
        <link href="{{ asset('adminstyle/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    </head>
    <style>
        th{
            color:white;
        }
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="{{route('homepage')}}">{{env('APP_NAME')}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#departments">Departments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
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
                <a class="btn btn-lg btn-light" href="{{ route('home')}}">Go to Admin page!</a>
            </div>
        </header>
        <!-- About section-->
        <section id="departments">

        <div class="container">
            <h2 class="container px-4 text-center my-3">Our Departments</h2>
            <table class="table table-hover table-striped table-bordered ">
                <tr class="bg-light text-white">
                    <th>ID</th>
                    <th>English Name</th>
                    <th>Arabic Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                </tr>

                @forelse ($departments as $dep)
                    <tr >
                        <td>{{ $dep->id }}</td>
                        <td class="name_en">{{ $dep->name_en }}</td>
                        <td class="name_ar">{{ $dep->name_ar }}</td>
                        <td>
                            {{ $dep->created_at->diffForHumans() }}
                        </td>
                        <td>
                            {{ $dep->updated_at->diffForHumans() }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center">No Data Found</td>
                    </tr>
                @endforelse
            </table>
        </div>



        </section>
        <!-- Services section-->
        <section class="bg-light" id="services">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Services we offer</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section id="contact">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h2>Contact us</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website {{date('Y')}}</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('userstyle/js/scripts.js')}}"></script>
    </body>
</html>
