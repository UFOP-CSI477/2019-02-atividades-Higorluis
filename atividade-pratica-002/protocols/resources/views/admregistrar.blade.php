@extends('adminlte::page')

@section('title', 'Pratica 2')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop
@section('item_menu')
<li class="nav-header">Menu</li>
    <li class="nav-item ">
            <a class="nav-link " href="http://localhost:8000/home/registrar">
                <i class="fas fa-fw fa-user-plus"></i>
                <p>Registrar</p>
            </a>
    </li>
    <li class="nav-item ">
            <a class="nav-link " href="http://localhost:8000/home/registrados">
            <i class="fas fa-fw fa-address-book"></i>
                <p>Registrados</p>
            </a>
    </li>
@stop
@section('content')
<form action="{!! action('AdmController@store') !!}" method="post">
        @csrf
        <div class="form-group">
            <label name="nome">Nome</label>
            <input name="nome" type="text" id="nome" class="form-control"  required>
        </div>
        <div class="form-group">
            <label name="preco">Preço</label>
            <input name="preco" type="number" id="preco" class="form-control" placeholder="Insira um preço" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
@stop