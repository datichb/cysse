<template>
    <div class="content">
        <div class="row" style="margin-top:2%;">
            <div class="col-md-12" style="height: 500px;">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un nouveau tableau</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" @submit.prevent="createTask">
                            <div class="row">
                                <div class="col-md-4">
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
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label style="text-align: left;" for="name" class="col-md-2 col-md-offset-2 control-label">Nom</label>

                                        <div class="col-md-6">
                                            <input v-model="painting.name" id="name" type="text" class="form-control" name="name"  autofocus>

                                        </div>
                                    </div>
                                    
                                    <li :key="item.id" style="margin-bottom: 2%;" v-for="item in painting.Painttype">
                                        <div class="form-group">
                                            <label style="text-align: left;" for="size" class="col-md-2 col-md-offset-1 control-label">Taille : </label>

                                            <select style="margin-top:1%;" class="col-md-2" v-model="item.size">
                                                <option value='' selected>Selectionner la taille</option>
                                                <option v-for="item in sizes" :key="item.id" v-bind:value="item.id" >
                                                    {{ item.width }} mm x {{ item.height }} mm
                                                </option>
                                            </select>

                                            <label style="text-align: left;" for="plume" class="col-md-2 col-md-offset-1 control-label">Plume : </label>

                                            <select style="margin-top:1%;" class="col-md-2" v-model="item.plume">
                                                <option value='' selected>Selectionner le type de plume</option>
                                                <option v-for="item in plumes" :key="item.id" v-bind:value="item.id">
                                                    {{ item.name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label style="text-align: left;" for="marge" class="col-md-2 col-md-offset-1 control-label">Prix de vente : </label>

                                            <div class="col-md-2">
                                                <input v-model="item.price" id="marge" type="number" class="form-control" name="marge" min="1" step="0.1">

                                            </div>
                                        </div>
                                    </li>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button v-on:click.stop.prevent="addType" class="btn btn-primary">
                                                Ajouter un couple taille x plume
                                            </button>
                                            <button v-show="painting.Painttype.length > 1" v-on:click.stop.prevent="deleteType" class="btn btn-primary">
                                                Supprimer un couple taille x plume
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="text-align: left;" for="desc" class="col-md-2 col-md-offset-2 control-label">Déscription</label>

                                        <div class="col-md-6">
                                            <textarea v-model="painting.description" id="desc" class="form-control" name="desc" maxlength="255" rows="4" style="resize: none;">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PictureInput from 'vue-picture-input'

export default {
    components: {
        PictureInput
    },
    props: {
        plumes: Array,
        sizes: Array
    },
    data() {
            return {
                csrf: "",
            	painting: {
                    name: 'Test',
                    description: 'TEST',
                    file: '',
                    Painttype: [{id: '0', plume: '', size: '', price: ''}]
                }
            };
        },
    methods: {
        onChange (image) {
            if (image) {
                this.image = image
                this.painting.file = this.$refs.pictureInput.image;
                this.painting.type = this.$refs.pictureInput.file['type'].split('/')[1];
            } else {
                console.log('FileReader API not supported: use the <form>, Luke!')
            }
        },
        createTask() {
            axios.post('/painting/store', this.painting)
                .then((res) => {
                    
                })
                .catch((err) => console.error(err));
            event.target.reset();
            this.$refs.pictureInput.removeImage();
        },
        addType() {
            this.painting.Painttype.push({id: this.painting.Painttype.length, size: '', plume: '', price: ''});
        },
        deleteType() {
            this.painting.Painttype.pop();
        },
        mounted() {
            this.csrf = window.laravel.csrfToken;
        },
    },
    
}
</script>

<style>
</style>
