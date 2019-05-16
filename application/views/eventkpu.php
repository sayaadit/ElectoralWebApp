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
                  <a class="nav-link" href="<?php echo site_url('C_timeline/') ?>">Timeline</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('C_cekpemilih/') ?>">Cek Data Pemilih</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo site_url('C_eventkpu/') ?>">Event KPU<span class="sr-only">(current)</span></a>
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

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>asset/img/undinomer.jpg" alt="pengundian" class="slider">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>asset/img/debat1.jpg" alt="debat1" class="slider">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>asset/img/cagub.jpg" alt="cagub" class="slider">
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="container">
  <div class="row row-1">
  <?php
    foreach ($data_event as $data) {
  ?>
    <div class="col-md-4">
      <div class="box-debat">
        <img src="<?php echo base_url(); ?>asset/img/debaticon.png" width="100px" class="event">
      </div>
      <h2><?php echo $data->nama; ?><!--DEBAT 1--></h2>
      <p><?php echo $data->isi; ?><!--Debat yang pertama akan dilakukan pada <b>Senin, 12 Maret 2018 </b>
         di <b> gedung Sasana Budaya Ganesha, ITB Bandung.</b> Debat pertama bertemekan
         <b> politik, hukum, ekonomi, pemerintahan daerah, UMKM dan infrastruktur</b-->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view<?php echo $data->nama; ?>">
          video
      </button>
      <?php if ($this->session->userdata('level')=="admin") { ?>


                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $data->id; ?>"><i class="glyphicon glyphicon-pencil"></i></button>

                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?php echo $data->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>

          <?php } ?>
      </p>
    </div>

    <!--modal view-->
    <div class="modal fade modalevent" id="view<?php echo $data->nama;?>">
        <div class="modal-dialog modal-lgg">
          <div class="modal-content">

            <!-- Modal Header -->
            <!-- Modal body -->
            <div class="modal-body">
              <embed class="iframe-dbt1" width="100%" src="<?php echo $data->link; ?>?controls=1"></embed>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>


      <!--modal hapus-->
              <div id="hapus<?php echo $data->id; ?>" class="modal fade modalevent" role="dialog">
                  <div class="modal-dialog">
                    <?php echo form_open("C_eventkpu/delete"); ?>
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <h4 class="modal-title">Anda Ingin Menghapus?</h4>
                                <div class="form-group">
																<input type="hidden" name="id" class="form-control" value="<?php echo $data->id; ?>" id="id" required>
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
              <!-- Modal Edit -->
          <div id="edit<?php echo $data->id; ?>" class="modal fade modalevent" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"></button>
                              <h4 class="modal-title">Edit Event</h4>
                          </div>
                          <?php echo form_open_multipart("C_eventkpu/edit"); ?>
                            <div class="modal-body">
                              <div class="form-group">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $data->id; ?>" id="id" required>
                            </div>
                                <div class="form-group">
                                    <label class="control-label" for="nama">Nama Event</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data->nama; ?>" id="nama" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="isi">Isi Event</label>
                                    <input type="text" name="isi" class="form-control" value="<?php echo $data->isi; ?>" id="isi" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="Tipe event">Tipe Event</label>
                                    <input type="text" name="tipe" class="form-control" value="<?php echo $data->tipe; ?>" id="tipe" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="isi">link Event</label>
                                    <input type="text" name="link" class="form-control" value="<?php echo $data->link; ?>" id="link" required>
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


    <?php } ?>
    </div>


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
                     <h4 class="modal-title">Tambah Data Event</h4>
                   </div>
                   <?php echo form_open_multipart("C_eventkpu/add"); ?>
                   <div class="modal-body">
                                 <div class="form-group">
                                     <label class="control-label" for="nama">Nama event</label>
                                     <input type="text" name="nama" class="form-control" value="" id="nama" required>
                                 </div>
                                 <div class="form-group">
                                     <label class="control-label" for="isi">Isi</label>
                                     <input type="text" name="isi" class="form-control" value="" id="isi" required>
                                 </div>
                                 <div class="form-group">
                                     <label class="control-label" for="isi">Tipe event</label>
                                     <input type="text" name="tipe" class="form-control" value="" id="Tipe" required>
                                 </div>
                                 <div class="form-group">
                                     <label class="control-label" for="isi">Link event</label>
                                     <input type="text" name="link" class="form-control" value="" id="link" required>
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
