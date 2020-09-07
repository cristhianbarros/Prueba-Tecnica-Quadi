
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Formulario de Alquiler</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="theme-color" content="#563d7c">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    <div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('bootstrap-solid.svg') }}" alt="" width="72" height="72">
        <h2>Formulario de Alquiler</h2>
        <p class="lead">Realiza de forma ágil y rápida el alquiler de tu carro, sin contratiempos y datos adicionales. Sólo necesitamos algunos datos personales y las fechas en las que necesitas utilizar el carro y listo.</p>
    </div>
    @if (session('status-rent'))
        <div class="alert alert-success" role="alert">
            {{ session('status-rent') }}
        </div>
    @endif
    @if (session('warning-message'))
        <div class="alert alert-danger" role="alert">
            {{ session('warning-message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Total x Días</span>
            <span class="badge badge-secondary badge-pill" id="days">-</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong id="total">-</strong>
            </li>
        </ul>
        </div>
        <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Datos personales</h4>
        <form class="needs-validation" method="POST" action="{{ route( 'cars.rents.store', $car->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                <label for="startDate">Fecha de salida</label>
                <input type="date" class="form-control @error('start_date'){{ 'is-invalid' }}@enderror" id="startDate" name="start_date" onchange="validateDates()" value="{{ old('start_date') }}" required>
                @error('start_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="endDate">Fecha de regreso</label>
                    <input type="date" class="form-control @error('end_date'){{ 'is-invalid' }}@enderror" id="endDate" name="end_date" onchange="validateDates()" value="{{ old('end_date') }}" required>
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
            <div class="col-md-12 mb-3">
                <label for="firstName">Nombres</label>
                <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" id="firstName" name="name"  value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            </div>
            <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email'){{ 'is-invalid' }}@enderror" id="email" name="email"  value="{{ old('email') }}" placeholder="you@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="document">Documento</label>
                <input type="number" class="form-control @error('document'){{ 'is-invalid' }}@enderror" id="document" name="document" placeholder="123456789" value="{{ old('document') }}" required>
                @error('document')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <hr class="mb-4">
            <h4 class="mb-3">Metodos de Pago</h4>
            <div class="d-block my-3">
                <select class="form-control" id="paymentMethod" name="payment">
                <option value="tarjeta debito">Tarjeta Débito</option>
                <option value="tarjeta credito">Tarjeta Crédito</option>
                <option value="paypal">PayPal</option>
                </select>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar Reserva</button>
        </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2020 Renta Car S.A</p>
        <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script type="text/javascript">
    function validateDates() {
        var fechaSalida = document.getElementById('startDate');
        var fechaRegreso = document.getElementById('endDate');

        var total = document.getElementById('total');
        var dias = document.getElementById('days');

        if((fechaSalida.value != '' && fechaRegreso.value != '' ) && (fechaRegreso.value < fechaSalida.value)) {
            alert('El campo Fecha de Salida debe ser mayor que el campo Fecha de Regreso');
            return false;
        }

        if(fechaSalida.value != '' && fechaRegreso.value != '') {
            $.get("http://localhost:8000/api/calculate?f1="+fechaSalida.value+"&f2="+fechaRegreso.value+"&c={{ $car->id }}", function(data, status) {
                var response = data.split('-');

                total.innerHTML = response[0];
                dias.innerHTML = response[1];
            });
        }

    }

    document.addEventListener("DOMContentLoaded", function(event) {
        var utc = new Date().toJSON().slice(0,10).replace(/-/g,'-');
        var fechaSalida = document.getElementById('startDate');
        var fechaRegreso = document.getElementById('endDate');

        fechaSalida.setAttribute('min', utc);

    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
