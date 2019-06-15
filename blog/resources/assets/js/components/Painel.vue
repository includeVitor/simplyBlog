<template>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">{{titulo}}</div>

            <div class="panel-body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo']
    }
</script>
