<body>
	<?php include '_topbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="musicfeed">
					<h1><i class="fa fa-clock-o"></i> Sound Feed</h1>
					<?php foreach($musics as $music){ ?>
						<div class="music animated fadeInDown" data-src="<?php echo $music['file']; ?>">
							<div class="row">
								<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
									<div class="author">
										<?php 
											$sql = "SELECT picture FROM users WHERE id = :id LIMIT 1";
											$req = $db->prepare($sql);
											$req->execute(array(
												':id' => $music['user_id']
											));
											$result = $req->fetch(PDO::FETCH_ASSOC);
											if(!empty($result)){
												echo '<img class="" src="'.$result['picture'].'" alt="">';
											}
											else{
												echo '<img src="view/profil_pic/undefined.jpg" alt=""></a>';
											}
										?>
									</div>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
									<div class="pull-right">
										<ul class="list-inline actionicon">
										<?php if($music['user_id'] == $_SESSION['id']){
											echo '<li><a href="edit.php?id='.$music['id'].'&&user_id='.$music['user_id'].'"><i class="fa fa-pencil"></i></a></li>';
											echo '<li><a href="delete.php?id='.$music['id'].'"><i class="fa fa-times"></i></a></li>';
										} ?>
										</ul>
									</div>
									<b class="username">Posté par <?php echo $music['username']; ?></b>
									<h3 class="title">
										<?php echo $music['title']; ?>
									</h3>
									<p class="clearfix">
										<small class="date pull-right"><i class="fa fa-clock-o"></i> <?php echo $music['created_at']; ?></small>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Mon blog</title>
                    <link href="style.css" rel="stylesheet" />
                </head>

                <body>
                <h1>Mon super blog !</h1>
                <p>Derniers billets du blog :</p>

                <?php
                // Connexion à la base de données
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=iim;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                // On récupère les 5 derniers billets
                $req = $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

                while ($donnees = $req->fetch())
                {
                    ?>
                    <div class="news">
                        <h3>
                            <?php echo htmlspecialchars($donnees['titre']); ?>
                            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                        </h3>

                        <p>
                            <?php
                            // On affiche le contenu du billet
                            echo nl2br(htmlspecialchars($donnees['contenu']));
                            ?>
                            <br />
                            <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
                        </p>
                    </div>
                    <?php
                } // Fin de la boucle des billets
                $req->closeCursor();
                ?>
                </body>
                </html>
				</div>
			</div>
		</div>
	</div>
</body>


