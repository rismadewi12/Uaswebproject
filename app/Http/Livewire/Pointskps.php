<?php

namespace App\Http\Livewire;
use App\Models\pointskp;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


use Livewire\Component;

class pointskps extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $pointskps ,$nim, $tahun_akademik , $dosen_Pa , $nama_kegiatan , $rincian ,$ketegori , $point ,$file, $skp_id;
    public $isModal;
    public $search;
    public function render()
    {
         $search = '%'.$this->search.'%';
        $this->pointskps = pointskp::where('nim','LIKE',$search)
                ->orderBy('created_at','DESC')->get();
        return view('livewire.pointskps')->layout('layouts.template');
    } 
    
    public function createskp()
    {

        $this->resetFields();
        $this->openModal();
    }

    public function resetFields()
    {
        $this->nim ='';
        $this->tahun_akademik ='';
        $this-> dosen_Pa ='';
        $this->nama_kegiatan ='';
        $this->rincian ='';
        $this->ketegori = '';
        $this->point = '';
        $this->file = '';
        $this->skp_id = '';


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
            'tahun_akademik'=> 'required|numeric',
            'dosen_Pa'=> 'required|string',
            'nama_kegiatan'=> 'required|string',
            'rincian'=> 'required| string',
            'ketegori'=> 'required| string',
            'point'=> 'required|numeric',
            'file'=> 'required| string',
            'skp_id'=> 'required| string',
        ]);

        pointskp::updateOrCreate(
            ['id' => $this->skp_id],
            [
                'nim'=>$this->nim,
                'tahun_akademik'=>$this->tahun_akademik,
                'dosen_Pa'=>$this->dosen_Pa,
                'nama_kegiatan'=>$this->nama_kegiatan,
                'rincian'=>$this->rincian,
                'ketegori'=> $this->ketegori,
                'point'=> $this->point,
                'file'=> $this->file,

            ]
            );
            session()->flash('message', $this->skp_id ? $this-> nama_kegiatan . ' Edited successfully':$this->nama_kegiatan . ' Added successfully');
            $this->closeModal();
            $this -> resetFields();



    }

    public function edit($id)
    {
        $pointskps = pointskp::find($id);
        $this->skp_id= $id;
        $this->nim = $pointskps->nim;
        $this->tahun_akademik  = $pointskps->tahun_akademik;
        $this->dosen_Pa =  $pointskps->dosen_Pa;
        $this->nama_kegiatan =  $pointskps->nama_kegiatan;
        $this->rincian= $pointskps->rincian;
        $this->ketegori=  $pointskps->ketegori;
        $this->point =  $pointskps->point;
        $this->file=  $pointskps->file;

        $this->openModal();

    }
    public function delete($id)
    {
        $Pointskps = pointskp::find($id);
        $Pointskps-> delete();
        session()->flash('message', $Pointskp->nama_kegitan . ' Deleted successfully');

    }
}
