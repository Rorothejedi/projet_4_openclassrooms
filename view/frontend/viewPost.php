<?php $title = 'Blog Jean Fortroche | Liste des chapitres'; ?>

<?php $class_header = 'top_post'; ?>

<?php ob_start(); ?>
	
			<img src="./public/img/alaska.jpg" class="img_alaska" alt="">

			<h1 class="text-center title_page">Billet simple pour l'Alaska</h1>

		</header>

		<section id="post">

			<div class="container">

				<div class="row">
					<div class="col-12">
						<h2 class="text-center"><?= $post['title'] ?></h2>
					</div>
				</div>

				<hr>

				<div class="row text_content">
					<?= $post['content'] ?>
				</div>

				<hr>

				<div class="row">
					<div class="col-12">
						<p class="text-right publish">Publié le <?= $post['creation_date_fr'] ?> par Jean Forteroche</p>
					</div>
				</div>
	
			</div>

		</section>

		<section id="comments">

			<div class="container">

				<h2>Commentaires</h2>

					<?php 

		  				if (!empty($_SESSION['userName'])) 
		  				{

		  			?>

		  			<div class="container-post-comment">
		  				
			  			<div class="row">
			  				<button type="button" class="btn btn-primary btn-comment">Poster un commentaire</button>
			  			</div>

			  			<div class="div_post_comment comment hidden">

			  				<form action="index.php?p=newComment&amp;id=<?= $_GET['id'] ?>" method="POST">

				  				<div class="form-group">
									<textarea class="form-control textarea-comment" name="comment" placeholder="Merci de respecter les règles de courtoisie élémentaires ainsi que les autres utilisateurs. Tout message ne respectant pas ces règles, pourra être supprimé et son auteur sanctionné." rows="3" required></textarea>
								</div>

								<button class="btn btn-secondary">Poster</button>

				  			</form>
			  			
			  			</div>

			  		</div>

		  			<?php

		  				}
		  				else
		  				{

			  		?>
							
						<p><em>
							Vous devez être connecté pour poster un commentaire <br>
							<a href="index.php?p=login">Connectez-vous</a> ou <a href="index.php?p=register">inscrivez-vous</a>
						</em></p>

		  			<?php
		  					
		  				}

						$results = $comments->fetchAll();

						if(count($results) == 0)
						{
							echo "<p class='no_comment'>Il n'y a pas encore de commentaires</p>";
						}

						foreach ($results as $key => $result) {

					?>
				<div class="row comment <?php if($_SESSION['userName'] == $result['pseudo']){ echo 'own-comment';}?> <?php if($_GET['commentId'] == $result['id']){ echo 'show-comment';} ?>" id="<?= $result['id'] ?>">
					
					<div class="col-12">
						<p><?= $result['content'] ?></p>
					</div>

					<div class="col-10">

						<?php 

							if (!empty($_SESSION['userName']) && $_SESSION['userName'] != $result['pseudo']) 
			  				{

		  				?>

						<span data-toggle="tooltip" data-placement="left" title="Signaler ce commentaire">
							<i class="fas fa-exclamation-circle report_logo" data-toggle="modal" data-target="#modalReport" data-whatever="<?= $result['content'] ?>" data-comment="<?= $result['id'] ?>"></i>
						</span>

						<?php
								
							}
							elseif (!empty($_SESSION['userName']) && $_SESSION['userName'] == $result['pseudo']) 
							{

						?>

						<form action="index.php?p=deleteComment&amp;id=<?= $_GET['id'] ?>" method="POST" class="public_delete_form">

							<input type="hidden" name="commentId" value="<?= $result['id'] ?>">
							<input type="hidden" name="commentPseudo" value="<?= $result['pseudo'] ?>">

							<span data-toggle="tooltip" data-placement="left" title="Supprimer ce commentaire">
								<button type="submit" name="delete" value="delete" class="public_delete_comment report_logo">
									<i class="fas fa-times-circle"></i>
								</button>
							</span>

						</form>

						<?php

							}

						?>
						<small class="text-muted">
							Rédigé par <strong><?= $result['pseudo'] ?></strong> le <?= $result['comment_date_fr'] ?>
						</small>
					</div>

				</div>
				
				<?php
						
					}
					$comments->closeCursor();

				?>

				<!-- Modal -->
				<div class="modal fade" id="modalReport" tabindex="-1" role="dialog" aria-labelledby="modalReportCenter" aria-hidden="true">
				  	<div class="modal-dialog modal-dialog-centered" role="document" id="modalReportCenter">
				    	<div class="modal-content">

			      		<div class="modal-header modal-header-danger">
				        		<h5 class="modal-title" id="exampleModalLongTitle">
				        			<i class="fas fa-exclamation-circle"></i> Faire un signalement
				        		</h5>

						      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						         <span aria-hidden="true">&times;</span>
						      </button>
			      		</div>

			      		<form action="index.php?p=reportComment&amp;id=<?= $_GET['id'] ?>" method="POST">

			      			 <div class="modal-body">
			      			 	<div class="form-group">
			      			 		<label for="reported_comment">Commentaire que vous souhaitez signaler :</label>
										<textarea id="reported_comment" class="form-control" disabled="disabled"> 
										</textarea>
			      			 	</div>
			      			 	<input type="hidden" id="recipient_comment" name="comment_id" aria-hidden="true">
						      </div>

				      		<div class="modal-footer">
				      	 		<button type="submit" class="btn btn-danger btn-danger-modal">Confirmer le signalement</button>
				        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				      		</div>

			      		</form>

				    	</div>
				  	</div>
				</div>

			</div>

		</section>

	
<?php $content = ob_get_clean(); ?>

<?php require('./view/template/templateFrontend.php'); ?>