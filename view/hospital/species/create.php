<h3>Voeg een nieuwe diersoort toe</h3>
<div>
  <form action="<?=URL?>species/createSpec" method="POST" autocomplete="off">
    <label for="fname">Diersoort</label>
    	<input type="text" id="species_description" name="species_description" minlength="2" maxlength="10" placeholder="Diersoort" required>
    	<input type="submit" value="Versturen">
    	<input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>patient/createPatient';" />
  </form>
</div>