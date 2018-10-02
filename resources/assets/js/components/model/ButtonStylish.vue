<template>
    <ul id="district-buttons" ref="district">
        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit;opacity: 1;">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/03.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/03_over.png&quot;); "></div>
        </li>

        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit; opacity: 1;">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/04.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/04_over.png&quot;); "></div>
        </li>
        
        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit; opacity: 1;">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/06.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/06_over.png&quot;); "></div>
        </li>
        
        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit; opacity: 1; ">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/07.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/07_over.png&quot;); "></div>
        </li>
        
        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit; opacity: 1; ">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/09.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/09_over.png&quot;); "></div>  
        </li>
        
        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit; opacity: 1;">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/10.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/10_over.png&quot;); "></div>
        </li>
        
        <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" style="visibility: inherit; opacity: 1;">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/12.png&quot;); "></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/12_over.png&quot;); "></div>
        </li>
    </ul>
</template>
<script>
import {TweenMax, Power2, TimelineLite} from "gsap/TweenMax";

export default {
    data() {
        return {
            tagName: 'li',
            className: 'district-button',
            movable: false,
            isTweening: false,
            tween: null,
            ypos: 0,
            momentum: 0,
            curY: 0,
            delay: 0,
            isCombined: false,
            isLoading: false,
            direction: null
        }
    },
    mounted() {
        var target = this.$refs.district;
        var $over = $('.button-over');
        var $image = $('.button-image');

        TweenMax.set($('.button-load'), {y: -80});
        TweenMax.set($over, {x: 80});
        TweenMax.from(target, 1.2, {y: 150, autoAlpha: 0, ease: Quint.easeOut, delay: this.d});
    },
    methods: {
        onOver: function(e) {
            e.preventDefault();
            var target = $(e.currentTarget);
            
            var $over = target.children('.button-over');
            var $image = target.children('.button-image');
            /** the width and height of the current div **/
            var w = $(e.currentTarget).width();
            var h = $(e.currentTarget).height();
            var offsetTop = $('#district-buttons').offset().top;
            var offsetLeft = $('#district-buttons').offset().left;

            /** calculate the x and y to get an angle to the center of the div from that x and y. **/
            /** gets the x value relative to the center of the DIV and "normalize" it **/
            var x = (e.pageX - e.currentTarget.offsetLeft - (w/2)) * ( w > h ? (h/w) : 1 )- offsetLeft;
            var y = (e.pageY - e.currentTarget.offsetTop  - (h/2)) * ( h > w ? (w/h) : 1 ) - offsetTop;

            if (x <= 0 && y <= 0) {
                // top left
                TweenMax.fromTo($over, .33, {y: -80, x: 0}, {y: 0, ease: Quint.easeOut});
                TweenMax.to($image, .33, {y: 80, x: 0, ease: Quint.easeOut});
            }
            else if (x <= 0 && y >= 0) {
                // bottom left
                TweenMax.fromTo($over, .33, {x: -80, y: 0}, {x: 0, ease: Quint.easeOut});
                TweenMax.to($image, .33, {x: 80, y: 0, ease: Quint.easeOut});
            }
            else if (x >= 0 && y <= 0) {
                //top right
                TweenMax.fromTo($over, .33, {x: 80, y: 0}, {x: 0, ease: Quint.easeOut});
                TweenMax.to($image, .33, {x: -80, y: 0, ease: Quint.easeOut});
            }
            else {
                //bottom right
                TweenMax.fromTo($over, .33, {y: 80, x: 0}, {y: 0, ease: Quint.easeOut});
                TweenMax.to($image, .33, {y: -80, x: 0, ease: Quint.easeOut});
            }
        },
        onOut: function(e) {
            e.preventDefault();
            var target = $(e.currentTarget);
            var $over = target.children('.button-over');
            var $image = target.children('.button-image');
            /** the width and height of the current div **/
            var w = $(e.currentTarget).width();
            var h = $(e.currentTarget).height();
            var offsetTop = $('#district-buttons').offset().top;
            var offsetLeft = $('#district-buttons').offset().left;

            /** calculate the x and y to get an angle to the center of the div from that x and y. **/
            /** gets the x value relative to the center of the DIV and "normalize" it **/
            var x = (e.pageX - e.currentTarget.offsetLeft - (w/2)) * ( w > h ? (h/w) : 1 )- offsetLeft;
            var y = (e.pageY - e.currentTarget.offsetTop  - (h/2)) * ( h > w ? (w/h) : 1 ) - offsetTop;

            if (x <= 0 && y <= 0) {
                // top left
                TweenMax.to($over, .33, {y: -80, ease: Quint.easeOut});
            }
            else if (x <= 0 && y >= 0) {
                // bottom left
                TweenMax.to($over, .33, {x: -80, ease: Quint.easeOut});
            }
            else if (x >= 0 && y <= 0) {
                //top right
                TweenMax.to($over, .33, {x: 80, ease: Quint.easeOut});
            }
            else {
                //bottom right
                TweenMax.to($over, .33, {y: 80, ease: Quint.easeOut});
            }
            TweenMax.to($image, .6, {y:0, x: 0, ease: Quint.easeOut});
        },
        onClick: function(e) {
            if (App.subsection != this.model.get('district')) {
                this.isCombined = true;

                var target = this.$refs.district;

                var w = $(e.currentTarget).width();
                var h = $(e.currentTarget).height();
                var offsetTop = $('#district-buttons').offset().top;
                var offsetLeft = $('#district-buttons').offset().left;

                TweenMax.killAll(false, false, true);
                TweenMax.delayedCall(.1, this.onOut, [e]);
                this.onOut(e);

                /** calculate the x and y to get an angle to the center of the div from that x and y. **/
                /** gets the x value relative to the center of the DIV and "normalize" it **/
                var x = (e.pageX - e.currentTarget.offsetLeft - (w/2)) * ( w > h ? (h/w) : 1 )- offsetLeft;
                var y = (e.pageY - e.currentTarget.offsetTop  - (h/2)) * ( h > w ? (w/h) : 1 ) - offsetTop;

                if (x <= 0 && y <= 0) {
                    // top left
                    this.direction = 'tl';
                    TweenMax.fromTo($load, .33, {y: 80, x: 0}, {y: 0, ease: Quint.easeOut, delay: .1});
                }
                else if (x <= 0 && y >= 0) {
                    // bottom left
                    this.direction = 'bl';
                    TweenMax.fromTo($load, .33, {x: 80, y: 0}, {x: 0, ease: Quint.easeOut, delay: .1});
                }
                else if (x >= 0 && y <= 0) {
                    //top right
                    this.direction = 'tr';
                    TweenMax.fromTo($load, .33, {x: -80, y: 0}, {x: 0, ease: Quint.easeOut, delay: .1});
                }
                else {
                    //bottom right
                    this.direction = 'br';
                    TweenMax.fromTo($load, .33, {y: -80, x: 0}, {y: 0, ease: Quint.easeOut, delay: .1});
                }

                /* var link = 'districtheroes/' + this.model.get('district');
                App.router.navigate('/'+link, {trigger: true}); */
            }
        }
    }
}
</script>

<style lang="scss">
#district-buttons {
  position: absolute;
  right: 80px;
  top: 200px;
  width: 22%;
}

#district-buttons li {
  cursor: pointer;
  float: left;
  border: 1px solid rgba(239, 239, 239, 0.4);
  width: 80px;
  height: 80px;
  margin-right: 46px;
  /*50*/
  margin-bottom: -18px;
  /*15*/
  overflow: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
#district-buttons li:nth-child(3n + 1) {
  margin-left: 62px;
  /*65*/
}
#district-buttons li .button-image {
  background-image: url('/icon/collection/12.png');
  background-size: cover;
  width: 80px;
  height: 80px;
  position: absolute;
  top: 0;
  left: 0;
  overflow: hidden;
  pointer-events: none;
}
#district-buttons li .button-over {
  background-image: url('/icon/collection/04_over.png');
  background-size: cover;
  width: 80px;
  height: 80px;
  position: absolute;
  top: -1px;
  left: -1px;
  overflow: hidden;
  pointer-events: none;
}
#district-buttons li .button-load {
  width: 80px;
  height: 80px;
  position: absolute;
  background: #efefef;
  top: -1px;
  left: -1px;
  overflow: hidden;
  pointer-events: none;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden;
}
#district-buttons li .button-load .loader-icon {
  width: 50px;
  height: 50px;
  margin: 12px 19px;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden;
}
</style>


