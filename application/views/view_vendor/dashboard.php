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
                                                <h2><?php echo $hasil->vendor_name; ?></h2></br>
                                                <h3>STATUS : <?php echo $hasil->vendor_remark; ?></h3>
                                                <?php
                                                    if($hasil->vendor_remark == "BELUM TERVERIFIKASI"){
                                                    ?>
                                                        <label>selamat data anda telah terrecord dalam sistem kami</br>
                                                        dan sedang kami verifikasi</label>
                                                    <?php
                                                    } else if ($hasil->vendor_remark == "PERBAIKAN"){
                                                    ?>
                                                        <label>Mohon untuk melengkapi kekurangan data yang kami butuhkan</label>
                                                        </br>
                                                        <a href="<?php echo base_url() ?>index.php/vendor/dashboard/unggah_perbaikan/<?php echo $hasil->vendor_id;?>" 
                                                        class="btn btn-sm btn-primary login-submit-cs"
                                                                    >Click Here </a>
                                                    <?php
                                                    } else if($hasil->vendor_remark == "TERVERIFIKASI"){
                                                    ?>
                                                        <label>Selamat anda telah terdaftar sebagai rekanan perusahaan kami</label>
                                                        </br>
                                                        <a href="#" class="btn btn-sm btn-primary login-submit-cs"
                                                                    >Click Here </a>
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