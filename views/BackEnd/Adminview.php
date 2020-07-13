<?php ob_start(); ?>

<h2><u>Gestion des chapitres</u></h2>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Créer un chapitre</h5>
        <br>
        <p class="card-text">Une idée arrive ? n'hésitez plus créer votre nouveau chapitre :</p>
        <br>
        <?php echo "<a class='btn btn-primary' href='index.php?action=create'>Créer un chapitre</a>" ?>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Modifier un chapitre</h5>
        <ul>
        <?php foreach($displaychaps as $displaychap): ?>
					<p><?php echo "<a href='index.php?action=displayChap&id=".$displaychap['id']."'>".$displaychap['name']."</a>" ?></p>
          <?php echo "<a class='btn btn-success' href='index.php?action=edit&id=".$displaychap['id']."'>Modifier</a>" ?>
          <?php echo "<a class='btn btn-danger' href='index.php?action=suppr&id=".$displaychap['id']."'>Supprimer</a>" ?>
          <br>
          <br>
          </li>
          <?php endforeach; ?>
			</ul>  
      </div>
    </div>
  </div>
</div>
<h2><u>Gestion des commentaires</u></h2>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Modérer un commentaire</h5>
        <ul>
      		<?php foreach($displaycommentaires as $displaycommentaire): ?>
        		<li>
              <br>
				      Commentaire <?= $displaycommentaire['id'] ?> :
			      	<br>
              <br>
              <b><?= $displaycommentaire['pseudo'] ?></b> : <?= $displaycommentaire['commentaire'] ?>
              <br>
              <br> 
                <?php echo "<a class='btn btn-success' href='index.php?action=editcomment&id=".$displaycommentaire['id']."'>Modifier</a>" ?>
                <?php echo "<a class='btn btn-danger' href='index.php?action=supprcomment&id=".$displaycommentaire['id']."'>Supprimer</a>" ?> 
        		</li>
			    <?php endforeach; ?>
		    </ul>     
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Commentaires signalés</h5>
        <ul>
        <?php foreach($flags as $flag): ?>
            <li>
             Numéro du commentaire :
              <?= $flag['comment_id'] ?></a> 
            </li>
            <br>
            <?php echo "<a class='btn btn-danger' href='index.php?action=supprflag&id=".$flag['id']."'>Supprimer le signalement</a>"?>
            <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('views/templateadmin.php'); ?>