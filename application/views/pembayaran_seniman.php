<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pembayaran-Sistem Pelelangan Karya Seni</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url('aset/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="<?php echo base_url('aset/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url('aset/css/animate.css')?>" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="<?php echo base_url('aset/css/style.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('aset/color/default.css')?>" rel="stylesheet">

</head>
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
 <section id="service" class="home-section text-center bg-gray">
   <table id="tabel" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th></th>
        <th>ID Seniman</th>
        <th>ID Pembeli</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Status</th></tr></thead><tbody>
        <?php
        foreach ($item as $key) {
          if($key->id_seniman==$this->session->userdata('id_user')){
            echo "<tr>";
            echo "<td><img src=\"".base_url()."aset/img/".$key->foto."\" width=\"100\"></td>";
            echo "<td>".$key->id_seniman."</td>";
            echo "<td>".$key->id_pembeli."</td>";
            echo "<td>".$key->nama_barang."</td>";
            echo "<td>".$key->harga_barang."</td>";
            echo "<td>".$key->alamat."</td>";
            echo "<td>".$key->no_tlp."</td>";
            echo "<td>";
            if ($key->bukti_pembayaran==null) {
              echo "<span class=\"label label-danger\">Booked</span>";
            }
            else{
             echo "<span class=\"label label-success\">Confirmed</span>";
           }
           echo "</td>";
         }
       }
       echo "</tr>";
       echo "</tbody>";
       echo "</table>";
       ?>
     </section>


     <!-- Start Footer -->
     
<!-- Core JavaScript Files -->
<script src="<?php echo base_url()?>/aset/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>/aset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>/aset/js/jquery.easing.min.js"></script>  
<script src="<?php echo base_url()?>/aset/js/jquery.scrollTo.js"></script>
<script src="<?php echo base_url()?>/aset/js/wow.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url()?>/aset/js/custom.js"></script>
<div id="submit" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Submit Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart("pembayaran_controller/bukti_pembayaran"); ?>
        <div class="controls">
          <input type="hidden" name="id_barang" value="<?php echo $key->id_barang;?>">
        </div>
        <div class="controls">
          <input type="file" name="bukti_pembayaran";?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <?php echo form_close();?>    
    </div>
  </div>
</div>
</body>
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
</html>
