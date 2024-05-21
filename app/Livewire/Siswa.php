<?php

namespace App\Livewire;

use App\Models\Siswa as ModelsSiswa;
use Livewire\Component;

class Siswa extends Component
{
    public $nama_lengkap, $kelas, $siswaID;
    public $updateButton = false;
    public function render()
    {
        return view('livewire.siswa', [
            'siswas' => ModelsSiswa::all()
        ]);
    }

    public function store()
    {
        $rules = [
            'nama_lengkap' => 'required',
            'kelas' => 'required'
        ];

        $pesan = [
            'nama_lengkap.required' => 'Nama tidak boleh kosong',
            'kelas.required' => 'Kelas tidak boleh kosong'
        ];

        $validated = $this->validate($rules, $pesan);

        $siswaBaru = ModelsSiswa::create($validated);

        session()->flash('success', 'Data berhasil di input');

        $this->resetInput();

        $this->dispatch('siswaBaru', $siswaBaru);
    }

    public function hapus($id)
    {
        $siswa = ModelsSiswa::find($id);
        $siswa->delete($id);

        session()->flash('success', 'Data berhasil di hapus');
    }

    public function get_data($id)
    {
        $siswa = ModelsSiswa::find($id);
        $this->nama_lengkap = $siswa->nama_lengkap;
        $this->kelas = $siswa->kelas;
        $this->updateButton = true;
        $this->siswaID = $id;
    }

    public function edit()
    {
        $rules = [
            'nama_lengkap' => 'required',
            'kelas' => 'required'
        ];

        $pesan = [
            'nama_lengkap.required' => 'Nama tidak boleh kosong',
            'kelas.required' => 'Kelas tidak boleh kosong'
        ];

        $validated = $this->validate($rules, $pesan);

        $siswa = ModelsSiswa::find($this->siswaID);

        $siswa->update($validated);

        session()->flash('success', 'Data berhasil di update');

        $this->resetInput();

        $this->dispatch('siswaBaru', $siswa);
    }

    private function resetInput()
    {
        $this->nama_lengkap = null;
        $this->kelas = null;
    }

    public function siswaBaru($siswaBaru)
    {
    }
}
