<link href="css/forms.css" rel="stylesheet">
<link href="css/svg.css" rel="stylesheet">
<script type="text/javascript" src="js/storage.js"></script>
<div id="login">
  <form class="col s12" action="controller.php" method="post" onsubmit="storeName()">
    <div>
      <div class="input-field s12">
        <input placeholder="Enter your email" id="email" name="email" type="email" class="validate" required>
        <label for="email" class="active">Email</label>
      </div>
    </div>
    <div>
      <div class="input-field s12">
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" class="validate" placeholder="Enter your password" required>
      </div>
    </div>
    <input type="hidden" name="login" value="true">
    <button class="btn waves-effect waves-light" type="submit" name="action">Login
      <i class="material-icons right">send</i>
    </button>
    <?php
    if(isset($_GET['login']) && $_GET['login'] == 'failed') {
      echo 'Email does not exist or password is incorrect.';
    }
     ?>
  </form>
</div>
<script type="text/javascript"> getName(); </script>
<svg width="350" height="100">
  <circle id="circle1" r="10" cx="50" cy="50" fill="black" />
  <circle id="circle2" r="10" cx="150" cy="50" fill="black" />
  <circle id="circle3" r="10" cx="250" cy="50" fill="black" />
  <animate id="timer" begin="0;shrink3.end" dur="3s" attributeName="visibility" from="hide" to="hide"/>
  <animate
           xlink:href="#circle1"
           attributeName="r"
           from="10"
           to="25"
           dur="0.5s"
           begin="timer.begin"
           fill="freeze"
           id="grow1"/>
  <animate
           xlink:href="#circle1"
           attributeName="r"
           from="25"
           to="10"
           dur="0.5s"
           begin="grow1.begin + 0.5s"
           fill="freeze"
           id="shrink1"/>
  <animate
           xlink:href="#circle2"
           attributeName="r"
           from="10"
           to="25"
           dur="0.5s"
           begin="shrink1.begin + 0.5s"
           fill="freeze"
           id="grow2"/>
  <animate
           xlink:href="#circle2"
           attributeName="r"
           from="25"
           to="10"
           dur="0.5s"
           begin="grow2.begin + 0.5s"
           fill="freeze"
           id="shrink2"/>
  <animate
           xlink:href="#circle3"
           attributeName="r"
           from="10"
           to="25"
           dur="0.5s"
           begin="shrink2.begin + 0.5s"
           fill="freeze"
           id="grow3"/>
  <animate
           xlink:href="#circle3"
           attributeName="r"
           from="25"
           to="10"
           dur="0.5s"
           begin="grow3.begin + 0.5s"
           fill="freeze"
           id="shrink3"/>
</svg>
