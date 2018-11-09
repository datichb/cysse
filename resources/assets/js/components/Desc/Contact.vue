<template>
  <div id="content" class="content">
    <div class="visit-card">
        <h2>Rejoignez-nous sur les réseaux sociaux !</h2>
        <div class="row" style="margin-top: 2.5%;width: 100%;">
          <div class="insta">
            <div id="instafeed" class="instagram-media">
              <div class="instafeed-gallery">
                <div class="header">
                  
                  <ul class="meta">
                    <li>
                      <span class="count post-count"></span>
                      <span class="title">posts</span>
                    </li>
                    <li>
                      <span class="count follower-count"></span>
                      <span class="title">followers</span>
                    </li>
                    <li>
                      <span class="count following-count"></span>
                      <span class="title">following</span>
                    </li>
                  </ul>
                  
                  
                </div>
                <div id="instafeed-gallery-feed" class="row no-gutter">
                  <!-- instagram feed loads here -->
                </div>
              </div>

              <div class="post-modal-container">
                <!-- <div class="arrow-left">left</div>
              <div class="arrow-right">right</div> -->
              </div>
              <div class="post-modal-backdrop"></div>
            </div>
          </div>
          <div class="fb">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCyssemaisondeplumasserie%2F&tabs=timeline&width=325&height=650&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=255095238530504" 
                width="100%" height="100%" style="border:none;overflow:hidden" adapt_container_width="true" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
        <div class="row" @click="scrolling" style="width: 100%;height: 10%;">
          <div class="arrow" ></div>
        </div>
    </div>
    <div class="visit-card" id="form">
        <h2>A moins que vous ne préferiez un contact plus direct :</h2>
        <div class="col-md-8 col-md-offset-2 form">
            <div class="container-contact100">

            <div class="wrap-contact100">
              <form class="contact100-form validate-form">

                <div class="wrap-input100 validate-input" data-validate="Please enter your name">
                  <input class="input100" type="text" name="name" placeholder="Full Name" v-model="form.fullname">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter email: e@a.x">
                  <input class="input100" type="text" name="email" placeholder="Email" v-model="form.email">
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                  <textarea class="input100" name="message" placeholder="Your Message" v-model="form.message"></textarea>
                  <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                  <button @click="email($event)" class="contact100-form-btn">
                    Send Email
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
/* eslint-disable */
import 'web-animations-js'
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

export default {
    data() {
        return {
          form: {
              fullname: '',
              email: '',
              message: ''
          },
          username: ''
        }
    },
    mounted() {
      Vue.use(Toaster, {timeout: 5000});

      var feedHTML = 
      // header
              '<div class="header-container">'+
                '<img src="{{model.user.profile_picture}}" class="avatar">'+
                '<div class="user-container">'+
                  '<p class="name">{{model.user.full_name}}</p>'+
                  '<p class="username"><a href="http://instagram.com/{{model.user.username}}" target="_blank">@{{model.user.username}}</a></p>'+
                '</div>'+
              '</div>'+
                  
              // posts
              '<div class="img-featured-container col-xs-4">'+
                '<div class="img-backdrop"></div>'+
                '<div class="description-container">'+
                  '<span class="likes"><i class="icon ion-heart"></i> {{likes}}</span>'+
                  '<span class="comments"><i class="icon ion-chatbubble"></i> {{comments}}</span>'+
                '</div>'+
                '<img src="{{image}}" class="img-responsive">'+
              '</div>'+
    
    // modal
              '<div class="post-modal">'+
                '<div class="btn-close">'+
                  '<div class="close-icon">&times;</div>'+
                '</div>'+
                '<img src="{{image}}">'+
    
                // video
                // '<video controls autoplay>' +
                //   '<source src="{{model.videos.standard_resolution.url}}" type="video/mp4">' +
                //   'Your browser does not support the video tag.' +
                // '</video>' +
    
                '<div class="post-modal-body">'+
                  '<div class="post-modal-meta-container">'+
                    '<p class="likes"><i class="icon ion-heart"></i> {{likes}}</p>'+
                    '<p class="comments"><i class="icon ion-chatbubble"></i> {{comments}}</p>'+
                  '</div>'+
                  '<div class="post-modal-caption-container">'+
                    '<p class="caption">{{caption}}</p>'+
                  '</div>'+
                 '</div>'+
              '</div>';
            
        var feed = new Instafeed({
            get: 'user',
            userId: '7487153442',
            clientId: '8c403bbcf3754c47b20e7e4b1db45cfd',
            resolution: 'standard_resolution',
            template: feedHTML,
            accessToken: '7487153442.8c403bb.d07e3d517a834e89b06de491b44eb051',
            limit: 9,
            before: function(){
      
              // get user data
              var url = 'https://api.instagram.com/v1/users/' + this.options.userId + '/?access_token=' + this.options.accessToken;

              $.ajax({
                method: 'GET',
                url: url,
                dataType: 'jsonp',
                jsonp: 'callback',
                success: function (response) {
                  // currently being replaced on each 'load more' button click
                  $('.post-count').html(response.data.counts.media);
                  $('.follower-count').html(response.data.counts.follows);
                  $('.following-count').html(response.data.counts.followed_by);
                }
              });
            },
            after: function() {
              console.log('after');

              var $headerContainer = $('.header-container'), 
                  $imagePost = $('.img-featured-container'),
                  totalImages = $imagePost.length,
                  $postModalContainer = $('.post-modal-container'),
                  $postModal = $('.post-modal'),
                  $postModalBackdrop = $('.post-modal-backdrop'),
                  counter = 0;
              
              console.log('totalImages', totalImages);
              for (var i = 1; i < totalImages; i++) {
                console.log('remove', i)
                $headerContainer.eq(i).remove();
                $('.header').prepend($headerContainer.eq(0));
                $postModalContainer.prepend($postModal);
              }
              
              
              TweenMax.staggerTo($imagePost, 0.5, {autoAlpha:1}, 0.02);
              
            }
          });
          
      feed.run(this.firstLoad());
    },
    methods: {
      scrolling: function() {
            $('#content').animate({
                scrollTop: $('#form').offset().top
            }, 1000);
        },
        email: function(event) {
            event.preventDefault();

            axios.post('/contact/email', this.form)
                .then(res => {
                    this.$toaster.success('Votre email a bien été envoyé !')
                })
        },
        firstLoad: function () {
        console.log('first load');
        
        var tl = new TimelineMax();
        tl.to('body', 0.3, {autoAlpha:1}, 1);
        tl.to('.instafeed-gallery', 0.3, {autoAlpha:1}, 0.2);
        tl.staggerFrom('span', 0.5, {autoAlpha:0, y:10}, 0.05);
        tl.from('.btn', 0.5, {autoAlpha:0, y:20, ease:Power2.easeOut}, 1.5);
      },
    }
}
</script>

<style lang="css">
.insta {
  margin-left: 15%;
  padding: 0.5%;
  -moz-background: -moz-linear-gradient(top, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
  -webkit-background: -webkit-linear-gradient(top, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
  background: linear-gradient(210deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
  height: 520px;
  width: 325px;
  float: left;
}

.fb {
  background-color: #3B5998;
  height: 520px;
  width: 325px;
  padding: 0.5%;
  float: right;
  margin-right: 15%;
}

h2 {
  margin-left:10%;
  text-align: center;
  width: 80%;
  font-size: 30pt;
  font-family: "Dancing Script";
}

.visit-card{
    width: 100%;
    height: 100%;
    overflow: hidden;
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

.instagram-media {
  background:#FFF;
  border:0;
  height: 99.5%;
  box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15);
  margin: 1px;
}

#imgBack {
  margin-top: 10px;
  background:#F8F8F8;
  line-height:0;
  margin-left: 0;
  margin-right: 0;
  float: left;
  text-align:center;
  width:33%;
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
  cursor: pointer;
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
  -moz-background: -moz-linear-gradient(top, #C0C0C0 0%, #DAA560 100%); 
  -webkit-background: -webkit-linear-gradient(top, #C0C0C0 0%,#DAA560 100%);
  background: linear-gradient(210deg, #C0C0C0 0%,#DAA560 100%);
  height: 80%;
  margin-top: 2%;
  padding: 0.5%;
}
  
@keyframes arrow{
  0%
    {opacity: 1;}
  100%
    {opacity: 0;
    transform: translate(-10px, -10px);}
}

/* Form */

.container-contact100 {
  width: 100%;  
  height: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 1;
}

.container-contact100::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.wrap-contact100 {
  width: 98%;
  height: 98%;
  background: #fff;
  border-radius: 5px;
  overflow: hidden;
  padding: 5%;

  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}


/*==================================================================
[ Form ]*/

.contact100-form {
  width: 100%;
  height: 100%;
}

.contact100-form-title {
  display: block;
  font-family: SourceSansPro-Bold;
  font-size: 30px;
  color: #333333;
  line-height: 1.2;
  text-align: left;
  margin-bottom: 2%;
}

/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 100%;
  position: relative;
  background-color: #fff;
  border-radius: 20px;
  margin-bottom: 30px;
}

.input100 {
  display: block;
  width: 100%;
  background: transparent;
  font-family: SourceSansPro-Bold;
  font-size: 16px;
  color: #4b2354;
  line-height: 1.2;
}


/*---------------------------------------------*/
input.input100 {
  height: 62px;
  padding: 0 20px 0 23px;
}


textarea.input100 {
  min-height: 199px;
  padding: 19px 20px 0 23px;
}

/*------------------------------------------------------------------
[ Focus Input ]*/

.focus-input100 {
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
  border-radius: 20px;
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.05);

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-input100 {
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.15);
}

/*------------------------------------------------------------------
[ Button ]*/
.container-contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 160px;
  height: 42px;
  background-color: #bd59d4;
  border-radius: 21px;

  font-family: JosefinSans-Bold;
  font-size: 14px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  padding-top: 5px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
  -moz-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
  -webkit-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
  -o-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
  -ms-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.5);
}

.contact100-form-btn:hover {
  background-color: #4b2354;
  box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
  -moz-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
  -webkit-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
  -o-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
  -ms-box-shadow: 0 10px 30px 0px rgba(189, 89, 212, 0.8);
}

/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 768px) {
  .wrap-contact100 {
    padding: 72px 50px 25px 50px;
  }
}

@media (max-width: 576px) {
  .wrap-contact100 {
    padding: 72px 15px 25px 15px;
  }
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate .focus-input100 {
  box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
  -moz-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
  -webkit-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
  -o-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
  -ms-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
}

.alert-validate::before {
  content: attr(data-validate);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  width: 100%;
  min-height: 62px;
  background-color: #fff;
  border-radius: 20px;
  top: 0px;
  left: 0px;
  padding: 0 45px 0 22px;
  pointer-events: none;

  font-family: SourceSansPro-Bold;
  font-size: 16px;
  color: #fa4251;
  line-height: 1.2;
}

.btn-hide-validate {
  font-family: Material-Design-Iconic-Font;
  font-size: 15px;
  color: #fa4251;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  height: 62px;
  top: 0px;
  right: 28px;
}

.rs1-alert-validate.alert-validate::before {
  background-color: #fff;
}

.true-validate::after {
  content: "\f269";
  font-family: Material-Design-Iconic-Font;
  font-size: 15px;
  color: #57b846;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  height: 62px;
  top: 0px;
  right: 28px;
}

/*---------------------------------------------*/
@media (max-width: 576px) {
  .alert-validate::before {
    padding: 0 30px 0 10px;
  }

  .true-validate::after,
  .btn-hide-validate {
    right: 10px;
  }
}


/*==================================================================
[ Contact more ]*/

.contact100-more {
  font-family: SourceSansPro-Regular;
  font-size: 16px;
  color: #999999;
  line-height: 1.5;
  text-align: center;
}

.contact100-more-highlight {
  color: #bd59d4;
}

input {
	outline: none;
	border: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}


input::-webkit-input-placeholder { color: #999999;}
input:-moz-placeholder { color: #999999;}
input::-moz-placeholder { color: #999999;}
input:-ms-input-placeholder { color: #999999;}

textarea::-webkit-input-placeholder { color: #999999;}
textarea:-moz-placeholder { color: #999999;}
textarea::-moz-placeholder { color: #999999;}
textarea:-ms-input-placeholder { color: #999999;}

/*---------------------------------------------*/
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}




</style>





<style lang="scss">


$postPadding: 0px;
$minWidth: 280px;
$maxWidth: 420px;

// general
@import url('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i');

// helper
.hide {
  display: none !important;
  opacity: 0 !important;
}

.show {
  display: block !important;
  opacity: 1 !important;
}

/* remove bootstrap gutter*/
.row.no-gutter {
  margin-left: 0;
  margin-right: 0;
}

.row.no-gutter [class*='col-']:not(:first-child),
.row.no-gutter [class*='col-']:not(:last-child) {
  padding-right: 0;
  padding-left: 0;
}

// the good stuff 
.instafeed-gallery {
  background: #fff;
  min-width: $minWidth;
  max-width: $maxWidth;
  width: 100%;
  margin: 0 auto;
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.15);
  border-radius: 2px;
  transition: all 0.2 ease;
  opacity: 0;
}

.header {
  width: 100%;
  height: 10%;
  p {
    margin: 0;
  }

  a {
    color: inherit;

    &:hover {
      color: #aaa;
      text-decoration: none;
    }
  }

  .header-container {
    text-align: center;
    padding: 15px 15px 0;

    .avatar {
      width: 20%;
      border-radius: 100%;
      margin: 0 auto;
      display: block;
    }

    .user-container {
      margin-top: 10px;
    }

    .name {
      font-size: 16px;
      font-weight: 600;
    }

    .username {
      color: #bbb;
      font-size: 16px;
    }
  }

  .meta {
    width: 100%;
    margin: 0;
    padding: 10px;
    display: table;

    li {
      text-align: center;
      width: 33%;
      display: table-cell;
    }

    span {
      display: block;  
    }

    .count {
      font-size: 20px;
      font-weight: 600;
    }

    .title {
      color: #bbb;
      font-size: 12px;
    }
  }
}

.post-modal-container {
  .post-modal {
    background: #fff;
    min-width: $minWidth;
    max-width: $maxWidth;
    margin: auto;
    top: 0;
    right: 0;
    left: 0;
    z-index: 9999;
    position: fixed;
    display: none;
    opacity: 0;
  }

  .btn-close {
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    width: 40px;
    height: 40px;
    top: 0;
    right: 0;
    position: absolute;
    cursor: pointer;

    &:hover {
      background: rgba(0, 0, 0, 0.7);
    }
  }

  .close-icon {
    font-size: 22px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    position: absolute;
  }

  img {
    width: 100%;
  }

  .post-modal-body {
    padding: 15px;
  }
  
  .post-modal-meta-container {
    margin-bottom: 10px;

    p {
      color: #bbb;
      display: inline-block;
      margin-right: 10px;
    }

    .icon {
      margin-right: 2px;
    }
  }

  .post-modal-caption-container {
  }

}

.post-modal-backdrop {
  background: rgba(0,0,0,0.7);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  position: fixed;
  z-index: 999;
  display: none;
  cursor: pointer;
}


// post
.img-featured-container {
  overflow: hidden;
  position: relative;
  padding: $postPadding;
  opacity: 0;
  cursor: pointer;
}

.img-featured-container img {
  width: 100%;
}

.img-featured-container .img-backdrop {
  background: linear-gradient(135deg, rgba(38, 163, 255, 0.85), rgba(83, 201, 179, 0.85));
  margin: 0;
  padding: $postPadding;
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s ease;
}

.img-featured-container:hover > .img-backdrop {
  opacity: 1;
}

// center text horizontally and vertically on image hover
.img-featured-container .description-container {
  color: #fff;
  font-size: 16px;
  line-height: 1.2;
  text-align: center;
  line-height: 20px;
  width: 100%;
  padding: 10px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
  transform-style: preserve-3d;
  transition: all .2s ease;
  z-index: 2;
  opacity: 0;
}

.img-featured-container .description-container .fa-instagram {
  font-size: 40px;
}

.img-featured-container .description-container p {
  font-weight: 300;
  margin-bottom: 0;
}

.img-featured-container:hover .description-container {
  opacity: 1;
}

.img-featured-container .description-container .likes,
.img-featured-container .description-container .comments {
  margin: 0 5px;
}
</style>
