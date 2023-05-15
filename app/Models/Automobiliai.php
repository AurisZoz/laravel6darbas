<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Savininkai;

class Automobiliai extends Model
{
    use HasFactory;

    protected $table='automobiliais';

    protected $primaryKey = 'id';

    public $timestamps=false;
    
   protected $fillable = 
   [
      'id',
      'automobilio_id',
      'marke',
      'modelis',
      'numeris',
      'image',
   ];


    public function savininkai(){
        return $this->hasMany(Savininkai::class, 'id', 'id');
    }

    public function scopeFilter(Builder $query, $filter)
    {
        
        if ($filter->marke!=null)
        {
            $query->where('marke','like', "%$filter->marke%");
        }
        if ($filter->modelis!=null)
        {
            $query->where('modelis','like', "%$filter->modelis%");
        }
        if ($filter->numeris!=null)
        {
            $query->where('numeris','like', "%$filter->numeris%");
        }
   
    }
}