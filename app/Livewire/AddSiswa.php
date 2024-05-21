<?php

namespace App\Livewire;

use App\Models\Siswa;
use Livewire\Component;

class AddSiswa extends Component
{
    public $nama_lengkap, $kelas;
    public function render()
    {
        return view('livewire.add-siswa');
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

        $siswaBaru = Siswa::create($validated);

        session()->flash('success', 'Data berhasil di input');

        $this->resetInput();

        $this->dispatch('siswaBaru', $siswaBaru);
    }

    private function resetInput()
    {
        $this->nama_lengkap = null;
        $this->kelas = null;
    }
}
