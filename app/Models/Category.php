<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    use Sortable;

    protected $fillable = ['title', 'description'];

    public $sortable = ['id', 'title', 'description'];

    public function categoryPost() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
