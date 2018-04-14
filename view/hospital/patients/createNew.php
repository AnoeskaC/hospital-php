<?php
foreach ($species as $spec => $value) {
  $specname = $value['species_description'];
}
?>
<h3>Voeg een nieuwe patiënt toe</h3>
<div>
  <form action="<?=URL?>patient/createPatient" method="POST" autocomplete="off">
    <label for="fname">Naam patiënt</label>
      <input type="text" id="patient_name" name="patient_name" minlength="2" maxlength="10" placeholder="Naam patiënt" required>
    <label for="fname">Status patiënt</label>
      <input type="text" id="patient_status" name="patient_status" minlength="2" maxlength="20" placeholder="Status patiënt" required>
      <select name="species" required>
        <?php foreach ($species as $specie) { ?>
              <option value="<?= $specie['species_id']?>">
                <?= $specie['species_description']?>
              </option>
        <?php } ?>
      </select>
      <input type="submit" value="Versturen">
      <input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>patient/patients';"/>
  </form>
</div>