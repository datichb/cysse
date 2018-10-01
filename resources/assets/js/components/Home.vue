<template>
  <div class="content">
      <div style="height: 20%;"></div>
      <div class="visit-card">
          <h2>
            <span></span>
            Cysse
            <span></span>
          </h2>
          <p class="Subtitle">
              Maison de plumasserie
          </p>
      </div>
      <div style="width: 100%;text-align: center;margin-top:5%;">
        <a target="_blank" href=""><img src="/icon/facebook-2.svg" width="50px" style="margin-right: 50px;"/></a>
        <a target="_blank" href="https://www.instagram.com/cyssemaisondeplumasserie/"><img src="/icon/instagram.svg" width="50px"/></a>
      </div>
      <blockquote>
        <q>
            Créatrice
        </q>
        <br>
        <q>
            L'art de la plumasserie, Dans vos tableaux. Par amour de la plume, Unique, Authentique. 
        </q>
      </blockquote>
  </div>
</template>

<script>
/* eslint-disable */
import 'web-animations-js'

export default {
  methods: {
    splitWords () {
      document.querySelector('blockquote').find('q').each(function(){
          quote[i].innerText.replace(/(<([^>]+)>)/ig, '');
          let quotewords = quote[i].innerText.split(' '),
            wordCount = quotewords.length;
          quote[i].innerHTML = '';
          for (let i = 0; i < wordCount; i++) {
            quote[i].innerHTML += '<span>' + quotewords[i] + '</span>';
            if (i < quotewords.length - 1) {
              quote[i].innerHTML += ' ';
            }
          }
          quotewords = document.querySelectorAll('blockquote q span');
          this.fadeWords(this, quotewords);
      });
    },
    getRandom (min, max) {
      return Math.random() * (max - min) + min;
    },
    fadeWords (comp, quotewords) {
      Array.prototype.forEach.call(quotewords, function (word) {
        let animate = word.animate([{
          opacity: 0,
          filter: 'blur(' + comp.getRandom(2, 5) + 'px)'
        },
        {
          opacity: 1,
          filter: 'blur(0px)'
        }],
        {
          duration: 1000,
          delay: comp.getRandom(500, 3300),
          fill: 'forwards'
        })
      })
    }
  },
  mounted () {
    this.splitWords();
  },
}
</script>

<style>

h2 {
    margin-left:30%;
    display: flex;
    align-items: center;
    width: 40%;
    font-size: 60pt;
    font-family: "Dancing Script";
}

h2 span {
    content:"";
    flex: 1 1 auto;
    border-top: 1px solid #000;
    margin: 20px;
}

.visit-card{
    width: 100%;
    height: 20%;
}

.Subtitle{
  margin-top: 1%;
  text-align: center;
  width: 100%;
  color: black;
  font-size: 30pt;
  font-family: "Sorts Mill Goudy";
}

blockquote{
  text-align: center;
  border-left: none;
  margin-top: 150px;
  font-size: 18pt;
  -webkit-transform-style: preserve-3d;
}
q{
  color: black;
}
cite{
  display: block;
  text-align: right;
  margin-top: 1rem;
  font-size: 18pt;
  color: black;
  font-style: normal;
}
blockquote q{
  font-family: "Sorts Mill Goudy";
  font-style: italic;
  letter-spacing: 1pt;
}
blockquote q span{
  will-change: opacity, filter;
  opacity: 0;
  filter: blur(0px);
  -webkit-filter: blur(0px);
}
q:before{
    display: none;
}
</style>
