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
                                <li><a href="#">Verifikasi Data</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="#">Tampilan Dokumen</a> 
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
                            <h1>Unggah Dokumen</h1>
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
                                    <!-- <?php
                                        echo form_open_multipart('vendor/upload_dokumen/unggah_dokumen/');
                                    ?> -->
                                            <div class="form-group-inner">
                                            
                                                <?php
                                                        
                                                        if(!empty($group))
                                                        {
                                                            ?>
                                                            <input type="hidden" name="vendor_id" value="<?php echo $hasil['vendor_id']; ?>"/>
                                                            <?php
                                                            foreach($group as $data)
                                                            {
                                                                ?>
                                                                <label><?php echo $data->doc_group_name; ?></label>
                                                                <table class="table table-bordered" width="100%" cellspacing="0" style="align:'left'">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Dokumen</th>
                                                                                    <th>Aksi</th>
                                                                                    
                                                                                </tr>
                                                                            </thead>
                                                                <?php
                                                                    $no=1;
                                                                    foreach($dokumen as $doc)
                                                                    {
                                                                        
                                                                         if($doc['doc_group_id'] == $data->doc_group_id){ 
                                                                           ?>
                                                                            <tr>
                                                                                <td> <?php echo $no; ?></td>
                                                                                <td style="text-align:left"> <?php echo $doc['doc_type_name'] ?></td>
                                                                                <td> <a href="<?php echo base_url("index.php/bod/dashboard/viewPDF/").$doc['doc_file']?>">file</a></td>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                       
                                                                             $no++;
                                                                             }
                                                                    }
                                                                ?>
                                                                </table>
                                                        <?php
                                                    }
                                                }
                                                ?>
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