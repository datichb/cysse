<template>
  <div class="content">
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
      <div style="width: 100%;text-align: center;margin-top:12%;">
        <a target="_blank" href="https://www.facebook.com/Cyssemaisondeplumasserie/"><img src="/icon/facebook-2.svg" width="50px" style="margin-right: 50px;"/></a>
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
  }
}
</script>

<style>

h2 {
    margin-left:26%;
    display: flex;
    align-items: center;
    width: 50%;
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
    margin-top: 7%;
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
