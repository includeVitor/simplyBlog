@extends('layouts.app')

@section('content')

    <pagina-component tamanho="12">

        <painel-component titulo="Lista de Artigos">

            <migalhas-component v-bind:lista="{{$listaMigalhas}}"></migalhas-component>
            
            <tabela-lista-component
                v-bind:titulos="['#','Título', 'Descrição']"
                v-bind:itens="{{$listaArtigos}}"
                ordem="desc" ordemcol="2"
                modal="sim"
                criar="#criar" editar="#editar" detalhe="#detalhe" deletar="#deletar" token="123456">

            </tabela-lista-component>
        </painel-component>

    </pagina-component>

    
    <modal-component nome="adicionar">
        <painel-component titulo="Adicionar">
            <formulario-component css="" action="#" method="put" enctype="" token="" >

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao">
                </div>
                <button class="btn btn-info">Editar</button>

            </formulario-component>
        </painel-component>
    </modal-component>

    <modal-component nome="editar">
        <painel-component titulo="Editar">
            <formulario-component css="" action="#" method="put" enctype="" token="" >

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descricao">
                </div>
                <button class="btn btn-info">Editar</button>

            </formulario-component>
        </painel-component>
    </modal-component>

    


@endsection
