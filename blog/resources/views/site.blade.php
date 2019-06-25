@extends('layouts.app')

@section('content')
    
    <pagina-component tamanho="12">
        <painel-component titulo="Artigos">

            <p>
                <form class="form-inline text-center" action="{{route('site')}}" method="get">
                    <input type="search" class="form-control" name="busca" placeholder="Buscar" value="{{isset($busca) ? $busca : ''}}" >
                    <button class="btn btn-info">Busca</button>
                </form>
            </p>
            <div class="row">

                @foreach ($lista as $key => $value)
                    <artigo-card-component
                        titulo="{{str_limit($value->titulo, '20', '...')}}"
                        descricao="{{str_limit($value->descricao, '100', '...')}}"
                        link="{{route('artigo', [$value->id, str_slug($value->titulo)])}}"
                        imagem=""
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
