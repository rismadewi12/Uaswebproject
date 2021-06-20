<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim','prodi', 'semester','status'];
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0){
            return '<span class="text-red-500">NotActive</span>';
        }
        return '<span class="text-green-500">Active</span>';
    }

    
}
