<?php
echo"
<script>  
function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toGMTString();
    }
    else {
        expires = '';
    }
      
    document.cookie = escape(name) + '=' + 
        escape(value) + expires + '; path=/';
}

function getLocation(){
    var options = {
    enableHighAccuracy: true,
    timeout: 3000,
    maximumAge: 0};

if('geolocation' in navigator){
    const watchId = navigator.geolocation.getCurrentPosition(function(position){
            var latitude = `${position.coords.latitude}`;
            var longitude =  `${position.coords.longitude}`;
        
        createCookie('latitude', latitude, '10');
        createCookie('longitude', longitude, '10');

        
        UIkit.modal('#modal-center4').show();
        ". include('../get_directions.php')."

    },function error(){
        
        $('#message').css('display','block');
        $('.message .close')
        .on('click', function() {
            $('#message')
            .css('display','none')
            ;
        });
        //console.log(error);
    },options
)}
}
</script>";
?>