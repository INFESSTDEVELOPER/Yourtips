
<?php
session_start();



if(!isset($_SESSION['login_user']))
{
 header("Location: index.html");
}

?>











<!doctype html>

<html lang="en">

<head>

  <!-- Basic -->
  <title>YourTips</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google-signin-client_id" content="529732867072-5dn6r25d6772m12mqt0ufgpfs0e76bci.apps.googleusercontent.com">
  <!-- Page Description and Author -->
  <meta name="description" content="mapas de servicios">


  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Css3 Transitions Styles  -->
  <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">

  <!-- Color CSS Styles  -->
 <link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />
 
  <!-- Margo JS  -->
  <script type="text/javascript" src = "http://maps.google.com/maps/api/js?sensor=false"></script> 
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

  <!--script type="text/javascript" src="js/jquery.migrate.js"></script-->
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<!-- no se si borraarlo -->
  <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>

  <!--para filtrar y ordenar la listas-->
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<!--nav movil-->
  <script type="text/javascript" src="js/jquery.slicknav.js"></script>
<!--mostrar y esconder elementos-->
  <!--script type="text/javascript" src="js/jquery.appear.js"></script-->

  <script type="text/javascript" src="js/jquery.textillate.js"></script>
  <script type="text/javascript" src="js/jquery.lettering.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax.js"></script>
  <script type="text/javascript" src="js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="js/jquery.slicknav.js"></script>
  <script type="text/javascript" src="js/jquery.bootstrap-growl.js"></script>
<script src="js/bootstrap-star-rating.js"></script>
    



<script type="text/javascript">
$(document).ready(function (e){


$("#ingreso").on('submit',(function(e){

e.preventDefault();
$.ajax({
url: "ingresoTips.php",
type: "POST",
data:  new FormData(this),
        async: false,
        cache: false,
        contentType: false,
        processData: false,
success: function(data){
	              setTimeout(function() {
                    $.bootstrapGrowl("ingreso Exitoso", {
                        type: 'info',
                        align: 'right',
                        stackup_spacing: 100,
                        offset: {from: 'bottom', amount: 400},
                    });
                }, 2);   

$("#ingreso")[0].reset();
var obj = $.parseJSON(data);
  

buscarDespuesInsertar(obj.categoria,obj.lat,obj.lng);
 
           
}//succes


});//ajax









}));//sumited


});
</script>





  <script type="text/javascript">

$( document ).ready(function() {

$("#ec-stars-wrapper li").click(function(){
      if($(this).is("li:first") && $(this).hasClass("selected") && !$(this).nextAll("li").hasClass("selected"))
      {
        // Si es la primera estrella la selecciona, y dicha estrella
        // esta marcada y es la unica marcada, quitamos la clase
        $(this).removeClass("selected");
 
        // añadimos al valor al formulario
        $("input[name=stars]").val(0);
      }else{
        // añadimos la clase "selected"
        $(this).addClass("selected");
 
        // añadimos la clase "selected" a todas las estrellas anteriores
        $(this).prevAll("li").addClass("selected");
 
        // eliminamos la clase "selected" a todas las estrellas siguientes
        $(this).nextAll("li").removeClass("selected");
 
        // añadimos al valor al formulario
        $("input[name=stars]").val($( "li" ).index($(this))+1);
      }
    });

$('#entrar').click(function() {

$('#buscador').modal('show');


});


$('#buscador').modal('show');





});


  </script>

  <script type="text/javascript">


function voto(num,id){



 var parametros = {
                "id_tips" : id,
                "id_usuario" : 1,
                "numero"  :num
        };


$.ajax({
                data:  parametros,
                url:   'ingresoScoring.php',
                type:  'post',
                beforeSend: function () {
              
                },
                success:  function (response) {

              console.log(response);
               
                },error:function (response) {
                  console.log(response);
                  
                }
        });

  




}

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

function initialize() {


  var map = new google.maps.Map(document.getElementById('map_canvas'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 16
  });

 var infoWindow = new google.maps.InfoWindow({map_canvas: map});
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      console.log(pos);

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }







  $.getJSON('selectCategorias.php', function(data) { 


            $.each( data, function(i, value) {


    $('#tipo').append(new Option(value.NOMBRE, value.NOMBRE));
    $('#tipoSelect').append(new Option(value.NOMBRE, value.NOMBRE));
    $('#tipoBuscador').append(new Option(value.NOMBRE, value.NOMBRE));

              
          

            });
});


}

function cargar() {


var geocoder = new google.maps.Geocoder();

var address = document.getElementById("direccion").value;
geocoder.geocode( { 'address': address}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {

  var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
$('#lat').val(latitude);
$('#lng').val(longitude);

    var mapOptions = {
center: new google.maps.LatLng(latitude, longitude),
zoom: 16,

mapTypeId: google.maps.MapTypeId.ROADMAP
};


    


var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
      var marker = new google.maps.Marker({
                  position: results[0].geometry.location,
                map: map,
                title: "text casa "
                }); 
       




      } else {
         
                setTimeout(function() {
                    $.bootstrapGrowl("Ingrese un direccion valida", {
                        type: 'info',
                        align: 'right',
                        stackup_spacing: 100,
                        offset: {from: 'bottom', amount: 400},
                    });
                }, 2);
          

      }
});

}


function buscarDespuesInsertar(tipo, lat,lng) {

var mapOptions = {
center: new google.maps.LatLng(-33.45, -70.6667),
zoom: 16,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);



var centerpoint = new google.maps.LatLng(lat,lng);
   

      map.setCenter(centerpoint);
var url='selectTipsFiltro.php?tipoSelect='+tipo;
  $.getJSON(url, function(data) { 

            $.each( data, function(i, value) {



  // InfoWindow content
  var content = '<div id="iw-container">' +
                    '<div class="iw-title">'+value.nombre+'</div>' +
                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">Descripcion</div>' +
                      '<img src="images/tips/'+value.image+'" alt="xdddd" height="115" width="83">' +
                      '<p>'+value.descripcion+'</p>' +
                      '<div class="iw-subTitle">Contacto</div>' +
                      '<p>'+value.direccion+
                      '<br>'+value.fono+'<br>'+value.correo+'<br></p>'+
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

  // A new Info Window is created and set content
  var infowindow = new google.maps.InfoWindow({
    content: content,

    // Assign a maximum value for the width of the infowindow allows
    // greater control over the various content elements
    maxWidth: 350
  });

                var myLatlng = new google.maps.LatLng(value.lat, value.lng);
              
                var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                icon:'images/marcadores/'+value.tipo+'.png'
                //title: '<b>'+value.tipo+"  "+value.nombre+'</b>'
                });



google.maps.event.addListener(marker, 'mouseover', function() {

	    infowindow.open(map,marker);
  });


   google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  // Event that closes the Info Window with a click on the map
  google.maps.event.addListener(map, 'click', function() {
    infowindow.close();
  });

  google.maps.event.addListener(infowindow, 'domready', function() {  

 var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
    var iwBackground = iwOuter.prev();
    // Removes background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({left: '2000px'});

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Moves the arrow 76px to the left margin.
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Changes the desired tail shadow color.
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

      // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
    if($('.iw-content').height() < 140){
      $('.iw-bottom-gradient').css({display: 'none'});
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });

  });


            });
}).success(function() {

 })
.error(function() { 
 })
.complete(function() { 


});
;


$('#buscador').modal('hide');

}




function buscar() {

var mapOptions = {
center: new google.maps.LatLng(-33.45, -70.6667),
zoom: 16,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
var data = $("#busqueda").serialize();
   


  $.getJSON('selectTipsFiltro.php?'+data, function(data) { 

            $.each( data, function(i, value) {


  // InfoWindow content
  var content = '<div id="iw-container">' +
                    '<div class="iw-title">'+value.nombre+'</div>' +
                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">Descripcion</div>' +
                      '<img src="images/tips/'+value.image+'" alt="xdddd" height="115" width="83">' +
                      '<p>'+value.descripcion+'</p>' +
                      '<div class="iw-subTitle">Contacto</div>' +
                      '<p>'+value.direccion+
                      '<br>'+value.fono+'<br>'+value.correo+'<br></p>'+
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

  // A new Info Window is created and set content
  var infowindow = new google.maps.InfoWindow({
    content: content,

    // Assign a maximum value for the width of the infowindow allows
    // greater control over the various content elements
    maxWidth: 350
  });

                var myLatlng = new google.maps.LatLng(value.lat, value.lng);
              
                var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                icon:'images/marcadores/'+value.tipo+'.png',
                title: '<b>'+value.tipo+"  "+value.nombre+'</b>'
                });

                 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  // Event that closes the Info Window with a click on the map
  google.maps.event.addListener(map, 'click', function() {
    infowindow.close();
  });


            });
});


$('#buscador').modal('hide');

}



function buscarPrincipal() {



var mapOptions = {
center: new google.maps.LatLng(-35.45, -70.6667),
zoom: 16,
mapTypeId: google.maps.MapTypeId.ROADMAP
};








var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {

      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

 console.log(pos);
      var marker = new google.maps.Marker({
    position: pos,
    title:"Mi Ubicación"
      });

      marker.setMap(map);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }






var data = $("#busquedaPrincipal").serialize();
   


  $.getJSON('selectTipsFiltro.php?'+data, function(data) { 


console.log(data);
            $.each( data, function(i, value) {
console.log(data);
  // InfoWindow content

if(value.valo=1){


}
if(value.valo=2){


}
if(value.valo=3){


 

}
if(value.valo=4){


 
}



  var content = '<div id="iw-container">' +
                    '<div class="iw-title">'+value.nombre+' </div>' +


                    '<div id="stars-green" data-rating="3" >'+

'</div>'+



                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">Descripcion</div>' +
                      '<img src="images/tips/'+value.image+'" alt="xdddd" height="115" width="83">' +
               
                      '<p>'+value.descripcion+'</p>' +
                      '<div class="iw-subTitle">Contacto</div>' +
                      '<p>'+value.direccion+
                      '<br>'+value.fono+'<br>'+value.correo+'<br></p>'+

                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

  // A new Info Window is created and set content
  var infowindow = new google.maps.InfoWindow({
    content: content,

    // Assign a maximum value for the width of the infowindow allows
    // greater control over the various content elements
    maxWidth: 350
  });

                var myLatlng = new google.maps.LatLng(value.lat, value.lng);
              
                var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                icon:'images/marcadores/'+value.tipo+'.png'
                //title: '<b>'+value.tipo+"  "+value.nombre+'</b>'
                });


google.maps.event.addListener(marker, 'mouseover', function() {

	    infowindow.open(map,marker);
  });



                 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  // Event that closes the Info Window with a click on the map
  google.maps.event.addListener(map, 'click', function() {
    infowindow.close();
  });

    google.maps.event.addListener(infowindow, 'domready', function() {  

 var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
    var iwBackground = iwOuter.prev();
    // Removes background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({left: '115px'});

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Moves the arrow 76px to the left margin.
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Changes the desired tail shadow color.
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

      // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
    if($('.iw-content').height() < 140){
      $('.iw-bottom-gradient').css({display: 'none'});
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });

  });


            });
});


$('#buscador').modal('hide');

}

  </script>


</head>

<body onload="initialize()">


  <div id="container">

    <div class="hidden-header"></div>
    <header class="clearfix">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <ul class="contact-details">
                <li><a href="#"><i class="fa fa-map-marker"></i> Dieciocho 715, Santiago, Chile</a>
                </li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> info@YourTips.com</a>
                </li>
                <li><a href="#"><i class="fa fa-phone"></i> +5679915715</a>
                </li>
              </ul>
            
            </div>
          
            <div class="col-md-5">
       
              <ul class="social-list">
                <li>
                  <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a class="dribbble itl-tooltip" data-placement="bottom" title="Dribble" href="#"><i class="fa fa-dribbble"></i></a>
                </li>
                <li>
                  <a class="linkdin itl-tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                </li>
                <li>
                  <a class="flickr itl-tooltip" data-placement="bottom" title="Flickr" href="#"><i class="fa fa-flickr"></i></a>
                </li>
                <li>
                  <a class="tumblr itl-tooltip" data-placement="bottom" title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a>
                </li>
                <li>
                  <a class="instgram itl-tooltip" data-placement="bottom" title="Instagram" href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a class="vimeo itl-tooltip" data-placement="bottom" title="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a>
                </li>
                <li>
                  <a class="skype itl-tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa-skype"></i></a>
                </li>
              </ul>
         
            </div>


          </div>
    
        </div>
  
      </div>
    

      <!-- Start  Logo & Naviagtion  -->
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="index.html">
             <font color="#0a9fd8">Your</font>
                <font color="black">Tips</font>
            </a>
          </div>
          <div class="navbar-collapse collapse">
        
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">

          
                 <li class="drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="position: relative;
    display: block;
    padding: 10px 15px;"><i class="fa fa-user"></i>
 <?php echo $_SESSION["login_user"]; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="signOut();" ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
          <li>
            <a class="active" href="index.html">Home</a>
           
          </li>
          <li>
            <a href="#service">Servicios</a>
          
          </li>
          <li>
            <a href="#">Que hacemos</a>
           
          </li>
          <li>
            <a href="portfolio-3.html">Portfolio</a>
            
          <li>
            <a href="blog.html">Blog</a>
            <ul class="dropdown">
              <li><a href="blog.html">Blog - right Sidebar</a>
              </li>
              <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a>
              </li>
              <li><a href="single-post.html">Blog Single Post</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="contact.html">Contact</a>
          </li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header Logo & Naviagtion -->

    </header>
    <!-- End Header Section -->


    <!-- Start Home Page Slider -->
<div id="container">
       <div id="floating-panel">
     



</div>




 <div id="buscador" class="modal fade" style="top: 100px;" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title animated infinite bounce">¡que deseas Buscar y en que lugar!</h4>
      </div>
      <div class="modal-body">
   <form id="busquedaPrincipal">
         <p>Categoria Tips</p>   <select id="tipoBuscador"  name="tipoSelect" >
 
     </select>
          <p>Direccion</p> 
        <input type="searh" value="Ej: bellas Artes, Santiago" name="s" id="s" placeholder="Direccion">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default " onclick="buscarPrincipal();"> Buscar
              <i class="fa fa-search"></i>
              
             </button>
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <div style="position: relative;">
    <div id="map_canvas" style="width: 1300px; height: 600px;"></div> 

    <button type="button" style="    position: absolute;top: 112px; " class="btn btn-info" data-toggle="collapse" data-target="#formContent">Agregar Tips </button>
    <button type="button" style="    position: absolute;top: 150px; " class="btn btn-info" data-toggle="collapse" data-target="#buscarTips">Buscar  Tips </button>
         
      <div id="formContent" style=" 
     background-color: rgba(255, 255, 255, 0.7);
          position: absolute; 
        top: 190px;
        width: 360px;
        height:200px;
        margin: 0 auto;" class="collapse">
          <form id="ingreso" action="ingresoTips.php" method="post"  enctype="multipart/form-data" >
<div class="addTips">

            <div class="row">
                    <div class="col-md-4">
                     <p>Direccion</p>
                    </div>
                    <div class="col-md-5">
                          <input  class="inputAdd" id="direccion" name="direccion" data-required="true" type="text" placeholder="Dieciocho 715, santiago" required>
                          <input id="lat" type="hidden" name="lat">
                       <input id="lng" type="hidden" name="lng">
      
                    </div>

                         <div class="col-md-3">
                   <input id="submit" type="button" onclick="cargar();" value="Buscar" />

                    </div>
             </div>

             <div class="row">

                        <div class="col-md-4">
                         <p>Nombre Tips</p>  
                        </div>
                        <div class="col-md-8">
                          <input id="nombre" class="inputAdd"  name="nombre" type="text" required/>
                        </div>
            </div>
           <div class="row">
               <div class="col-md-4">
                      <p>Categoria Tips</p>
                        </div>
                        <div class="col-md-8">
                     

            <select id="tipo" class="inputAdd" name="tipo" required></select>
                        </div>

           </div>
         
                 <div class="row">
               <div class="col-md-4">
                        <p>Fono</p>
                        </div>
                        <div class="col-md-8">
                     
         <input id="fono"  name="fono"  class="inputAdd"  type="text" required/>
                        </div>
           </div>
<div class="row">
               <div class="col-md-4">
     <p>Correo</p>
                        </div>
                        <div class="col-md-8">
                     
         <input id="correo" placeholder="user@example.cl"  name="correo" class="inputAdd"  type="email" required/ >
                        </div>
           </div>

           <div class="row">
               <div class="col-md-4">
    <p>Imagen</p>  
                        </div>
                        <div class="col-md-8">
                     
           <input type="file" class="file inputAdd" name="file" id="file " required />
                        </div>
           </div>
      

                <div class="row">
               <div class="col-md-4">
                          <p>Descripcion</p>
                          <h1 class="animated infinite bounce">Example</h1>
                        </div>
                        <div class="col-md-8">
                <textarea id="descripcion" class="inputAdd" name="descripcion" rows="3" required></textarea>     
    
                        </div>

           </div>
       

        <div class="row">
               <div class="col-md-4">
                      
                        </div>
                        <div class="col-md-8">
          
         <input id="submit" class="inputAdd" type="submit" value="Ingresar Tips"/>
                        </div>

           </div>
       
       
          
         
    
    
 



                    </div>
   </form>
   


    </div>
  </div>


     <div id="buscarTips"class="collapse" style=" 
        background-color: rgba(255, 255, 255, 0.7);
        position: absolute; 
        top: 190px;
        width: 450px;
        height:150px;
        margin: 0 auto;">
   <form id="busqueda">
    <p>Categoria</p> 
   <select id="tipoSelect" name="tipoSelect">
    <input id="submit" type="button" onclick="buscar();" value="Buscar">
 
     </select>
        </form>
    </div>
  </div>

  </div>



<form id="form1" runat="server">

</form>

    </section>



</body>

</html>