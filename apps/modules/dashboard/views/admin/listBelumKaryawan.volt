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
                    <form action="/admin/verifikasi-karyawan" method="post">
                        <input type="hidden" name="id" value={{y.id}}>
                        <input type="submit" class="btn btn-info btn-sm" onclick="return validateDialog();" value="validate">
                    </form>
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