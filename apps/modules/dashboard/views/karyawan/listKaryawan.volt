<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <table border="1">
        <thead>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Email</th>
            <th>No telp</th>
            <th>Alamat</th>
            <th>Flag</th>
            <th colspan="3">Aksi</th>
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
            <td>{{ y.notelp }}</td>
            <td>{{ y.alamat }}</td>
            <td>{{ y.flag }}</td>
            <td>
                <form action="/verifikasi-karyawan" method="post">
                    <input type="hidden" name="id" value={{y.id}}>
                    <input type="submit" class="btn btn-info btn-sm" onclick="return validateDialog();" value="validate">
                </form>
            </td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data{{y.id}}">Edit</button>
                <div class="modal fade" id="edit-data{{y.id}}" role="dialog">
                    <div class="modal-dialog modal-lg">
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
            </td>
            <td>
                <a type="button" class="btn btn-danger btn-sm" href='/delete-karyawan/{{y.id}}' onclick="return deleteDialog();">Hapus</a>
            </td>
        </tbody>
        <?php }?>
    </table>

</body>
<script>
    function deleteDialog() {
        return confirm("Are you sure you want to delete this record?")
    }

    function validateDialog() {
        return confirm("Are you sure you want to validate this record?")
    }
</script>

</html>