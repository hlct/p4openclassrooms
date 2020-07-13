<?php ob_start();?>


<h1>Modérer un commentaire</h1>



<form action="index.php?action=updatecomment&id=<?= $edit_article['id'] ?>" method="POST">

    <div class="form-group">
        <label for="">Titre</label>
        <input type="text" name="commentaire_titre" class="form-control" value="<?=$edit_article['pseudo']?>"/>
    </div>

    <div class="form-group">
        <label for="">Contenu</label>
        <textarea name="commentaire_contenu" class="form-control"> <?=$edit_article['commentaire'] ?>  </textarea>
    </div>


    <button type="submit" class="btn btn-primary">Modifier</button>

</form>
<br>

<?php $content = ob_get_clean(); ?>
<?php require('views/templateadmin.php'); ?>




