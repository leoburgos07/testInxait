@extends('layouts.app')
@section('title')
GANADOR!!!!
@endsection

@section('content')
@if(isset($winner))
<div class="container mt-5">
    <h1 class="font-weight-bold mt-5 mb-5 text-success text-center">FELICIDADESS!!</h1>
    <h1 class="font-weight-bold mt-5 mb-5 text-dark text-center">{{$winner->name}} {{$winner->last_name}} </h1> <br>
    <h1 class=" mt-5 mb-5 text-dark text-center">Eres el ganador!!!</h1>

</div>



@else
<div class="container mt-5 text-center">
    <h1 class="font-weight-bold mt-5 mb-5 text-danger text-center">Por lo menos deben haber registrado 5 usuarios para escoger un ganador</h1>
    <a href="{{url('users/create')}}" class="btn btn-dark">Ir a registro</a>
</div>


@endif

@endsection