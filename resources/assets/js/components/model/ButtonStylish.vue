<template>
    <div>
        <ul id="district-buttons" ref="district" >
            <li class="district-button" v-on:mouseover="onOver" v-on:mouseout="onOut" @click="onClick(item.id)" :key="item.id" v-for="item in nbCollection" style="visibility: inherit;opacity: 1;">
                <div class="button-image" :style="'background-image: url(&quot;' + item.icon + '&quot;);background-size: 100% 100%;'"></div>
                <div class="button-over" :style="'background-image: url(&quot;' + item.iconOver + '&quot;);background-size: 100% 100%;'"></div>
            </li>
        </ul>
    </div>
</template>
<script>
import {TweenMax, Power2, TimelineLite} from "gsap/TweenMax";

export default {
    props: {
        nbc: Array
    },
    data() {
        return {
            delay: 0,
            isCombined: false,
            direction: null,
            nbCollection: this.nbc
        }
    },
    mounted() {
        var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
            
        var target = this.$refs.district;
        var $over = $('.button-over');
        var $image = $('.button-image');

        if(isSafari) {
            TweenMax.set($('.button-load'), {"-webkit-perspective-origin": -80});
            TweenMax.set($over, {"-webkit-perspective-origin": 80});
        }else{
            TweenMax.set($('.button-load'), {y: -80});
            TweenMax.set($over, {x: 80});
        }
        
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
            var x = (e.pageX - e.currentTarget.offsetLeft - (w/2)) * ( w > h ? (h/w) : 1 ) - offsetLeft;
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
            var x = (e.pageX - e.currentTarget.offsetLeft - (w/2)) * ( w > h ? (h/w) : 1 ) - offsetLeft;
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
        onClick: function(id) {
            axios.post('/collection/show', {id: id})
                .then(res => {
                    this.$emit('newCollection', res.data)
                });
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
  border: 1px solid #DAA520;
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


