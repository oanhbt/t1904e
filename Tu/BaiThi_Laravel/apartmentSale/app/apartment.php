<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apartment extends Model
{
    protected $table = 'apartments';
    // public $incrementing = true;
    public $timestamps = false;
    public function listItemp(){
        $query = $this->select('*');
        $query->paginate(6);
        $result = $query->get();

        return $result;
    }
}
