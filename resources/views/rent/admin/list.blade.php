@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form-inline" action="\export" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="startDate" class="sr-only">Fecha de salida</label>
                        <input type="date" class="form-control @error('start_date'){{ 'is-invalid' }}@enderror" id="startDate" name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="endDate" class="sr-only">Fecha de regreso</label>
                        <input type="date" class="form-control @error('end_date'){{ 'is-invalid' }}@enderror" id="endDate" name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-2">Descargar CSV</button>
                    </div>
                  </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha Salida</th>
                    <th scope="col">Fecha Regreso</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rents as $rent)
                        <tr>
                            <th scope="row">{{ $rent->id }}</th>
                            <td>{{ $rent->start_date }}</td>
                            <td>{{ $rent->end_date }}</td>
                            <td>{{ $rent->license_plate }}</td>
                            <td>{{ $rent->document }}</td>
                            <td>{{ $rent->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
