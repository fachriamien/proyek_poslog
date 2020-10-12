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
                                <li><span class="bread-blod">Unggah Perbaikan</span>
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
                            <h1>Unggah Perbaikan Dokumen</h1>
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
                                    <?php
                                        echo form_open_multipart('vendor/dashboard/unggah_perbaikan/'.$vendor_id);
                                    ?>
                                            <div class="form-group-inner">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dokumen</th>
                                                        <th>Aksi</th>
                                                        
                                                    </tr>
							                    </thead>
                                                <?php
                                                        $no=1;
                                                        if(!empty($hasil))
                                                        {
                                                            ?>
                                                            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>"/>
                                                            <?php
                                                            foreach($hasil as $data)
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td> <?php echo $no; ?></td>
                                                                    <td> <?php echo $data->doc_type_name; ?></td>
                                                                    <td> <input type="hidden" name="doc_type_id[]" value="<?php echo $data->doc_type_id; ?>"/>
                                                                    <!-- <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                        <div class="input append-small-btn">
                                                                            <div class="file-button">
                                                                                Browse
                                                                                <input type="file"  name="dokumen[]" onchange="document.getElementById('append-small-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="append-small-btn" placeholder="no file selected">
                                                                        </div>
                                                                    </div> -->
                                                                    <input type="file"  name="dokumen[]"/>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                        $no++;
                                                    }
                                                }
                                                ?>
                                            </table>
                                            </div>
                                            <div class="pull-right">
                                            <input class="btn btn-sm btn-primary login-submit-cs"
                                                                name="submit" type="submit" value="Save Change"/>
                                            </div>
                                            <?php
                                                echo form_close();
                                            ?>
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