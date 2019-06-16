@extends('layouts.app')

@section('content')

    <pagina-component tamanho="7">
        <painel-component titulo="Dashboard">
            <migalhas-component v-bind:lista="{{$listaMigalhas}}"></migalhas-component>          
            <div class="col-md-4">
                <caixa-component qtd="80" titulo="Artigos" url="{{route('artigos.index')}}" cor="blue" icone="icon ion-md-book"></caixa-component>
            </div>

            <div class="col-md-4">
                <caixa-component qtd="80" titulo="Usuários" url="{{route('usuarios.index')}}" cor="green" icone="icon ion-md-person"></caixa-component>
            </div> 

            <div class="col-md-4">
                <caixa-component qtd="80" titulo="Autores" url="#" cor="red" icone="fa fa-user-circle-o"></caixa-component>
            </div>

        </painel-component>
    </pagina-component>

@endsection
