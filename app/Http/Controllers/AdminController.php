<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class AdminController extends Controller
{
    public function index() {
      
        $post = Post::latest()->orderBy('id', 'desc')
        ->get();      
        return view('admin.index', [
          'post' => $post,
        ]);
      }
    
    
    
    
    
    
    }
