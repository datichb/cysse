<template>
  <div class="content">
    <div class="visit-card">
        <h2>
          <span></span>
          Cysse
          <span></span>
        </h2>
        <p class="Subtitle">
            La marque
        </p>
    </div>
    <div class="fader">
        <div ref="text" class="text">
          <div class="fade">
            <span>Cysse est une Maison de Plumasserie.</span>
          </div>

          <div class="fade">
            <span>Pour être plus précis, nous parlons ici du travail de la plume sous toutes ses formes.</span>
          </div>

          <div class="fade">
            <span>Cela vous est présenté dans le respect de la Convention de Washington qui certifie l'utilisation d'oiseaux d'élevages. Cysse s'engage donc a respecter les espèces protégées afin de conserver
                  les merveilles de la nature.</span>
          </div>

          <div class="fade">
            <span>Pour parler de la marques, Cysse s'implante dans le design, la
            décoration principalement dans les Tableaux pour embellir le quotidien et y apporter une touche unique au sens exceptionnel. Délicat, raffiné et d'une minutie visible chaque œuvre est unique a
            sa manière et est de très haute qualité.</span>
          </div>

          <div class="fade">
            <span>c'est un savoir faire très rare.</span>
          </div>

          <div class="fade">
            <span>Cysse reste un esprit totalement ouvert et c'est pour cela que nous restons a l'écoute de vos demandes pour collaborer avec vous sur des projets uniques.</span>
          </div>

          <div class="fade">
            <span>Sur mesure rien que pour vous.</span>
          </div>

          <div class="fade">
            <span>Fabrication Artisanales Française.</span>
          </div>

        </div>
    </div>
    <a class="section10"><span></span></a>
  </div>
</template>

<script>
/* eslint-disable */
import 'web-animations-js'

export default {
  mounted() {
    var v = this;
    var current = $('.fade').first();
    var $scrolling = false;

    $(v.$refs.text).on('mousewheel', function() {
      if(!$scrolling){  
        $scrolling = true;
        console.log($(v.$refs.text).scrollTop())
        $(v.$refs.text).animate({
          scrollTop: $(v.$refs.text).scrollTop() + current.outerHeight()
        }, {duration: 1000, done: function(){ $scrolling = false; } });
        
        if(current.next().length > 0){
          current = current.next('.fade');
        }else {
          current = $('.fade').first();
          $(v.$refs.text).animate({
            scrollTop: 0
          }, {duration: 5000, done: function(){ $scrolling = false; } });
        }
      }
    })
  }
}
</script>

<style lang="scss">
.fade {
  padding: 50px 0 50px 0;
  width: 100%;
  height: 100%;
  opacity: 1;
}

.fade span {
  position: relative;
  float: left;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.section10 {
  margin-top: 120px;
  padding-top: 60px;
}
.section10 span {
  position: absolute;
  left: 50%;
  width: 30px;
  height: 50px;
  margin-left: -15px;
  border: 2px solid #000;
  border-radius: 50px;
  box-sizing: border-box;
}
.section10 span::before {
  position: absolute;
  top: 10px;
  left: 50%;
  content: '';
  width: 6px;
  height: 6px;
  margin-left: -3px;
  background-color: #000;
  border-radius: 100%;
  -webkit-animation: sdb10 2s infinite;
  animation: sdb10 2s infinite;
  box-sizing: border-box;
}

@-webkit-keyframes sdb10 {
  0% {
    -webkit-transform: translate(0, 0);
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
  80% {
    -webkit-transform: translate(0, 20px);
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}
@keyframes sdb10 {
  0% {
    transform: translate(0, 0);
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
  80% {
    transform: translate(0, 20px);
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}

h2 {
  margin-left:30%;
  display: flex;
  align-items: center;
  width: 40%;
  height: 40%;
  font-size: 60pt;
  font-family: "Dancing Script";
}

h2 span {
  content:"";
  flex: 1 1 auto;
  border-top: 1px solid #000;
  margin: 20px;
}

.text {
  display: block;
  text-align: center;
  height: 100%;
  overflow-x: hidden;
  overflow-y: auto;
}

.fader {
  margin-top: 5%;
  margin-left: 5%;
  margin-bottom: 5%;
  width: 90%;
  height: 40%;
  display: block;
  text-align: center;
}

.text span {
  font-size: 14pt;
  font-family: "Sorts Mill Goudy";
}

.visit-card{
    width: 100%;
    height: 30%;
    overflow: hidden;
}

.Subtitle{
  position: relative;
  margin-top: 1%;
  text-align: center;
  width: 100%;
  height: 50%;
  color: black;
  font-size: 30pt;
  font-family: "Sorts Mill Goudy";
}
</style>
