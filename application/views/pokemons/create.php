<?= validation_errors() ?>

<?= form_open() ?>

<div>
	<label for="pokemon[name]">Nom</label>
	<input type="text" name="name" id="pokemon[name]">
</div>
<div>
	<label for="pokemon[size]">Taille</label>
	<input type="number" name="size" id="pokemon[size]">
</div>
<div>
	<label for="pokemon[weight]">Poids</label>
	<input type="number" name="weight" id="pokemon[weight]">
</div>
<div>
	<label for="pokemon[category]">Categorie</label>
	<input type="text" name="category" id="pokemon[category]">
</div>
<div>
	<label for="pokemon[gender]">Genre</label>
	<select name="gender" id="pokemon[gender]">
		<option value="" selected="selected" disabled="diseabled">Genre</option>
		<option value="male">male</option>
		<option value="female">female</option>
	</select>
</div>
<input type="hidden" name="token" value="<?php echo $token; ?>" />
<div>
	<button>Créer</button>
</div>

<?= form_close() ?>
