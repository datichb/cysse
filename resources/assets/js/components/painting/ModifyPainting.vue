<template>
    <div>
        <div class="wrapper">
            <div class="card" :key="item.id" v-for="item in filteredList">
                <img :src="item.image"/>
                <button style="margin-top: 5%;" type="button" @click="choosePaint(item)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    {{ item.name }}
                </button>
                
                <input disabled type="hidden" :name="item.name" :model="item.id"/>
            </div>
        </div>
        
        <modal :painting="painting"></modal>
    </div>
</template>

<script>
import modal from '../ModalForm.vue'

export default {
    components: {
        modal
    },
    props: {
        paintings: Array
   },
   data() {
       return {
           items: this.paintings,
           search: '',
           painting: []
       }
   },
   methods: {
       choosePaint: function(item) {
           this.painting = item;
       }
   },
   computed: {
       filteredList() {
            if(this.items.length <= 0) {
                return;
            }
            else {
                return this.items.filter(item => {
                    return item.name.toLowerCase().includes(this.search.toLowerCase())
                });
            }
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

