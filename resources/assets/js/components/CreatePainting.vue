<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="height: 500px;">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un nouveau tableau</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" @submit.prevent="createTask()">
                            <div class="row">
                                <div class="col-md-4">
                                    <picture-input
                                    id="pictureInput"
                                    ref="pictureInput" 
                                    @change="onChange"
                                    accept="image/jpg" 
                                    size="10" 
                                    buttonClass="btn"
                                    :customStrings="{
                                        upload: '<h1>Bummer!</h1>',
                                    }">
                                    </picture-input>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Nom</label>

                                        <div class="col-md-6">
                                            <input v-model="painting.name" id="name" type="text" class="form-control" name="name"  autofocus>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="size" class="col-md-4 control-label">Taille</label>

                                        <div class="col-md-2">
                                            <input v-model="painting.width" id="width" type="number" class="form-control" name="width" >
                                        </div>
                                        <div class="col-md-2">
                                            <input v-model="painting.height" id="height" type="number" class="form-control" name="height" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc" class="col-md-4 control-label">Déscription</label>

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
    data() {
            return {
                csrf: "",
            	painting: {
                    name: 'Test',
                    width: '22',
                    height: '33',
                    description: 'TEST',
                    file: ''
                }
            };
        },
    methods: {
        onChange (image) {
        console.log('New picture selected!')
        if (image) {
            console.log('Picture loaded.')
            this.image = image
            this.painting.file = this.$refs.pictureInput.image;
        } else {
            console.log('FileReader API not supported: use the <form>, Luke!')
        }
        },
        createTask() {
            axios.post('painting/store', this.painting)
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => console.error(err));
        },
        mounted() {
            this.csrf = window.laravel.csrfToken        
        }
    }
}
</script>

<style>
</style>
