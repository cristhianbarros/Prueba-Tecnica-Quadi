<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Renta de Carros</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Renta Carro S.A</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{ route('all-cars') }}"> Nuestros Carros</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Inicio de Sesión</a>
                        @if (Route::has('register') && App\User::all()->count() == 0))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                @endif
            </nav>

        </div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Nuestros Carros</h1>
            <p class="lead">Escoge el carro que se acomode a tus necesidades, reservalo ya mismo y empieza a disfrutar de todos nuestros servicios.</p>
        </div>

        <div class="container">
            <div class="card-deck mb-3 text-center">
                @forelse ( $cars as $car)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Carro # {{ $car->id }}</h4>
                            </div>
                            <div class="card-body">
                            <h1 class="card-title pricing-card-title">${{ number_format( $car->price, 0, ',', '.') }} <small class="text-muted">/ día</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Modelo {{ $car->model }}</li>
                                <li>Color {{ $car->color }}</li>
                                <li>Comfortable</li>
                            </ul>
                            <a href="{{ route('cars.rents.create', $car->id) }}" class="btn btn-block btn-primary">Alquilame Aqui</a>
                        </div>
                    </div>
                @empty
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <p class="lead">Lo sentimos, en estos momentos no hay carros en la base de datos.</p>
                </div>
                @endforelse
        </div>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                <img class="mb-2" src="{{ asset('bootstrap-solid.svg') }}" alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
                </div>
                <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
                </div>
                <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
                </div>
                <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
                </div>
            </div>
        </footer>
    </body>
</html>
