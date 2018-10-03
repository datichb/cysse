<template>
    <showcollection :auth="auth" :collection="CurrentCollection" :nbc="nbCollection"></showcollection>
</template>

<script>
import showcollection from './ShowCollection.vue'
import bs from '../model/ButtonStylish.vue'

export default {
    props: {
        nbc: Array,
        cc: Object,
        auth: {
            type: Boolean,
            default: false
        }
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

