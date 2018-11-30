<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Http\Requests\CreateBlogRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades;
use Illuminate\Pagination;
use Illuminate\Http\Request;
use App\Http\Requests\FormExampleRequest;

class CreateBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(3);
        return view('blogs.list',compact('blogs'));
    }
    public function create()
    {
        return view('blogs.create');
    }
    public function store(CreateBlogRequest $request)
    {
        $blog = new Blog();
        $blog->name = $request->input('Name');
        $blog->poster = $request->input('Poster');
        $blog->date = $request->input('Date');
        $blog->description = $request->input('Description');
        $blog->topic = $request->input('Topic');
        Session::flash('success', 'them moi thanh cong');
        $blog->save();

        return redirect()->route('blogs.index');
    }
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit',compact('blog'));
    }
    public function update(Request $request,$id)
    {
        $blog = Blog::findOrFail($id);
        $blog->name = $request->input('Name');
        $blog->poster = $request->input('Poster');
        $blog->date = $request->input('Date');
        $blog->description = $request->input('Description');
        $blog->topic = $request->input('Topic');
        $blog->save();
        Session::flash('success', 'cap nhat thanh cong');

        return redirect()->route('blogs.index');
    }
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show',compact('blog'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('blogs.index');
        }
        $blogs = Blog::where('Name','like','%' . $keyword . '%')
            ->orwhere('Topic','like','%' . $keyword . '%')
            ->orwhere('Poster','like','%' . $keyword . '%')
            ->paginate(3);
        return view('blogs.list',compact('blogs'));

    }
    public function checkValidation(FormExampleRequest $request)
    {
        return view('blogs.list');
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        Session::flash('success', 'xoa thanh cong');
        return redirect()->route('blogs.index');
    }
}
