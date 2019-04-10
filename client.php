<?php require "header.php"; ?>

<section class="section">
    <div id="log" class="container">
        <p>Attendo di stabilire la posizione geografica...</p>
       <img src="gif_caricamento.gif">
    </div>
</section>

<script>

function positionHandler(position) {
    console.log(position.coords.latitude, position.coords.longitude);
    $('#log').append('<p>Posizione acquisita: '+position.coords.latitude+', '+position.coords.longitude+'</p>');
    $.ajax({
        type: 'POST',
        url: 'api-position.php',
        data: JSON.stringify({
            lat: position.coords.latitude,
            lon: position.coords.longitude
        }),
        success: function(data) { $('#log').append('<p>Posizione inviata al server</p>'); },
        error: function(){ $('#log').append('<p>Errore invio posizione al server</p>'); },
        contentType: "application/json",
        dataType: 'json'
    });
}

function errorHandler(error) {
    console.error(error);
    alert(error.message);
}

var geo_options = {
    enableHighAccuracy: true,
    maximumAge: 0,
    timeout: 27000
};

if ("geolocation" in navigator) {
    var watchID = navigator.geolocation.watchPosition(positionHandler, errorHandler, geo_options);
} else {
  alert('Il tuo browser non supporta la geolocalizzazione');
}

</script>

<?php require "footer.html"; ?>
