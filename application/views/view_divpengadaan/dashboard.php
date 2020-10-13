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
                                        <h1>Daftar Vendor</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="card-body table-responsive">
                                       <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <td><strong>Vendor ID</td>
                                                    <td><strong>Nama Vendor</td>
                                                    <td><strong>Status</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($vendor as $d) { ?>
                                                <tr>
                                                    <td><?php echo $d['vendor_id']; ?></td>
                                                    <td><a href="<?php echo base_url("index.php/divpengadaan/dashboard/toDataVendor/"). $d['vendor_id'] ?>"><?php echo $d['vendor_name']; ?></a></td>
                                                    <td><?php echo $d['vendor_remark']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                       </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>