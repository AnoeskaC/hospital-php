<?php
$id = $client[0]['client_id'];
$data = $client[0];
?>

<h3>Verwijder cliënt:</h3>
<div>
  <form action="<?=URL?>client/deleteAClient/<?=$client[0]['client_id']?>" method="GET" autocomplete="off">
    <label for="fname">Voornaam</label>
    	<input type="text" name="person" placeholder="<?echo $data['client_firstname'];?>" readonly>
    <label for="fname">Achternaam</label>
    	<input type="text" placeholder="<?echo $data['client_lastname'];?>" readonly>
    	<input type="submit" value="Verwijderen">
    	<input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>