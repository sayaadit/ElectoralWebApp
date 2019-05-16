<?php
$this->load->view('header');
?>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
		<center><a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/img/Logo KPU.png"></a></center>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4"></div>
			<div class="col-lg-4 col-md-4">
				<?php echo form_open('C_loginAdmin/verify_login'); ?>
					<input type="text" class="txlogin form-control" placeholder="Username" name="username">
					<input type="password" class="txlogin form-control" placeholder="Password">
					<input type="submit" class="btn_login" name="password" value="Masuk">
				<?php echo form_close(); ?>
			</div>
			<div class="col-lg-4 col-md-4"></div>
		</div>
	</div>
</body>

<?php
$this->load->view('footer');
?>
