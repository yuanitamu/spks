<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Verifikasi-Sistem Pelelangan Karya Seni</title>

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
          <li><a href="<?php echo site_url('manajemen_user_controller/data_member');?>" >Manajemen User</a> </li>
          <li><a href="<?php echo site_url('manajemen_user_controller/verifikasi_seniman');?>" >Verifikasi Seniman</a> </li>
          <li><a href="<?php echo site_url('register_controller/logout');?>" >Logout</a> </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
  <section id="deskripsi" class="home-section text-center bg-gray">
    <table id="tabel" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th></th>
          <th>ID</th>
          <th>Nama</th>
          <th>Username</th>
          <th width="150">Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Telepon</th>
          <th>Tanggal Lahir</th>
          <th>Email</th>
          <th>Level</th>
          <th></th>
        </tr></thead><tbody>
    <?php
    if($item==null){
      ?>
      <h2>Data yang anda cari tidak ada atau masih kosong </h2>
        <?php
      }else{
        foreach ($item as $key) {
         echo "<tr>";
         echo "<td><img src=\"".base_url()."aset/img/user/".$key->foto."\" width=\"100\"></td>";
         echo "<td>".$key->id_user."</td>";
         echo "<td>".$key->nama."</td>";
         echo "<td>".$key->username."</td>";
         echo "<td>".$key->alamat."</td>";
         echo "<td>".$key->jenis_kelamin."</td>";
         echo "<td>".$key->no_tlp."</td>";
         echo "<td>".$key->tgl_lahir."</td>";
         echo "<td>".$key->email."</td>";
         echo "<td>".$key->level."</td>";
         echo "<td>";
         ?>
         <div class="form-group">
            <a class="btn btn-primary" href="<?php echo base_url()?>manajemen_user_controller/terima_seniman/<?php echo $key->id_user;?>">Terima</a>
            <a class="btn btn-danger"  href="<?php echo base_url()?>manajemen_user_controller/tolak_seniman/<?php echo $key->id_user;?>">Tolak</a>  
          </div>
        <?php echo "</td>";
        echo "</tr>";
      }}
      echo "</tbody>";
      echo "</table>";
      ?>
    </section>
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