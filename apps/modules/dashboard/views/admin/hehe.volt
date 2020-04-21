{% extends "template/base.volt" %} {% block content %}
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>List Kategori
                        <div class="page-title-subheading">Kategori-kategori produk
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="box-body" style="overflow-y:scroll">
            <table id="example2" class="table table-striped table-bordered bg-danger table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($kategoris as $y) { ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            {{y.kategori}}
                        </td>
                        <td>
                            {{ y.deskripsi }}
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-edit<?php echo $y->id_peristiwa;?>"><em class="fa fa-pencil btn btn-sm btn-danger btn-create"></em></a>
                            <a data-toggle="modal" onclick="delete_confirm()"><em class="fa fa-trash btn btn-sm btn-danger"></em></a>
                        </td>
                        <?php }?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{% endblock %}