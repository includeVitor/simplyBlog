@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <painel-component titulo="Dashboard">
                
                <div class="col-md-4">
                    <painel-component titulo="Dashboard">
                        Teste de conteúdo 1
                    </painel-component>
                </div>

                <div class="col-md-4">
                    <painel-component titulo="Dashboard">
                        Teste de conteúdo 2
                    </painel-component>
                </div> 

                <div class="col-md-4">
                    <painel-component titulo="Dashboard">
                        Teste de conteúdo 3
                    </painel-component>
                </div>

            </painel-component>
        </div>
    </div>
</div>
@endsection
