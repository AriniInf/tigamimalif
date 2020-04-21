<?php foreach ($karyawan as $y){?>
<div role="dialog" tabindex="-1" id="edit-data{{y.id}}" class="modal fade" data-toggle="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Update Data</h4>
            </div>
            <form class="form-horizontal" action="/edit-karyawan" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-10">
                            <input type="hidden" id="id" name="id" value={{y.id}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Username</label>
                        <div class="col-lg-10">
                            <input type="r=text" class="form-control" id="tanggal" name="tanggal" value={{y.username}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nama" name="nama" value={{y.nama}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Usia</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="usia" name="usia" value={{y.usia}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" name="email" value={{y.email}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value={{y.alamat}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">No Telp</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="notelp" name="notelp" value={{y.notelp}}>
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
<?php } ?>