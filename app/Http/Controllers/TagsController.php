<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function getTags() {
        return Tag::all();
    }
    /**
     * Создание нового тега
     *
     * @return void
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
    }

    /**
     * Удаление тега
     *
     * @param  Tag  $tag
     * @return void
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
