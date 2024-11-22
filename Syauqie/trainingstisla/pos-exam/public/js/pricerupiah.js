$(document).ready(function() {
    setTimeout(function() {
        new Cleave('#price', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            noImmediatePrefix: true
        });
    }, 100); // Tunggu 100ms sebelum menjalankan Cleave.js
});
