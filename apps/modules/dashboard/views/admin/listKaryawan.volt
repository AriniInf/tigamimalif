{% extends "template/mainadmin.volt" %} {% block content %}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Karyawan</h1>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
                    <div class="modal fade" id="edit-data{{y.id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Karyawan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                                </div>
                                <form class="form-horizontal" action="/admin/edit-karyawan" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-lg-10">
                                                <input type="hidden" id="id" name="id" value={{y.id}}>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-4 control-label">Username</label>
                                            <div class="col-lg">
                                                <input type="r=text" class="form-control" id="tanggal" name="tanggal" value={{y.username}}>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" id="nama" name="nama" value={{y.nama}}>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label">Usia</label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" id="usia" name="usia" value={{y.usia}}>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg col-sm control-label">Email</label>
                                            <div class="col-lg">
                                                <input type="email" class="form-control" id="email" name="email" value={{y.email}}>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                                            <div class="col-lg">
                                                <input type="text" class="form-control" id="alamat" name="alamat" value={{y.alamat}}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </td>
                <td>
                    <a type="button" class="btn btn-danger btn-sm" href='/admin/delete-karyawan/{{y.id}}' onclick="return deleteDialog();">Hapus</a>
                </td>
            </tbody>
            <?php }?>
        </table>
    </div>
    <!-- /.card-body -->
</div>

</body>
<script>
    function deleteDialog() {
        return confirm("Are you sure you want to delete this record?")
    }

    function validateDialog() {
        return confirm("Are you sure you want to validate this record?")
    }
</script>
{% endblock %}