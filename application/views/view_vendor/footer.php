</div>
</div>

<!-- jquery
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/bootstrap.min.js"></script>
<!-- meanmenu JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/jquery.meanmenu.js"></script>
<!-- mCustomScrollbar JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sticky JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/jquery.sticky.js"></script>
<!-- scrollUp JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/jquery.scrollUp.min.js"></script>
<!-- counterup JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/counterup/waypoints.min.js"></script>
<!-- modal JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/modal-active.js"></script>
<!-- icheck JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/icheck/icheck-active.js"></script>
<!-- main JS
		============================================ -->
<script src="<?php echo base_url() ?>assets/Template_Admin/base/js/main.js"></script>
</body>

</html>

<!-- Custom Files Upload -->
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
     </script>
<!-- end -->

<!-- Swal Delete @raflyid -->
    <script src="<?= base_url('assets/'); ?>Template_Admin/sweetalert2/raflyid_swal.js"></script>
<!-- end -->

<script type="text/javascript">
$(document).ready(function() {
    $('#div_cat').hide();
    // Classification
    $.ajax({
        url: "<?php echo base_url();?>index.php/vendor/registration/get_classification",
        method: "GET",
        async: false,
        dataType: 'json',
        success: function(data) {
            var html = '';
            html = '<option value=\"' + '\">--- Pilih Klasifikasi ---</option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=\"' + data[i].class_id + '\">' + data[i].class_name +
                    '</option>';
            }
            $('#classification').html(html);
            console.log(data);
        }
    });

    // Business Field
    $.ajax({
        url: "<?php echo base_url();?>index.php/vendor/registration/get_business_field",
        method: "GET",
        async: false,
        dataType: 'json',
        success: function(data) {
            var html = '';
            html = '<option value=\"' + '\">--- Pilih Bidang Usaha ---</option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=\"' + data[i].business_field_id + '\">' + data[i]
                    .business_field_name +
                    '</option>';
            }
            $('#business_field').html(html);
            console.log(data);
        }
    });

    // Kategori Business Field
    $('#business_field').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url();?>index.php/vendor/registration/get_category_business_field/"+id,
            method: "GET",
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                html = '<option value=\"' + '\">--- Pilih Kategori Bidang Usaha ---</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=\"' + data[i].category_id + '\">' + data[i]
                        .category_name +
                        '</option>';
                }
                if(data.length != 0){
                    $('#div_cat').show();
                    $('#category_business_field').html(html);
                    console.log(data);
                }else{
                    $('#div_cat').hide();
                    html = '<option value=\"' + '\">--- Pilih Kategori Bidang Usaha ---</option>';
                    $('#category_business_field').html(html);
                    console.log(data);
                }
                
            }
        });
    });

    // Provinsi
    $.ajax({
        url: "http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
        method: "GET",
        async: false,
        dataType: 'json',
        success: function(data) {
            var html = '';
            html = '<option myid=\"' + '\" value=\"' + '\">--- Pilih Provinsi ---</option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option myid=\"' + data[i].id + '\" value=\"' + data[i].name + '\">' + data[i].name +
                    '</option>';
            }
            $('#provinsi').html(html);
            console.log(data);
            var htmlKota = '<option myid=\"' + '\" value=\"' + '\">--- Pilih Kabupaten/Kota ---</option>';
            var htmlKecamatan = '<option myid=\"' + '\" value=\"' +
                '\">--- Pilih Kecamatan ---</option>';
            var htmlKelurahan = '<option myid=\"' + '\" value=\"' +
                '\">--- Pilih Kelurahan ---</option>';
            $('#kota').html(htmlKota);
            $('#kecamatan').html(htmlKecamatan);
            $('#kelurahan').html(htmlKelurahan);
        }
    });

    //Kabupaten/kota
    $('#provinsi').change(function() {
        var id = $('option:selected', this).attr('myid');
        if (id != '') {
            $.ajax({
                url: "http://www.emsifa.com/api-wilayah-indonesia/api/regencies/" + id +
                    ".json",
                method: "GET",
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var htmlKecamatan = '';
                    var htmlKelurahan = '';
                    html = '<option myid=\"' + '\" value=\"' + '\">--- Pilih Kabupaten/Kota ---</option>';
                    htmlKecamatan = '<option value=\"' +
                        '\">--- Pilih Kecamatan ---</option>';
                    htmlKelurahan = '<option myid=\"' + '\" value=\"' +
                        '\">--- Pilih Kelurahan ---</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option myid=\"' + data[i].id + '\" value=\"' + data[i].name + '\">' + data[i]
                            .name + '</option>';
                    }
                    $('#kota').html(html);
                    $('#kecamatan').html(htmlKecamatan);
                    $('#kelurahan').html(htmlKelurahan);
                }
            });
        } else {
            var htmlKota = '';
            var htmlKecamatan = '';
            var htmlKelurahan = '';
            htmlKota = '<option myid=\"' + '\" value=\"' + '\">--- Pilih Kabupaten/Kota ---</option>';
            htmlKecamatan = '<option myid=\"' + '\" value=\"' +
                '\">--- Pilih Kecamatan ---</option>';
            htmlKelurahan = '<option myid=\"' + '\" value=\"' +
                '\">--- Pilih Kelurahan ---</option>';
            $('#kota').html(htmlKota);
            $('#kecamatan').html(htmlKecamatan);
            $('#kelurahan').html(htmlKelurahan);
        }

        //Kecamatan
        $('#kota').change(function() {
            var id = $('option:selected', this).attr('myid');
            if (id != '') {
                $.ajax({
                    url: "http://www.emsifa.com/api-wilayah-indonesia/api/districts/" +
                        id +
                        ".json",
                    method: "GET",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option myid=\"' + '\" value=\"' +
                            '\">--- Pilih Kecamatan ---</option>';
                        htmlKelurahan = '<option myid=\"' + '\" value=\"' +
                            '\">--- Pilih Kelurahan ---</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option myid=\"' + data[i].id + '\" value=\"' + data[i].name + '\">' + data[
                                    i]
                                .name + '</option>';
                        }
                        $('#kecamatan').html(html);
                        $('#kelurahan').html(htmlKelurahan);
                    }
                });
            } else {
                var htmlKecamatan = '';
                var htmlKelurahan = '';
                htmlKecamatan = '<option myid=\"' + '\" value=\"' +
                    '\">--- Pilih Kecamatan ---</option>';
                htmlKelurahan = '<option myid=\"' + '\" value=\"' +
                    '\">--- Pilih Kelurahan ---</option>';
                $('#kecamatan').html(htmlKecamatan);
                $('#kelurahan').html(htmlKelurahan);
            }
        });

        //Kelurahan
        $('#kecamatan').change(function() {
            var id = $('option:selected', this).attr('myid');
            if (id != '') {
                $.ajax({
                    url: "http://www.emsifa.com/api-wilayah-indonesia/api/villages/" +
                        id +
                        ".json",
                    method: "GET",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html = '<option myid=\"' + '\" value=\"' +
                            '\">--- Pilih Kelurahan ---</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option myid=\"' + data[i].id + '\" value=\"' + data[i].name + '\">' + data[
                                    i]
                                .name + '</option>';
                        }
                        $('#kelurahan').html(html);
                    }
                });
            } else {
                var htmlKelurahan = '';
                htmlKelurahan = '<option myid=\"' + '\" value=\"' +
                    '\">--- Pilih Kelurahan ---</option>';
                $('#kelurahan').html(htmlKelurahan);
            }
        });
    });
});
</script>