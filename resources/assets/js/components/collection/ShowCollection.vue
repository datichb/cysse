<template>
    <div class="row">
        <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-body">
                <div class="row col-md-8">
                    <div class="col-md-12">
                        <p>{{ collection.name }}</p>
                    </div>
                    <div class="col-md-12">
                        <p>{{ collection.description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <searchcomponent :items="collection.paintings" v-on:add="PaintAdd" v-on:remove="PaintRemove"></searchcomponent>
            </div>
        </div>
    </div>
</template>

<script>
import searchcomponent from '../SearchComponent.vue'

export default {
    components: {
        searchcomponent
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