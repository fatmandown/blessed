<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

	//get all articles
	public function index() {
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));

	}



	public function show($id) {

		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));

	}

	public function create() {

		return view('articles.create');
	}


	public function store(ArticleRequest $request) {

		//validation?



		$input = $request->all();
		$input['published_at'] = Carbon::now();
		Article::create($input);



		//return view('articles.index', compact('input');
		return redirect('articles');
	}


	public function edit($id) {
		$article= Article::findOrFail($id);

		return view('articles.edit', compact('article'));

	}

	public function update($id, ArticleRequest $request) {

		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}


}
