<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pelelangan Karya Seni</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url();?>aset/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="<?php echo base_url();?>aset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url();?>aset/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Squad theme CSS -->
  <link href="<?php echo base_url();?>aset/css/style.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url();?>aset/color/default.css" rel="stylesheet" type="text/css"/>

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
      	<li class="active"><a href="#myModal" data-toggle="modal">Login</a></li> 
      	<li><a href="#galery">Gallery</a></li>             
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Section: intro -->
  <section id="intro" class="intro">
    <div class="slogan">
     <h2>Selamat Datang Di <span class="text_color">Sistem Pelelangan Online</span> </h2>
     <h4>Dapatkan Karya Seni Sesuai Yang Anda Inginkan</h4>
   </div>
   <div class="page-scroll">	
    <a href="#myModal1" class="btn btn-lg btn-info" data-toggle="modal">Daftar Sekarang</a>
  </div>
</section>
<!-- /Section: intro -->


<!-- Section: services -->
<section id="galery" class="home-section text-center bg-gray">

  <div class="heading-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
            <div class="section-heading">
              <h2>Gallery Seni Kami</h2>
              <i class="fa fa-2x fa-angle-down"></i>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
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
      <?php foreach ($item as $key) {
        ?>
        <div class="col-lg-3 col-md-3">
          <img width="200px"src="<?php echo base_url();?>aset/img/gallery/<?php echo $key->foto ?>" height="200px"alt="<?php echo $key->foto?>"/></a>
            <h4 style="margin-top:5px"><?php echo $key->nama_barang;?></h4>
          </div>
        <?php }}?>
      
    </div>
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

 <!-- End Footer -->

 <!-- Core JavaScript Files -->
 <script src="<?php echo base_url();?>aset/js/jquery.min.js"></script>
 <script src="<?php echo base_url();?>aset/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url();?>aset/js/jquery.easing.min.js"></script>	
 <script src="<?php echo base_url();?>aset/js/jquery.scrollTo.js"></script>
 <script src="<?php echo base_url();?>aset/js/wow.min.js"></script>
 <!-- Custom Theme JavaScript -->
 <script src="<?php echo base_url();?>aset/js/custom.js"></script>


 <!-- modal begin -->
 <div id="myModal" class="modal fade">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title">Login</h4>
       </div>
       <div class="modal-body">

        <form class="form-horizontal" method="POST" action="<?php echo base_url()?>register_controller/login/">
          <div class="control-group">
            <label class="control-label" for="inputUsername">Username</label>
            <div class="controls">
              <input type="text" id="inputUsername" name="username" placeholder="Username">
            </div>
          </div>
          <div class="control-group">
           <label class="control-label" for="inputPassword">Password</label>
           <div class="controls">
             <input type="password" id="inputPassword" name="password" placeholder="Password">
           </div>
         </div>
         <div class="modal-footer">
           <button type="submit" name="submit"class="btn btn-primary">Login</button>
         </div>
       </form>      
     </div>

   </div>
 </div>
</div>
<!-- modal end -->    


<!-- modal daftar -->

<div id="myModal1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Register Member</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart(base_url().'register_controller/register/',array('class'=>'form-horizontal','role'=>'form','method'=>"POST"));?>
        <div class="control-group" style="margin-left:175px;">
         <label class="control-label" for="inputNama">Username</label>
         <div class="controls">
           <input type="text" id="userName" name="username" placeholder="Username"required>
         </div>
       </div>

       <div class="control-group" style="margin-left:175px;">
         <label class="control-label" for="inputPassword">Password</label>
         <div class="controls">
           <input type="password" id="inputPassword" name="password" placeholder="Password"required>
         </div>
       </div>

       <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputNama">Nama</label>
        <div class="controls">
          <input type="text" id="inputNama" name="nama" placeholder="Nama"required>
        </div>
      </div>

      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputAlamat">Alamat</label>
        <div class="controls">
          <input type="text" id="inputAlamat" name="alamat" placeholder="Alamat"required>
        </div>
      </div>
      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputAlamat">Jenis Kelamin</label>
        <div class="controls">
          <input class="checkbox" value="L" name="jenis_kelamin" type="radio">Laki-laki</input>
          <input class="checkbox" value="P" name="jenis_kelamin" type="radio">Perempuan</input>
        </div>
      </div>
      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" >Tanggal Lahir</label>
        <div class="controls">
          <input type="date" id="inputTTL" name="tgl_lahir" placeholder="TTL"required>
        </div>
      </div>
      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputNotelp">No Telepon</label>
        <div class="controls">
          <input type="text" id="inputNotelp" name="no_tlp" required>
        </div>
      </div>
      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" >Email</label>
        <div class="controls">
          <input type="email" id="inputEmail" name="email"required>
        </div>
      </div>
      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputLevel">Daftar Sebagai</label>
        <div class="controls">
          <input class="checkbox" value="Seniman" name="level" type="radio">Seniman</input>
          <input class="checkbox" value="Pembeli" name="level" type="radio">Pembeli</input>
        </div>
      </div>
      <div class="control-group"style="margin-left:175px;">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" name="foto">
      </div>
      <div class="modal-footer">
        <button class="btn btn-submit" type="submit">Sign Up</button>
      </div>
      <?php echo form_close();?>
    </div>

  </div>



</div>
</div>

<!-- modal daftar end -->

</body>

</html>
