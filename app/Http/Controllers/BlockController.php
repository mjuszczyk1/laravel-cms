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
            'page_slug' => 'nullable|regex:/^[a-zA-z-0-9]+$/|max:255',
            'weight'    => 'nullable|integer',
        ]);

        $block            = new Block;
        $block->title     = $request->title;
        $block->body      = $request->body;
        $block->area      = $request->area;
        if (!empty($request->weight)) {
            $block->weight = $request->weight;
        }
        $block->page_slug = $request->page_slug;
        $block->author_id = auth()->user()->id;
        $block->save();

        return redirect("/block/{$block->id}");
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
    public function edit(Block $block)
    {
        return view('blocks.edit', compact('block'));
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
       $block = Block::where('id', $id)->get();

        // If title hasn't changed, we don't want to check if uniuqe:
        if($request['title'] == $block[0]->getOriginal('title')) {
            $titleValidate = 'bail|required|max:255';
        } else {
            $titleValidate = 'bail|required|unique:pages,title|max:255';
        }

        $this->validate($request, [
            'title' => $titleValidate,
            'body' => 'required',
        ]);

        $block[0]->title     = $request->title;
        $block[0]->body      = $request->body;
        $block[0]->area      = $request->area;
        $block[0]->weight    = $request->weight;
        $block[0]->page_slug = $request->page_slug;
        $block[0]->author_id = auth()->user()->id;
        $block[0]->save();

        return redirect("/block/".$block[0]['id']);
    }

     /**
     * Confirm user's delete action
     *
     * @param Block $block
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirm(Block $block)
    {
        return view('blocks.destroyConfirm', compact('block'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Block::where('id', $id)->delete();
        return redirect('/block');
    }
}
