<?php ob_start();?>

<h1>Ecrire un chapitre</h1>

<form action="index.php?action=createarticle" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Titre</label>
        <input type="text" name="article_titre" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="">Contenu</label>
        <textarea type="password" name="article_contenu" class="form-control"/></textarea>
    </div>
    <div class="form-group">
        <p>Ajouter une miniature au chapitre au format png.</p>
        <input type="file" name="miniature" /><br />
    </div>

    <button type="submit" class="btn btn-primary">Publier</button>

</form>
<br>

<?php $content = ob_get_clean(); ?>
<?php require('views/templateadmin.php'); ?>