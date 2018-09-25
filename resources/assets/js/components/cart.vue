<template>
    <div class="cart">
        <img src="/icon/shopping-cart.svg"/>
        <div class="cart-info">
            <li :key="item.id" v-for="item in getCart">
                {{ item.name }}{{ item.value }}
            </li>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        getCart: function() {
            var p = JSON.parse(localStorage.getItem('paint'));
            var paint = new Array();

            axios.post("/painting/cart", p)
                .then(res => {
                    paint = res.data;
                    console.log(res.data.collections);
                })

            return paint;
        }
    }
}
</script>

<style>
.cart-info {
    border: 1px solid; 
    border-color:rgba(0, 0, 0, 0.4);
    background-color: white;
    position: relative;
    height: 200px;
    width: 25vw;
    margin-top: 2vh;
    margin-left: -7vw;
}
</style>
