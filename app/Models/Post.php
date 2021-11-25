<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    use Sortable;

    protected $fillable = ['title', 'text', 'category_id'];

    public $sortable = ['id', 'title', 'text', 'category_id'];

    public function postCategory() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
