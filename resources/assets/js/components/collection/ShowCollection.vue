<template>
    <div class="content">
        <modal :items="items.paintings" :collection="collectionitems.id" v-on:newpaiting="addToCol">
            <template slot="title">
                This is my new title !    
            </template>
        </modal>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="col-md-12">
                        <img :src="collectionitems.img" width="100%" height="100%">
                    </div>
                </div>
                <div class="row">
                    <listitem :auth="isAdmin" v-on:deletepainting="addpainting" :searchable="false" :items="collectionitems.paintings"></listitem>
                </div>
                <div v-show="isAdmin" class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Ajouter des tableaux à la collection
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import listitem from '../ListItem.vue'
import modal from '../Modallist.vue'

export default {
    components: {
        listitem,
        modal
    },
    props: {
        collection: Object,
        auth: {
            type: Boolean,
            default: false
        }
   },
   data() {
       return {
            items: [],
            collectionitems: this.collection,
            isAdmin: this.auth
       }
   },
   created() {
        axios.get("/painting/freepainting")
            .then(res => {
                this.items = res.data;
            });
    },
    methods: {
        addpainting: function(painting) {
            this.items.paintings.push(painting[0]);
        },
        addToCol: function(painting) {
            
            this.collectionitems.paintings = this.collectionitems.paintings.concat(painting);
        }
    }
}
</script>
<style scoped>

</style>