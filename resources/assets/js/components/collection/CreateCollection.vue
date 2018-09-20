<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="height: 500px;">
                <div class="panel panel-default">
                    <div class="panel-heading">Créer une nouvelle collection</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" @submit.prevent="createTask()">
                            <div class="row">
                              <div class=" col-md-3">
                                    <picture-input
                                    id="pictureInput"
                                    ref="pictureInput" 
                                    @change="onChange"
                                    accept="image/jpg,image/jpeg,image/png" 
                                    size="10" 
                                    buttonClass="btn"
                                    :customStrings="{
                                        upload: '<h1>Bummer!</h1>',
                                    }">
                                    </picture-input>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Nom</label>

                                        <div class="col-md-6">
                                            <input v-model="collection.name" id="name" type="text" class="form-control" name="name"  autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc" class="col-md-4 control-label">Déscription</label>

                                        <div class="col-md-6">
                                            <textarea v-model="collection.description" id="desc" class="form-control" name="desc" maxlength="255" rows="4" style="resize: none;">
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <searchcomponent :items="paintings" v-on:add="PaintAdd" v-on:remove="PaintRemove"></searchcomponent>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PictureInput from 'vue-picture-input'
import searchcomponent from '../SearchComponent.vue'

export default {
    components: {
        PictureInput,
        searchcomponent
    },
    props: {
      paintings: Array
    },
    data() {
        return {
            csrf: "",
          collection: {
                name: '',
                description: '',
                paints: new Array(),
                file: ''
            }
        };
    },
    methods: {
      onChange (image) {
            console.log('New picture selected!')
            if (image) {
                this.image = image
                this.collection.file = this.$refs.pictureInput.image;
                this.collection.type = this.$refs.pictureInput.file['type'].split('/')[1];
            } else {
                console.log('FileReader API not supported: use the <form>, Luke!')
            }
        },
        createTask() {
            axios.post('/collection/store', this.collection)
                .then((res) => {
                })
                .catch((err) => console.error(err));
        },
        PaintAdd(element) {
          this.collection.paints.push(element);
        },
        PaintRemove(element) {
          var index = this.collection.paints.indexOf(element);
          if (index > -1) {
            this.collection.paints.splice(index, 1);
          }
        }
    },
        mounted() {
            //this.csrf = window.laravel.csrfToken;
            console.log(this.paintings);
        },
}
</script>

<style lang="scss">
.vue-select-image__wrapper {
  overflow: auto;
  list-style-image: none;
  list-style-position: outside;
  list-style-type: none;
  padding: 0px;
  margin: 0px;
}

.vue-select-image__item {
  margin: 0px 12px 12px 0px;
  float: left;
}

.vue-select-image__thumbnail{
  padding: 6px;
  border: 1px solid #dddddd;

  display: block;
  padding: 4px;
  line-height: 20px;
  border: 1px solid #ddd;

  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;

  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);

  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

.vue-select-image__thumbnail--selected{
  background: #0088cc;
}

.vue-select-image__img{
  -webkit-user-drag: none;
  display: block;
  max-width: 100%;
  margin-right: auto;
  margin-left: auto;
}

.vue-select-image__lbl{
  line-height: 3;
}

@media only screen and (min-width: 1200px) {
  .vue-select-image__item {
    margin-left: 30px;
  }
}

small {
  display: block;
  color: #ddd;
  font-size: 16px;
}
.grid__row {
  *zoom: 1;
  margin: 0 auto;
  max-width: 92.308em;
}
.grid__row:before,
.grid__row:after {
  display: table;
  content: " ";
}
.grid__row:after {
  clear: both;
}
.centered {
  text-align: center;
}
.content {
  margin: 0 20px;
}
.ion {
  &:hover {
    color: #4f8ef7;
  }
}
.label-image{
  font-size: .7rem;
}
.vue-select-image {
  display: flex;
  justify-content: center;
}
pre,
code {
  text-align: left;
  max-width: 500px;
  margin: auto;
}
table{
  overflow: auto;
  margin: auto;
  margin-top: 0;
  margin-bottom: 16px;
  border-spacing: 0;
  border-collapse: collapse;
  text-align: left;
  font-size: 1.2rem;
  thead{
    tr{
      background-color: #f6f8fa;
    }
  }
  tr {
      background-color: #fff;
      border-top: 1px solid #c6cbd1;
  }
  th, td{
    padding: 6px 13px;
    border: 1px solid #dfe2e5;
  }
}
.VueSelectImage{
  /deep/ .vue-select-image__thumbnail--active{
    background: #50af2b;
    &:after{
      content: '✅';
      position: absolute;
      color: #50af2b;
      margin-top: -190px;
      margin-left: 70px;
      font-size: 20px;
      border-radius: 3px;
    }
  }
}
.custom-style {
  display: flex;
  justify-content: center;
  &__wrapper {
    overflow: auto;
    list-style-image: none;
    list-style-position: outside;
    list-style-type: none;
    padding: 0px;
    margin: 0px;
  }
  &__item {
    margin: 0px 12px 12px 0px;
    float: left;
    @media only screen and (min-width: 1200px) {
      margin-left: 30px;
    }
  }
  &__thumbnail{
    padding: 6px;
    border: 1px solid #dddddd;
    display: block;
    padding: 4px;
    line-height: 20px;
    border: 1px solid #ddd;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    &--selected{
      background: #0088cc;
      .custom-style__img{
        zoom: 1.1;
      }
    }
  }
  &__img{
    -webkit-user-drag: none;
    display: block;
    max-width: 100%;
    margin-right: auto;
    margin-left: auto;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
  }
}

.ion {
  display: inline-flex;
}

.ion__svg {
  fill: currentColor;
}

@-webkit-keyframes ionShake {
	10%,
	90% {
		-webkit-transform: translate3d(-1px, 0, 0);
		-ms-transform: translate3d(-1px, 0, 0);
		transform: translate3d(-1px, 0, 0);
	}
	20%,
	80% {
		-webkit-transform: translate3d(2px, 0, 0);
		-ms-transform: translate3d(2px, 0, 0);
		transform: translate3d(2px, 0, 0);
	}
	30%,
	50%,
	70% {
		-webkit-transform: translate3d(-4px, 0, 0);
		-ms-transform: translate3d(-4px, 0, 0);
		transform: translate3d(-4px, 0, 0);
	}
	40%,
	60% {
		-webkit-transform: translate3d(4px, 0, 0);
		-ms-transform: translate3d(4px, 0, 0);
		transform: translate3d(4px, 0, 0);
	}
}
@keyframes ionShake {
	10%,
	90% {
		-webkit-transform: translate3d(-1px, 0, 0);
		-ms-transform: translate3d(-1px, 0, 0);
		transform: translate3d(-1px, 0, 0);
	}
	20%,
	80% {
		-webkit-transform: translate3d(2px, 0, 0);
		-ms-transform: translate3d(2px, 0, 0);
		transform: translate3d(2px, 0, 0);
	}
	30%,
	50%,
	70% {
		-webkit-transform: translate3d(-4px, 0, 0);
		-ms-transform: translate3d(-4px, 0, 0);
		transform: translate3d(-4px, 0, 0);
	}
	40%,
	60% {
		-webkit-transform: translate3d(4px, 0, 0);
		-ms-transform: translate3d(4px, 0, 0);
		transform: translate3d(4px, 0, 0);
	}
}

@-webkit-keyframes ionRotate {
	100% {
		-webkit-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		transform: rotate(360deg);
  }
}
@keyframes ionRotate{
  100% {
		-webkit-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		transform: rotate(360deg);
  }
}

@-webkit-keyframes ionBeat {
	0% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
	20% {
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}
	40% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
	60% {
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}
	80% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
	100% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
}

@keyframes ionBeat {
	0% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
	20% {
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}
	40% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
	60% {
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}
	80% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
	100% {
		-webkit-transform: scale(.75);
		-ms-transform: scale(.75);
		transform: scale(.75);
	}
}

.ion-beat{
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-name: ionBeat;
  animation-name: ionBeat;
  -webkit-animation-duration: 0.82s;
  animation-duration: 0.82s;
}
.ion-shake{
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-name: ionShake;
  animation-name: ionShake;
  -webkit-animation-duration: 0.82s;
  animation-duration: 0.82s;
}

.ion-rotate{
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-name: ionRotate;
  animation-name: ionRotate;
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
}
</style>
