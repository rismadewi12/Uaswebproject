<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dosen;
use App\Models\Mengajar;

class Dosens extends Component
{
        public $dosen , $nama ,$nidn, $email ,$telepon, $bidang ,$status,$search,$dosen_id;
        public $isModal;
        
    public function render()
    {
        $mengajars = Mengajar::all();
        $search = '%'.$this->search.'%';
        $dosens = dosen::where('nama','LIKE',$search)
                ->orWhere('nidn','LIKE',$search)
                ->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.dosens', compact('mengajars'),['dosens'=> $dosens])->layout('layouts.template');
    } 
    public function createdosen()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function resetFields()
    {
        $this->nama ='';
        $this->nidn='';
        $this->email ='';
        $this->telepon ='';
        $this->bidang ='';
        $this->status ='';
        $this->dosen_id ="";
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
            'nidn'=> 'required|numeric',
            'email'=> 'required|email',
            'telepon'=> 'required|numeric',
            'bidang'=> 'required|string',
            'status'=> 'required'
        ]);

        dosen::updateOrCreate(
            ['id' => $this->dosen_id], 
            [
             'nama'=>$this->nama,
             'nidn'=>$this->nidn,
             'email'=>$this->email,
             'telepon'=>$this->telepon,
             'bidang'=>$this->bidang,
             'status'=> $this->status,

            ]
            );

            session()->flash('message', $this->dosen_id ? $this-> nama . ' Diperbaharui':$this->nama . ' Ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }

    public function edit($id)
    {
        $mengajars = Mengajar::all();
        $dosen = dosen::find($id);
        $this-> dosen_id = $id;
        $this->nama =$dosen->nama;
        $this->nidn =$dosen->nidn;
        $this->email =$dosen->email;
        $this->telepon =$dosen->telepon;
        $this->bidang =$dosen->bidang;
        $this->status=$dosen->status;


        $this->openModal();

    }
    public function delete($id)
    {
        $dosen = dosen::find($id);
        $dosen-> delete();
      session()->flash('message', $dosen->nama . ' Dihapus');

    }

}
