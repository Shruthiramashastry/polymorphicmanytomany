<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('insert_tag/{tag}',function($tag){
    Tag::create(['name'=>$tag]);
});

Route::get('create',function(){
    $post = Post::create(['name'=>'This is a post req']);
    $tag = Tag::find(1);
    $post->tags()->save($tag);

    $video = Video::create(['name'=>'This is a video req']);
    $tag = Tag::find(1);
    $video->tags()->save($tag);
});

route::get('read',function(){
    $post = Post::findOrFail(3);
    foreach ($post->tags as $tag) {
        echo  $tag;
    }
});

route::get('update',function(){
    $post = Post::findOrFail(3);
    // foreach ($post->tags as $tag) {
    //     return $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
    // }

    $tag = Tag::find(4);
    //return $post->tags()->save($tag);

    //$post->tags()->attach($tag);
    $post->tags()->sync($tag);

});

route::get('delete',function(){
    $video = Video::find(2);
foreach ($video->tags as $tag) {
    $tag->whereId(4)->delete();
}
});
