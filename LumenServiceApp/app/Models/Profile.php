<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model{
    // Profile -> table name = profiles
    // customed table name;
    // protected $table = 'profiles';
    protected $fillable = ['first_name','last_name','summary','image'];

    public $timestamps = true; //untuk melakukan update kolom created_at dan updated_at

    // Relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
}