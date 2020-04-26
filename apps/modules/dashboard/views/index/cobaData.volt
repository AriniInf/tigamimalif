<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">




<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js "></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js "></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js "></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js "></script>

<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js "></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js "></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js "></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js "></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js "></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js "></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js "></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js "></script>



<table id="example1" class="table table-bordered table-striped">
    <thead>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Usia</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Flag</th>
        <th colspan="2">Aksi</th>
    </thead>
    <?php $no = 1; foreach ($karyawan as $y) { ?>
    <tbody>
        <td>
            <?php echo $no++ ?>
        </td>
        <td>{{y.username}}</td>
        <td>{{ y.nama }}</td>
        <td>{{ y.usia }}</td>
        <td>{{ y.email }}</td>
        <td>{{ y.alamat }}</td>
        <td>{{ y.flag }}</td>
        <td>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data{{y.id}}">Edit</button>
        </td>
        <td>
            <a type="button" class="btn btn-danger btn-sm" href='/admin/delete-karyawan/{{y.id}}' onclick="return deleteDialog();">Hapus</a>
        </td>
    </tbody>
    <?php }?>
</table>











<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Tanggal</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php $no = 1;?>{% for beli in pembelian %}
    <tbody>
        <tr>
            <td>
                <?php echo $no++ ?>
            </td>
            <td>{{beli['produk']}}</td>
            <td>{{beli['tanggal']}}</td>
            <td>{{beli['jumlah']}}</td>
            <td>
                <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#edit-data{{beli['id']}}">Edit</button>
                <div class="modal fade" id="edit-data{{beli['id']}}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Pembelian</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                            </div>
                            <form class="form-horizontal" action="/admin/edit-pembelian" method="post" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="col-lg">
                                            <input type="hidden" class="form-control" id="id" name="id" value="{{beli['id']}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg">
                                            <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="{{beli['id_produk']}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                        <div class="col-lg">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{beli['tanggal']}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{beli['jumlah']}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="submit"> Simpan</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
    {%endfor%}
</table>