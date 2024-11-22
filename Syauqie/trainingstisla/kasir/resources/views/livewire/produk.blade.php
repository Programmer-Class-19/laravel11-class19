<div>

    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua Produk
                </button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah Produk
                </button>
                <button wire:click="pilihMenu('excel')"
                    class="btn {{ $pilihanMenu == 'excel' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Import Produk
                </button>
                <button wire:loading class="btn btn-info">
                    Loading ..
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu == 'lihat')
                    <div class="card border-primary">
                        <div class="card-header">
                            Semua Produk
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Stock</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </thead>

                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->code }}</td>
                                            <td>{{ $produk->name }}</td>
                                            <td>{{ $produk->stock }}</td>
                                            <td>{{ $produk->price }}</td>
                                            <td>
                                                <button wire:click="pilihEdit({{ $produk->id }})"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Edit
                                                </button>
                                                <button wire:click="pilihHapus({{ $produk->id }})"
                                                    class="btn {{ $pilihanMenu == 'hapus' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'tambah')
                    <div class="card border-primary">
                        <div class="card-header">
                            Tambah produk
                        </div>
                        <div class="card-body">
                            <form wire:submit='simpan'>
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" wire:model='name' />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Kode / Barcode</label>
                                <input type="text" name="code" class="form-control" wire:model='code' />
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control" wire:model='stock' />
                                @error('stock')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Harga</label>
                                <input type="number" name="price" class="form-control" wire:model='price' />
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>


                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'edit')
                    <div class="card border-primary">
                        <div class="card-header">
                            Edit produk
                        </div>
                        <div class="card-body">
                            <form wire:submit='simpanEdit'>
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" wire:model='name' />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Kode / Barcode</label>
                                <input type="text" name="code" class="form-control" wire:model='code' />
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control" wire:model='stock' />
                                @error('stock')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Harga</label>
                                <input type="number" name="price" class="form-control" wire:model='price' />
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            Hapus produk
                        </div>
                        <div class="card-body">
                            Anda yakin akan menghapus produk ini ?
                            <p>Nama: {{ $produkTerpilih->code }}</p>
                            <p>Nama: {{ $produkTerpilih->name }}</p>
                            <button class="btn btn-danger" wire:click='hapus'>Yakin!!</button>
                            <button class="btn btn-secondary" wire:click='batal'>Kagak!!</button>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'excel')
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            Import Produk
                        </div>
                        <div class="card-body">
                            <form wire:submit='imporExcel'>
                                <input type="file" class="form-control" wire:model='fileExcel'>
                                <br>
                                <button class="btn btn-primary" type="submit">Ambill</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
