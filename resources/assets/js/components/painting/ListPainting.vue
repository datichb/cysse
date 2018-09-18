<template>
    <div>
        <button v-on:click="create()" class="btn btn-primary">
            Ajouter un nouveau Tableau
        </button>
        <div :key='item.id' v-for='item in paintings'>
            <showpainting :painting="item"></showpainting>
        </div>
    </div>
</template>

<script>
import showpainting from './ShowPainting.vue'

export default {
    props: {
        paintings: Array
   },
   components: {
       'showpainting': showpainting
   },
   methods: {
       create() {
           window.location.href = '/painting/create';
       }
   }
}
</script>
<style>
.btn {
    margin-left:35%;
    width: 30%;
    margin-bottom: 2%;
}
</style>

