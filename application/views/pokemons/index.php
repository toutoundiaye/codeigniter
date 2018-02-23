<ul>
	<?php foreach($pokemons as $pokemon): ?>
	<li>
		<a href="<?= site_url('pokemon/'.$pokemon->id) ?>"><?php echo $pokemon->name ?></a> 
	</li>
<?php endforeach; ?>
</ul>