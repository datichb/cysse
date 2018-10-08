<template>
  <div class="content">
    <div class="visit-card">
        <h2>Rejoignez-moi sur mes réseaux sociaux !</h2>
        <div class="row" style="margin-top: 5%;width: 100%;">
          <div id="instafeed" class="insta col-md-4 col-md-offset-1">
          </div>
          <div class="fb col-md-4 col-md-offset-2">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCyssemaisondeplumasserie%2F&tabs=timeline&width=400&height=550&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=255095238530504" width="100%" height="100%" style="border:none;overflow:hidden" adapt_container_width="true" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
        <div class="row" style="width: 100%;height: 10%;">
          <div class="arrow" @click="scrolling"></div>
        </div>
    </div>
    <div class="visit-card" id="form">
        <h2>A moins que vous ne préferiez un contact plus direct :</h2>
        <div class="row form" style="margin-top: 5%;">
            
        </div>
    </div>
  </div>
</template>

<script>
/* eslint-disable */
import 'web-animations-js'

export default {
    mounted() {
        var feed = new Instafeed({
            get: 'user',
            userId: '3307495581',
            clientId: 'dad124355e0a406aba07efbe6d4e2644',
            resolution: 'standard_resolution',
            template: '<blockquote data-instgrm-captioned data-instgrm-version="6" id="instagram-media"><div id="user"><img id="userimg" src="{{model.user.profile_picture}}">{{model.user.full_name}}</div><div style="padding:8px;"><div id="imgBack"><img id="img" src="{{image}}"></div><div id="likes"><div id="heart"><img src="/icon/heart.svg"></div><p>{{model.likes.count}}</p></div></blockquote>',
            accessToken: '3307495581.dad1243.97de551a4a14415d97d6eef864e96ef3',
            limit: 1,
        });
        feed.run();
    },
    methods: {
      scrolling: function() {
            $('#content').animate({
                scrollTop: $('#form').offset().top
            }, 1000);
        }
    }
}
</script>

<style lang="css">
.insta {
  padding: 0.5%;
  -moz-background: -moz-linear-gradient(top, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
  -webkit-background: -webkit-linear-gradient(top, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
  background: linear-gradient(210deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
  height: 65vh;
}

.fb {
  background-color: #3B5998;
  height: 65vh;
  padding: 0.5%;
}

h2 {
  margin-left:10%;
  text-align: center;
  width: 80%;
  font-size: 40pt;
  font-family: "Dancing Script";
}

.visit-card{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}

#likes {
    height: 60px;
}

#heart {
  width: 25px;
  height: 30px;
  margin-right: 10px;
  float: left;
}

#instagram-media {
  background:#FFF;
  border:0;
  border-radius:3px;
  height: 99.5%;
  box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15);
  margin: 1px;
  padding:0;
}

#imgback {
  background:#F8F8F8;
  line-height:0;
  margin-top:40px;
  padding:50.0% 0;
  text-align:center;
  width:100%;
}

#img {
  display:block;
  position:relative;
  width: 100%;
}

#user {
  padding: 4%;
  height: 60px;
}

#userimg {
  width: 35px;
  border-radius: 50%;
  margin-right: 2.5%;
}

.arrow,
.arrow:before{
  position: absolute;
  bottom: 7%;
  left: 49%;
}

.arrow{
  width: 40px;
  height: 40px;
  margin: -20px 0 0 -20px;
  -webkit-transform: rotate(45deg);
  border-left: none;
  border-top: none;
  border-right: 2px black solid;
  border-bottom: 2px black solid;
}
  
.arrow:before{
  content: '';
  width: 20px;
  height: 20px;
  top: 50%;
  margin: -10px 0 0 -10px;
  border-left: none;
  border-top: none;
  border-right: 1px black solid;
  border-bottom: 1px black solid;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-name: arrow;
}

.form {
  padding: 0.5%;
  -moz-background: -moz-linear-gradient(top, #C0C0C0 0%, #DAA560 100%); 
  -webkit-background: -webkit-linear-gradient(top, #C0C0C0 0%,#DAA560 100%);
  background: linear-gradient(210deg, #C0C0C0 0%,#DAA560 100%);
  height: 65vh;
}
  
@keyframes arrow{
  0%
    {opacity: 1;}
  100%
    {opacity: 0;
    transform: translate(-10px, -10px);}
}

</style>
