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
                <div v-show="istList" class="stock" ref="stock">
                    {{ HaveStock }}
                </div>
            </div>
        </div>
        <div v-show="istList">
            <label>Commande :</label>
            <input type="number" ref="buy" :value="1" :max="paint.stock" min="0">
        </div>
        <button v-show="istList" @click="tocard" class="btn btn-primary">Ajouter au panier</button>
        <button v-show="!istList" @click="moreInfo" class="btn btn-primary">Plus d'information</button>
        <button v-show="isAdmin" @click="EditPaint" class="btn btn-primary">Modifier</button>
    </div>
</template>

<script>
export default {
    props: {
        painting: Object,
        list: {
            type: Boolean,
            defalut: false
        },
        isAdmin: {
            type: Boolean,
            default: false
        }
   },
   data() {
       return {
           paint: this.painting,
           isMounted: false,
           istList: !this.list,
       }
   },
   computed: {
       HaveStock: function() {
            if(!this.isMounted)
                return;
            if(this.paint.stock === 0){
                this.$refs.stock.innerHTML = '<p>Ce produit n\'est plus en stock. Compter x jours de conception en plus de la livraison.</p>';
            }else{
                this.$refs.stock.innerHTML = '<label>stock :</label>' +
                        '<input disabled type="number" value="'+this.paint.stock+'">';
            }
       }
   },
   created() {
       window.Echo.channel('orders').listen('CardUpdated', e => {
            this.paint.stock = this.paint.stock - e.buy;
        });
   },
   methods: {
       tocard: function () {
            axios.post("/painting/buy", {buy: this.$refs.buy.value, painting: this.paint.id, stock: this.paint.stock});
            p = JSON.parse(localStorage.getItem('paint'));
            console.log(p);
            var isExist = false;
            
            if(p == null)
                var p = new Array();
            else
            {
                p.forEach(element => {
                    if(element.id == this.paint.id){
                        element.nb = Number(this.$refs.buy.value);
                        isExist = true;
                    }
                });
            }

            if(!isExist){
                var paint = {'id': this.paint.id, 'nb': Number(this.$refs.buy.value)};
                p.push(paint);
            }

            const parsed = JSON.stringify(p);
            localStorage.setItem('paint', parsed);

            this.paint.stock = this.paint.stock - this.$refs.buy.value;
       },
       moreInfo: function() {
            window.location.replace("/painting/show/" + this.paint.id);
       },
       EditPaint: function() {
           window.location.replace("/painting/edit/" + this.paint.id);
       }
   },
   mounted(){
        this.isMounted = true;
    }
}
</script>
<style scoped>

</style>

