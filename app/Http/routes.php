<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Post;
use App\Video;
use App\Tag;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',function(){
    $post = Post::create(['name'=>'My First Post']);
    $tag1 = Tag::findOrFail(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video.mov']);
    $tag2 = Tag::findOrFail(2);
    $video->tags()->save($tag2);
});
Route::get('/update',function(){
    $post = Post::findOrFail(6);
    // $tag = Tag::findOrFail(1);
    // echo $post->tags()->save($tag);
    // foreach ($post->tags as $tag)
    // {
    //     echo $tag->whereName('Php')->update(['name'=>'Updated Php']);
    // }
    // echo $post->tags()->attach(1);
    // return $post->tags()->detach(1);
    return $post->tags()->sync([1,2,3,4]);
});
Route::get('/delete',function(){
    $post= Post::findOrFail(6);

    foreach($post->tags as $tag){
        echo $tag->whereId(1)->delete();
    }
});
