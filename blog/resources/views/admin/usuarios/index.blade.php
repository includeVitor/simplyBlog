@extends('layouts.app')

@section('content')

    <pagina-component tamanho="12">

        @if($errors->all())

            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;
                </button>
                @foreach($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li>
                @endforeach
            </div>
        @endif
        
        <painel-component titulo="Lista de Usuários">

            <migalhas-component v-bind:lista="{{$listaMigalhas}}"></migalhas-component>
            
            <tabela-lista-component
                v-bind:titulos="['#','Nome', 'Email']"
                v-bind:itens="{{json_encode($listaModelo)}}"
                ordem="desc" ordemcol="2"
                modal="sim"
                criar="#criar" editar="/admin/usuarios/" detalhe="/admin/usuarios/" deletar="/admin/usuarios/" token="{{ csrf_token() }}">

            </tabela-lista-component>
            <div align="center">
                {{$listaModelo->links()}}
            </div>
        </painel-component>

    </pagina-component>

    
    <modal-component nome="adicionar" titulo="Adicionar">
        <formulario-component id="formAdicionar" css="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{ csrf_token() }}" >

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="descricao">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
            </div>

        </formulario-component>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
       
    </modal-component>

    <modal-component nome="editar" titulo="Editar">
        <formulario-component id="frmEditar" css="" :action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}" >

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="E-mail">
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" v-model="$store.state.item.conteudo" >
            </div>

        </formulario-component>
        
        <span slot="botoes">
            <button form="frmEditar" class="btn btn-info">Editar</button>
        </span>
    </modal-component>

    <modal-component nome="detalhe" :titulo="$store.state.item.name">
            <p>@{{$store.state.item.email}}</p>
    </modal-component>

    


@endsection
