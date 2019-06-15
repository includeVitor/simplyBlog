<template>
    
    <span>

        <span v-if="item">
            <button @click="preencheFormulario()"   v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
            <button @click="preencheFormulario()"v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
            <a @click="preencheFormulario()" v-if="tipo == 'link'" href="#" v-bind:class="css ||''" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</a>
        </span>

        <span v-if="!item">
            <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
            <button v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
            <a v-if="tipo == 'link'" href="#" v-bind:class="css ||''" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</a>
        </span>

    </span>

</template>

<script>
    export default {
        props:['tipo', 'nome', 'titulo', 'css', 'item'],
        methods:{
            preencheFormulario :function(item){
                this.$store.commit('setItem', this.item);
            }
        }
    }
</script>
