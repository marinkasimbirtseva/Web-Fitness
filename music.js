

var audio = $("#sound")[0];
$("#container").mouseenter(function() {
  audio.play();
}).mouseleave(function() {
  audio.pause();
});

