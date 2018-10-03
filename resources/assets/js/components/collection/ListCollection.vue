<template>
    <showcollection :collection="CurrentCollection" :nbc="nbCollection"></showcollection>
</template>

<script>
import showcollection from './ShowCollection.vue'
import bs from '../model/ButtonStylish.vue'

export default {
    props: {
        nbc: Array,
        cc: Object
   },
   data() {
       return {
           nbCollection: this.nbc,
           CurrentCollection: this.cc
       }
   },
   components: {
       showcollection
   },
   methods: {
   }
}
</script>
<style>
</style>

