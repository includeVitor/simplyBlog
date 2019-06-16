@extends('layouts.app')

@section('content')
    
    <pagina-component tamanho="12">
        <painel-component titulo="Artigos">
        
            <div class="row">

                @foreach ($lista as $key => $value)
                    <artigo-card-component
                        titulo="{{$value->titulo}}"
                        descricao="{{$value->descricao}}"
                        link="{{route('artigo', [$value->id, str_slug($value->titulo)])}}"
                        imagem="https://greensignal.com.br/wp-content/uploads/2018/11/logo_green_site.png"
                        data="{{$value->data}}"
                        autor="{{$value->autor}}"
                        sm="6"
                        md="4">
                    </artigo-card-component>
                @endforeach
                
            </div>
           
        </painel-component>
        <div align="center">
            {{$lista->links()}}
        </div>
    </pagina-component>

@endsection
