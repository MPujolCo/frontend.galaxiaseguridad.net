<body>
  <?php
    require 'php/body/preloader.php';
  ?>
  <div id="sections" class="noheight">
    <?php
      require 'php/body/header.php';
      require 'php/body/navbar.php';
      require 'php/body/slider.php';
      require 'php/body/tabs.php';
      require 'php/body/logoSlider.php';
      require 'php/body/portafolio.php';
      require 'php/body/aliados.php';
      require 'php/body/cards.php';
      require 'php/body/social.php';
      require 'php/body/contact.php';
      require 'php/body/footer.php';
    ?>
  </div>

  <!-- FUENTES -->
  <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' type='text/css'>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- SCRIPTS -->
  <!-- JQUERY -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <!-- HAMMER -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
  <!-- SLIDER LOGOS-->
  <script type="text/javascript" src="js/jssor.min.js"></script>
  <script type="text/javascript" src="js/jssor.slider.min.js"></script>
  <script type="text/javascript" src="js/logoSlider.min.js"></script>
  <!-- FORM CONTACT -->
  <script src="js/forms.min.js"></script>
  <!--MAP -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <script type="text/javascript">
    $(document).on("scroll",function(){
      if ($(document).scrollTop()>180 && $(window).width()>600){
          $(".navbar-fixed").removeClass("hide");
      } else{
          $(".navbar-fixed").addClass("hide");
      }
      if ($(document).scrollTop()>220 && $(window).width()<=600){
          $("#mobileMenuIcon").removeClass("hide");
      } else{
          $("#mobileMenuIcon").addClass("hide");
      }
    });

    $(document).ready(function(){
      $(window).scroll( function(){
        //FADEIN EFFECT
        $('.slideDown').each( function(i){            
          var bottom_of_object = $(this).offset().top + ($(this).outerHeight() * 0.5) - 300;
          var bottom_of_window = $(window).scrollTop() + $(window).height();
              
          if( bottom_of_window > bottom_of_object ){
            $(this).addClass('in-view');
          }            
        });
        $('.slideUp').each( function(i){            
          var bottom_of_object = $(this).offset().top + ($(this).outerHeight() * 1.5) + 300;
          var bottom_of_window = $(window).scrollTop() + $(window).height();
              
          if( bottom_of_window > bottom_of_object ){
            $(this).addClass('in-view');
          }            
        });
      });

      $(".button-collapse").sideNav();

      //HEADER BUTTON
      $('.dropdown-button').dropdown({
          belowOrigin: true
        }
      );

      $('.slider').slider({full_width: true, interval: 8000});

      //SCROLLSPY
      $("body").scrollspy({
        target: ".nav-wrapper",
        offset: 65
      });
      //BOOTSTRAP SCOLLSPY
      linkInterno = $('.nav a[href^="#"]');
      linkInterno.on('click',function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $('html, body').animate({ scrollTop : $( href ).offset().top - 60 }, 'slow', 'easeInOutExpo');
      });
      $('ul.tabs').tabs();
      $('.parallax').parallax();
      //MODAL
      $('.modal-trigger').leanModal();
      $('.closeModal').click(function(){
        $('.modal.open').closeModal();
      });
      $('.collapsible').collapsible();
      logoSlider();

      // CONTACT
      function initialize() {
          var isDraggable = $(document).width() > 600 ? true : false;
          var myLatlng = new google.maps.LatLng(6.246280, -75.593331);
          var loc = new google.maps.LatLng(6.242909, -75.593422);
          var mapOptions = {
              zoom: 15,
              center: myLatlng,
              draggable: isDraggable,
              scrollwheel: false
          };
          var map = new google.maps.Map(document.getElementById('map'), mapOptions);
          var infowindow = new google.maps.InfoWindow({
              content: "<p>Tranversal 39 B No. 72 - 85 Av. Nutibara<br>Medellín, Colombia</p>"
          });

          var marker = new google.maps.Marker({
              position: loc,
              map: map,
              draggable: false,
              animation: google.maps.Animation.DROP,
              title: 'Pin'
          });
          marker.addListener('click', toggleBounce);
          infowindow.open(map, marker);
          function toggleBounce() {
              infowindow.open(map, marker);
              if (marker.getAnimation() == null) {
                  marker.setAnimation(google.maps.Animation.BOUNCE);
                  setTimeout(function(){marker.setAnimation(null)}, 2000);
              }
          }
          marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize());

      function initialize2() {
          var isDraggable = $(document).width() > 480 ? true : false;
          var myLatlng = new google.maps.LatLng(4.669667, -74.113232);
          var loc = new google.maps.LatLng(4.666421, -74.113003);
          var mapOptions = {
              zoom: 15,
              center: myLatlng,
              draggable: isDraggable,
              scrollwheel: false
          };
          var map = new google.maps.Map(document.getElementById('map2'), mapOptions);
          var infowindow = new google.maps.InfoWindow({
              content: "<p>Calle 25G #73A - 07<br>Bogotá, Colombia</p>"
          });

          var marker = new google.maps.Marker({
              position: loc,
              map: map,
              draggable: false,
              animation: google.maps.Animation.DROP,
              title: 'Pin'
          });
          marker.addListener('click', toggleBounce);
          infowindow.open(map, marker);
          function toggleBounce() {
              infowindow.open(map, marker);
              if (marker.getAnimation() == null) {
                  marker.setAnimation(google.maps.Animation.BOUNCE);
                  setTimeout(function(){marker.setAnimation(null)}, 2000);
              }
          }
          marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize2());
    });

    window.onload=function(){
      $('#sections').removeClass('noheight');
      $('#preloader').fadeOut('slow');
    };
  </script>
</body>