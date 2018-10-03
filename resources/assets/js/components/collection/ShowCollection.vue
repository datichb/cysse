<template>
    <div id="content" class="content">
        <modal :items="items.paintings" :collection="collectionitems.id" v-on:newpaiting="addToCol">
            <template slot="title">
                This is my new title !    
            </template>
        </modal>
        
        <div ref="col" class="row col" id="col" :style="'background-image: url(&quot;' + collectionitems.img + '&quot;);background-size: 100% 100%;'">
            <bs v-on:newCollection="changeCollection" :nbc="nbcollection"></bs>
            <h2>{{ collectionitems.name }}</h2>
            <div  class="arrowclick">
                <svg id="more-arrows" v-on:click="scrolling">
                    <polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/>
                    <polygon class="arrow-middle" points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 "/>
                    <polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 "/>
                </svg>
            </div>
        </div>
        <div class="row paint" ref="paint" id="paint" style="height: 100%;">
            <div class="row">
                <listitem :auth="isAdmin" v-on:deletepainting="addpainting" :searchable="false" :items="collectionitems.paint"></listitem>
            </div>
            <div v-show="isAdmin" class="row">
                <div class="col-md-2 col-md-offset-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Ajouter des tableaux à la collection
                    </button>
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <button type="button" class="btn btn-primary" @click="deleteCollection">
                        Supprimer la collection
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import listitem from '../model/ListItem.vue'
import modal from '../model/Modallist.vue'
import bs from '../model/ButtonStylish.vue'

export default {
    components: {
        listitem,
        modal,
        bs
    },
    props: {
        collection: Object,
        nbc: Array,
        auth: {
            type: Boolean,
            default: false
        }
   },
   data() {
       return {
            items: [],
            collectionitems: this.collection,
            isAdmin: this.auth,
            nbcollection: this.nbc
       }
   },
   created() {
        axios.get("/painting/freepainting")
            .then(res => {
                this.items = res.data;
            });

        
    },
    methods: {
        deleteCollection: function() {
            axios.post('/collection/delete', {id: this.collectionitems.id})
                .then(res => {
                    location.reload();
                });
        },
        changeCollection: function(collection) {
            this.collectionitems = collection.collection;
        },
        addpainting: function(painting) {
            this.items.paintings.push(painting[0]);
        },
        addToCol: function(painting) {
            
            this.collectionitems.paintings = this.collectionitems.paintings.concat(painting);
        },
        scrolling: function() {
            /* document.querySelector('.paint').scrollIntoView({ 
                behavior: 'smooth' 
            }); */

            $('#content').animate({
                scrollTop: $('#paint').offset().top
            }, 1000);
        }
    }
}
</script>
<style lang="scss">
h2 {position: absolute;
    top:80%;
    right: 10%;
    color: black;
    font-family: 'Sorts Mill Goudy';
}

.col {
    position: relative;
    height: 100%;
    display: block;
    z-index: 1;
    -webkit-transition: background-image 1s ease-in-out;
    transition: background-image 1s ease-in-out;
}

.arrowclick {
    position: absolute;
    height: 10%;
    margin-left: 47%;
    z-index: 5;
    bottom: 0;
}

#more-arrows {
    height: 100%;
  
  &:hover {
    
    polygon {
      fill: #C0C0C0;
      transition: all .2s ease-out;

      &.arrow-bottom {
        transform: translateY(-18px);
      }

      &.arrow-top {
        transform: translateY(18px);
      }
      
    }
  
  }
  
}

polygon {
  fill: #DAA520;
  transition: all .2s ease-out;
    
  &.arrow-middle {
	  opacity: 0.75;
	}

	&.arrow-top {
	  opacity: 0.5
	}
	 
}
</style>