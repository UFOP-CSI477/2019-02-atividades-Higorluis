@extends('adminlte::page')

@section('title', 'Pratica 2')

@section('content_header')
@stop
@section('item_menu')
    <li class="nav-header">Menu</li>
    <li class="nav-item ">
            <a class="nav-link " href="http://localhost:8000/home/registrar">
                <i class="fas fa-fw fa-user "></i>
                <p>Registrar</p>
            </a>
    </li>
    <li class="nav-item ">
            <a class="nav-link " href="http://localhost:8000/home/registrados">
                <i class="fas fa-fw fa-lock "></i>
                <p>Registrados</p>
            </a>
    </li>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Você está logado!</p>
                </div>
            </div>
        </div>
    </div>
@stop
