<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Likeable;

class Comment extends Model
{
    use Likeable;

    protected $fillable = ['content', 'owner_id'];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function delete() {
        $this->deleteAllLikes();
        parent::delete();
    }
}
