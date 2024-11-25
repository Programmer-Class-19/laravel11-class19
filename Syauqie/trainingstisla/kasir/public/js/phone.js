document.addEventListener("DOMContentLoaded", function() {
    var input = document.querySelector("#contact"); // Pilih input telepon
    var iti = window.intlTelInput(input, {
        initialCountry: "auto", // Menentukan negara default berdasarkan lokasi pengguna
        geoIpLookup: function(callback) {
            fetch("https://ipinfo.io", { method: "GET" })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    var countryCode = data.country ? data.country : "us";
                    callback(countryCode);
                });
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.8/build/js/utils.js"
    });
});
