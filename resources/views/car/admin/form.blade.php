@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status-car'))
                <div class="alert alert-success" role="alert">
                    {{ session('status-car') }} <a href="{{ route('cars.index') }}">Ver Listado</a>
                </div>
            @endif
            <div class="card">
                <div class="card-header">@if($car){{ __('Actualizar') }}@else{{ __('Nuevo') }}@endif Carro</div>

                <div class="card-body">
                <form method="POST" action="@if($car){{ route('cars.update', $car->id) }}@else{{ route('cars.store') }}@endif">
                        @if($car) @method('PUT') @endif
                        @csrf
                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>
                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="@if($car){{ $car->year }}@else{{ old('year') }}@endif" required autofocus>
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>
                            <div class="col-md-6">
                                <input id="model" type="number" class="form-control @error('model') is-invalid @enderror" name="model" value="@if($car){{ $car->model }}@else{{ old('model') }}@endif" required>
                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>
                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="@if($car){{ $car->color }}@else{{ old('color') }}@endif" required>
                                @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="license_plate" class="col-md-4 col-form-label text-md-right">{{ __('Placa') }}</label>
                            <div class="col-md-6">
                                <input id="license_plate" type="text" class="form-control @error('license_plate') is-invalid @enderror" name="license_plate" value="@if($car){{ $car->license_plate }}@else{{ old('license_plate') }}@endif" required>
                                @error('license_plate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio x Día') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="@if($car){{ $car->price }}@else{{ old('price') }}@endif" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if($car)
                                        {{ __('Editar') }}
                                    @else
                                        {{ __('Guardar') }}
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
