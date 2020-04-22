{% extends "template/mainadmin.volt" %} {% block content %}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-11">
                <h1 class="m-0 text-dark">List Kategori</h1>
            </div>
            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#add-data">Tambah</button>
            <div class="modal fade" id="add-data">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Produk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form class="form-horizontal" action="/admin/add-kategori" method="post" enctype="multipart/form-data" role="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Kategori</label>
                                    <div class="col-lg">
                                        <input type="text" class="form-control" id="kategori" name="kategori" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Deskripsi</label>
                                    <div class="col-lg">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg">
                                        <input type="hidden" class="form-control" id="id" name="id" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer form-group">
                                <button class="btn btn-info" type="submit">Simpan</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                <th>Kategori</th>
                <th>Deskripsi</th>
            </thead>
            <?php $no = 1; foreach ($kategoris as $y) { ?>
            <tbody>
                <td>
                    <?php echo $no++ ?>
                </td>
                <td>{{y.kategori}}</td>
                <td>{{ y.deskripsi }}</td>

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