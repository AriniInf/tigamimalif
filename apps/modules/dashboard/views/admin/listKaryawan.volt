{% extends "template/mainadmin.volt" %} {% block content %}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-5">
                <h1 class="m-0 text-dark">List Karyawan</h1>
            </div>
            <div class="col-sm-7" style="color: blue;">
                <?php echo $this->flashSession->output() ?>
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
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>{% for kar in karyawan %}
                <tr>
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>{{kar.nama}}</td>
                    <td>{{kar.usia}}</td>
                    <td>{{kar.email}}</td>
                    <td>{{kar.alamat}}</td>
                    <td> <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data{{kar.id}}"><i class="fas fa-pencil-alt">
                    </i> Edit</button>
                        <div class="modal fade" id="edit-data{{kar.id}}">
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
                                                    <input type="hidden" id="id" name="id" value={{kar.id}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-sm-4 control-label">Username</label>
                                                <div class="col-lg">
                                                    <input type="r=text" class="form-control" id="tanggal" name="tanggal" value={{kar.username}} required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                                <div class="col-lg">
                                                    <input type="text" class="form-control" id="nama" name="nama" value={{kar.nama}} required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label">Usia</label>
                                                <div class="col-lg">
                                                    <input type="text" class="form-control" id="usia" name="usia" value={{kar.usia}} required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg col-sm control-label">Email</label>
                                                <div class="col-lg">
                                                    <input type="email" class="form-control" id="email" name="email" value={{kar.email}} required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                                                <div class="col-lg">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value={{kar.alamat}} required>
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

                        <a type="button" class="btn btn-danger btn-sm" href='/admin/delete-karyawan/{{kar.id}}' onclick="return deleteDialog();"><i class="fas fa-trash">
                        </i>  Hapus</a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

    </div>
    <!-- /.card-body -->
</div>

</body>
<script>
    function deleteDialog() {
        return confirm("Are you sure you want to delete this record?")
    }
</script>
{% endblock %}