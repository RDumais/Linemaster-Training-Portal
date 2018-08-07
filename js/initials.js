var myStr = $('#empNameHolder').html();
var matches = myStr.match(/\b(\w)/g);
$('#initialHolder').html(matches.join(''));