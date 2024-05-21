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
            @if ($selected_item_id)
                <button wire:click="delete_confirmation('')" data-bs-toggle="modal" type="button"
                    data-bs-target="#modalKonfirmasi" class="btn btn-danger btn-sm">Bulk Hapus</button>
            @endif
        </div>
        </form>
    </div>

    {{ $deleteID }}

    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Opsi</th>
        </tr>
        @foreach ($siswas as $siswa)
            <tr>
                <td>
                    <input type="checkbox" wire:key="{{ $siswa->id }}" value="{{ $siswa->id }}"
                        wire:model.live="selected_item_id">
                </td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>
                    <button wire:click="delete_confirmation({{ $siswa->id }})" data-bs-toggle="modal"
                        data-bs-target="#modalKonfirmasi" class="btn btn-danger btn-sm">Hapus</button>
                    <button wire:click="get_data({{ $siswa->id }})" class="btn btn-warning btn-sm">Edit</button>
                </td>
            </tr>
        @endforeach
    </table>

    <!--  Modal Cetak -->
    <div wire:ignore.self class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title text-center">Konfirmasi Hapus</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin akan menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button data-bs-dismiss="modal" type="button" wire:click="hapus()"
                        class="btn btn-primary">Hapus</button>
                    <button data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Tidak</button>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal Cetak -->
</div>
