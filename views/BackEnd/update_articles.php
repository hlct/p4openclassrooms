<?php ob_start();?>


<h1>Modifier un article</h1>


<form action="index.php?action=updatearticle&id=<?= $edit_article['id'] ?>" method="POST">


    <div class="form-group">
        <label for="">Titre</label>
        <input type="text" name="article_titre" class="form-control" value="<?= $edit_article['name']?>"/>
    </div>

    <div class="form-group">
        <label for="">Contenu</label>
        <textarea name="article_contenu" class="form-control"> <?=$edit_article['content'] ?> </textarea>
    </div>


    <button type="submit" class="btn btn-primary">Modifier</button>

</form>
<br>


<?php $content = ob_get_clean(); ?>
<?php require('views/templateadmin.php'); ?>