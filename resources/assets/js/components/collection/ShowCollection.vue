<template>
    <div class="content">
        <modal :items="items.paintings" :collection="collectionitems.id" v-on:newpaiting="addToCol">
            <template slot="title">
                This is my new title !    
            </template>
        </modal>
        <div class="row col" id="col" style="height: 100%;padding-top:2.5%;">
            <div class="col-md-12">
                <div class="">
                    <div class="col-md-10 col-md-offset-1">
                        <img :src="collectionitems.img" width="100%" height="100%">
                        <h2 style="position: absolute;top:85%;right: 10%;color: white;font-family: 'Sorts Mill Goudy';">{{ collectionitems.name }}</h2>
                    </div>
                </div>
                <div v-on:click="scrolling">
                    <svg id="more-arrows" >
                        <polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/>
                        <polygon class="arrow-middle" points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 "/>
                        <polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 "/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="row paint" id="paint" style="height: 100%;">
            <div class="row">
                <listitem :auth="isAdmin" v-on:deletepainting="addpainting" :searchable="false" :items="collectionitems.paint"></listitem>
            </div>
            <div v-show="isAdmin" class="row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Ajouter des tableaux à la collection
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import listitem from '../ListItem.vue'
import modal from '../Modallist.vue'

export default {
    components: {
        listitem,
        modal
    },
    props: {
        collection: Object,
        auth: {
            type: Boolean,
            default: false
        }
   },
   data() {
       return {
            items: [],
            collectionitems: this.collection,
            isAdmin: this.auth
       }
   },
   created() {
        axios.get("/painting/freepainting")
            .then(res => {
                this.items = res.data;
            });
    },
    methods: {
        addpainting: function(painting) {
            this.items.paintings.push(painting[0]);
        },
        addToCol: function(painting) {
            
            this.collectionitems.paintings = this.collectionitems.paintings.concat(painting);
        },
        scrolling: function() {
            document.querySelector('.paint').scrollIntoView({ 
                behavior: 'smooth' 
            });
        }
    }
}
</script>
<style lang="scss">
.content {
    -webkit-overflow-scrolling: touch;
}

#more-arrows {
	width: 100%;
    height: 10%;
    margin-top: 5%;
    padding-left: 45%;
  
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