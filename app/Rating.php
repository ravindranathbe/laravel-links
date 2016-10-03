<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    // protected $incrementing  = true;
    // protected $timestamps = true;
    // protected $dateFormat = 'U';
    // protected $connection = 'connection-name'; // DB CONNECTION

    public function canRate($userId = 0, $itemId = 0) {
        $status = true;

        $cnt = $this->where(
            ['created_by' => $userId, 'item_id' => $itemId]
        )->get()->count();

        if($cnt != 0) {
            $status = false;
        }

        return $status;
    }
}
