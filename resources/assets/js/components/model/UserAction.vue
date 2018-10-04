<template>
    <div v-on:mouseover="bigger" v-on:mouseout="smaller" ref="changing" class="changing">
        <h2><slot name="Title"></slot></h2>
        <div class="form">
            <slot name="content"></slot>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        bigger: function() {
            this.$refs.changing.style.width = "92%";
            this.$refs.changing.style.height = "75%";
            this.$refs.changing.style.zIndex = "100000";
        },
        smaller: function() {
            this.$refs.changing.style.width = "30%";
            this.$refs.changing.style.height = "15%";
            this.$refs.changing.style.zIndex = "1";
        }
    }
}
</script>

<style lang="scss">
.changing {
    padding: 1%;
    border: solid 1px #c0c0c0;
    overflow: hidden;
    width:30%;
    height: 15%;
    transition: all 0.5s linear;
    -webkit-transition: all 0.5s linear;
    background-color: #FEFBFA;
}

.changing h2 {
    font-family: 'Sorts Mill Goudy';
    font-size: 22pt;
}

.form {
    margin-top: 10vw;
    width: 100%;
    height: 45vh;
}
</style>
