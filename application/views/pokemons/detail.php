<h1><?= $pokemon->name ?></h1>
<a href="<?= site_url('PokemonViewerController') ?>">Retour à l'accueil</a>
<ul>
    <dt>Taille</dt><dd><?= $pokemon->size ?></dd>
    <dt>Poids</dt><dd><?= $pokemon->weight?></dd>
    <dt>Categorie</dt><dd><?= $pokemon->category ?></dd>
    <dt>Gender</dt><dd><?= $pokemon->gender ?></dd>
    <dt>Skill</dt>
    <?php foreach ($pokemon->skills as $skill): ?>
    <dd><?= $skill->name ?></dd>
    <?php endforeach ?>
</ul>