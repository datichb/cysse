<template>
    <div id='preload' >
        <object id="svg-object" ref="preload" width="100px" data="icon/loader.svg" type="image/svg+xml"></object>
    </div>    
</template>
<script>
import {TweenMax, Power2, TimelineLite} from "gsap/TweenMax";

export default {
    data() {
        return {
            isCombined: false,
            isCompleted: false
        }
    },
    mounted() {
        var self = this;

        var target = this.$refs.preload;

        target.addEventListener("load",function(){
                this.isCombined = true;

                // get the inner DOM of alpha.svg
                var svgDoc = target.contentDocument;
                // get the inner element by id
                var $middle = svgDoc.getElementById('middle-triangle');
                var $right = svgDoc.getElementById('right-triangle');
                var $left = svgDoc.getElementById('left-triangle');
                var $top = svgDoc.getElementById('top-triangle');

                $middle.style.fill = '#C0C0C0';

                TweenMax.from($top, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ:  Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, y: -25, ease: Quint.easeOut, delay: .6});
                TweenMax.from($middle, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, ease: Quint.easeOut, delay: .8});
                TweenMax.from($left, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: -25, y: -25, ease: Quint.easeOut, delay: 1});
                TweenMax.from($right, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: 25, y: 25, ease: Quint.easeOut, delay: 1.2, onComplete: $.proxy(self.onPulse, self)});
            }, false);
    },
    methods: {
        onPulse: function() {
            console.log(this.isCombined);
            var target = this.$refs.preload;
            var self = this;

            var svgDoc = target.contentDocument;
            // get the inner element by id
            var $right = svgDoc.getElementsByClassName('right-triangle');
            var $left = svgDoc.getElementsByClassName('left-triangle');
            var $top = svgDoc.getElementsByClassName('top-triangle');
            var $middle = svgDoc.getElementsByClassName('middle-triangle');

            if (this.isCombined) {
                this.isCombined = false;
                TweenMax.to($top, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ:  Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, y: -25, ease: Quint.easeIn, delay: .4});
                TweenMax.to($middle, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, ease: Quint.easeIn, delay: .5});
                TweenMax.to($left, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: -25, y: -25, ease: Quint.easeIn, delay: .6});
                if (!this.isCompleted)
                    TweenMax.to($right, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: 25, y: 25, ease: Quint.easeIn, delay: .7, onComplete: $.proxy(this.onPulse, this)});
                else
                    TweenMax.to($right, .6, {opacity: 0, transformOrigin: '50% 50%', rotationZ: Math.random() * 90 - 45, rotationY: Math.random() * 90 - 45, scale: .2, x: 25, y: 25, ease: Quint.easeIn, delay: .7, onComplete: $.proxy(this.onTransitionOutComplete, this)});
            }
            else {
                this.isCombined = true;
                TweenMax.to($top, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, y: 0, ease: Quint.easeOut, delay: .4});
                TweenMax.to($middle, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, ease: Quint.easeOut, delay: .6});
                TweenMax.to($left, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, x: 0, y: 0, ease: Quint.easeOut, delay: .8});
                TweenMax.to($right, .8, {opacity: 1, transformOrigin: '50% 50%', rotationZ: 0, rotationY: 0, scale: 1, x: 0, y: 0, ease: Quint.easeOut, delay: 1, onComplete: $.proxy(this.onPulse, this)});
            }
        },
        transitionOut: function() {
            this.isCompleted = true;
        },
        onTransitionOutComplete: function() {
            //TweenMax.to('#preload', .8, {y: -$(window).height(), ease: Quint.easeInOut, onComplete: this.close});
        }
    }
}
</script>
<style>

</style>


