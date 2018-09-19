<template>
    <div class="search-container" ref="searchcontainer">
        <div class="wrapper">
            <div class="card" :key="item.id" v-for="item in item">
                <button @click="remove(item.id)" class="delete"></button>
                <img :src="item.image"/>
                <p>
                    {{ item.name }}
                </p>
                
                <input disabled type="hidden" :name="item.name" :model="item.id"/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: Array,
        deletable: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            csrf: ""
        };
    },
    methods: {
        remove: function (id) {
            axios.post("/collection/deletepainting", {painting: id})
                .then(res => console.log(res));
            
            this.$emit('deletepainting', this.item.splice(this.indexWhere(this.item, item => item.id === id), 1));
        },
        indexWhere: function(array, conditionFn) {
            const item = array.find(conditionFn);
            return array.indexOf(item);
        }
    },
    computed: {
        item: function () {
            return this.items;
        }
    }

}
</script>

<style>
.delete {
    background-image: url('/icon/delete.svg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
    width: 20%;
    height: 10%;
    background-color: transparent;
    border: none;
    float: right;
    margin-right: -5%;
    margin-top: -5%;
}

.wrapper {
    margin-left: 7%;
    display: flex;
    width: 90%;
    flex-wrap: wrap;
    padding-top: 12px;
}
.card {
    box-shadow: rgba(0, 0, 0, 0.117647) 0px 1px 6px, rgba(0, 0, 0, 0.117647) 0px 1px 4px;
    width: 22%;
    height: 300px;
    margin: 12px;
    transition: .15s all ease-in-out;
}

.card a {
    text-decoration: none;
    padding: 12px;
    color: #03A9F4;
    font-size: 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.card img {
    height: 80%;
    width: 90%;
    margin-left: 5%;
    margin-top: 5%;
}
.card p {
    text-align: center;
    padding: 4px;
}
</style>
