{% extends "template/mainkaryawan.volt" %} {% block content %}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1 class="m-0 text-dark">List Penjualan</h1>
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
                            <h4 class="modal-title">Tambah Penjualan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form class="form-horizontal" action="/karyawan/add-penjualan" method="post" enctype="multipart/form-data" role="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Penjualan</label>
                                    <div class="col-lg">
                                        <select class='form-control input-md' name='id_produk' id='id_produk' required>
                                        <option value="">Pilih Produk</option>
                                        {% for pro in produk %}
                                        <option value="{{pro.id}}">{{pro.produk}}</option>
                                        {% endfor %}
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                                    <div class="col-lg">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                                    <div class="col-lg">
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="" required>
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
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>{% for beli in penjualan %}
                <tr>
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>{{beli['produk']}}</td>
                    <td>{{beli['tanggal']}}</td>
                    <td>{{beli['jumlah']}}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#edit-data{{beli['id']}}"><i class="fas fa-pencil-alt">
                        </i>Edit</button>

                        <div class="modal fade" id="edit-data{{beli['id']}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Penjualan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                    <form class="form-horizontal" action="/karyawan/edit-penjualan" method="post" enctype="multipart/form-data" role="form">
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
                {% endfor %}
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>

</body>

{% endblock %}