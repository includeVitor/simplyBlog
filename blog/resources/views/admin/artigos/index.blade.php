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
        
        <painel-component titulo="Lista de Artigos">

            <migalhas-component v-bind:lista="{{$listaMigalhas}}"></migalhas-component>
            
            <tabela-lista-component
                v-bind:titulos="['#','Título', 'Descrição', 'Autor', 'Data']"
                v-bind:itens="{{json_encode($listaArtigos)}}"
                ordem="desc" ordemcol="0"
                modal="sim"
                criar="#criar" editar="/admin/artigos/" detalhe="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}">

            </tabela-lista-component>
            <div align="center">
                {{$listaArtigos->links()}}
            </div>
        </painel-component>

    </pagina-component>

    
    <modal-component nome="adicionar" titulo="Adicionar">
        <formulario-component id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}" >

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao" value="{{old('descricao')}}">
            </div>

            <div class="form-group">
                <label for="descricao">Conteúdo</label>
                <textarea class="form-control" id="conteudo" name="conteudo">{{old('conteudo')}}</textarea>
            </div>

            <div class="form-group">
                <label for="descricao">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data" value="{{old('data')}}">
            </div>

        </formulario-component>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
       
    </modal-component>

    <modal-component nome="editar" titulo="Editar">
        <formulario-component id="frmEditar" css="" :action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}" >

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descricao">
            </div>

            <div class="form-group">
                <label for="descricao">Conteúdo</label>
                <textarea class="form-control" id="conteudo" name="conteudo" v-model="$store.state.item.conteudo" >{{old('conteudo')}}</textarea>
            </div>

            <div class="form-group">
                <label for="descricao">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data"  v-model="$store.state.item.data" value="{{old('data')}}">
            </div>
        </formulario-component>
        
        <span slot="botoes">
            <button form="frmEditar" class="btn btn-info">Editar</button>
        </span>
    </modal-component>

    <modal-component nome="detalhe" :titulo="$store.state.item.titulo">
            <p>@{{$store.state.item.descricao}}</p>
            <p>@{{$store.state.item.conteudo}}</p>
    </modal-component>

    


@endsection
