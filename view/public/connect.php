<?php 
session_start();
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'UserRepository.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'EvenementRepository.php';
$user = \App\Repository\UserRepository\findOneByEmail($_SESSION['username']);
if (!isset($_SESSION['username'])) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/public/index.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
    exit;
}

if ($user->getRole()->getLibelle() === 'Membre' || $user->getRole()->getLibelle() === 'Administrateur') {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
    exit;
}

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CategorieRepository.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/Repository/CategorieRepository.php';
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dev party</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- ✅ load jQuery ✅ -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../dist/css/style.css">

	</head>
	<body>

		<nav>
			<div class="nav-wrapper container">
				<a href="#hero"><img src="../src/images/logobde.png"></a>
				<ul class="nav-links indicateur">
					<li>
						<a href="#events" class="indicateur--item active" data-section="1">ÉVÈNEMENTS</a>
					</li>
					<li>
						<a href="#contact" class="indicateur--item" data-section="2">CONTACT</a>
					</li>
					<li>
						<a href="../../Controller/user/deconnexion.php" class="nav-wrapper-connexion" data-section="3">DÉCONNEXION</a>
					</li>
				</ul>
				<div class="nav-wrapper-burger">
					<div class="line1"></div>
					<div class="line2"></div>
					<div class="line3"></div>
				</div>
			</div>
		</nav>
		<div class="header" id="hero">
			<img src="../src/images/imageheader.png">
			<h2>Découvrez la vie étudiante !</h2>
			<p id="user">
				<?php if (isset($_SESSION['username'])) echo $_SESSION['username'];?>
			</p>
		</div>
	<!-- Fin Section Héro -->


		<section id="events" class="events">
			<div class="events-content container">
				<h3  >Nos évènements :
				</h3>
				<hr>
				
                <?php
                $events = \App\Repository\EvenementRepository\findAllDescById();
                foreach ($events as $item) {?>
                    <div class="event">
                        <div class="imageevent">
                            <img src="../src/images/<?php echo $item->getImage()?>">
                        </div>
                        <div class="contentevent">
                            <h4><?php echo $item->getTitre()?></h4>
                            <div class="contentevent-text">
                                <p><?php echo $item->getDescription()?></p>
                            </div>
                            <div class="contentevent-button">
                                <a href="../../controller/user/participerEvenement.php?id=<?php echo $item->getId()?>">s'inscrire</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>
			</div>
			<img class="pinkcircle1" src="../src/images/pinkcircle.svg">
			<img class="bluetriangle1" src="../src/images/bluetriangle.svg">
			<img class="pinkcircle2" src="../src/images/pinkcircle.svg">
			<img class="blueflash" src="../src/images/blueflash.svg">
			
			<img class="pinkflash" src="../src/images/pinkflash.svg">
			<img class="pinktriangle" src="../src/images/pinktriangle.svg">
			<img class="pinkflash2" src="../src/images/pinkflash.svg">
			
		</section>
		<!-- Fin De la Liste des Evenements -->





		<footer>
			<div class="footer-content container">
				<div class="footer-content-partsup">
					<div class="footer-content-partsup-logo">
						<img src="../src/images/logobde.png" alt="logo">
					</div>
					<div class="footer-content-partsup-contact" id="contact">
						<h4 class="is-underline">Contact</h4>
						<ul>
							<li><img src="../src/images/mapsicon.png"><p>12 cours Mimosa 69003</p>
							</li>
							<li><img src="../src/images/phoneicon.png"><p>02 38 48 34 17</p>
							</li>
							<li><img src="../src/images/emailicon.png"><p>devparty@gmail.com</p>
							</li>
						</ul>
					</div>
					<div class="footer-content-partsup-horaires">
						<h4 class="is-underline">Horaires</h4>
						<p>BDE joignable au Mercredi<br>au jeudi de 14h à 16h</p>
					</div>
				</div>
				<hr>
				<div class="legalmentions">
					<p>© Dev'Party - 2022 | Plan du site - Mentions Légales | Design & Développement par esgi</p>
				</div>
			</div>
			<script src="../src/test.js"></script>
		</body>
	</body>
</html>
