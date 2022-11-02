




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

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}

function geodecode(lat,lon){
    var key = "AIzaSyBzQCRKSKFi7AwHMynJuFb_aa4NH7l6-qM";

    axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
// https://maps.googleapis.com/maps/api/geocode/json?latlng=-23.7059873,-46.622282
//&key=AIzaSyBzQCRKSKFi7AwHMynJuFb_aa4NH7l6-qM
    params:{
        latlng: lat + ',' + lon,
        key: key
    }

    })
    .then(function(response){
        //console.log(response);
        var endereco = `${response.data.results[0].formatted_address}`;
        var cep = `${response.data.results[0].address_components[6].long_name}`;
        createCookie("endereco", endereco);
        createCookie("cep", cep);
        //console.log(endereco);
        if ( $( " #mostrar-local .local" ).length == 0) { 
            $('#mostrar-local').prepend('<div class="local"><span>' + endereco + '</span></div>');
        }
        
    })
    .catch(function(error){
        console.log(error);
    });
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
        
        createCookie("latitude", latitude);
        createCookie("longitude", longitude);
        //endereco='';
        geodecode(getCookie('latitude'),getCookie('longitude'))
        //console.log(getCookie('latitude'));
        UIkit.modal('#modal-center4').show();
         console.log('cokkie');
         //console.log(res)


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