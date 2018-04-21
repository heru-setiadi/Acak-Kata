<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{

	//jadi ini kalo mau pake soft delete cuy
	/*use SoftDeletes;
	protected $dates = ['deleted_at'];
*/
	protected $table = 'soal';
	
	public $timestamps = false;

	protected $fillable = ['title', 'description']; // untuk nginput kolom yg boleh di input saja

	//protected $guarded = []; // untuk kolom yang tidak boleh di input

}
