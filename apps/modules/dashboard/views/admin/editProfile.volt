<html>
<h1>Arini</h1>
{% for ad in admin %}
<div class="home-content">
    <label>Edit Profil</label>
    <form class="data-form" action="/admin/update-profile" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{ad['nama']}}" required>
        </div>
        <div class="form-group">
            <label for="usia">Usia</label><br>
            <input type="text" name="usia" id="usia" value="{{ad['usia']}}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label><br>
            <input type="text" name="alamat" id="alamat" value="{{ad['alamat']}}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Email</label><br>
            <input type="text" name="email" id="email" value="{{ad['email']}}" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" id="id" value="{{ad['id']}}">
        </div>

        <input class="log-btn" type="submit" value="Jawab">
    </form>
</div>
{% endfor %}

</html>