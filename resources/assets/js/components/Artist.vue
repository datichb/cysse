<template>
  <div class="content">
    <div class="visit-card">
        <div class="line">
          <p class="Title">Cysse</p>
        </div>
        <p class="Subtitle">
            L'artiste
        </p>
    </div>
    <div>

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
.Title {
  font-size: 60pt;
  font-family: "Dancing Script";
  width: 45%;
  margin-left: 27.5%;
  text-align: center;
  margin-top: -12.5%;
  background-color:white;
}

.line {
  width: 40%;
  margin-left: 30%;
  height: 0%;
  border: solid;
  overflow: visible;
}

.visit-card{
    margin-top: 15%;
    width: 100%;
    height: 200px;
}

.slogant{
    width: 300px;
    margin-left: 39%;
    margin-top: 8%;
}

.Subtitle{
  margin-top: 3%;
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
