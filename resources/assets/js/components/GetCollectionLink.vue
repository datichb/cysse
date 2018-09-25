<template>
    <div class="dropdown-content">
        <li :key="item.id" v-for="item in collections">
            <a :href="ref(item.id)">{{ item.name }}</a>
        </li>
    </div>
</template>

<script>
export default {
    data() {
        return {
            collections: [],
            url: "/collection/show/"
        }
    },
    created() {
        axios.get("/collection/getall")
            .then(res => {
                this.collections = res.data.collections;
            });
    },
    methods: {
        ref: function(id) {
            return this.url + "" + id;
        }
    }
}
</script>

<style>
li {
    list-style: none;
}
</style>
