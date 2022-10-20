
function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
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
        
        createCookie("latitude", latitude, "10");
        createCookie("longitude", longitude, "10");
        UIkit.modal('#modal-center4').show();
        


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

 //var dados = JSON.stringify(coords);
        //  console.log(dados);
        

        //   const xhttp = new XMLHttpRequest();

        //   xhttp.onload = function(){
        //      UIkit.modal('#modal-center4').show();
        //   }

        //   xhttp.open('POST', 'http://localhost/www/Oficial/frontend/geolocation.php');
        //   xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        //   xhttp.send('array='+coords);


        // $.ajax({
        //     url: 'http://localhost/www/Oficial/frontend/geolocation.php',
        //     method: 'POST',
        //     data: {data:dados},
        //     //contentType: 'application/json; charset=utf-8',
        //     //dataType: 'json',
        //     success: function(result){
        //         console.log(result);
                
        //         console.log('FOIIIII');
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         console.log(errorThrown);
        //     }
        // });