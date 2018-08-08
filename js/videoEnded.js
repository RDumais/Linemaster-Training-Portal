var video = videojs('my-video').ready(function(){
    var player = this;

    player.on('ended', function() {
        $("#completedBtn").removeAttr('disabled');
    });
});