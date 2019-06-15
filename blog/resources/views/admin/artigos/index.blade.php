@extends('layouts.app')

@section('content')

    <pagina-component tamanho="12">

        <painel-component titulo="Lista de Artigos">

            <migalhas-component v-bind:lista="{{$listaMigalhas}}"></migalhas-component>
            <modal-link-component nome="modalTeste" titulo="Criar" css=""></modal-link-component>
            
            <tabela-lista-component
                v-bind:titulos="['#','Título', 'Descrição']"
                v-bind:itens="[['1','PHP OO', 'Curso de PHP OO'],['2','Vue JS', 'Curso de PHP Vue JS']]"
                ordem="desc" ordemcol="2"
                criar="#criar" editar="#editar" detalhe="#detalhe" deletar="#deletar" token="123456">

            </tabela-lista-component>
        </painel-component>

    </pagina-component>
    <modal-component nome="modalTeste">
        <painel-component titulo="Adicionar">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </painel-component>
    </modal-component>

@endsection
