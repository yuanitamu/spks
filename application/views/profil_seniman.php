<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profil-Sistem Pelelangan Karya Seni</title>

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
 <!-- Section: about -->
 <section id="about" class="home-section text-center">
  <div class="heading-about">
   <div class="container">
     <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
       <div class="wow bounceInDown" data-wow-delay="0.4s">
         <div class="section-heading">
           <h2>my profil</h2>
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
<div class="row">
  <div align="center">
      <div class="wow bounceInUp" data-wow-delay="0.5s">
        <div class="team boxed-grey">
          <div class="inner">
            <a href="#editProfil" class="glyphicon glyphicon-pencil" data-toggle="modal" style="margin-top:5px ; margin-bottom:5px ; margin-left:-5px" >Edit Profil</a>
            <img src="<?php echo base_url()?>aset/img/user/<?php echo $this->session->userdata('foto');?>" width="300px"height="300px"alt="<?php echo $this->session->userdata('foto');?>" align="center" class="img-responsive img-circle " height="300px" width="300px"/>
            <h5 style="margin-top:10px"><?php echo $this->session->userdata('username');?></h5>
          </div>
        </div>
      </div>
    </div>
      <table class="table table-striped">
      <?php 
      echo "<tr>";
      echo "<td>Nama</td><td>:</td><td>".$this->session->userdata('nama')."</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Alamat</td><td>:</td><td>".$this->session->userdata('alamat')."</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Tanggal Lahir</td><td>:</td><td>".$this->session->userdata('tgl_lahir')."</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Nomor Telpon</td><td>:</td><td>".$this->session->userdata('no_tlp')."</td>";
      echo "</tr>";?>
      </table>

  </div>		
</div>
<div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="wow bounceInDown" data-wow-delay="0.4s">
                  <div class="section-heading">
                    <h2>Our Collection</h2>
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
          if($umum==null){
            ?>
            <h2>Data yang anda cari tidak ada atau masih kosong </h2>
            <?php
          }else {?>
            <div class="row">
            <?php
            foreach ($umum as $key) {
              if($this->session->userdata('id_user')==$key->id_user){
              ?>
              <div class="col-lg-3 col-md-3">
                <a href="<?php echo base_url();?>gallery_controller/deskripsi/<?php echo $key->id_barang?>"><img width="200px"  height="200px"
                  src="<?php echo base_url();?>/aset/img/gallery/<?php echo $key->foto ?>" alt="<?php echo $key->foto?>"/></a>
                  <h4 style="margin-top:5px"><?php echo $key->nama_barang;?></h4>
                </div>
              <?php }}}?>
              </div>
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
          if($jual==null){
            ?>
            <h2>Data yang anda cari tidak ada atau masih kosong </h2>
            <?php
          }else {?>
            <div class="row">
            <?php
            foreach ($jual as $key) {
              if($this->session->userdata('id_user')==$key->id_user){
              ?>
              <div class="col-lg-3 col-md-3">
                <a href="<?php echo base_url();?>penjualan_controller/deskripsi/<?php echo $key->id_barang;?>"><img width="200px"  height="200px"
                  src="<?php echo base_url();?>/aset/img/<?php echo $key->foto ?>" alt="<?php echo $key->foto?>"/></a>
                  <h4 style="margin-top:5px"><?php echo $key->nama_barang;?></h4>
                  <p class="subtitle"><?php echo "RP ".$key->harga_barang;?></p>
                </div>
              <?php }}}?>
              </div>
          <div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="wow bounceInDown" data-wow-delay="0.4s">
                  <div class="section-heading">
                    <h2>Lelang Collection</h2>
                    <i class="fa fa-2x fa-angle-down"></i>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
              <hr class="marginbot-50">
            </div>
          </div>
          <?php 
          if($lelang==null){
            ?>
            <h2>Data yang anda cari tidak ada atau masih kosong </h2>
            <?php
          }else {?>
            <div class="row">
            <?php foreach ($lelang as $key) {
              if($this->session->userdata('id_user')==$key->id_user){
              ?>
              <div class="col-lg-3 col-md-3 col-sm-3">
                <a href="<?php echo base_url();?>pelelangan_controller/deskripsi/<?php echo $key->id_barang;?>"><img width="200px" height="200px" 
                  src="<?php echo base_url();?>/aset/img/<?php echo $key->foto;?>" alt="<?php echo $key->foto;?>"/></a>
                  <h4 style="margin-top:5px"><?php echo $key->nama_barang;?></h4>
                  <p class="subtitle"><?php echo "RP. ".$key->harga_barang;?></p>
                  <p class="subtitle"><?php echo "Batas Pelelangan: ".$key->batas_pelelangan;?></p>
                </div>
            <?php }}}?>
            </div>
</section>
<!-- /Section: about -->

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
<div id="editProfil" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart(base_url().'user_controller/edit_user/',array('class'=>'form-horizontal','role'=>'form','method'=>"POST"));?>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
        <div class="control-group" style="margin-left:175px;">
         <label class="control-label" for="inputNama">Username</label>
         <div class="controls">
           <input type="text" id="userName" name="username" value="<?php echo $this->session->userdata('username');?>"required>
         </div>
       </div>
       <div class="control-group" style="margin-left:175px;">
         <label class="control-label" for="inputPassword">Password</label>
         <div class="controls">
           <input type="password" id="inputPassword" name="password" value="<?php echo $this->session->userdata('password');?>"required>
         </div>
       </div>

       <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputNama">Nama</label>
        <div class="controls">
          <input type="text" id="inputNama" name="nama" value="<?php echo $this->session->userdata('nama');?>"required>
        </div>
      </div>

      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputAlamat">Alamat</label>
        <div class="controls">
          <input type="text" id="inputAlamat" name="alamat" value="<?php echo $this->session->userdata('alamat');?>"required>
        </div>
      </div>

      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputAlamat">Jenis Kelamin</label>
        <div class="controls">
          <input class="checkbox" value="L" name="jenis_kelamin" type="radio" />Laki-laki
          <input class="checkbox" value="P" name="jenis_kelamin" type="radio"  />Perempuan
        </div>
      </div>

      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" >Tanggal Lahir</label>
        <div class="controls">
          <input type="date" id="inputTTL" name="tgl_lahir" value="<?php echo $this->session->userdata('tgl_lahir');?>"required>
        </div>
      </div>

      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" for="inputNotelp">No Telepon</label>
        <div class="controls">
          <input type="text" id="inputNotelp" name="no_tlp" value="<?php echo $this->session->userdata('no_tlp');?>"required>
        </div>
      </div>

      <div class="control-group" style="margin-left:175px;">
        <label class="control-label" >Email</label>
        <div class="controls">
          <input type="text" id="inputEmail" name="email" value="<?php echo $this->session->userdata('email');?>"required>
        </div>
      </div>
      <div class="control-group"style="margin-left:175px;">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" name="foto" value="<?php echo base_url();?>aset/img/user<?php echo $this->session->userdata('foto');?>">
      </div>
      <div class="modal-footer">
        <button class="btn btn-submit" type="submit">Save</button>
      </div>
      <?php echo form_close();?>
  </div>
</div>
</div>
</div>
<!-- modal end -->   
</body>
</html>