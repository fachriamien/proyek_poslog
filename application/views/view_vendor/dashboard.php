<!-- Breadcome start-->
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <form role="search" class="">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Dashboard</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list basic-res-b-30 shadow-reset">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Biodata Penyedia dan Jasa</h1>
                            <div class="sparkline12-outline-icon">
                                <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                        <form action="#">
                                            <div class="form-group-inner">
                                            <?php
                                            if(!empty($hasil)){
                                            ?>
                                                <h2><?php echo $hasil->vendor_name; ?></h2>
                                                <?php
                                                if($hasil->vendor_status == 2 || $hasil->vendor_status == 1){
                                                ?>
                                                    <label>Data belum lengkap, mohon lengkapi dokumen dan asset</label>
                                                <?php
                                                } else if ($hasil->vendor_status == 3){
                                                    if($hasil->vendor_remark == "BELUM TERVERIFIKASI"){
                                                        ?>
                                                            <h3>STATUS : <?php echo $hasil->vendor_remark; ?></h3>
                                                            <label>selamat data anda telah terrecord dalam sistem kami</br>
                                                            dan sedang kami verifikasi</label>
                                                        <?php
                                                        } 
                                                } else if ($hasil->vendor_status == 4){
                                                    if($hasil->vendor_remark == "PERBAIKAN"){
                                                        ?>
                                                            <h3>STATUS : <?php echo $hasil->vendor_remark; ?></h3>
                                                            <label>Mohon untuk melengkapi kekurangan data yang kami butuhkan</label>
                                                            </br>
                                                            <a href="<?php echo base_url() ?>index.php/vendor/dashboard/unggah_perbaikan/<?php echo $hasil->vendor_id;?>" 
                                                            class="btn btn-sm btn-primary login-submit-cs"
                                                                        >Click Here </a>
                                                        <?php
                                                        } else {
                                                            ?>
                                                                <h3>STATUS : DALAM PROSES </h3></br>
                                                                <label>Mohon untuk menunggu hasil verifikasi</label>
                                                            <?php
                                                        }
                                                
                                                } else if($hasil->vendor_status == 5){
                                                    if ($hasil->vendor_remark == "PERBAIKAN"){
                                                        ?>
                                                            <h3>STATUS : <?php echo $hasil->vendor_remark; ?></h3>
                                                            <label>Mohon untuk melengkapi kekurangan data yang kami butuhkan</label>
                                                            </br>
                                                            <a href="<?php echo base_url() ?>index.php/vendor/dashboard/unggah_perbaikan/<?php echo $hasil->vendor_id;?>" 
                                                            class="btn btn-sm btn-primary login-submit-cs"
                                                                        >Click Here </a>
                                                        <?php
                                                    } else if($hasil->vendor_remark == "TERVERIFIKASI"){
                                                        ?>
                                                            <h3>STATUS : <?php echo $hasil->vendor_remark; ?></h3>
                                                            <label>Selamat anda telah terdaftar sebagai rekanan perusahaan kami</label>
                                                            </br>
                                                            <a href="#" class="btn btn-sm btn-primary login-submit-cs"
                                                                        >Click Here </a>
                                                        <?php
                                                    }
                                                } 
                                            } else {
                                                ?>
                                                    <label>Silahkan lakukan registrasi Vendor</label>
                                                <?php
                                            }
                                                        ?>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic Form End-->