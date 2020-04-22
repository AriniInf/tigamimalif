<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="text-center">
            <div class="h2">Kategori</div>
            <form action="{{ url('/add-produk') }}" method="POST">
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="kategori">Produk</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="produk" name="produk">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="password">Kategori</label>
                    </div>
                    <div class="col-md-9">
                        <select class='form-control input-md' name='id_kategori' id='id_kategori'>
                            <option value="">Pilih Kategori</option>
                            {% for kat in kategori %}
                            <option value="{{kat.id}}">{{kat.kategori}}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="password">Stok</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="stok" name="stok">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>