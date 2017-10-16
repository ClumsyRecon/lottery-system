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
