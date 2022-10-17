<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Post;

use App\Http\Requests;

use App\Http\Resources\Task as TaskResource;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

                // Get articles
                $Tasks = Post::orderBy('created_at', 'desc')->paginate(1);

                // Return collection of articles as a resource
                return new TaskResource($Tasks);



}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Post::findOrFail($request->id) : new Post;

      //  $article->id = $request->input('article_id');
        $article->post_title = $request->input('title');
        $article->post_content = $request->input('body');

        $article->save();
            return new TaskResource($article);
        
        
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function show($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        // Return single article as a resource
        return new ArticleResource($article);
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        // Get article
        $article = post::findOrFail($id);

        if($article->delete()) {
            return new TaskResource($article);
        }   } 
}
