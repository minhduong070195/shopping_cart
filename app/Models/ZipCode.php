<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $table = 'zipcodes';
    protected $fillable = ['zip_code', 'refecture_name'];

    public static function getZipCode($zipcode)
    {
        if(!empty($zipcode)){
            $zipcodeModel = ZipCode::where('zip_code', $zipcode)->first();

            return$zipcodeModel;
        }
    }
}
