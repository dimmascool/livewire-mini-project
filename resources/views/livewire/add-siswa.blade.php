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
    <form action="#" wire:submit.prevent="store()">
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
