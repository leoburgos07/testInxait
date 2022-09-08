@extends('layouts.app')
@section('title')
Agregar Usuario
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-primary text-center mb-5">Agregar Usuario</h1>
    <form method="POST" id="form" action="{{url('users')}}">
        {!! csrf_field() !!}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Apellido</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="cc">Cédula</label>
                <span class="text-danger">*</span>
                <input type="number" class="form-control" id="cc" name="cc" required>
            </div>
            <div class="form-group col-md-4">
                <label for="phone">Celular</label>
                <span class="text-danger">*</span>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Correo Electrónico</label>
                <span class="text-danger">*</span>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputCountry">Departamento</label>
                <span class="text-danger">*</span>

                <select name="inputCountry" id="dptos" class="form-control" required>
                    <optgroup label="Selecciona un departamento">
                        <option value="-"></option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="inputCity">Ciudad</label>
                <span class="text-danger">*</span>
                <select name="inputCity" id="ciudades" class="form-control" required>
                    <optgroup label="Selecciona una ciudad">

                    </optgroup>
                </select>
            </div>

        </div>
        <div class="form-row mb-4">
            <div class="col-md-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="habeas" id="habeas" required>
                    <label class="form-check-label" for="habeas">Autorizo el tratamiento de mis datos de acuerdo con la
                        finalidad establecida en la política de protección de datos personales</label>
                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary ">Agregar</button>
            </div>
            
        </div>

    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
        <strong>{!! \Session::get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
</div>

@endsection