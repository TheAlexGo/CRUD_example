<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $user_id = $request->user_id;
        $tags = $request->tags;
        foreach ($tags as $tag) {
            if($tag == null) continue;
            Tag::create([
               "user_id" => $user_id,
               "text" => $tag
            ]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return void
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
