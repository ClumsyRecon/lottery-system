<link rel="stylesheet" href="../css/admin.css">
<form id="ltryForm" action="../controller.php" method="post">
  <label>Lottery Name: </label>
  <input type="text" name="name" value="Random Lottery">
  <label>Prize: </label>
  <input type="number" name="prize" value="0" min="0" step="1000">
  <label>Date: </label>
  <input type="date" name="date">
  <input type="hidden" name="create" value="lottery">
  <input type="submit" value="Create">
</form>
