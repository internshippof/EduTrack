<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'course_id',
        'profile_photo'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Day 14 - File Uploads & Storage
     * Returns a usable <img src> URL whether or not the student has a photo.
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }

        // No photo uploaded -> generate a simple placeholder avatar
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=4f46e5&color=fff';
    }
}