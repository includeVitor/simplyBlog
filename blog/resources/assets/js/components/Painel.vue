<template>

    <div v-bind:class="defineCor">
        <div class="panel-heading">{{titulo}}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>

</template>

<script>
    export default {
        props:['titulo', 'cor'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor || "panel-default");
            }
        }
    }
</script>

<style media="screen">

    .green{
        border-color:#24ec00;
    }
    .green > .panel-heading{
        color: #f5f8fa;
        background-color: #24ec00;
        border-color: #24ec00;
    }

    .blue{
        border-color:#075eca;
    }
    .blue > .panel-heading{
        color: #f5f8fa;
        background-color: #075eca;
        border-color: #075eca;
    }

    .red{
        border-color:#ff0000;
    }
    .red > .panel-heading{
        color: #f5f8fa;
        background-color: #ff0000;
        border-color: #ff0000;
    }

</style>