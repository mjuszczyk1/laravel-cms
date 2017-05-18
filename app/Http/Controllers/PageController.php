<?php

namespace App\Http\Controllers;

use App\Page;
use App\Block;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()
                    ->get();

        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|unique:pages,title|max:255',
            'body'  => 'required',
            'slug'  => 'nullable|unique:pages,slug|regex:/^[a-zA-z-0-9]+$/|max:255',
        ]);

        if (empty($request['abstract'])) {
            $request['abstract'] = substr($request['body'], 0, 30);
        }

        $page            = new Page;
        $page->title     = $request->title;
        $page->sub_title = $request->sub_title;
        $page->body      = $request->body;
        $page->abstract  = $request->abstract;
        $page->slug      = $request->slug;
        $page->author_id = auth()->user()->id;
        $page->save();

        return !empty($request['slug']) ? redirect("/page/".$request['slug']) : redirect("/page/".$page['id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        if (trim((string) $page, '0987654321')) {
            $data = Page::where('slug', '=', $page)->get();
            $allBlocks = Block::where('page_slug', '=', $page)->get();
            if (!empty($allBlocks)) {
                $blocks = array();
                foreach($allBlocks as $block) {
                    if ($block->area == 'footer') {
                        $blocks['footer'][] = $block;
                    } elseif ($block->area == 'header') {
                        $blocks['header'][] = $block;
                    }
                }
                $blocks = collect($blocks);
            }
            // dd(compact('data', 'blocks'));
        } else {
            $data = Page::where('id', '=', $page)->get();
        }
        return view('page.main', compact('data', 'blocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('page.edit', compact('page'));
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
        $page = Page::where('id', $id)->get();

        // If title hasn't changed, we don't want to check if uniuqe:
        if($request['title'] == $page[0]->getOriginal('title')) {
            $titleValidate = 'bail|required|max:255';
        } else {
            $titleValidate = 'bail|required|unique:pages,title|max:255';
        }
        // If slug hasn't changed, we don't want to check if uniuqe:
        if ($request['slug'] == $page[0]->getOriginal('slug')) {
            $slugValidate = 'nullable|regex:/^[a-zA-z-0-9]+$/|max:255';
        } else {
            $slugValidate = 'nullable|unique:pages,slug|regex:/^[a-zA-z-0-9]+$/|max:255';
        }

        $this->validate($request, [
            'title' => $titleValidate,
            'body' => 'required',
            'slug' => $slugValidate,
        ]);

        $page[0]->fill(request()->all())->save();

        return !empty($request['slug']) ? redirect("/page/".$request['slug']) : redirect("/page/".$page[0]['id']);
    }

    /**
     * Confirm user's delete action
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirm(Page $page)
    {
        return view('page.destroyConfirm', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::where('id', $id)->delete();
        return redirect('/');
    }
}
