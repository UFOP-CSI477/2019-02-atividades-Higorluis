@extends('adminlte::page')

@section('title', 'Pratica 2')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop
@section('item_menu')
    <li class="nav-header">Menu</li>
    <li class="nav-item ">
            <a class="nav-link " href="http://localhost:8000/adm/protocolos">
                <i class="fas fa-fw fa-user "></i>
                <p>Protocolos</p>
            </a>
    </li>
    <li class="nav-item ">
            <a class="nav-link " href="http://localhost:8000/adm/registroprotocolos">
                <i class="fas fa-fw fa-lock "></i>
                <p>Registrar</p>
            </a>
    </li>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
@stop
