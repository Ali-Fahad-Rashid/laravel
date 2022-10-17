<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller

{
    public function index() {
        $post = Post::latest()->orderBy('id', 'desc')->get();      
        return view('post.index', [
          'post' => $post,
        ]);
      }
      public function show($id) {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
      }
      public function create() {
        return view('post.create');
      }
      public function store(Request $request) {

        $post = new Post();
        $post->post_title = request('name');
        $post->post_status = request('type');
        $post->post_desc = request('content');
        $post->post_content = request('content');
        $post->post_tags = request('name');



        if($request->hasfile('filenames'))
        {
           foreach($request->file('filenames') as $file)
           {
               $name = uniqid().'.'.$file->extension();
               $file->move(public_path('uploads'), $name);  
               $data[] = $name;  
           }
           $post->images = $data;

        }

        
        if ($request->hasFile('file')) {
          $imageName = uniqid().'.'.$request->file->extension();  
          $request->file->move(public_path('uploads'), $imageName);
          $post->post_image = $imageName;
      }
else {
  $post->post_image = '123.png';
}
        $post->post_user_id = Auth::id();
        $post->post_user = Auth::user()->email;
        $post->save();

        notify()->success('Your Post added Successfully!', $post->post_title);

        return redirect('/post')->with('mssg', 'Your Post added Successfully!');

      }
      public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/post');
      } 

      public function edit($id) {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
      } 


      public function update($id,Request $request) {                    

        if ($request->hasFile('file')) {
          $imageName = uniqid().'.'.$request->file->extension();  
          $request->file->move(public_path('uploads'), $imageName);
      }
                else {
                $post = Post::findOrFail($id);
                   $imageName = $post->post_image;
                  }
                      Post::where('id', $id)->
                    update([     
           'post_title' => request('name'), 
           'post_status' => request('type'),     
           'post_desc' => request('content'),
           'post_content' => request('content'),
           'post_tags' => request('name'),
           'post_image' => $imageName,
                      ]);
        return redirect('/post/'.$id)->with('mssg', 'Your Post Edited Successfully!');
      } 



      
    }