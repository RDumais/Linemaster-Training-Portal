$( "#requiredTrainingMenu" ).on( "click", function() {
    if ($('#requiredTrainingMenu').attr('aria-expanded') === "true") {
        $('#requiredTrainingMenu > i').removeClass('fa-chevron-circle-up');
        $('#requiredTrainingMenu > i').addClass('fa-chevron-circle-down');
    }
    else{
        $('#requiredTrainingMenu > i').addClass('fa-chevron-circle-up');
        $('#requiredTrainingMenu > i').removeClass('fa-chevron-circle-down');
    }
});
$( "#completedTrainingMenu" ).on( "click", function() {
    if ($('#completedTrainingMenu').attr('aria-expanded') === "false") {
        $('#completedTrainingMenu > i').removeClass('fa-chevron-circle-down');
        $('#completedTrainingMenu > i').addClass('fa-chevron-circle-up');
    }
    else{
        $('#completedTrainingMenu > i').addClass('fa-chevron-circle-down');
        $('#completedTrainingMenu > i').removeClass('fa-chevron-circle-up');
    }
});

$( "#empNameHolder" ).on( "click", function() {
    if ($('#navbarDropdownMenuLink').attr('aria-expanded') === "false") {
        $('#empNameHolder > i').removeClass('fa-chevron-down');
        $('#empNameHolder > i').addClass('fa-chevron-up');
    }
    else{
        $('#empNameHolder > i').addClass('fa-chevron-down');
        $('#empNameHolder > i').removeClass('fa-chevron-up');
    }
});