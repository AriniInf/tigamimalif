{% extends "template/mainkaryawan.volt" %} {% block content %}
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
                    <th>Skill</th>
                    <th>Notes</th>
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
                    <td>{{kar.skill}}</td>
                    <td>{{kar.note}}</td>

                    {% endfor %}
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Skill</th>
                    <th>Notes</th>
                </tr>
            </tfoot>
        </table>

    </div>
    <!-- /.card-body -->
</div>

</body>
{% endblock %}