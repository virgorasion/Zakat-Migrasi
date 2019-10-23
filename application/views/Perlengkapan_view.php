<?php 
$this->load->view('template/head');
$this->load->view('template/side');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row col-md-12">
                    <div class="col-md-2">
                        <select class="form-control" name="select_ruangan" id="select_ruangan">
                        <option value="0">Semua</option>
                        <?php foreach($data_ruangan as $data_ruang){?>
                            <option value="<?=$data_ruang->id?>"><?= $data_ruang->nama_ruang ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <table id="table_perlengkapan" class="table table-bordered table-striped table-responsive table-hover">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tempat</td>
                            <td>Nama Barang</td>
                            <td>Kondisi</td>
                            <td>Jumlah</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody id="content_table">

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('template/foot');
$this->load->view('template/js');
?>
<script>
    $(document).ready(function(){
        // $.ajax({
        //     url: "<?= site_url("Perlengkapan_ctrl/dataSemuaPerlengkapan/") ?>",
        //     type: "POST",
        //     beforeSend:function(waiting){

        //     },
        //     success:function(result){
        //         let data = JSON.parse(result);
        //         let html = "";
        //         $.each(data, function(i){
        //             html += '<tr>'
        //             +  '  <td>'+(i+1)+'</td>'
        //             +  '  <td>'+data[i].nama_ruang+'</td>'
        //             +  '  <td>'+data[i].nama_barang+'</td>'
        //             +  '  <td>'+data[i].kondisi+'</td>'
        //             +  '  <td>'+data[i].jumlah+'</td>'
        //             +  '  <td>'
        //             +   ' <span data-placement="top" data-toggle="tooltip" title="Edit">'
        //             +   '     <button class="btn btn-warning btn-xs btnEdit" data-id="'+data[i].id+'" data-ruang="'+data[i].nama_ruang+'" data-barang="'+data[i].nama_barang+'" data-kondisi="'+data[i].kondisi+'" data-jumlah="'+data[i].jumlah+'" id="btnEdit">'
        //             +   '     <span class="glyphicon glyphicon-pencil"></span>'
        //             +   '     </button>'
        //             +   ' </span>'
        //             +   ' <span data-placement="top" data-toggle="tooltip" title="Delete">'
        //             +   '     <button class="btn btn-danger btn-xs btnDelete" data-id="'+data[i].id+'" id="btnDelete">'
        //             +   '     <span class="glyphicon glyphicon-remove"></span>'
        //             +   '     </button>'
        //             +   ' </span>'
        //             +   ' </td>'
        //             + '</tr>';
        //             $("#content_table").html(html);
        //         })
        //     }
        // })

        // Setup datatables
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    let url = "<?= site_url('Perlengkapan/dataPerlengkapanTiapRuangan/')?>" + ruangan; 
    var table = $("#table_perlengkapan").dataTable({
        initComplete: function() {
            var api = this.api();
            $('#mytable_filter input')
                .off('.DT')
                .on('input.DT', function() {
                    api.search(this.value).draw();
            });
        },
            oLanguage: {
            sProcessing: 'Loading....'
        },
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {"url": url, "type": "POST"},
                columns: [
                    {
                        "data": null,
                        "orderable": false,
                        "searchable": false
                    },
                    {"data": "ruang"},
                    {"data": "barang"},
                    {"data": "kondisi"},
                    {"data": "jumlah"},
                    {"data": "action"}
                ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
    // end setup datatables
    })
    $("#table_perlengkapan").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "responsive": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });

    // $("#select_ruangan").on("change",function(item){
    //     console.log($(this).val());
    //     let ruangan = $(this).val();
    //     if (ruangan == 0) {
            
    //     }else{
    //         let url = "<?= site_url('Perlengkapan/dataPerlengkapanTiapRuangan/')?>" + ruangan; 
    //         $.ajax({
    //             url: url,
    //             type: "POST",
    //             beforeSend:function(){

    //             },
    //             success:function(result){

    //             }
    //         })
    //     }
    // });
</script>