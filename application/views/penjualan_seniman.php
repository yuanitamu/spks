      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Penjualan-Sistem Pelelangan Karya Seni</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url()?>/aset/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="<?php echo base_url()?>/aset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>/aset/css/animate.css" rel="stylesheet" />
        <!-- Squad theme CSS -->
        <link href="<?php echo base_url()?>/aset/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/aset/color/default.css" rel="stylesheet">

      </head>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              <i class="fa fa-bars"></i>
              <button id="add" type="submit" class="btn btn-info"><a href="#myModal"  data-toggle="modal">Tambah</a></button>
            </button>
          </a>
        </div>
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('gallery_controller/data_list_gallery')?>">Gallery</a> </li>

         <li><a href="<?php echo site_url('user_controller/profil')?>">Profil</a></li>

         <li><a href="<?php echo site_url('penjualan_controller/data_list_penjualan')?>">Jual Beli</a></li>

         <li><a href="<?php echo site_url('pelelangan_controller/data_list_pelelangan')?>">Pelelangan</a></li>

         <li><a href="<?php echo site_url('pembayaran_controller/data_list_pembayaran')?>">Pembayaran</a></li>

          <li><a href="<?php echo site_url('register_controller/logout');?>" >Logout</a> </li>
          </ul>   
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
      <!-- Preloader -->
      <div id="preloader">
        <div id="load"></div>
      </div>

      <!-- Section: services -->
      <section id="service" class="home-section text-center bg-gray">

        <div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="wow bounceInDown" data-wow-delay="0.4s">
                  <div class="section-heading">
                    <h2>Sale Collection</h2>
                    <i class="fa fa-2x fa-angle-down"></i>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="container"> -->
          <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
              <hr class="marginbot-50">
            </div>
          </div>
          <?php 
          if($item==null){
            ?>
            <h2>Data yang anda cari tidak ada atau masih kosong </h2>
            <?php
          }else {?>
            <div class="row">
            <?php
            foreach ($item as $key) {
              ?>
              <div class="col-lg-3 col-md-3">
                <a href="<?php echo base_url();?>penjualan_controller/deskripsi/<?php echo $key->id_barang;?>"><img width="200px" height="200px" 
                  src="<?php echo base_url();?>/aset/img/<?php echo $key->foto ?>" alt="<?php echo $key->foto?>"/></a>
                  <h4 style="margin-top:5px"><?php echo $key->nama_barang;?></h4>
                  <p class="subtitle"><?php echo "RP ".$key->harga_barang;?></p>
                </div>
              <?php }}?>
              </div>
          <!-- </div> -->
        </section>
        <!-- /Section: services -->


        <!-- Start Footer -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="wow shake" data-wow-delay="0.4s">
                  <div class="page-scroll marginbot-90">
                    <a href="#intro" id="totop" class="btn btn-circle">
                      <i class="fa fa-angle-double-up animated"></i>
                    </a>
                  </div>
                </div>
                <p>&copy;Copyright 2014 - Project RPL Kelompok-6</p>
              </div>
            </div>  
          </div>
        </footer>

        <!-- Core JavaScript Files -->
        <script src="<?php echo base_url()?>/aset/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/aset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>/aset/js/jquery.easing.min.js"></script>    
        <script src="<?php echo base_url()?>/aset/js/jquery.scrollTo.js"></script>
        <script src="<?php echo base_url()?>/aset/js/wow.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url()?>/aset/js/custom.js"></script>


        <!-- modal begin -->
        <div id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Barang</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart("penjualan_controller/tambah_penjualan"); ?>
                <div class="control-group">
                  <label class="control-label" for="inputBarang">Nama Barang</label>
                  <div class="controls">
                    <input type="text" name="nama_barang" id="inputBarang" placeholder="Nama Barang" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputDeskripsi">Deskripsi</label>
                  <div class="controls">
                    <textarea type="text" name="deskripsi_barang" id="inputDeskripsi" placeholder="Deskripsikan Barang Anda Disini" size="500"required></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputHarga">Harga Barang</label>
                  <div class="controls">
                    <input type="text" name="harga_barang" id="inputharga" placeholder="Harga Barang" required>
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                    <div class="span6">
                      <input type='file' name="foto" onchange="readURL(this);"/>
                      <script type="text/javascript" language="JavaScript">
                      function readURL(input) {
                        if (input.files && input.files[0]) {
                          var reader = new FileReader();

                          reader.onload = function (e) {
                            $('#blah')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(200);
                          };

                          reader.readAsDataURL(input.files[0]);
                        }
                      }
                      </script>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php echo form_close(); ?>    
              </div>

            </div>
          </div>
        </div>
      </body>

      </html>
