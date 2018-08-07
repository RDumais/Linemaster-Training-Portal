$('#sidebarCollapse').on('click', function () {
    if ($(window).width() < 768){
        $('#sidebar').toggleClass('setMarginLeft');
        $('#sidebar').removeClass('active');
        $('#content').toggleClass('setLeft');
    }
    else{
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('fullWidth');
    }
});
