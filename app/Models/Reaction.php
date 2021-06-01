<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $table = 'reactions';

    protected $fillable = [
        'post_id',
        'type',
        'ip'
    ];

    public function post() {
        return $this->belongsTo(WinkPostAdapter::class);
    }
}
