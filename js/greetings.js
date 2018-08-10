const hours = new Date().getHours();
let message;
const morning = ('Good morning');
const afternoon = ('Good afternoon');
const evening = ('Good evening');

if (hours >= 0 && hours < 12) {
    message = morning;

} else if (hours >= 12 && hours < 17) {
    message = afternoon;

} else if (hours >= 17 && hours < 24) {
    message = evening;
}

$('#greeting').append(message);