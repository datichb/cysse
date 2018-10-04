<template>
    <div class="content">
        <div class="paint">
            <img :src="paint.image" width="100%" height="100%">
        </div>
        <div class="Desc">
            <div class="row">
                <label class="col-md-2">Nom : </label>
                <p class="col-md-2">{{ paint.name }}</p>
            </div>
            <div class="row">
                <label class="col-md-2">Type : </label>
                <select class="col-md-5" ref="type" @change="getPrice($event.target.value)">
                    <option disabled selected value=''></option>
                    <option :key="item.id" v-for="item in paint.price" :value="item.id">
                        {{ item.size.width }} x {{ item.size.height }} mm => {{ item.plume.name }}
                    </option>
                </select>
                <input class="col-md-offset-1 col-md-2" type="text" disabled ref='price' v-model="currentPrice"> €
            </div>
            <div class="row">
                <label class="col-md-3">Description :</label>
                <p>{{ paint.description }}</p>
            </div>
            <div class="row">
                <label class="col-md-3">Stock :</label>
                <div ref="stock">{{ HaveStock }}</div>
            </div>
            <div class="row" style="margin-top: 20%;">
                <label class="col-md-3">Commande :</label>
                <input class="col-md-2" type="number" ref="buy" :value="1" :max="paint.stock" min="0">
            </div>
        </div>
        <div class="command row">
            <button @click="tocard" class="btn btn-primary col-md-3 col-md-offset-7">Ajouter au panier</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        painting: Object,
        isAdmin: {
            type: Boolean,
            default: false
        }
   },
   data() {
       return {
           paint: this.painting,
           isMounted: false,
           currentPrice: ''
       }
   },
   computed: {
       HaveStock: function() {
            if(!this.isMounted)
                return;
            if(this.paint.stock === 0){
                this.$refs.stock.innerHTML = '<p>Ce produit n\'est plus en stock. Compter x jours de conception en plus de la livraison.</p>';
            }else{
                this.$refs.stock.innerHTML = '<input disabled type="number" value="'+this.paint.stock+'">';
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
                    if(element.id == this.paint.id && element.type == this.$refs.type.value){
                        element.nb = Number(this.$refs.buy.value);
                        isExist = true;
                    }
                });
            }

            if(!isExist){
                var paint = {'id': this.paint.id, 'type': Number(this.$refs.type.value),'nb': Number(this.$refs.buy.value)};
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
       },
       getPrice: function(id) {
           console.log(id);
            var res = this.paint.price.find(obj => {
                if(obj.id == id)
                    return obj;
            });
            console.log(res);
            this.currentPrice = res.price;


       }
   },
   mounted(){
        this.isMounted = true;
    }
}
</script>
<style scoped>
.paint {
    margin-top: 5%;
    height:70%;
    width: 35%;
    float: left;
    box-shadow: 0px 0px 25px #363636;
    border: #DAA520 2px solid;
}

.paint img {
    /* object-fit: contain; */
}

.Desc {
    width: 50%;
    height: 50%;
    padding: 5%;
    margin-top: 12.5%;
    margin-left: 10%;
    float: left;
    border: #c0c0c0 5px solid;
    box-shadow: 0px 0px 10px #888888;
    border-radius: 3%;
}

.command {
    clear: both;
    height: 10%;
    padding: 2%;
}
</style>

