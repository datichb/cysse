<template>
    <div class="search-container" ref="searchcontainer">
        <div class="search-wrapper" v-show="searchable">
            <label>{{ answer }}</label>
            <br/>
            <input v-model="search" placeholder="Search title.."/>
        </div>
        <div class="wrapper">
            <div class="card" @click="Selectimg($event, item)" :key="item.id" v-for="item in filteredList">
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
        searchable: {
            type: Boolean,
            default: true
        },
        deletable: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            csrf: "",
            search: '',
            answer: 'Search title:'
        };
    },
    watch: {
        search: function (newQuestion, oldQuestion) {
            this.answer = "J'attends que vous arrêtiez de taper..."
            this.debouncedGetAnswer()
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
    },
    methods: {
        getAnswer:  function () {
            if(this.filteredList.length <= 0) {
                this.answer = 'Aucun résultats ne correspond à votre recherche';
            }else {
                this.answer = 'Voici les résultats correspondant à votre recherche :';
            }
        },
        Selectimg: function (event, item) {
            console.log(event.currentTarget);
            if(event.currentTarget.classList.contains("Active")) {
                event.currentTarget.classList.remove("Active");
                event.currentTarget.style.backgroundColor = "white";
                event.currentTarget.children[2].disabled = true;
                this.$emit('remove', item.id);
            }else {
                event.currentTarget.classList.add("Active");
                event.currentTarget.style.backgroundColor = "#33C4FF";
                event.currentTarget.children[2].disabled = false;
                this.$emit('add', item.id);
            }
        }
    },
    created: function () {
        this.debouncedGetAnswer = _.debounce(this.getAnswer, 500);
    }

}
</script>

<style>
.search-wrapper {
    position: relative;
    text-align: center;
}
.search-wrapper input {
    padding: 4px 12px;
    color: rgba(0, 0, 0, 0.7);
    border: 1px solid rgba(0, 0, 0, 0.12);
    transition: .15s all ease-in-out;
    background: white;
}
.search-wrapper input:focus {
    outline: none;
    transform: scale(1.05);
}
.search-wrapper input:focus + label {
    font-size: 10px;
    transform: translateY(-24px) translateX(-12px);
}
.search-wrapper input::-webkit-input-placeholder {
    font-size: 12px;
    color: rgba(0, 0, 0, 0.5);
    font-weight: 100;
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
.card:hover {
    transform: scale(1.1);
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
