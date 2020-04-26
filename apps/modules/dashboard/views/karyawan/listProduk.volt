{% extends "template/mainkaryawan.volt" %} {% block content %}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1 class="m-0 text-dark">List Produk</h1>
            </div>
            <div class="col-sm-7" style="color: blue;">
                <?php echo $this->flashSession->output() ?>
            </div>
            <div class="col-sm-1">
                <button style="float: right;" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#add-data">Tambah</button>
            </div>
            <div class="modal fade" id="add-data">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Produk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form id="form" class="form-horizontal" action="/karyawan/add-produk" method="post" enctype="multipart/form-data" role="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Kategori</label>
                                    <div class="col-lg">
                                        <select class='form-control input-md' name='id_kategori' id='id_kategori'>
                                        <option value="">Pilih Kategori</option>
                                        {% for kat in kategoris %}
                                        <option value="{{kat.id}}">{{kat.kategori}}</option>
                                        {% endfor %}
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Produk</label>
                                    <div class="col-lg">
                                        <input type="text" class="form-control" id="produk" name="produk" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Stok</label>
                                    <div class="col-lg">
                                        <input type="text" class="form-control" id="stok" name="stok" value="" required>
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
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>{% for pro in produk %}
                <tr>
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>{{pro['kategori']}}</td>
                    <td>{{ pro['produk']}}</td>
                    <td>{{ pro['stok']}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#edit-data{{pro['id']}}"><i class="fas fa-pencil-alt">
                        </i>  Edit</button>
                        <div class="modal fade" id="edit-data{{pro['id']}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Karyawan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                    <form class="form-horizontal" action="/admin/edit-produk" method="post" enctype="multipart/form-data" role="form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-lg">
                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{pro['id']}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg">
                                                    <input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="{{pro['id_kategori']}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label">Produk</label>
                                                <div class="col-lg">
                                                    <input type="text" class="form-control" id="produk" name="produk" value="{{pro['produk']}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label">Stok</label>
                                                <div class="col-lg">
                                                    <input type="text" class="form-control" id="stok" name="stok" value="{{pro['stok']}}" required>
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
                        <a type="button" class="btn btn-danger btn-md" href="/karyawan/delete-produk/{{pro['id']}}" onclick="return deleteDialog();"><i class="fas fa-trash">
                        </i> Hapus</a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Stok</th>
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