<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Squadfree - Free bootstrap 3 one page template</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url()?>/aset/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="<?php echo base_url()?>/aset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>/aset/css/animate.css" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="<?php echo base_url()?>/aset/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/aset/color/default.css" rel="stylesheet">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.html">
        </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
           <li><a href="<?php echo site_url('gallery_controller/data_list_gallery')?>">Galery</a> </li>

         <li><a href="<?php echo site_url('user_controller/profil')?>">Profil</a></li>

         <li><a href="<?php echo site_url('penjualan_controller/data_list_penjualan')?>">Jual Beli</a></li>

         <li><a href="<?php echo site_url('pelelangan_controller/data_list_pelelangan')?>">Pelelangan</a></li>

         <li><a href="<?php echo site_url('pembayaran_controller/data_list_pembayaran')?>">Pembayaran</a></li>

            <li><a href="<?php echo site_url('register_controller/logout');?>" >Logout</a> </li>
     </div>
     <!-- /.navbar-collapse -->
   </div>
   <!-- /.container -->
 </nav>
 <!-- Section: deskripsi -->
 <section id="deskripsi" class="home-section text-center bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    <?php foreach ($item as $key) {?>
    <div class="container">
      <div class="col-md-5">
        <div>
          <img class="col-md-5 img-responsive img-thumbnail" src="<?php echo base_url();?>/aset/img/<?php echo $key->foto ?>" alt="<?php echo $key->foto;?>"/>
        </div>
      </div>

        <div class="col-md-7">
          <h3><?php echo $key->nama_barang;?></h3>
          <article>
            <?php echo $key->deskripsi_barang;?>
          </article>
          <article>
            <?php echo "RP "$key->Harga_barang;?>
          </article>
          <div class="row">
            <div>
              <a href="<?php echo base_url();?>penjualan_controller/beli" class="btn btn-lg btn-info center" data-toggle="modal" style="margin-top:5px ; margin-bottom:5px">Beli</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- /Section: dsekripsi -->

  <!-- Start Footer -->
  <footer>
    <div class="container">
     <div class="row">
      <div class="col-md-12 col-lg-12">
       <div class="wow shake" data-wow-delay="0.4s">
         <div class="page-scroll marginbot-90">
          <a href="#deskripsi" id="totop" class="btn btn-circle">
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
</body>
</html>