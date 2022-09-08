@extends('layouts.app')
@section('title')
Test Inxait
@endsection

@section('content')

<div class="container mt-5">
    @if (count($users)>0)
    <h1 class="mb-5 text-dark text-center">Listado de Usuarios</h1>
    <table class="table mb-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Celular</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Departamento</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Fecha y hora de creación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>

                <td>{{$user->name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dpto}}</td>
                <td>{{$user->city}}</td>
                <td>{{date('D-M-Y H:i', strtotime($user->created_at)) }}  </td>

                <form action="{{url('users',['user'=>$user])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td> <button type="submit" class="btn btn-danger">Eliminar</button></td>
                </form>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container text-center">
    <a href="{{route('export')}}" class="btn btn-success text-center">Importar Excel</a>
    </div>
    @else
    <h1 class="text-danger text-center m-4">
        No hay usuarios registrados actualmente
    </h1>
    <div class="container text-center"><a href="{{url('users/create')}}" class="btn btn-primary text-center">Agregar Usuarios</a></div>
    
    @endif



</div>
@if (\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show container" role="alert">
    <strong>{!! \Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif

@endsection