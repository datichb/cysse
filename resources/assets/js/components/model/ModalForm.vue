<template>
    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <h5 class="modal-title col-md-6"><slot name="title">Modal title</slot></h5>
                        <button type="button" class="close col-md-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" style="height: 70vh;">
                    <div class="row">
                        <div class="col-md-3">
                            <img :src="painting.image" width="100%" height="100%">
                        </div>
                        <div class="col-md-3">
                            <picture-input
                            id="pictureInput"
                            ref="pictureInput"
                            accept="image/jpg,image/jpeg,image/png" 
                            size="10" 
                            buttonClass="btn"
                            :customStrings="{
                                upload: '<h1>Bummer!</h1>',
                            }">
                            </picture-input>
                        </div>
                        <div class="col-md-6">
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <slot name="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    </slot>
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
        painting: Array
    },
    data() {
        return {
        }
    },
    methods: {
    },
    computed: {
    }
}
</script>

<style>
</style>
