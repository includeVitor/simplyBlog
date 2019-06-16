@extends('layouts.app')

@section('content')
    
    <pagina-component tamanho="12">
        <painel-component>

            <h2 align="center">{{$artigos->titulo}}</h2>           
            <h4 align="center">{{$artigos->descricao}}</h4>      
            <p>
                {!!$artigos->conteudo!!}
            </p>
            <p align="center">
                <small>Por: {{$artigos->user->name}} - {{date('d/m/Y',strtotime($artigos->data))}}</small>
            </p>  
        </painel-component>

     
    </pagina-component>

@endsection
