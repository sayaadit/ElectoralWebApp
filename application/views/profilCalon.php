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
              		              <a class="nav-link active" href="<?php echo site_url('C_profilcalon/') ?>">Profil Calon<span class="sr-only">(current)</span></a>
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
                        <div class="container">
                            <?php
                            foreach ($isian as $isi) {
                            ?>
                            <div class="row row-tutor">
                                <?php if($isi->urutan % 2 == 1){?>
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url().$isi->image; ?>" alt="" width="320" height="220">
                                </div>
                                <?php }?>
                                <?php if ($this->session->userdata('level')=="admin") { ?>
                                  <div class="col-lg-6 tengah">
                                <?php }else{ ?>
                                  <div class="col-lg-8 tengah">
                                <?php } ?>

                                    <div class="col-lg-10 tengah">
                                        Calon Gubernur: <?php echo $isi->calon_gb; ?> <br>
                                        Usia: <?php echo $isi->usia_calon_gb; ?> tahun <br>
                                        Jabatan saat ini: <?php echo $isi->jabatan_gb; ?>
                                    </div><br>
                                    <div class="col-lg-10 tengah">
                                        Calon Wakil Gubernur: <?php echo $isi->calon_wgb; ?> <br>
                                        Usia: <?php echo $isi->usia_calon_wgb; ?> tahun <br>
                                        Jabatan saat ini: <?php echo $isi->jabatan_wgb; ?>
                                    </div><br>
                                    <div class="col-lg-10 tengah">
                                        <?php echo $isi->partai_pengusung; ?>
                                    </div>
                                </div>
                                    <?php if($isi->urutan % 2 == 0){?>
                                        <div class="col-lg-4">
                                            <img src="<?php echo base_url().$isi->image; ?>" alt="" width="320" height="220">
                                        </div>
                                    <?php }?>
                                    <?php if ($this->session->userdata('level')=="admin") { ?>
                                    <div class="col-lg-2 center">
                        							<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 center right">
                        								<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $isi->urutan; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
                        							</div></div>
                        							<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 center right">
                        								<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?php echo $isi->urutan; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                        							</div></div>
                        						</div>
                                    <?php } ?>
<!--                                    gambar didieu kalo genap-->
                            </div>
                                <!-- Modal Edit -->
                      					<div id="edit<?php echo $isi->urutan; ?>" class="modal fade" role="dialog">
                      									<div class="modal-dialog">
                      											<div class="modal-content">
                      													<div class="modal-header">
                      															<button type="button" class="close" data-dismiss="modal"></button>
                      															<h4 class="modal-title">Edit Data Calon</h4>
                      													</div>
                      													<?php echo form_open("c_profilcalon/edit"); ?>
                      														<div class="modal-body">
                      																<div class="form-group">
                      																		<input type="hidden" name="urutan" class="form-control" value="<?php echo $isi->urutan; ?>" id="urutan" required>
                      																</div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Calon Gubernur</label>
                                                          <input type="text" name="calon_gb" value="<?php echo $isi->calon_gb?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Usia Calon Gubernur</label>
                                                          <input type="text" name="usia_calon_gb" value="<?php echo $isi->usia_calon_gb?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Jabatan Calon Gubernur</label>
                                                          <input type="text" name="jabatan_calon_gb" value="<?php echo $isi->jabatan_gb?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Calon Wakil Gubernur</label>
                                                          <input type="text" name="calon_wakil_gb" value="<?php echo $isi->calon_wgb?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Usia Calon Wakil Gubernur</label>
                                                          <input type="text" name="usia_calon_wakil_gb" value="<?php echo $isi->usia_calon_wgb?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Jabatan Calon Wakil Gubernur</label>
                                                          <input type="text" name="jabatan_calon_wakil_gb" value="<?php echo $isi->jabatan_wgb?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Partai Pengusung</label>
                                                          <input type="text" name="partai_pengusung" value="<?php echo $isi->partai_pengusung?>" class="form-control" id="isi" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label" for="nama">Image URL</label>
                                                          <input type="text" name="image_url" value="<?php echo $isi->image?>" class="form-control" id="isi" required>
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
                      							<div id="hapus<?php echo $isi->urutan; ?>" class="modal fade" role="dialog">
                      									<div class="modal-dialog">
                      										<?php echo form_open("c_profilcalon/delete"); ?>
                      											<div class="modal-content">
                      														<div class="modal-header">
                      																<button type="button" class="close" data-dismiss="modal"></button>
                      																<h4 class="modal-title">Anda Ingin Menghapus?</h4>
                      																<div class="form-group">
                      																<input type="hidden" name="urutan" class="form-control" value="<?php echo $isi->urutan; ?>" id="urutan" required>
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
                										 <h4 class="modal-title">Tambah Data Calon</h4>
                									 </div>
                									 <?php echo form_open("c_profilcalon/add"); ?>
                									 <div class="modal-body">
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Calon Gubernur</label>
                                         <input type="text" name="calon_gb" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Usia Calon Gubernur</label>
                                         <input type="text" name="usia_calon_gb" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Jabatan Calon Gubernur</label>
                                         <input type="text" name="jabatan_calon_gb" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Calon Wakil Gubernur</label>
                                         <input type="text" name="calon_wakil_gb" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Usia Calon Wakil Gubernur</label>
                                         <input type="text" name="usia_calon_wakil_gb" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Jabatan Calon Wakil Gubernur</label>
                                         <input type="text" name="jabatan_calon_wakil_gb" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Partai Pengusung</label>
                                         <input type="text" name="partai_pengusung" class="form-control" id="isi" required>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label" for="nama">Image URL</label>
                                         <input type="text" name="image_url" class="form-control" id="isi" required>
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

                </div>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <?php
                $this->load->view('footer');
                ?>
