$(document).ready(function () {
    setTimeout('obterLocalNavegador();', 5000);
});

function obterLocalNavegador() {
    if (window.location.protocol == 'https:' && navigator.geolocation) {
        var options = {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
        }

        var success = function (location) {
            $.ajax({type: "GET",
                url: window.location.href+'adm_gerencia/estrutura/estatisticas/class.Visitante.php?updateLocal&v=' + $('#visita').val() + '&lat=' + location.coords.latitude + '&lon=' + location.coords.longitude + '&pre=' + location.coords.accuracy
            });
        }

        var error = function (erro) {

        }
        navigator.geolocation.getCurrentPosition(success, error, options);
    }
}