<template>
    <div class="row">
        <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-body">
                <div class="col-md-12">
                    <img :src="collection.img" width="100%" height="100%">
                </div>
            </div>
            <div class="row">
                <listitem :searchable="false" :items="collection.paintings" v-on:add="PaintAdd" v-on:remove="PaintRemove"></listitem>
            </div>
        </div>
    </div>
</template>

<script>
import listitem from '../ListItem.vue'

export default {
    components: {
        listitem
    },
    props: {
        collection: Object
   },
   methods: {
        createTask() {
            axios.post('/collection/store', this.collection)
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => console.error(err));
        },
        PaintAdd(element) {
          this.collection.paints.push(element);
          console.log(this.collection.paints);
        },
        PaintRemove(element) {
          var index = this.collection.paints.indexOf(element);
          if (index > -1) {
            this.collection.paints.splice(index, 1);
          }
          console.log(this.collection.paints);
        }
    }
}
</script>
<style scoped>

</style>