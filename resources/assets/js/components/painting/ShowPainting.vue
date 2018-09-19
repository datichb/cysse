<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col col-lg-3">
                <img :src="paint.image" height="200px" width="200px">
            </div>
            <div class="col-lg-3">
                <div>
                    <p>{{ paint.name }}</p>
                </div>
                <div>
                    <p>{{ paint.width }} cm x {{ paint.height }} cm</p>
                </div>
                <div>
                    <p>{{ paint.description }}</p>
                </div>
                <div>
                    <label>stock :</label>
                    <input disabled type="number" :value="paint.stock">
                </div>
            </div>
        </div>
        <div>
            <label>Commande :</label>
            <input type="number" ref="buy" :value="1" :max="paint.stock" min="0">
        </div>
        <button @click="tocard" class="btn btn-primary">Ajouter au panier</button>
    </div>
</template>

<script>
export default {
    props: {
        painting: Object
   },
   data() {
       return {
           paint: this.painting
       }
   },
   methods: {
       tocard: function () {
           
           axios.post("/painting/buy", {buy: this.$refs.buy.value});

           window.Echo.channel('orders')
            .listen('CardUpdated', e => {
                this.paint.stock -= e.buy;
                console.log('card update => ' + e.buy);
            });
       }
   }
}
</script>
<style scoped>

</style>

