<?php
$this->load->view('header');
?>

<body>
	<!-- .navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-nav">
		  	<a class="" href="#"><img src="<?php echo base_url(); ?>asset/img/Logo KPU.png" ></a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<?php if ($this->session->userdata('level')!="admin") { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
						</li>
						<?php } ?>
								<li class="nav-item">
		              <a class="nav-link" href="<?php echo site_url('C_profilcalon/') ?>">Profil Calon</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="<?php echo site_url('C_panduanpilih/') ?>">Panduan Memilih</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link active" href="<?php echo site_url('C_timeline/') ?>">Timeline<span class="sr-only">(current)</span></a>
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

	<!-- .content -->
		<div class="container content-jadwal">
			<?php
				foreach ($data_timeline as $data) {
				?>
					<div class="row row-jadwal">
						<div class="col-lg-2 col-md-2 col-sm-2 center right text-tgl">
							<?php echo $data->tgl_mulai; ?>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 center right">-</div>
						<div class="col-lg-2 col-md-2 col-sm-2 center right text-tgl">
							<?php echo $data->tgl_selesai; ?>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 center">
							<?php echo $data->kegiatan; ?>
						</div>
						<?php if ($this->session->userdata('level')=="admin") { ?>
						<div class="col-lg-2 col-md-2 center right">
							<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 center right">
								<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $data->idx; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
							</div></div>
							<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 center right">
								<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->idx; ?>"><i class="glyphicon glyphicon-trash"></i></button>
							</div></div>
						</div>
						<?php } ?>
					</div>

					<!-- Modal Edit -->
					<div id="edit<?php echo $data->idx; ?>" class="modal fade" role="dialog">
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal"></button>
			                        <h4 class="modal-title">Edit Data Timeline</h4>
			                    </div>
			                    <?php echo form_open("C_timeline/edit"); ?>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <input type="hidden" name="idx" class="form-control" value="<?php echo $data->idx; ?>" id="idx" required>
				                        </div>
				                        <div class="form-group">
				                            <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
				                            <input type="text" name="tgl_mulai" class="form-control" value="<?php echo $data->tgl_mulai; ?>" id="tgl_mulai" required>
				                        </div>
				                        <div class="form-group">
				                            <label class="control-label" for="tgl_selesai">Tanggal Selesai</label>
				                            <input type="text" name="tgl_selesai" class="form-control" value="<?php echo $data->tgl_selesai; ?>" id="tgl_selesai" required>
				                        </div>
				                        <div class="form-group">
				                            <label class="control-label" for="kegiatan">Kegiatan</label>
				                            <input type="text" name="kegiatan" class="form-control" value="<?php echo $data->kegiatan; ?>" id="kegiatan" required>
				                        </div>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
				                        <input type="submit" class="btn btn-primary" name="edit" value="Edit">
				                    </div>
				                <?php echo form_close(); ?>
			                </div>
			            </div>
			        </div>
			        <!-- Modal Edit -->

			        <!-- Modal Delete -->
			        <div id="hapus<?php echo $data->idx; ?>" class="modal fade" role="dialog">
			            <div class="modal-dialog">
			            	<?php echo form_open("C_timeline/delete"); ?>
			            		<div class="modal-content">
				                    <div class="modal-header">
				                        <button type="button" class="close" data-dismiss="modal"></button>
				                        <h4 class="modal-title">Anda Ingin Menghapus?</h4>
				                        <input type="hidden" name="idx" class="form-control" value="<?php echo $data->idx; ?>" id="idx" required>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" data-dismiss="modal" class="btn btn-danger">Tidak</button>
				                        <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
				                    </div>
				                </div>
			            	<?php echo form_close(); ?>
			            </div>
			        </div>
			        <!-- Modal Delete -->

				<?php }	?>
		</div>

		<?php if ($this->session->userdata('level')=="admin") { ?>
		<div class="row">
			<div class="col-lg-12">
				<center><button class="btnAdd short_btnAdd" data-toggle="modal" data-target="#tambah">Tambah Data</button></center>
			</div>
		</div>
		<?php } ?>
	<!-- /.content -->

	<!-- Modal Tambah -->
	<div id="tambah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"></button>
					<h4 class="modal-title">Tambah Data Timeline</h4>
				</div>
				<?php echo form_open("C_timeline/add"); ?>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
						<input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="tgl_selesai">Tanggal Selesai</label>
						<input type="text" name="tgl_selesai" class="form-control" id="tgl_selesai" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="kegiatan">Kegiatan</label>
						<input type="text" name="kegiatan" class="form-control" id="kegiatan" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger">Reset</button>
					<input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<!-- Modal Tambah -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
$this->load->view('footer');
?>
