<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Model\Blog;
class BlogController extends Controller
{
	public function index(){
		//insert biasa
		/*$blogs = new Blog;
		$blogs -> title = 'Samurai X';
		$blogs -> description = 'Apakau dengar suara angin yang berhembus';
		$blogs -> save();*/

		//insert dengan cara assignment menggunakan fillable atau guarded di eloquent model
		//Blog::create([ 
		//	'title' => 'infinity war',
		//	'description' => 'hu hu ha ha'
		//]);

		//update biasa
		/*$blogs = Blog :: where('title', 'infinity war')->first();
		$blogs-> title = 'Doel Anak Sekolahan';
		$blogs -> save(); */

		//update dengan cara assignment menggunakan fillable atau guarded di eloquent model
		/*Blog::find(6)->update([
			'title' => 'Ciki si komo',
			'description' => 'si komo lewat jadi macet'

		]);*/

		//DELETE biasa
		/*$blog = Blog::find(6);
		$blog->delete();*/

		//delete pake destroy
		//Blog::destroy([1, 2]);

		//soft delete
		/*$blog = Blog::find(8);
		$blog->delete();*/

		//Return Soft Delete (balikin yang udah di soft delete)
		//Blog::withTrashed()->restore();

		$blog = Blog::paginate(10);
		return view ('blog/home', ['blog' => $blog]);
	}

	public function show($id){
		$nilai = ' ini adalah hasilnya' . $id;
		//$users = DB::table('user')->where('username', 'joko')-> get();
		//$users = DB::table('user')->where('username', 'like', '%o%')-> get();
		//$unescape = '<script> alert("x!!!!!")</script>';

		//insert
		//$users = DB::table('user')->insert([
		//	['username' => 'testing', 'password' => 'test']
		//]);

		//Update
		//DB::table('user')->where('username', 'testing')
		//				 ->update(['username' => 'Rendi']);

		//Delete
		//DB::table('user')->where('id', '=', 3)->delete();

		// Get hasil Table user
		//$users = DB::table('user')->get();
		//return view ('blog/single', ['blog' => $nilai, 'users' => $users]);

		//buat bikin link dari home.blade.php
		$blog = Blog::find($id);
		if(!$blog)
			abort(404);

		return view ('blog/single', ['blog' => $blog]);
	} 

	public function create(){

		return view ('blog/create');
	}

	public function store(Request $request){

		$this->validate($request, [
			'title' 	  => 'required|min:5',
			'description' => 'required|min:5|max:20'


		]);

		$blogs = new Blog;
		$blogs-> title = $request->title;
		$blogs-> description = $request->description;
		$blogs -> save();

		return redirect('blog');
	}

	public function edit($id){
		$blog = Blog::find($id);

		if(!$blog)
			abort(404);

		return view ('blog/edit', ['blog' => $blog]);

	}

	public function update(Request $request, $id){
		$blogs = Blog ::find($id);
		$blogs-> title = $request->title;
		$blogs-> description = $request->description;
		$blogs -> save(); 
		return redirect('blog/' . $id);
	}

	public function destroy ($id){

		$blog = Blog::find($id);
		$blog->delete();

		return redirect('blog');
	}

}
