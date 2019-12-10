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
<table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{$subject -> name}}</td>
            <td>{{$subject -> price}}</td>
            <td>
                <!-- Botão para acionar modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEdit{{$subject->id}}">
                    Editar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalEdit{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Editar protocolo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('protocolo.update', $subject)}}">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    @method('put')
                                    <div class="form-group">
                                        <label name="name">Nome do Protocolo</span></label>
                                        <input value="{{$subject->name}}" name="nome" type="text" id="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label name="price">Preço</label>
                                        <input value="{{$subject->price}}" name="preco" type="number" id="preco" class="form-control" required>
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
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluir{{$subject -> id}}">
                    Excluir
                </button>
                <!-- Modal -->
                <div class="modal fade" id="excluir{{$subject -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('protocolo.destroy', $subject)}}" method="post">
                                {{csrf_field()}}
                                @method("delete")
                                <div class="modal-body">
                                    <span>Tem certeza que quer excluir esse protocolo ?</span>
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