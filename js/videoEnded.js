var video = videojs('trainingVideo').ready(function(){
    var player = this;

    player.on('ended', function() {
        $("#completedBtn").removeAttr('disabled');
    });
});