<?php

namespace App\Http\Controllers;

use App\Models\Tags;
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
            Tags::create([
               "user_id" => $user_id,
               "text" => $tag
            ]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tags)
    {
        //
    }
}
