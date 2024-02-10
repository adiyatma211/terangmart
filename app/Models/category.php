<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    
    
    public function temporaryFile()
    {
        return $this->belongsTo(temporaryFile::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->temporaryFile) {
            $imageName = $this->temporaryFile->file;
            $folderName = $this->temporaryFile->folder;
            return Storage::url("post/{$folderName}/{$imageName}");
        } else {
            return null;
        }
    }
}

