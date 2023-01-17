<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Update Data Peminjaman</title >
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Peminjaman
            </div>
            <div class="card-body">
                <form method="post" action="{{url('update_pinjam')}}/{{ $post->id }}">
                @csrf
                <div class="form-group">
                        <label for="judul_buku" class="mb-2 mt-3">Judul Buku</label>
                        <select
                            class="form-control @error('id_buku') is-invalid @enderror"
                            id="position-option"
                            name="id_buku">
                                @foreach ($buku as $item)
                                    <option value="
                                        {{ $item->id_buku }}"
                                        {{$post->id_buku == $item->id_buku? 'selected' : null}}
                                        {{ old('id_buku') == $item->id_buku? 'selected' : null }}
                                        {{ old('id_buku') == $item->id_buku? 'selected' : null}}>
                                        {{ $item->judul_buku }}
                                    </option>
                                @endforeach
                        </select>
                                @error('id_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                </div>
                <div class="form-group">
                        <label for="nama_member" class="mb-2 mt-3">Nama member</label>
                        <select
                            class="form-control @error('id_member') is-invalid @enderror"
                            id="position-option"
                            name="id_member">
                                @foreach ($member as $items)
                                    <option
                                        value="
                                            {{ $items->ktp }}"
                                            {{$post->id_member == $items->ktp? 'selected' : null}}
                                            {{ old('id_member') == $items->ktp? 'selected' : null}}>
                                            {{ $items->nama }}
                                    </option>
                                @endforeach
                        </select>
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                    <input
                        type="date"
                        id="tanggal_peminjaman"
                        name="tanggal_peminjaman"
                        class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                        value="{{$post -> tanggal_peminjaman}}">
                    @error('tanggal_peminjaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                    <input
                        type="date"
                        id="tanggal_pengembalian"
                        name="tanggal_pengembalian"
                        class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                        value="{{$post -> tanggal_pengembalian}}">
                    @error('tanggal_pengembalian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Buku</label>
                        <select
                            class="form-control @error('jenis') is-invalid @enderror"
                            name="jenis"
                            id="jenis"
                            >
                            <option
                                @php
                                    $item= $post->jenis;
                                @endphp
                                @if ($item == 'novel')
                                    {{ 'selected' }}
                                @endif value="Novel">Novel</option>
                                <option
                                    {{-- @php
                                        $gender= $post->jenis_kelamin;
                                    @endphp --}}
                                    @if ($item == 'komik')
                                        {{ 'selected' }}
                                    @endif value="Komik">Komik
                                </option>
                                <option
                                    {{-- @php
                                        $gender= $post->jenis_kelamin;
                                    @endphp --}}
                                    @if ($item == 'ilmiah')
                                        {{ 'selected' }}
                                    @endif value="Ilmiah">Ilmiah
                                </option>
                                <option
                                    {{-- @php
                                        $gender= $post->jenis_kelamin;
                                    @endphp --}}
                                    @if ($item == 'sejarah')
                                        {{ 'selected' }}
                                    @endif value="Sejarah">Sejarah
                                </option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                <a class="btn btn-danger mt-2" href="{{ url('tampil_pinjam') }}">Batal</a>
                </form>
            </div>
        </div>
        </div>
</body>
</html>
