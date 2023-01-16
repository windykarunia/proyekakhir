<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Update Buku</title >
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Buku
            </div>
            <div class="card-body">
                <form name="" id="" method="post" action="{{url('update_buku')}}/{{ $post->id_buku }}">
                @csrf
                    <div class="form-group">
                        <label for="id_buku">id Buku</label>
                        <input type="text" id="id_buku" name="id_buku" class="form-control @error('id_buku') is-invalid @enderror""  value="{{ $post->id_buku }}">
                        @error('id_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" id="judul_buku" name="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror""  value="{{ $post->judul_buku }}">
                        @error('judul_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input type="number" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror""  value="{{ $post->tahun }}">
                        @error('tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <textarea name="penulis" class="form-control @error('penulis') is-invalid @enderror"" >{{ $post->penulis }}</textarea>
                        @error('penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok_buku">Stok</label>
                        <input type="text" id="stok_buku" name="stok_buku" class="form-control @error('stok_buku') is-invalid @enderror"" " value="{{ $post->stok_buku }}">
                        @error('stok_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a class="btn btn-danger mt-2" href="{{ url('tampil_buku') }}">Batal</a>
                </form>
            </div>
        </div>
        </div>
</body>
</html>