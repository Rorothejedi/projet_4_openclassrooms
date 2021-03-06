<?php

	if ($_SESSION['access'] != 1 || !isset($_SESSION)) 
	{ 
		header('Location : index.php');
		exit();
	}

?>


<!DOCTYPE html>

<html lang="fr">

	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- CSS Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

		<!-- Icônes FontAwesome -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

		<!-- Polices Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Gaegu%7CRaleway:400,400i,700" rel="stylesheet"> 
		
		<!-- Feuille de style CSS principales -->
	    <link href="./public/css/stylesheet.min.css" rel="stylesheet">

	    <title><?= $title ?></title>

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js%22%3E</script>
	    	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js%22%3E</script>
	    <![endif]-->

	    <script src="./public/vendor/tinymce/tinymce.min.js"></script>
  		<script>
  			tinymce.init({ 
  				selector:'textarea',
  				language: 'fr_FR',
  				menubar: false,
  				branding: false,
  				elementpath: false,
  				plugins: ["autoresize"],
  				toolbar: 'undo redo | bold italic  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat'
  			});
  		</script>

	</head>

	<body>

		<header id="top" class="<?= $class_header ?>">

			<?php include('navbar.php'); ?>

			<nav class="navbar navbar-expand-md bg-dark navbar-dark">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbarAdmin">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>

	  			<a class="navbar-brand" href="index.php?p=adminPosts">Espace administrateur</a>

				<div class="collapse navbar-collapse" id="collapsibleNavbarAdmin">
				  	<ul class="navbar-nav">
					    <li class="nav-item">
					      	<a class="nav-link" href="index.php?p=adminPosts">Gestion des billets</a>
					    </li>
					     <li class="nav-item">
					      	<a class="nav-link" href="index.php?p=adminComments">Gestion des commentaires</a>
					    </li>
					     <li class="nav-item">
					      	<a class="nav-link" href="index.php?p=adminUsers">Gestion des utilisateurs</a>
					    </li>
				  	</ul>
				</div>
			</nav>

	   	<?php 

			include('alerts.php');

	  		echo $content;
	  	?>


		<a href="#top" class="top d-none d-md-block">
			<i class="fas fa-arrow-circle-up fa-3x hidden"></i>
		</a>

		<!-- Appels aux CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<!-- Fonctionnement des tooltips de bootstrap -->
		<script>
			// Fonctionnement du tooltip de bootstrap
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>

		<!-- Fonction de défilement fluide entre les ancres -->
		<script src="./public/js/scroll.js"></script>

		<!-- Instanciation et initialisation des objects JavaScript -->
		<script src="./public/js/global.js"></script>

		<!-- Script pour les alertes bootstrap -->
		<script src="./public/js/alert.js"></script>

		<!-- Script qui check le contenu des inputs (connexion, inscription) -->
		<script src="./public/js/inputChecking.js"></script>
			
	</body>

</html>