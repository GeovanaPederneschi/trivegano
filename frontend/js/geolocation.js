
function getLocation(){
    var options = {
    enableHighAccuracy: true,
    timeout: 3000,
    maximumAge: 0};

if('geolocation' in navigator){
    const watchId = navigator.geolocation.getCurrentPosition(function(position){
        // var coords= `Latitude:${position.coords.latitude}   Logintude:${position.coords.longitude}  Precisao em metros:
        //${position.coords.accuracy}`;

         var coords={
            'latitude':`${position.coords.latitude}`,
            'longitude':`${position.coords.longitude}`
         }

         var dados = JSON.stringify(coords);
         console.log(dados);
         UIkit.modal('#modal-center4').show();

          $.ajax({
            url: 'http://localhost/www/Oficial/frontend/geolocation.php',
            method: 'POST',
            data:{data:dados},
            success: function(result){
                //console.log(result);
                
                //console.log('FOIIIII');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('se lascou');
            }
        }); 
        
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

