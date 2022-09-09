 <!-- JavaScript files-->
 <script src="https://d19m59y37dris4.cloudfront.net/app/2-0/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://d19m59y37dris4.cloudfront.net/app/2-0/vendor/swiper/swiper-bundle.min.js"></script>
 <script src="https://d19m59y37dris4.cloudfront.net/app/2-0/vendor/modal-video/js/modal-video.js"></script>
 <script src="https://demo.bootstrapious.com/app/2-0/js/front.c7c86be8.js"></script>
 <script src="https://demo.bootstrapious.com/app/2-0/js/js-cookie.55cdbe0d.js"> </script>
 <script src="https://demo.bootstrapious.com/app/2-0/js/demo.9f3f24e8.js"> </script>
 <script>
   // ------------------------------------------------------- //
   //   Inject SVG Sprite - 
   //   see more here 
   //   https://css-tricks.com/ajaxing-svg-sprite/
   // ------------------------------------------------------ //
   function injectSvgSprite(path) {
   
       var ajax = new XMLHttpRequest();
       ajax.open("GET", path, true);
       ajax.send();
       ajax.onload = function(e) {
       var div = document.createElement("div");
       div.className = 'd-none';
       div.innerHTML = ajax.responseText;
       document.body.insertBefore(div, document.body.childNodes[0]);
       }
   }
   // this is set to BootstrapTemple website as you cannot 
   // inject local SVG sprite (using only 'icons/orion-svg-sprite.3bf7f71d.svg' path)
   // while using file:// protocol
   // pls don't forget to change to your domain :)
   injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
   
 </script>
 <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@stack('scripts')