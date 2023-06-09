<?php

namespace App\Models;

use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getStatusAttribute($field)
    {
        return $field==1?'موفق':"ناموفق";
    }
    public function scopeGetData($query,$month,$status)
    {
        $date = Verta::parse(verta()->subMonth($month)->startMonth())->datetime();
      return $query->where('created_at','>',$date)->where('status',$status)->get();
    }
}
