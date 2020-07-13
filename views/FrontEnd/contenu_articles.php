<?php ob_start(); ?>
   <!-- Chapitre -->
   <section>
      <div id="textchapitre">
         <?= $chapters['content']; ?>
      </div>
   </section>
   <!-- Ajout d'un commentaire -->
   <section>
      <div class="row">
         <div class="col-md-11">
            <button class="btncomment">Ajouter un commentaire</button>
         </div>
      </div>
      <div class="row">
         <div class="col-md-11">
            <div id="formcomments">
               <form action="index.php?action=ajoutcommentaire&id=<?php echo $_GET['id'] ?>" method="POST">
                  <input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo" required="" /><br />
                  <textarea name="commentaire" class="form-control" placeholder="Votre commentaire..." required=""></textarea><br />
                  <input type="submit" class="btn btn-warning" value="Poster mon commentaire" name="submit_commentaire" />
               </form>
            </div>
         </div>
      </div>
   </section> 
   <!-- Affichage commentaires-->
   <section>
    <div class="row">
        <div class="panel panel-default widget">
        <div class="panel-heading">
        <div class="col-md-10"">
            <h2 class="panel-title">Commentaires</h2>
         </div>
         </div>
            <div class="panel-body">
                <ul class="list-group">
                <?php foreach ($commentaires as $commentaire): ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10"">
                                <div>
                                    <b><?= $commentaire['pseudo'] ?> </b>
                                    <div class="mic-info">
                                       <?= $commentaire['date_added'] ?> 
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <?= $commentaire['commentaire'] ?>
                                </div>
                           </div>
                              <div class="col-md-2"">
                                <div class="action">
                                <form method="POST" action="index.php?action=signalcommentaire&id=<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="nameflag"  value="<?= $commentaire['id'] ?>" />
                                    <input type="hidden" name="flag"  value="<?= $commentaire['commentaire'] ?>" />
                                    <button type="submit" class="btn btn-danger btn-xs" name="submit_flag_commentaire" title="Signaler le commentaire">
                                        <span> Signaler le commentaire</span>
                                    </button>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>  

   	
   <?php $content = ob_get_clean(); ?>
	<?php require('views/templatechapitre.php'); ?>