@extends('layouts.app')

@section('content')

    <pagina-component tamanho="7">
        <painel-component titulo="Dashboard">
                            
            <div class="col-md-4">
                <caixa-component qtd="80" titulo="Artigos" url="#" cor="blue" icone="icon ion-md-book"></caixa-component>
            </div>

            <div class="col-md-4">
                <caixa-component qtd="80" titulo="Usuários" url="#" cor="green" icone="icon ion-md-person"></caixa-component>
            </div> 

            <div class="col-md-4">
                <caixa-component qtd="80" titulo="Autores" url="#" cor="red" icone="fa fa-user-circle-o"></caixa-component>
            </div>

        </painel-component>
    </pagina-component>

@endsection
