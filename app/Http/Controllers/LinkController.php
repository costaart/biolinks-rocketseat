<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{

    public function create()
    {
        return view('links.create');
    }

    public function store(StoreLinkRequest $request)
    {
        Link::create([
            'name' => $request->name,
            'link' => $request->link,
            'user_id' => Auth::user()->id
        ]);

        return to_route('dashboard');
    }


    public function edit($id)
    {
        $this->authorize('update', Link::find($id));
        $link = Link::query()->findOrFail($id);
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {

        $this->authorize('update', $link);
        $link->update($request->only(['link', 'name']));
        
        return to_route('dashboard')->with('message', 'Alterado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $this->authorize('update', $link);
        $link->delete();
        return to_route('dashboard')->with('message', 'Registro deletado com sucesso!');

    }

    public function up(Link $link)
    {
        $link->moveUp();
        return back();
    }

    public function down(Link $link)
    {
        $link->moveDown();
        return back();
    }
}
