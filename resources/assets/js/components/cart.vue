<template>
    <div class="modal" id="ModalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <h5 class="modal-title col-md-11"><slot name="title">Actuellement dans votre panier :</slot></h5>
                        <button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <form>
                    <div class="modal-body" style="height: 70vh;">
                        <div class="cart-info" ref="info">
                            <table>
                                <tr>
                                    <th>Articles</th>
                                    <th>Prix</th>
                                    <th>Quantités</th>
                                    <th>Totals</th>
                                </tr>
                                <tr :key="item.id" v-for="item in cart">
                                    <td><input type="text" :value="item.name" disabled></td>
                                    <td><input type="number" :value="item.price" disabled></td>
                                    <td><input type="number" :value="item.value"></td>
                                    <td><input type="number" :value="item.price * item.value" disabled></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </slot>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cart: []
        }
    },
    methods: {
        getTotal: function(price, value) {
            return price * value;
        }
    },
    mounted() {
        var p = JSON.parse(localStorage.getItem('paint'));
        if(p == null) {
            this.$refs.info.innerHTML = '<p>Votre panier est actuellement vide !</p>';
            return;
        }
        
        var paint = new Array();
        p.forEach(element => {
            paint.push(element.id);
        });

        axios.post("/painting/cart", {painting: paint})
            .then(res => {
                this.cart = res.data.paintings;

                this.cart.forEach(element => {
                    p.forEach(el => {
                        if(element.id == el.id)
                            element.value = el.nb;
                    })
                });
                
            })
    }
}
</script>

<style>
.cart-info {
    height: 100%;
    width: 95%;
    margin-left: 5%;
    padding-top: 5%;
}

.img {
    width: 20px;
    cursor: pointer;
}

.modal {
    background-color: #e7e7e7;
    z-index: 110000;
}
</style>
