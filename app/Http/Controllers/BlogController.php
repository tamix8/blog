<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use App\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogs.index');
    }
    
    public function blog_detail($id)
    {
        $blog =  Blog::where('id', $id)->first();
        $user = User::where('id', $blog->user_id)->first();
        $blog->author = $user->name;
        return view('blogs.detail', compact('blog'));
    }
    
    public function blog_list()
    {
        $user = Auth::user();
        if ($user){
            $blogs =  Blog::where('user_id', $user->id)->paginate(config('constants.item_per_page'));
        } else {
            $blogs =  Blog::where('status', 2)->paginate(config('constants.item_per_page'));
        }
        
        $data = $blogs->toArray();
        $blog_array = $author_array = array();
        $statuses =  config('constants.statuses');
        foreach ($data['data'] as $blog){
            $blog['status'] = $statuses[$blog['status']];
            if (!isset($author_array[$blog['user_id']])){
                $author_array[$blog['user_id']] = User::where('id', $blog['user_id'])->first();
            }
            $blog['author'] = $author_array[$blog['user_id']]->name;
            $blog_array[] = $blog;
        }
        $result['data'] = $blog_array;
        $result['total_count'] = $data['total'];
        echo json_encode($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $blog= new Blog;
        $blog->title = $request->get('title');
        $blog->content = $request->get('content');
        $blog->status = 1;
        $blog->user_id = $user_id;
        $blog->save();
        
        return redirect('blogs')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit',compact('blog','id'));
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
        $blog= Blog::find($id);
        $blog->title = $request->get('title');
        $blog->content = $request->get('content');
        $blog->status = $request->get('status');
        $blog->save();
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $blog = Blog::find($id);
        $result = $blog->delete();
        $request->session()->flash('success', 'Post '.$id.' has been  deleted');
        
        echo json_encode($result);
    }
}
