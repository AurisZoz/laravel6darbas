<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Automobiliai;

class Savininkai extends Model
{
    use HasFactory;

    protected $table = 'savininkais';

    protected $primaryKey = 'id';

    public $timestamps=false;

    protected $fillable = 
    [
       'id',
       'vardas',
       'pavarde',
    ];

  public function automobiliai(){
        return $this->belongsTo(Automobiliai::class);
    }

    public function scopeFilter(Builder $query, $filter)
    {
        
        if ($filter->vardas!=null)
        {
            $query->where('vardas','like', "%$filter->vardas%");
        }
        if ($filter->pavarde!=null)
        {
            $query->where('pavarde','like', "%$filter->pavarde%");
        }
    }

}