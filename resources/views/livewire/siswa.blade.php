<div>
    <div>
        @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif



        @if (session()->has('success'))
            <div class="pt-3">
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            </div>
        @endif
        @if ($updateButton)
            <form action="#" wire:submit.prevent="edit()">
            @else
                <form action="#" wire:submit.prevent="store()">
        @endif
        <div class="form-group mb-2">
            <div class="row mb-2">
                <div class="col">
                    <input wire:model="nama_lengkap" type="text" id="" class="form-control"
                        placeholder="Nama Lengkap">
                </div>
                <div class="col">
                    <input wire:model="kelas" type="text" id="" class="form-control" placeholder="Kelas">
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
        </form>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Opsi</th>
        </tr>
        @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>
                    <button wire:click="hapus({{ $siswa->id }})" class="btn btn-danger btn-sm">Hapus</button>
                    <button wire:click="get_data({{ $siswa->id }})" class="btn btn-warning btn-sm">Edit</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
