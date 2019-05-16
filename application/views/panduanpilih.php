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
		              <a class="nav-link active" href="<?php echo site_url('C_panduanpilih/') ?>">Panduan Memilih<span class="sr-only">(current)</span></a>
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
				<?php
				$no = 1;
				foreach ($isian as $data) {
					?>
					<div class="row row-tutor">
						<div class="col-lg-4 center">
							<img src="<?php echo base_url(); ?>asset/img/<?php echo $data->gambar; ?>" alt="" width="320" height="220">
						</div>
						<div class="col-lg-6 center">
							<?php echo $no++.'. '.$data->isi; ?>
						</div>

						<?php if ($this->session->userdata('level')=="admin") { ?>
						<div class="col-lg-2 center">
							<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 center right">
								<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $data->urutan; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
							</div></div>
							<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 center right">
								<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->urutan; ?>"><i class="glyphicon glyphicon-trash"></i></button>
							</div></div>
						</div>
					<?php } ?>
					</div>

					<!-- Modal Edit -->
					<div id="edit<?php echo $data->urutan; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog">
											<div class="modal-content">
													<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"></button>
															<h4 class="modal-title">Edit Data Panduan</h4>
													</div>
													<?php echo form_open_multipart("C_panduanpilih/edit"); ?>
														<div class="modal-body">
																<div class="form-group">
																		<input type="hidden" name="urutan" class="form-control" value="<?php echo $data->urutan; ?>" id="urutan" required>
																</div>
																<div class="form-group">
																		<label class="control-label" for="gambar">Gambar</label>
																		<input type="file" name="gambar" accept="image/*" onchange="loadFile<?php echo $data->urutan; ?>(event)" id="gambar" required>
																					<br>
																					 <img id="output<?php echo $data->urutan; ?>" src="<?php echo base_url(); ?>asset/img/<?php echo $data->gambar; ?>" width="200px">
																					 <script>
																						 var loadFile<?php echo $data->urutan; ?> = function(event) {
																							 var reader = new FileReader();
																							 reader.onload = function(){
																								 var output = document.getElementById("<?php echo 'output'.$data->urutan; ?>");
																								 output.src = reader.result;
																							 };
																							 reader.readAsDataURL(event.target.files[0]);
																						 };
																					</script>
																</div>
																<div class="form-group">
																		<label class="control-label" for="isi">Isi</label>
																		<input type="text" name="isi" class="form-control" value="<?php echo $data->isi; ?>" id="isi" required>
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
							<div id="hapus<?php echo $data->urutan; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<?php echo form_open("C_panduanpilih/delete"); ?>
											<div class="modal-content">
														<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal"></button>
																<h4 class="modal-title">Anda Ingin Menghapus?</h4>
																<div class="form-group">
																<input type="hidden" name="urutan" class="form-control" value="<?php echo $data->urutan; ?>" id="urutan" required>
															</div>
																<div class="form-group">
																		<input type="hidden" name="gambar" class="form-control" value="<?php echo $data->gambar; ?>" id="urutan" required>
																</div>
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



				<?php
				}
				 ?>

				 		<?php if ($this->session->userdata('level')=="admin") { ?>
						 <div class="row">
							 <div class="col-lg-12">
								 <center><button class="btnAdd short_btnAdd" data-toggle="modal" data-target="#tambah">Tambah Data</button></center>
							 </div>
						 </div>
						<?php } ?>
						 <!-- Modal Tambah -->
						 <div id="tambah" class="modal fade" role="dialog">
							 <div class="modal-dialog">
								 <div class="modal-content">
									 <div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal"></button>
										 <h4 class="modal-title">Tambah Data Panduan</h4>
									 </div>
									 <?php echo form_open_multipart("C_panduanpilih/add"); ?>
									 <div class="modal-body">

																 <div class="form-group">
																		 <label class="control-label" for="gambar">Gambar</label>
																		 <input type="file" name="gambar" accept="image/*" onchange="loadFile_t(event)" id="gambar" required>
											 								     <br>
											 								      <img id="output_t" width="200px">
											 								      <script>
											 											  var loadFile_t = function(event) {
											 											    var reader_t = new FileReader();
											 											    reader_t.onload = function(){
											 											      var output_t = document.getElementById('output_t');
											 											      output_t.src = reader_t.result;
											 											    };
											 											    reader_t.readAsDataURL(event.target.files[0]);
											 											  };
											 										 </script>
																 </div>
																 <div class="form-group">
																		 <label class="control-label" for="isi">Isi</label>
																		 <input type="text" name="isi" class="form-control" value="" id="isi" required>
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
		</div>

		<script>
		$(document).ready(function () {
		$('.modal').on('show.bs.modal', function () {
		if ($(document).height() > $(window).height()) {
				// no-scroll
				$('body').addClass("modal-open-noscroll");
		}
		else {
				$('body').removeClass("modal-open-noscroll");
		}
		});
		$('.modal').on('hide.bs.modal', function () {
		$('body').removeClass("modal-open-noscroll");
		});
		})
		</script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
$this->load->view('footer');
?>
