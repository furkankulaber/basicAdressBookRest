<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'contact';

    protected $primaryKey = 'id';

    protected $keyType = 'string';


    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'company',
        'photo'
    ];

    public function detail()
    {
        return $this->hasMany(ContactInformation::class, 'contact_id');
    }
}

