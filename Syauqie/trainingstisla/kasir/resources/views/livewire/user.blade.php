<div>

    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua Pengguna
                </button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah Pengguna
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
                            Semua pengguna
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </thead>

                                <tbody>
                                    @foreach ($semuaPengguna as $pengguna)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengguna->name }}</td>
                                            <td>{{ $pengguna->email }}</td>
                                            <td>{{ $pengguna->peran }}</td>
                                            <td>
                                                <button wire:click="pilihEdit({{ $pengguna->id }})"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Edit
                                                </button>
                                                <button wire:click="pilihHapus({{ $pengguna->id }})"
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
                            Tambah pengguna
                        </div>
                        <div class="card-body">
                            <form wire:submit='simpan'>
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" wire:model='name' />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" wire:model='email' />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" wire:model='password' />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Peran</label>
                                <select name="peran" id="peran" class="form-control" wire:model='peran'>
                                    <option><- PILIH PERAN -></option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('peran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'edit')
                    <div class="card border-primary">
                        <div class="card-header">
                            Edit pengguna
                        </div>
                        <div class="card-body">
                            <form wire:submit='simpanEdit'>
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" wire:model='name' />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" wire:model='email' />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" wire:model='password' />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="">Peran</label>
                                <select name="peran" id="peran" class="form-control" wire:model='peran'>
                                    <option><- PILIH PERAN -></option>
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('peran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                <button type="button" wire:click='batal' class="btn btn-secondary mt-3">Batal</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            Hapus pengguna
                        </div>
                        <div class="card-body">
                            Anda yakin akan menghpus pengguna ini ?
                            <p>Nama: {{ $penggunaTerpilih->name }}</p>
                            <button class="btn btn-danger" wire:click='hapus'>Yakin!!</button>
                            <button class="btn btn-secondary" wire:click='batal'>Kagak!!</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
