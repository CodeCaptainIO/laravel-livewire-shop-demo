// require('./bootstrap');
import 'alpinejs'

window.promptForAmount = function(message, cb) {
    const number = window.prompt(message);
    if (number && !isNaN(number)) {
        cb(parseInt(number));
    }
};
