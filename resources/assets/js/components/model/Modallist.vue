<template>
    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <h5 class="modal-title col-md-6"><slot name="title">Modal title</slot></h5>
                        <button type="button" class="close col-md-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <li :key="item.id" v-for="item in items">
                        <label :for="item.name"> {{ item.name }} </label>
                        <input type="checkbox" :value="item.id" v-model="checkedPainting">
                    </li>

                    <span>Noms cochés : {{ checkedPainting }}</span>
                </div>
                <div class="modal-footer">
                    <slot name="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="addpainting" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: Array,
        collection: Number
    },
    data() {
        return {
            checkedPainting: []
        }
    },
    methods: {
        addpainting: function() {
            axios.post("/collection/addpainting", {checkedpainting: this.checkedPainting, collection: this.collection});

            var newToCol = new Array();

            this.checkedPainting.forEach(element => {
                newToCol.push(this.items.splice(this.indexWhere(this.items, item => item.id === element.id), 1)[0]); 
            });

            this.$emit('newpaiting', newToCol);
        },
        indexWhere: function(array, conditionFn) {
            const item = array.find(conditionFn);
            return array.indexOf(item);
        }
    }
}
</script>

<style>
</style>
