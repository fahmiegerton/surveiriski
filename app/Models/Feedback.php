<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Schema;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedback";

    public function getColumns()
	{
		return Schema::getColumnListing($this->table);
	}
}
