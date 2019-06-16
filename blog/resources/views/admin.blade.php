@extends('layouts.app')

@section('content')
    
    <pagina-component tamanho="10">
        <painel-component titulo="Dashboard">
            <migalhas-component v-bind:lista="{{$listaMigalhas}}"></migalhas-component>          

           
           
            <div class="row">

                @can('autor')
                    <div class="col-md-4">
                        <caixa-component qtd="{{$totalArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="blue" icone="icon ion-md-book"></caixa-component>
                    </div>
                @endcan

             
                @can('eAdmin')
                    <div class="col-md-4">
                        <caixa-component qtd="{{$totalUsers}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="green" icone="icon ion-md-person"></caixa-component>
                    </div> 

                    <div class="col-md-4">
                        <caixa-component qtd="{{$totalAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="red" icone="fa fa-user-circle-o"></caixa-component>
                    </div>

                    <div class="col-md-4">
                        <caixa-component qtd="{{$totalAdmin}}" titulo="Admin" url="{{route('adm.index')}}" cor="blue" icone="fa fa-user-circle-o"></caixa-component>
                    </div>
                @endcan
            </div>

        </painel-component>
    </pagina-component>

@endsection
