<?php 
$this->load->view('header');
?>

<body>
	<!-- .navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
		  	<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>asset/img/Logo KPU.png"></a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    		<li class="nav-item">
				    	<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo site_url('C_profilcalon/') ?>">Profil Calon</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo site_url('C_panduanpilih/') ?>">Panduan Memilih</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo site_url('C_timeline/') ?>">Timeline</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo site_url('C_cekpemilih/') ?>">Cek Data Pemilih</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="<?php echo site_url('C_eventkpu/') ?>">Event KPU</a>
				    </li>
				</ul>
		  	</div>
		</nav>
	<!-- /.navbar -->

	<!-- .content -->
	<div class="container">
		<div class="row-search">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 center">
					<h1>This Website is created by:</h1>
					<hr style="background-color: green; height:2px; margin-bottom: 2%;">
					<ol>
						<li>Adithia Rafif Khoerulloh (1301154207)</li>
						<li>Aji Priambodo Santoso (1301164096)</li>
						<li>Aziz Sabirin (1301160434)</li>
						<li>Malik Anhar Maulana (1301164181)</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content -->

<?php
$this->load->view('footer');
?>
