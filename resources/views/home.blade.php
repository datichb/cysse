@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body" style="background-color: black;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <canvas id="glCanvas" width='640' height="480"></canvas>
                    <script id="vertex-shader" type="x-shader/x-vertex">
                        attribute vec2 aVertexPosition;

                        uniform vec2 uScalingFactor;
                        uniform vec2 uRotationVector;

                        void main() {
                            vec2 rotatedPosition = vec2(
                            aVertexPosition.x * uRotationVector.y +
                                    aVertexPosition.y * uRotationVector.x,
                            aVertexPosition.y * uRotationVector.y -
                                    aVertexPosition.x * uRotationVector.x
                            );

                            gl_Position = vec4(rotatedPosition * uScalingFactor, 0.0, 1.0);
                        }
                    </script>

                    <script id="fragment-shader" type="x-shader/x-fragment">
                        #ifdef GL_ES
                            precision highp float;
                        #endif

                        uniform vec4 uGlobalColor;

                        void main() {
                            gl_FragColor = uGlobalColor;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection