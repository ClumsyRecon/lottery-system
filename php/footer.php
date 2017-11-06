<footer class="page-footer orange">
  <div class="container">
    <div class="row">
      <h5 class="white-text">Company Bio</h5>
      <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
    </div>
  <div class="footer-copyright">
    <div class="container">
    Made by Daniel Johansson
    </div>
  </div>
</footer>

<div class="container">
  <div class="error">
    <div id="message">
      <?php
      try {

      } catch (Exception $e) {
        print_r($e);
      }
      ?>
    </div>
  </div>
  <div class="session">
    <?php
    var_dump($_SESSION);
    ?>
  </div>
</div>
<script>
(function($){
  $(function(){
    $('.button-collapse').sideNav();
  });
})(jQuery);
</script>
