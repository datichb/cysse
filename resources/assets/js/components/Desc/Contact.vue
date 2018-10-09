<template>
  <div id="content" class="content">
    <div class="visit-card">
        <h2>Rejoignez-nous sur les réseaux sociaux !</h2>
        <div class="row" style="margin-top: 5%;width: 100%;">
          <div id="instafeed" class="insta col-md-4 col-md-offset-1">
          </div>
          <div class="fb col-md-4 col-md-offset-2">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCyssemaisondeplumasserie%2F&tabs=timeline&width=400&height=650&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=255095238530504" 
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
                  <button class="contact100-form-btn">
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

export default {
    data() {
        return {
          form: {
              fullname: null,
              email: null,
              message: null
          }
        }
    },
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
        },
        email: function() {
            axios.post('contact/email', this.form)
                .then(res => {

                })
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
