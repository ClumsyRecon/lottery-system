<div class="row">
  <form class="col s12" action="../controller.php" method="post">
    <div class="row">
      <div class="input-field col s6">
        <input placeholder="Lotto" id="name" name="name" type="text" class="validate">
        <label for="name">Lottery Name</label>
      </div>
      <div class="input-field col s6">
        <input id="prize" type="number" name="prize" value="0" min="0" step="1000" class="validate">
        <label for="prize">Prize</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input id="date" name="date" type="date" class="datepicker">
        <label for="date">Date</label>
      </div>
      <div class="input-field col s6">
        <div style="margin-top:0;" class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input name="image" type="file" accept="image/*">
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
  $('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  closeOnSelect: true, // Close upon selecting a date,
  format: 'yyyy-mm-dd'
  });
</script>
