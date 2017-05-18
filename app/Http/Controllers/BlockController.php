<?php

namespace App\Http\Controllers;

// use App\Page;
use App\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::latest()
                    ->get();

        return view('blocks.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blocks.create');
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
            'title'     => 'bail|required|max:255',
            'area'      => 'max:255',
            'body'      => 'required',
            'page_slug' => 'regex:/^[a-zA-z-0-9]+$/|max:255',
            'weight'    => 'nullable|integer',
        ]);

        $block            = new Block;
        $block->title     = $request->title;
        $block->body      = $request->body;
        $block->area      = $request->area;
        $block->weight    = $request->weight;
        $block->page_slug = $request->page_slug;
        $block->author_id = auth()->user()->id;
        $block->save();

        return !empty($request['page_slug']) ? redirect("/page/" . $request['page_slug']) : redirect("/block");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        return view('blocks.main', compact('block'));
    }

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
        //
    }
}
