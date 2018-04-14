<?php
$id = $client[0]['client_id'];
$data = $client[0];
?>

<h3>Pas een verjaardag aan:</h3>
<div>
  <form action="<?=URL?>client/saveEdit" method="post" autocomplete="off">
    <label for="fname">Voornaam</label>
    	<input type="text" id="client_firstname" name="client_firstname" minlength="2" maxlength="10" value="<?echo $data['client_firstname'];?>" required>
    <label for="fname">Achternaam</label>
    	<input type="text" id="client_lastname" name="client_lastname" minlength="2" maxlength="20" value="<?echo $data['client_lastname'];?>" required>
    	<input type="hidden" name="id" value="<?= $data['client_id'] ?>">
    	<input type="submit" value="Versturen">
    	<input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>