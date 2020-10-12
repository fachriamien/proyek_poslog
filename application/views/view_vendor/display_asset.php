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
                                <li><span class="bread-blod">Display Asset</span>
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
                            <h1>Identifikasi Bidang Usaha - (A.1 Kendaraan)</h1>
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
                                        <?= $this->session->flashdata('message'); ?>
                                        <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div> -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sparkline10-list shadow-reset mg-t-30">
                                                    <div class="sparkline10-hd">
                                                        <div class="main-sparkline10-hd">
                                                            <h1>Asset Kendaraan</h1>
                                                        </div>
                                                    </div>
                                                    <div class="sparkline10-graph">
                                                        
                                                        <div class="static-table-list table-responsive">
                                                            <table class="table border-table" id="dynamic_field">
                                                                <thead>
                                                                    <div class="d-flex justify-content-start">
                                                                    <a href="#" class="btn btn-primary login-submit-cs" data-toggle="modal" data-target="#newKendaraanAsset">Tambah Asset Kendaraan</a>
                                                                    <br><br>
                                                                    </div>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Vendor</th>
                                                                        <th>Jenis Kendaraan</th>
                                                                        <th>Merk</th>
                                                                        <th>Qty`</th>
                                                                        <th>Tahun</th>
                                                                        <th>Type</th>
                                                                        <th>Payload</th>
                                                                        <th>Status</th>
                                                                        <th>Services History Terakhir</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1; ?>
                                                                    <?php foreach ($kendaraan as $k) : ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i; ?></th>
                                                                        <td><?= $k['vendor_name'] ?></td>
                                                                        <td><?= $k['kendaraan_jenis'] ?></td>
                                                                        <td><?= $k['kendaraan_merk'] ?></td>
                                                                        <td><?= $k['kendaraan_qty'] ?></td>
                                                                        <td><?= $k['kendaraan_tahun'] ?></td>
                                                                        <td><?= $k['kendaraan_type'] ?></td>
                                                                        <td><?= $k['kendaraan_payload'] ?></td>
                                                                        <td><?= $k['kendaraan_status'] ?></td>
                                                                        <td><?= $k['kendaraan_services_terakhir'] ?></td>
                                                                        <td>
                                                                            <a href="" class="btn btn-custon-rounded-four btn-warning" data-toggle="modal" data-target="#neweditKendaraanAsset<?= $k['kendaraan_id'] ?>">edit</a>
                                                                            <a href="<?= base_url('index.php/vendor/display_asset/delete_kendaraan/'.$k['kendaraan_id']); ?>" class="btn btn-custon-rounded-four btn-danger">delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $i++; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Add -->
                                            <div class="modal fade" tabindex="-1" role="dialog" id="newKendaraanAsset">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Asset Kendaraan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="<?= base_url('index.php/vendor/display_asset/add_kendaraan'); ?>" method="post">
                                                        <div class="modal-body">
                                                            
                                                            <div class="form-group">
                                                                <select name="vendor_id" id="vendor_id" class="form-control">
                                                                    <option value="" selected="" disabled>Select Vendor</option>
                                                                    <?php foreach($vendor as $v) : ?>
                                                                    <option value="<?= $v['vendor_id']; ?>"><?= $v['vendor_name']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id = $this->session->userdata('user_id'); ?>">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="kendaraan_jenis" name="kendaraan_jenis" placeholder="Jenis Kendaraan" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="kendaraan_merk" name="kendaraan_merk" placeholder="Merk" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control" id="kendaraan_qty" name="kendaraan_qty" placeholder="Qty" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control" id="kendaraan_tahun" name="kendaraan_tahun" placeholder="Tahun" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="kendaraan_type" name="kendaraan_type" placeholder="Type" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control" id="kendaraan_payload" name="kendaraan_payload" placeholder="Payload" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="kendaraan_status" name="kendaraan_status" placeholder="Status" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="date" class="form-control" id="kendaraan_services_terakhir" name="kendaraan_services_terakhir" placeholder="" required>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer bg-whitesmoke br">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Add Asset Kendaraan</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>

                                                <?php foreach ($kendaraan as $k) :
                                                $id=$k['kendaraan_id'];
                                                ?>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" tabindex="-1" role="dialog" id="neweditKendaraanAsset<?= $id; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Menu</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="<?= base_url('index.php/vendor/display_asset/edit_kendaraan'); ?>" method="post">
                                                        <div class="modal-body">
                                                        <input type="hidden" id="kendaraan_id" name="kendaraan_id" value="<?= $id; ?>">
                                                        <?php foreach($vendor as $v) : ?>
                                                            <input type="hidden" id="vendor_id" name="vendor_id" value="<?= $v['vendor_id']; ?>">
                                                        <?php endforeach; ?>
                                                            
                                                            <div class="form-group">
                                                                <label>Jenis Kendaraan</label>
                                                                <input type="text" class="form-control" id="kendaraan_jenis" name="kendaraan_jenis" required value="<?= $k['kendaraan_jenis']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Merk</label>
                                                                <input type="text" class="form-control" id="kendaraan_merk" name="kendaraan_merk" required value="<?= $k['kendaraan_merk']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Qty</label>
                                                                <input type="number" class="form-control" id="kendaraan_qty" name="kendaraan_qty" required value="<?= $k['kendaraan_qty']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Tahun</label>
                                                                <input type="number" class="form-control" id="kendaraan_tahun" name="kendaraan_tahun" required value="<?= $k['kendaraan_tahun']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <input type="text" class="form-control" id="kendaraan_type" name="kendaraan_type" required value="<?= $k['kendaraan_type']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Payload</label>
                                                                <input type="number" class="form-control" id="kendaraan_payload" required name="kendaraan_payload" value="<?= $k['kendaraan_payload']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <input type="text" class="form-control" id="kendaraan_status" name="kendaraan_status" required value="<?= $k['kendaraan_status']; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Kendaraan Services Terakhir</label>
                                                                <input type="date" class="form-control" id="kendaraan_services_terakhir" name="kendaraan_services_terakhir" required value="<?= $k['kendaraan_services_terakhir']; ?>">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer bg-whitesmoke br">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit Asset</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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
<br><br>
<!-- Basic Form End-->
<!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list basic-res-b-30 shadow-reset">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Identifikasi Bidang Usaha - (A.2 General)</h1>
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
                                        <!-- <?= $this->session->flashdata('message'); ?> -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sparkline10-list shadow-reset mg-t-30">
                                                    <div class="sparkline10-hd">
                                                        <div class="main-sparkline10-hd">
                                                            <h1>Asset General</h1>
                                                        </div>
                                                    </div>
                                                    <div class="sparkline10-graph">
                                                        
                                                        <div class="static-table-list table-responsive">
                                                            <table class="table border-table" id="dynamic_field">
                                                                <thead>
                                                                    <div class="d-flex justify-content-start">
                                                                    <a href="#" class="btn btn-primary login-submit-cs" data-toggle="modal" data-target="#newGeneralAsset">Tambah Asset General</a>
                                                                    <br><br>
                                                                    </div>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Vendor</th>
                                                                        <th>Jenis Asset</th>
                                                                        <th>Qty`</th>
                                                                        <th>Status Kepemilikan</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1; ?>
                                                                    <?php foreach ($general as $g) : ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i; ?></th>
                                                                        <td><?= $g['vendor_name'] ?></td>
                                                                        <td><?= $g['general_jenis_asset'] ?></td>
                                                                        <td><?= $g['general_qty'] ?></td>
                                                                        <td><?= $g['general_status_kepemilikan'] ?></td>
                                                                        <td>
                                                                            <a href="" class="btn btn-custon-rounded-four btn-warning" data-toggle="modal" data-target="#neweditGeneralAsset<?= $g['general_id'] ?>">edit</a>
                                                                            <a href="<?= base_url('index.php/vendor/display_asset/delete_generalasset/'.$g['general_id']); ?>" class="btn btn-custon-rounded-four btn-danger">delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $i++; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <!-- Modal Add -->
                                    <div class="modal fade" tabindex="-1" role="dialog" id="newGeneralAsset">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Asset General</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="<?= base_url('index.php/vendor/display_asset/add_generalasset'); ?>" method="post">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <select name="vendor_id" id="vendor_id" class="form-control">
                                                            <option value="" selected="" disabled>Select Vendor</option>
                                                            <?php foreach($vendor as $v) : ?>
                                                            <option value="<?= $v['vendor_id']; ?>"><?= $v['vendor_name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id = $this->session->userdata('user_id'); ?>">

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="general_jenis_asset" name="general_jenis_asset" placeholder="Jenis Asset" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="general_qty" name="general_qty" placeholder="Qty" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="general_status_kepemilikan" name="general_status_kepemilikan" placeholder="Status Kepemilikan" required>
                                                    </div>

                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add General Asset</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </form>

                                        <?php foreach ($general as $g) :
                                        $id=$g['general_id'];
                                        ?>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" tabindex="-1" role="dialog" id="neweditGeneralAsset<?= $id; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Menu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="<?= base_url('index.php/vendor/display_asset/edit_generalasset'); ?>" method="post">
                                                <div class="modal-body">
                                                <input type="hidden" id="general_id" name="general_id" value="<?= $id; ?>">
                                                <?php foreach($vendor as $v) : ?>
                                                    <input type="hidden" id="vendor_id" name="vendor_id" value="<?= $v['vendor_id']; ?>">
                                                <?php endforeach; ?>
                                                    
                                                    <div class="form-group">
                                                        <label>Jenis Asset</label>
                                                        <input type="text" class="form-control" id="general_jenis_asset" name="general_jenis_asset" required value="<?= $g['general_jenis_asset']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Qty</label>
                                                        <input type="number" class="form-control" id="general_qty" name="general_qty" required value="<?= $g['general_qty']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status Kepemilikan</label>
                                                        <input type="text" class="form-control" id="general_status_kepemilikan" name="general_status_kepemilikan" required value="<?= $g['general_status_kepemilikan']; ?>">
                                                    </div>

                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit Asset</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    <?php endforeach; ?>
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
<br><br>
<!-- Basic Form End-->

<!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list basic-res-b-30 shadow-reset">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Identifikasi Bidang Usaha - (A.3 Sertifikat)</h1>
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
                                        <!-- <?= $this->session->flashdata('message'); ?> -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sparkline10-list shadow-reset mg-t-30">
                                                    <div class="sparkline10-hd">
                                                        <div class="main-sparkline10-hd">
                                                            <h1>Asset Sertifikasi</h1>
                                                        </div>
                                                    </div>
                                                    <div class="sparkline10-graph">
                                                        
                                                        <div class="static-table-list table-responsive">
                                                            <table class="table border-table" id="dynamic_field">
                                                                <thead>
                                                                    <div class="d-flex justify-content-start">
                                                                    <a href="#" class="btn btn-primary login-submit-cs" data-toggle="modal" data-target="#newSertifikasiAsset">Tambah Asset Sertifikasi</a>
                                                                    <br><br>
                                                                    </div>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Vendor</th>
                                                                        <th>Jenis</th>
                                                                        <th>Tahun</th>
                                                                        <th>Nomor</th>
                                                                        <th>File Sertifikasi</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1; ?>
                                                                    <?php foreach ($sertifikasi as $s) : ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i; ?></th>
                                                                        <td><?= $s['vendor_name'] ?></td>
                                                                        <td><?= $s['sertifikasi_jenis'] ?></td>
                                                                        <td><?= $s['sertifikasi_tahun'] ?></td>
                                                                        <td><?= $s['sertifikasi_nomor'] ?></td>
                                                                        <td class="text-center"><img src="<?= sprintf("http://localhost/proyek_poslog/assets/upload/img_displayasset/%s", $s['sertifikasi_file']); ?>" width="66px" height="64px"></td>
                                                                        <td>
                                                                            <a href="" class="btn btn-custon-rounded-four btn-warning" data-toggle="modal" data-target="#neweditSertifikasiAsset<?= $s['sertifikasi_id'] ?>">edit</a>
                                                                            <a href="<?= base_url('index.php/vendor/display_asset/delete_sertifikasiasset/'.$s['sertifikasi_id']); ?>" class="btn btn-custon-rounded-four btn-danger">delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $i++; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- Modal Add -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="newSertifikasiAsset">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Asset Sertifikasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <?php echo form_open_multipart('vendor/display_asset/add_sertifikasi'); ?>
                                                <!-- <form action="<?= base_url('index.php/vendor/display_asset/add_sertifikasi'); ?>" method="post"> -->
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <select name="vendor_id" id="vendor_id" class="form-control">
                                                                <option value="" selected="" disabled>Select Vendor</option>
                                                                <?php foreach($vendor as $v) : ?>
                                                                <option value="<?= $v['vendor_id']; ?>"><?= $v['vendor_name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id = $this->session->userdata('user_id'); ?>">

                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="sertifikasi_jenis" name="sertifikasi_jenis" placeholder="Jenis Sertifikasi" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="sertifikasi_tahun" name="sertifikasi_tahun" placeholder="Tahun" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="sertifikasi_nomor" name="sertifikasi_nomor" placeholder="Nomor" required>
                                                        </div>

                                                        <div class=" custom-file">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                            <input type="file" class="custom-file-input" id="sertifikasi_file" name="sertifikasi_file" placeholder="Image">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add Asset Sertifikasi</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </form>

                                            <?php foreach ($sertifikasi as $s) :
                                            $id=$s['sertifikasi_id'];
                                            $file=$s['sertifikasi_file'];
                                            ?>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="neweditSertifikasiAsset<?= $id; ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Menu</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <!-- <form action="<?= base_url('index.php/vendor/display_asset/edit_sertifikasi'); ?>" method="post"> -->
                                                <?php echo form_open_multipart('vendor/display_asset/edit_sertifikasi'); ?>
                                                    <div class="modal-body">
                                                    <input type="hidden" id="sertifikasi_id" name="sertifikasi_id" value="<?= $id; ?>">
                                                    <input type="hidden" id="sertifikasi_file" name="sertifikasi_file" value="<?= $file; ?>">
                                                    <?php foreach($vendor as $v) : ?>
                                                        <input type="hidden" id="vendor_id" name="vendor_id" value="<?= $v['vendor_id']; ?>">
                                                    <?php endforeach; ?>
                                                        
                                                        <div class="form-group">
                                                            <label>Jenis Sertifikasi</label>
                                                            <input type="text" class="form-control" id="sertifikasi_jenis" name="sertifikasi_jenis" required value="<?= $s['sertifikasi_jenis']; ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tahun</label>
                                                            <input type="number" class="form-control" id="sertifikasi_tahun" name="sertifikasi_tahun" required value="<?= $s['sertifikasi_tahun']; ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Nomor</label>
                                                            <input type="number" class="form-control" id="sertifikasi_nomor" name="sertifikasi_nomor" required value="<?= $s['sertifikasi_nomor']; ?>">
                                                        </div>

                                                        <div class=" custom-file">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                            <input type="file" class="custom-file-input" id="sertifikasi_file" name="sertifikasi_file" placeholder="Image">
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Edit Asset</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        <?php endforeach; ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <?php echo form_open_multipart('vendor/display_asset/update_status'); ?>

    <?php foreach($vendor as $v) : ?>
      <input type="hidden" id="vendor_id" name="vendor_id" value="<?= $v['vendor_id']; ?>">
    <?php endforeach; ?>

    <center>
    <button type="submit" class="pull-right btn btn-primary">Complete!</button>
    </center>
    </form>
</div>
<!-- Basic Form End-->