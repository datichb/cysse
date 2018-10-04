<template>
    <div class="content">
        <h2>Bienvenue dans votre espace personnel !</h2>
        <action class="infos">
            <template slot="Title">Vos informations personnelles :</template>
        </action>

        <action class="contact">
            <template slot="Title">Contactez-moi :</template>
            <template slot="content">
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <a href="#" style="margin-right: 10%;margin-left: 30%;"><img src="icon/instagram.svg" width="50px"></a>
                        <a href="#"><img src="icon/facebook-2.svg" width="50px"></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" style="margin-left: 40%;"><img src="icon/gmail.svg" width="50px"></a>
                    </div>
                </div>
                <div class="row" style="margin-top: 5%;">
                    <div class="col-md-4 col-md-offset-2">
                        <h3>Rejoignez-moi sur mes réseaux :</h3>
                    </div>
                    <div class="col-md-4">
                        <h3>Contactez-moi directement :</h3>
                    </div>
                </div>
            </template>
        </action>

        <action class="command">
            <template slot="Title">Vos commandes :</template>
        </action>

        <action class="fav">
            <template slot="Title">Vos Favoris :</template>
        </action>

    </div>
</template>

<script>
import action from '../model/UserAction.vue'

export default {
    components: {
        action
    },
    
}
</script>

<style>
h2 {
    text-align: center;
    font-size: 40pt;
    font-family: 'Dancing Script';
}

h3{
    text-align: center;
} 

.infos{
    position: absolute;
    top: 15%;
    left: 5%;
}

.contact {
    position: absolute;
    top: 15%;
    right: 5%;
}

.command {
    position: absolute;
    bottom: 15%;
    right: 5%;
}

.fav {
    position: absolute;
    bottom: 15%;
    left: 5%;
}
</style>
