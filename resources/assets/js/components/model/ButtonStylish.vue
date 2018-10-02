<template>
    <ul id="district-buttons" style="top: 306px;">
        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/03.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/03_over.png&quot;); transform: matrix(1, 0, 0, 1, 0, 80);"></div>
        </li>

        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/04.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/04_over.png&quot;); transform: matrix(1, 0, 0, 1, 80, 0);"></div>
        </li>
        
        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/06.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/06_over.png&quot;); transform: matrix(1, 0, 0, 1, -80, 0);"></div>
        </li>
        
        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/07.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/07_over.png&quot;); transform: matrix(1, 0, 0, 1, 0, -80);"></div>
        </li>
        
        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/09.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/09_over.png&quot;); transform: matrix(1, 0, 0, 1, 0, 80);"></div>
            
        </li>
        
        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/10.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/10_over.png&quot;); transform: matrix(1, 0, 0, 1, 0, -80);"></div>
        
        </li>
        
        <li class="district-button" style="visibility: inherit; opacity: 1; transform: matrix(0.70711, -0.7071, 0.7071, 0.70711, 0, -22);">
            <div class="button-image" style="background-image: url(&quot;/icon/collection/12.png&quot;); transform: matrix(1, 0, 0, 1, 0, 0);"></div>
            <div class="button-over" style="background-image: url(&quot;/icon/collection/12_over.png&quot;); transform: matrix(1, 0, 0, 1, 80, 0);"></div>
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
    },
    methods: {
        transitionIn: function(d) {
            var self = this;
            var $target = $(this.el);
            var $over = $target.find('.button-over');
            var $image = $target.find('.button-image');

            $image.css('background-image', 'url('+ App.baseURL + this.model.get('buttonImage') + ')');
            $over.css('background-image', 'url('+ App.baseURL + this.model.get('buttonOver') + ')');

            TweenMax.set($target.find('.button-load'), {y: -80});
            TweenMax.set($over, {x: 80});
            TweenMax.from($target, 1.2, {y: 150, autoAlpha: 0, ease: Quint.easeOut, delay: d});

            setTimeout(function() { self.movable = true}, 4000);
            setInterval($.proxy(this.moveIcon, this), 10);
        },
        onOver: function(e) {
            if (this.isLoading)
                return;

            e.preventDefault();
            var $target = $(e.currentTarget);
            var $over = $target.find('.button-over');
            var $image = $target.find('.button-image');
            if (device.desktop()) {
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
            }else{
                TweenMax.set($over, {x:0, y: 0});
            }
        },
        onOut: function(e) {
            if (this.isLoading)
                return;

            e.preventDefault();
            var target = $(e.currentTarget);
            var $over = target.find('.button-over');
            var $image = target.find('.button-image');
            if (device.desktop()) {
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
            }else{
                TweenMax.set($over, {x:-80, y: 0});
            }
        },
        moveIcon: function() {
            if (this.movable) {
                var $target = $(this.el);
                var dist = this.curY - this.ypos;
                
                this.momentum -= dist;
                this.momentum *= .03;// + (this.delay * .005);

                this.curY += this.momentum;
                // TweenMax.set($target, {y: this.curY});
                // disty = follower.y - mouseY;
                // momentumx -= distx / 3;
                // momentumy -= disty / 3;

                // // dampen the momentum a little
                // momentumx *= 0.75;
                // momentumy *= 0.75;

                // // go get that mouse!
                // follower.x += momentumx;
                // follower.y += momentumy;
            }
        },
        move: function(ypos, delay) {
            if (this.movable && !this.isTweening) {
                var self = this;
                var $target = $(this.el);
                this.ypos = ypos;
                this.delay = delay;
                TweenMax.killTweensOf($target);
                TweenMax.to($target, 1, {y: ypos, ease: Quint.easeOut});
                // var $target = $(this.el);
                // if (this.ypos < ypos)
                //     delay = 7 - delay;
                // var time = Math.max(.8, Math.abs((this.ypos - ypos)/120));
                // this.tween = new TweenMax.to($target, .8 + delay * .15, {y: ypos, ease: Quint.easeOut});
                // this.ypos = ypos;
                // this.isTweening = true;
                // var $target = $(this.el);
                // TweenMax.killTweensOf($target);
                // this.tween = new TweenMax($target, .85, {y: ypos, ease: Back.easeOut, delay: delay * .05});
                // 
                // this.movable = false;
                // setTimeout(function() { self.movable = true; self.isTweening = false; },  1300);
            } else if (this.isTweening) {
                // this.tween.updateTo({y: ypos, delay: 0}, false);
            }
        },
        onClick: function(e) {
            if (App.subsection != this.model.get('district')) {
                this.isCombined = true;

                this.isLoading = true;
                var $target = $(this.el);
                var $load = $target.find('.button-load');
                var $middle = $load.find('.middle-triangle');
                var $right = $load.find('.right-triangle');
                var $left = $load.find('.left-triangle');
                var $top = $load.find('.top-triangle');

                var w = $(e.currentTarget).width();
                var h = $(e.currentTarget).height();
                var offsetTop = $('#district-buttons').offset().top;
                var offsetLeft = $('#district-buttons').offset().left;

                TweenMax.killAll(false, false, true);
                TweenMax.killTweensOf($load);
                TweenMax.killTweensOf($right);
                TweenMax.killTweensOf($left);
                TweenMax.killTweensOf($top);
                TweenMax.killTweensOf($middle);
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

                TweenMax.from($top, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ:  Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, y: -25, ease: Quint.easeOut, delay: .6});
                TweenMax.from($middle, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, ease: Quint.easeOut, delay: .8});
                TweenMax.from($left, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: -25, y: -25, ease: Quint.easeOut, delay: 1});
                TweenMax.from($right, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: 25, y: 25, ease: Quint.easeOut, delay: 1.2, onComplete: $.proxy(this.onPulse, this)});

                var link = 'districtheroes/' + this.model.get('district');
                App.router.navigate('/'+link, {trigger: true});
            }
        },
        onPulse: function() {
            if (device.desktop()) {
                var $target = $(this.el);
                var $load = $target.find('.button-load');
                var $right = $load.find('.right-triangle');
                var $left = $load.find('.left-triangle');
                var $top = $load.find('.top-triangle');
                var $middle = $load.find('.middle-triangle');

                if (this.isCombined) {
                    this.isCombined = false;
                    TweenMax.to($top, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ:  Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, y: -25, ease: Quint.easeIn, delay: .4});
                    TweenMax.to($middle, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, ease: Quint.easeIn, delay: .5});
                    TweenMax.to($left, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: -25, y: -25, ease: Quint.easeIn, delay: .6});
                    TweenMax.to($right, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: 25, y: 25, ease: Quint.easeIn, delay: .7, onComplete: $.proxy(this.onPulse, this)});
                }
                else {
                    this.isCombined = true;
                    TweenMax.to($top, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, y: 0, ease: Quint.easeOut, delay: .4});
                    TweenMax.to($middle, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, ease: Quint.easeOut, delay: .6});
                    TweenMax.to($left, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, x: 0, y: 0, ease: Quint.easeOut, delay: .8});
                    TweenMax.to($right, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, x: 0, y: 0, ease: Quint.easeOut, delay: 1, onComplete: $.proxy(this.onPulse, this)});
                }
            };
        },
        hideLoad: function() {
            var $target = $(this.el);
            var $load = $target.find('.button-load');
            var $right = $load.find('.right-triangle');
            var $left = $load.find('.left-triangle');
            var $top = $load.find('.top-triangle');
            var $middle = $load.find('.middle-triangle');

            this.isLoading = false;
            TweenMax.killAll(false, false, true);
            TweenMax.killTweensOf($load);
            TweenMax.killTweensOf($right);
            TweenMax.killTweensOf($left);
            TweenMax.killTweensOf($top);
            TweenMax.killTweensOf($middle);
            if (this.direction === 'tl')
                TweenMax.to($load, .33, {y: 80, x: 0, ease: Quint.easeOut});
            else if (this.direction === 'bl')
                TweenMax.to($load, .33, {y: 0, x: 80, ease: Quint.easeOut});
            else if (this.direction === 'tr')
                TweenMax.to($load, .33, {y: 0, x: -80, ease: Quint.easeOut});
            else
                TweenMax.to($load, .33, {y: -80, x: 0, ease: Quint.easeOut});
        }
    }
}
</script>

<style lang="scss">
#heroes-extended .container #district-buttons {
  position: absolute;
  right: 150px;
  top: 320px;
  width: 280px;
}
#heroes-extended .container #district-buttons li {
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
#heroes-extended .container #district-buttons li:nth-child(3n + 1) {
  margin-left: 62px;
  /*65*/
}
#heroes-extended .container #district-buttons li .button-image {
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
#heroes-extended .container #district-buttons li .button-over {
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
#heroes-extended .container #district-buttons li .button-load {
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
#heroes-extended .container #district-buttons li .button-load .loader-icon {
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


