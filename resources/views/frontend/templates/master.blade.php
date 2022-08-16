
<!DOCTYPE html>
<html>
  @include('frontend.templates.partials.head')
  <body>
    <!-- navbar-->
    @include('frontend.templates.partials.header')

    @yield('content')

    <a class="scroll-top-btn" id="scrollTop" href="#!"><i class="fas fa-long-arrow-alt-up"></i></a>
    
    @include('frontend.templates.partials.footer')
  
    @include('frontend.templates.partials.script')
  </body>
</html>