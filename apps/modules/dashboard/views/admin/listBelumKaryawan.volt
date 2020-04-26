{% extends "template/mainadmin.volt" %} {% block content %}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
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
                <?php $no=1 ?>{% for kar in karyawan %}
                <tr>
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>{{kar.nama}}</td>
                    <td>{{kar.usia}}</td>
                    <td>{{kar.email}}</td>
                    <td>{{kar.alamat}}</td>
                    <td>
                        <form action="/admin/verifikasi-karyawan" method="post">
                            <input type="hidden" name="id" value={{kar.id}}>
                            <input type="submit" class="btn btn-info btn-md" onclick="return validateDialog();" value="validate">
                        </form>
                        <a type="button" class="btn btn-danger btn-md" href='/admin/delete-karyawan/{{kar.id}}' onclick="return deleteDialog();"><i class="fas fa-trash">
                        </i> Hapus</a>
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

    function validateDialog() {
        return confirm("Are you sure you want to validate this record?")
    }
</script>
{% endblock %}