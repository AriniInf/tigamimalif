<div class="home-content">
    <label>Form Edit Karyawan</label>
    <form class="data-form" action="/edit-karyawan" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-group">
            <label for="usia">Usia</label><br>
            <input type="text" name="usia" id="usia">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label><br>
            <input type="text" name="alamat" id="alamat">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" id="id" value={{karyawan.id}}>
        </div>

        <input class="log-btn" type="submit" value="Jawab">
    </form>
</div>