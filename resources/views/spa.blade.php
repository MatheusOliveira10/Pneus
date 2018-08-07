@extends('main')
@section('title', '| INICIO')
@section('content')

<div class="container">
<div class="row">
</div>

<div class="row">
        <div class="col"></div>
        <div class="col">

                <div class="card" style="width: 18rem;">
                        <video id="video"  class="align-middle" autoplay></video>
                        <div class="card-body">
                                <button id="snap">Registre</button>
                        </div>
                      </div>

                
                
        </div>
        <div class="col"></div>
</div>
</div>
<script>
var video = document.getElementById('video');
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
});

if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}
else if(navigator.getUserMedia) { 
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { 
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { 
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}

    </script>

@endsection
