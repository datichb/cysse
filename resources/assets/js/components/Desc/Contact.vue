<template>
  <div class="content">
    <div style="height: 10%;"></div>
    <div class="visit-card">
        <h2>
          <span></span>
          Cysse
          <span></span>
        </h2>
        <p class="Subtitle">
            Contact
        </p>
    </div>
  </div>
</template>

<script>
/* eslint-disable */
import 'web-animations-js'

export default {
  
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

.text {
  margin-left: 15%;
  width: 70%;
  text-align: center;
}

.text span {
  font-size: 14pt;
  font-family: "Sorts Mill Goudy";
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
