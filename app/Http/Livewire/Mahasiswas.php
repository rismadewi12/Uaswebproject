<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\mahasiswa;
use App\Models\Prodi;
use Livewire\WithPagination;


class Mahasiswas extends Component
{
    use WithPagination;
    public $mahasiswa, $nama, $nim, $prodi, $semester, $status , $mahasiswa_id ,$search;
    public $isModal;
    
    public function render()
    {   

        $prodis = Prodi::all();
        $search = '%'.$this->search.'%';
        $mahasiswas = mahasiswa::where('nama','LIKE',$search)
                ->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.mahasiswas', compact('prodis'),['mahasiswas'=> $mahasiswas]) ->layout('layouts.template');
        
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }
    
    public function resetFields()
    {
        $this->nama ='';
        $this->nim ='';
        $this->prodi ='';
        $this->semester ='';
        $this->status ='';
        $this->mahasiswa_id ="";
    }

    public function openModal()
    {
        $this->isModal = true;
       
    }
    public function closeModal()
    {
        $this->isModal = false;
       
    }

    public function store()
    {
        $this->validate([
            'nama'=> 'required|string',
            'nim'=> 'required|numeric',
            'prodi'=> 'required|string',
            'semester'=> 'required|string',
            'status'=> 'required| string'
        ]);

        mahasiswa::updateOrCreate(
            ['id' => $this->mahasiswa_id], 
            [
             'nama'=>$this->nama,
             'nim'=>$this->nim,
             'prodi'=>$this->prodi,
             'semester'=>$this->semester,
             'status'=> $this->status,

            ]
            );

            session()->flash('message', $this->mahasiswa_id ? $this-> nama . 'Diperbaharui':$this->nama . 'Ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }

    public function edit($id)
    {
        $prodis = Prodi::all();
        $mahasiswa = mahasiswa::find($id);
        $this-> mahasiswa_id = $id;
        $this->nama =$mahasiswa->nama;
        $this->nim  =$mahasiswa->nim;
        $this->prodi =$mahasiswa->prodi;
        $this->semester =$mahasiswa->semester;
        $this->status=$mahasiswa->status;


        $this->openModal();

    }
    public function delete($id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa-> delete();
      session()->flash('message', $mahasiswa->nama . ' Dihapus');

    }
}
