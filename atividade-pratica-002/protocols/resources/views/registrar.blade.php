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
<form method="post" action="{!! action('UserController@store') !!}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="protocolo">Tipo do protocolo</label>
        <select class="form-control" id="protocolo" name="protocolo">
            @foreach ($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" class="form-control" id="data" name="data">
    </div>
    <div class="form-group">
        <label>Descrição<span class="text-danger">*</span></label>
        <textarea name="descricao" id="description" class="form-control" placeholder="Insira sua descrição" required>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

@stop