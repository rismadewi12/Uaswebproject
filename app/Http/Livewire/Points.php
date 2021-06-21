<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Point;
use App\Models\mahasiswa;
use App\Models\dosen;
use App\Models\Kategori;
use App\Models\Nilai;


class Points extends Component
{
    use WithPagination;
    use WithFileUploads;
        public $Point ,$nim, $thn_akademik, $kategori, $kegiatan, $point, $pembimbing , $file , $point_id,  $search;
        public $isModal;
    public function render()
    {   
        $mahasiswas = mahasiswa::all();
        $nilais = Nilai::all();
        $kategoris = Kategori::all();
        $dosens = dosen::all();
        $search = '%'.$this->search.'%';
        $Points = point::where('nim','LIKE',$search)
                ->orderBy('created_at','DESC')->paginate(3);
        return view('livewire.points',compact('dosens','mahasiswas','kategoris','nilais'),['Points'=> $Points])->layout('layouts.template');
      
      
    }

    public function createpoint()
    {
        $this->resetFields();
        $this->openModal();
    }

    
    public function resetFields()
    {
        $this->nim ='';
        $this->thn_akademik='';
        $this->kategori ='';
        $this->kegiatan ='';
        $this->point='';
        $this->pembimbing ='';
        $this->file='';
        $this->point_id ="";
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
            'nim'=> 'required|numeric',
            'thn_akademik'=> 'required|numeric',
            'kategori'=> 'required|string',
            'kegiatan'=> 'required|string',
            'point'=> 'required|numeric',
            'pembimbing'=>'required|string',
            'file'=> 'required| max:1024',

        ]);

        if(!empty($this->file))
        {
            $this->file->store('file','public');
        }
        Point::updateOrCreate(
            ['id' => $this->point_id], 
            [
             'nim'=>$this->nim,
             'thn_akademik'=>$this->thn_akademik,
             'kategori'=>$this->kategori,
             'kegiatan'=>$this->kegiatan,
             'point'=>$this->point,
             'pembimbing'=> $this->pembimbing,
             'file'=> $this->file->hashName(),
            ]
            );

            session()->flash('message', $this->point_id ? $this-> nim . ' Diperbaharui':$this->kegiatan. ' Ditambahkan');
            $this -> resetFields();
            $this -> closeModal();
    }
  
        public function edit($id)
        {
            $mahasiswa = mahasiswa::all();
            $nilais = Nilai::all();
            $kategoris = Kategori::all();
             $dosens = dosen::all();
            $Point = Point::find($id);
            $this-> point_id = $id;
            $this->nim =$Point->nim;
            $this->thn_akademik =$Point->thn_akademik;
            $this->kategori =$Point->kategori;
            $this->kegiatan =$Point->kegiatan;
            $this->point =$Point->point;
            $this->pembimbing =$Point->pembimbing;
            $this->file=$Point->file;
    
    
            $this->openModal();
    
        }
        public function delete($id)
        {
            $Point = Point::find($id);
            $Point-> delete();
          session()->flash('message', $Point->kegiatan . ' Dihapus');
    
        }
    
   
    
}
