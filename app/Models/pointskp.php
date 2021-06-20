<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pointskp extends Model
{
    use HasFactory;
    protected $table = "pointskps";
    protected $fillable = ['nim','tahun_akademik','dosen_Pa','nama_kegiatan','rincian','ketegori','point','file'];
}
