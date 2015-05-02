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

	public function __construct() {
		$this->middleware('auth', ['except' => ['index'=>'show']] );
	}

	public function show(Article $article) {

		return view('articles.show', compact('article'));

	}

	public function create() {

		return view('articles.create');
	}


	public function store(ArticleRequest $request) {

		//validation?

		$article = new Article($request->all());


		\Auth::user()->articles()->create($article);

		\Session::flash('flash_message', 'Your article "' . $request->input('title') . '" has been created!');

		//return view('articles.index', compact('input');
		return redirect('articles');
	}


	public function edit(Article $article) {

		return view('articles.edit', compact('article'));

	}

	public function update($id, ArticleRequest $request) {

		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}


}
