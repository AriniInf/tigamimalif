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
            <form action="{{ url('/add-kategori') }}" method="POST">
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="kategori">Kategori</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="password">Deskripsi</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>