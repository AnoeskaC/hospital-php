<h3>Voeg een nieuwe cliënt toe</h3>
<div>
  <form action="<?=URL?>client/createClient" method="POST" autocomplete="off">
    <label for="fname">Voornaam</label>
    	<input type="text" id="client_firstname" name="client_firstname" minlength="2" maxlength="10" placeholder="Voornaam" required>
    <label for="fname">Achternaam</label>
    	<input type="text" id="client_lastname" name="client_lastname" minlength="2" maxlength="20" placeholder="Achternaam" required>
    	<input type="submit" value="Versturen">
    	<input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>