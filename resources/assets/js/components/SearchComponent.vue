<template>
    <div>
        <div class="search-wrapper">
            <input v-model="search" placeholder="Search title.."/>
            <br/>
            <label>{{ answer }}</label> 
        </div>
        <div class="wrapper">
            <div class="card" v-for="item in filteredList">
                    <img :src="item.image"/>
                    <p>
                        {{ item.name }}
                    </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: Array
    },
    data() {
        return {
            csrf: "",
            search: '',
            answer: 'Search title:'
        };
    },
    watch: {
        // à chaque fois que la question change, cette fonction s'exécutera
        search: function (newQuestion, oldQuestion) {
        this.answer = "J'attends que vous arrêtiez de taper..."
        this.debouncedGetAnswer()
        }
    },
    computed: {
        filteredList() {
            console.log(this.items);
            return this.items.filter(item => {
                return item.name.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    },
    methods: {
        getAnswer:  function () {
            if(this.filteredList.length == 0) {
                this.answer = 'Aucun résultats ne correspond à votre recherche';
            }else {
                this.answer = 'Voici les résultats correspondant à votre recherche :';
            }
        }
    },
    created: function () {
        this.debouncedGetAnswer = _.debounce(this.getAnswer, 500)
    }
}
</script>

<style>
.wrapper {
  display: flex;
  max-width: 444px;
  flex-wrap: wrap;
  padding-top: 12px;
}
.card {
  box-shadow: rgba(0, 0, 0, 0.117647) 0px 1px 6px, rgba(0, 0, 0, 0.117647) 0px 1px 4px;
  max-width: 124px;
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
  height: 100px;
}
.card small {
  font-size: 10px;
  padding: 4px;
}
</style>
