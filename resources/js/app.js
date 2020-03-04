// require('./bootstrap');
import 'alpinejs'

window.promptForAmount = function($dispatch, message) {
    const number = window.prompt(message);
    if (number && !isNaN(number)) {
        $dispatch('input', parseInt(number));
    }
};
