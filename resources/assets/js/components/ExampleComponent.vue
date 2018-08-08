<template>
  <div class="content">
    <div class="visit-card">
        <p style="font-size: 20pt;">CYSSE</p>
        <div style="margin-left: 75px;width: 550px;height: 15px; border-bottom: 2px solid white; text-align: center">
          <span class="Subtitle">
            Maison de plumasserie
          </span>
        </div>
    </div>
    <blockquote>
      <q>
        <p>Cysse l'esprit tableau,
            L'art de la plumasserie,
            Des tableau doux,
            Plus Haut et plus Loin avec un Tableau,
            Attention vous allez être Tableauïsez,
            Par amour de la plume,
            Seul et unique,
            Authentique.
            </p>
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
      let quote = document.querySelector('blockquote q');
      quote.innerText.replace(/(<([^>]+)>)/ig, '');
      let quotewords = quote.innerText.split(' '),
        wordCount = quotewords.length;
      quote.innerHTML = '';
      for (let i = 0; i < wordCount; i++) {
        quote.innerHTML += '<span>' + quotewords[i] + '</span>';
        if (i < quotewords.length - 1) {
          quote.innerHTML += ' ';
        }
      }
      quotewords = document.querySelectorAll('blockquote q span');
      this.fadeWords(this, quotewords);
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
.visit-card{
    margin-top: 100px;
    width: 700px;
    height: 200px;
    margin-left: 25%;
}

.slogant{
    width: 300px;
    margin-left: 39%;
    margin-top: 8%;
}

.Subtitle{
  font-size: 20px;
  padding: 0 60px;
  color: black;
}

blockquote{
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
  font-family: Verdana, Arial, sans-serif;
  margin-top: 1rem;
  font-size: 18pt;
  color: black;
  font-style: normal;
}
blockquote q{
  font-family: Georgia, serif;
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
