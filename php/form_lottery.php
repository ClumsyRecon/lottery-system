<div class="row">
  <form class="col s12" action="../controller.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="input-field col s6">
        <input placeholder="Lotto" id="name" name="name" type="text" class="validate" required>
        <label for="name">Lottery Name</label>
      </div>
      <div class="input-field col s6">
        <input id="prize" type="number" name="prize" value="0" min="0" step="1000" class="validate" required>
        <label for="prize">Prize</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input id="date" name="date" type="date" class="datepicker" required>
        <label for="date">Date</label>
      </div>
      <div class="input-field col s6">
        <div style="margin-top:0;" class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input id="image" name="image" type="file" accept="image/*" required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
    </div>
    <input id="create" type="hidden" name="create" value="lottery">
    <button class="btn waves-effect waves-light" type="submit" name="action">Create
      <i class="material-icons right">send</i>
    </button>
  </form>
</div>
<script type="text/javascript">
  var tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  $('.datepicker').pickadate({
  selectMonths: true,
  selectYears: 15,
  min: tomorrow,
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  closeOnSelect: true,
  format: 'yyyy-mm-dd'
  });
  function checkDate() {
  	if ($('#date').val() == '') {
      $('#date').addClass('invalid');
      return false;
    } else {
      $('#date').removeClass('invalid');
      return true;
    }
  }

  $('form').submit(function() {
    return checkDate();
  });

  $('#date').change(function() {
    checkDate();
  });
</script>
