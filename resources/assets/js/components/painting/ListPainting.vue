<template>
    <div class="content">
        <button v-on:click="create()" ref="newPaint" class="btn btn-primary" v-show="isVisible">
            Ajouter un nouveau Tableau
        </button>
        <div :key='item.id' v-for='item in paintings'>
            <showpainting :list="true" :painting="item"></showpainting>
        </div>
    </div>
</template>

<script>
import showpainting from './ShowPainting.vue'

export default {
    props: {
        paintings: Array,
        auth: {
            type: Boolean,
            default: false
        }
   },
   data() {
       return {
           isVisible: this.auth
       }
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

