@extends('adminlte::page')

@section('title', 'Pratica 2')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop
@section('item_menu')
<!-- <li class="nav-header">Menu</li> -->
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
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Protocolo</th>
            <th scope="col">Data</th>
            <th scope="col">Descrição</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
        <tr>
            <td>{{$request -> name}}</td>
            <td>{{$request -> date}}</td>
            <td>{{$request -> description}}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar{{$request -> id}}">
                    Editar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="editar{{$request -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('requisicao.update', $request)}}" method="post">
                                {{csrf_field()}}
                                @method("put")
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="protocolo">Tipo do protocolo</label>
                                        <select value="{{$request->subjectid}}"name="protocolo" id="protocol_type" class="form-control" required>
                                            @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" id="data" name="data" value="{{$request -> date}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição<span class="text-danger">*</span></label>
                                        <textarea name="descricao" id="description" class="form-control" placeholder="Insira sua descrição" required>{{$request -> description}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
            <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#excluir{{$request -> id}}">
                    Excluir
                </button>
                <!-- Modal -->
                <div class="modal fade" id="excluir{{$request -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('requisicao.destroy', $request)}}" method="post">
                                {{csrf_field()}}
                                @method("delete")
                                <div class="modal-body">
                                    Tem certeza que quer excluir essa requisição ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Excluir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@stop