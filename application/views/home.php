<?php
$this->load->view('header');
?>
	<body>
		<!-- .navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
			<a class="" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/img/Logo KPU.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    		<li class="nav-item">
				    	<a class="nav-link active" href="<?php echo base_url(); ?>">Home<span class="sr-only">(current)</span></a>
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
				<?php
          if ($this->session->userdata('level')!="admin") {
            echo '<a href="'.site_url("C_loginAdmin/").'" class="btn btn-warning btn-lg">Login</a>';
          }else {
            echo '<a href="'.site_url("C_loginAdmin/logout").'" class="btn btn-warning btn-lg">Logout</a>';
          }
        ?>
		</nav>
		<!-- /.navbar -->
		<div class="container">
			<div class="row row-home">
				<div class="col-lg-3">
					<div class="inner-content">
						<div class="timebox">
						<div class="tm-atas">102</div>
						<div class="tm-bawah" >Hari</div>
					</div>
						<div class="tm-info">
							Menuju Pemilihan Gubernur dan Wakil Gubernur Jawa Barat
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="inner-content">
						<video width="100%" height="auto" controls>
					 	<source src="<?php echo base_url(); ?>asset/vid/homevid.mp4" type="video/mp4">
					 	<source src="<?php echo base_url(); ?>asset/movie.ogg" type="video/ogg">
					  	Your browser does not support the video tag.
						</video>
					</div>
				</div>
			</div>
		</div>
		<!-- /.content -->
		<div class="container" >
			<h1>Mengapa harus <i>RencangDangu</i>??</h1>
			<hr style="background-color: green; height:2px; margin-bottom: 1%">
			<p style="text-align: justify; text-indent: 0.5in;" class="jumbotron" border-radius="10px">
				Pemilihan Gubernur Jawa Barat merupakan pesta demokrasi dari masyarakat Jawa Barat. Pemilihan Gubernur menjadi penting sekali karena hasil dari pemilihan Gubernur akan menentukan masa depan dari Jawa Barat dalam 5 tahun mendatang. Menurut data yang dikutip dari harian tempo.co , data total pemilih pilkada Jawa Barat antara 32-33 Juta orang. Sedangkan, 65 ribu jiwa diantaranya memiliki keterbatasan dalam mendengar. Hak untuk memberikan suara dalam pesta demokrasi merupakan bagian dari hak asasi manusia yang dijamin oleh konstitusi. Untuk demikian perlu adanya kesetaraan dalam sosialisasi Pemilihan Gubernur. <br>
				Sebetulnya KPU jabar telah menyelenggarakan sosialisasi untuk pemilih tunarungu. Namun, bila dilihat dari jumlah pemilih, banyak yang belum mendapatkan sosialisasi secara maksima. Bila sosialisasi tidak dibantu dengan alat yang dapat membantu sosialisasi menjadi lebih mudah dan lebih luas, maka kesetaraan dalam memilih belum bisa dikatakan tercapai seutuhnya. <br>
				Perlunya pendekatan melalui teknologi yang mudah dijangkau dan mudah untuk dioperasikan nampaknya bisa menjadi solusi untuk mencapai kesetaraan dalam memilih gubernur Jawa Barat. Oleh karena itu aplikasi RencangDangu diharapkan dapat menjadi solusi atas permasalah ini agar tercapainya kesetaraan pesta demokrasi: Pemilihan Gubernur dan Wakil Gubernur Provinsi Jawa Barat tahun 2018.<br>
			</p>
			<h1>Apa itu <i>RencangDangu</i>??</h1>
			<hr style="background-color: green; height:2px; margin-bottom: 1%">
			<p style="text-align: justify; text-indent: 0.5in;" class="jumbotron" border-radius="10px">
				Aplikasi RencangDangu  berasal dari bahasa sunda yang artinya “teman dengar” dalam bahasa Indonesia.  RencangDangu  adalah aplikasi sosialisasi Pemilihan Gubernur (Pilgub) Jawa Barat untuk pemilih yang memiliki keterbatasan (disability) dalam mendengar atau biasa disebut tunarungu. Aplikasi ini berbasis website. Kami sadar betul bahwa penyandang tunarungu memiliki keterbatasan, jadi kami berniat memberikan solusi dalam bentuk pencantuman vidio Juru Bahasa Isyarat (JBI) dalam setiap segmen informasi yang ditampilkan didalam web RencangDangu ini. Didalam aplikasi  RencangDangu berisi beberapa sajian menu diantaranya: <br>
					1) Profil Calon Gubernur dan Calon Wakil Gubernur <br>
					2) Sosialisasi cara memilih di Tempat Pemungutan Suara <br>
					3) Timeline KPU <br>
					4) Event KPU <br>
					5) Cek Pemilih Terdaftar <br>
			</p>
		</div>
<?php
$this->load->view('footer');
?>
