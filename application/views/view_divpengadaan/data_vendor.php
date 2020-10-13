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
                                <li><span class="bread-blod">Verifikasi Data</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcome End-->
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
                                        <form method="post" id="form">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Nama
                                                            Perusahaan</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input required placeholder="Nama Perusahaan"
                                                            name="nama_perusahaan" readonly value="<?php echo $vendor['vendor_name'] ?>" id="nama_perusahaan" type="text"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Alamat</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input required id="alamat_lengkap" readonly  value="<?php echo $vendor['address']?>" name="alamat_lengkap"
                                                            placeholder="Jalan, RT/RW, Blok" type="text"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select required id="provinsi"
                                                                class="form-control custom-select-value"
                                                                name="provinsi">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select required id="kota"
                                                                class="form-control custom-select-value" name="kota">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select required id="kecamatan"
                                                                class="form-control custom-select-value"
                                                                name="kecamatan">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select required id="kelurahan"
                                                                class="form-control custom-select-value"
                                                                name="kelurahan">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Kodepos
                                                                </label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="kode_pos" name="kode_pos" readonly value="<?php echo $vendor['postcode'] ?>" required
                                                            placeholder="Kode Pos" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Nomor
                                                            Telepon (Optional)</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="nomor_telepon" disabled= "" value="<?php echo $vendor['vendor_phone'] ?>" name="nomor_telepon"
                                                            placeholder="Nomor Telepon" type="text"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="fax" name="fax"readonly value="<?php echo $vendor['vendor_fax'] ?>" placeholder="Fax" type="text"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Email Perusahaan</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="vendor_email" readonly value="<?php echo $vendor['vendor_email']?>" name="vendor_email" required
                                                            placeholder="Email Perusahaan" type="email" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Person In Charge
                                                            (PIC)</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="pic_nama" name="pic_nama" required
                                                            placeholder="Nama PIC" type="text" readonly     value="<?php echo $pic['pic_name']?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro"></label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select readonly required id="pic_gender"
                                                                class="form-control custom-select-value" name="pic_gender">
                                                                <option><?php echo $pic['pic_gender']; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="pic_nohp" name="pic_nohp" required readonly value="<?php echo $pic['pic_phone']?>"
                                                            placeholder="No HP (WA) PIC" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="pic_email" name="pic_email" required readonly value="<?php echo $pic['pic_email']?>"
                                                            placeholder="Email PIC" type="email" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Website Perusahaan
                                                            (Optional)</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="website" name="website"
                                                            placeholder="Website Perusahaan (Optional)" readonly value="<?php echo $vendor['vendor_email'] ?>" type="text"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Bidang Usaha
                                                            (Utama)</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <input id="business_field"
                                                                class="form-control custom-select-value"
                                                                name="business_field" readonly value="<?php echo $vendor['business_field_name']?>">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="div_cat" class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select readonly id="category_business_field"
                                                                class="form-control custom-select-value"
                                                                name="category_business_field">
                                                                <option><?php echo $vendor['category_name'] ?></option> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Klasifikasi</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <input readonly value="<?php echo $vendor['class_name']?>" id="classification"
                                                                class="form-control custom-select-value"
                                                                name="classification">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="" class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Deskripsi Umum
                                                            Perusahaan</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="deskripsi_umum" name="deskripsi_umum"
                                                            type="text"
                                                            class="form-control" readonly value="<?php echo $vendor['vendor_desc']?>"></input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                        <ul class="pager">
                                                                        <li><a href="<?php echo base_url("index.php/divpengadaan/dashboard/toBerkasVendor/"). $vendor['vendor_id']?>" 
                                                                        style="background-color: White; ">Halaman Berikutnya 
                                                                         </a> </li>
                                                                        </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

<!-- <?php if ($this->session->flashdata('success')): ?>
<script>
Swal.fire({
    title: "Success!",
    text: "Data saved successfully!",
    type: "success",
    confirmButtonText: "OK"
}).then((result) => {
    if (result.value) {
        window.location.href = "<?php echo base_url() ?>index.php/vendor/registration";
    }
});
</script>
<?php endif; ?> -->