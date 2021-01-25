<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Calories Ccalculator</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="<?php echo base_url('assets/')?>plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/')?>plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/') ?>fonts/ionicons.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/')?>common/styles.css" rel="stylesheet">
		
		<script src="<?php echo base_url('assets/')?>plugin-frameworks/jquery-3.2.1.min.js"></script>
</head>
<body>

<header>
        <div class="container">
                <a class="logo" href="#"><img src="<?php echo base_url('assets/')?>images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
			<ul class="font-mountainsre">
				<?php if($this->session->userdata('username') != "") {
					?>
					<li><a class="plr-20 color-white btn-fill-primary" href="<?= site_url('user/logout')?>">Logout</a></li>
					<?php
				} else {
					?>
					<li><a class="plr-20 color-white btn-fill-primary" data-toggle="modal" data-target="#exampleModal">Login</a></li>
					<li><a class="plr-20 color-white btn-fill-secondary" data-toggle="modal" data-target="#registerModal"> Register</a></li>
					<?php
				}?>
				
			</ul>
		</div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

		<?php if($this->session->userdata('username') != "") {
			?>
			<ul class="main-menu font-mountainsre" id="main-menu">
				<li><a href="<?= base_url('/user')?>">MY PROFIL</a></li>
				<li><a href="<?= base_url('/user/kalori')?>">KALORI</a></li>
				<li><a href="<?= base_url('/user/olahraga')?>">OLAHRAGA</a></li>
			</ul>
			<?php
		}?>
                

                <div class="clearfix"></div>
        </div><!-- container -->
</header>
