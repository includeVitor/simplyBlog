<template>
    <div>   
        <div class="form-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modal-link-component v-if="criar && modal" tipo="link" nome="adicionar" titulo="Criar" css=""></modal-link-component>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="buscar" v-model="buscar">{{buscar}}
            </div>
        </div> 

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{titulo}}</th>
                    <th v-if="detalhe || editar || deletar">Ação</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item">{{i | formataData}}</td>

                    <td v-if="detalhe || editar ||  token">

                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modal-link-component v-if="detalhe && modal" :item="item" :url="detalhe" tipo="link" nome="detalhe" titulo="Detalhe |" css=""></modal-link-component>

                            <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                            <modal-link-component v-if="editar && modal" :item="item" tipo="link" :url="editar" nome="editar" titulo="Editar |" css=""></modal-link-component>

                            <a href="#" v-on:click="executaForm(index)" >Deletar</a>
                        </form>

                        <span v-if="!token">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modal-link-component v-if="detalhe && modal" :item="item" :url="detalhe" tipo="link" nome="detalhe" titulo="Detalhe |" css=""></modal-link-component>

                            <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                            <modal-link-component v-if="editar && modal" tipo="link" :item="item" :url="editar" nome="editar" titulo="Editar |" css=""></modal-link-component>
                            <a v-if="deletar" v-bind:href="deletar">Deletar |</a>
                        </span>
                        
                        <span v-if="token && !deletar">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modal-link-component v-if="detalhe && modal" :item="item"  :url="detalhe" tipo="link" nome="detalhe" titulo="Detalhe |" css=""></modal-link-component>


                            <a v-if="editar && !modal" v-bind:href="editar">Editar</a>
                            <modal-link-component v-if="editar && modal" tipo="link" :item="item" :url="editar" nome="editar" titulo="Editar |" css=""></modal-link-component>
                        </span>
 
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos',
                'itens',
                'ordem',
                'ordemcol',
                'criar',
                'editar',
                'deletar',
                'detalhe',
                'token',
                'modal'],
        data:function(){
            return{
                buscar:'',
                ordemAux: this.ordem,
                ordemAuxCol: this.ordemcol
            }
        }, 
        methods: {
            executaForm: function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna){

                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = 'desc';
                }else{
                    this.ordemAux = 'asc';
                }
            }
        },
        filters:{
            formataData:function(valor){

                if(!valor) return '';

                valor = valor.toString();
                if(valor.split('-').length == 3){
                    valor = valor.split('-');
                    return `${valor[2]}/${valor[1]}/${valor[0]}`;
                }

                return valor ;

            }
        },
        computed:{
            lista:function(){
                let lista = this.itens.data;
                let ordem = this.ordemAux || "desc";
                let ordemCol = this.ordemAuxCol || 0;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc")

                    lista.sort(function(a,b){

                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) return 1;
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) return -1;
                        return 0;
                    })
                else
                    lista.sort(function(a,b){

                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) return 1;
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) return -1;
                        return 0;
                    })

                if(this.buscar){
                    
                    return lista.filter(res => {
                        res = Object.values(res);
                        for(let k = 0; k< res.length; k ++)
                            if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >=0 )
                                return true;
                        
                        return false;
                    });
                }

                return lista;
            }
        }
    }
</script>
