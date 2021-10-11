<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Получение тегов пользователя
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'user_tags', 'user_id', 'tag_id');
    }

    /**
     * Получение всех тегов из системы
     * @return Tag[] | Collection
     */
    public function allTags(): Collection
    {
        return Tag::all();
    }

    /**
     * Добавление новых тегов
     * @param $user
     * @param $tagsRequest
     */
    public function addTags($user, $tagsRequest) {
        $tags = $tagsRequest;

        /**
         * Поиск новых тегов
         */
        foreach ($user->allTags() as $tag) {
            foreach ($tagsRequest as $newTag) {
                if ($tag->text === $newTag) {
                    $user->tags()->attach($tag->id);
                    $tags = array_filter($tags, function ($delTag) use ($tag) {
                        return !($delTag == $tag->text);
                    });
                    break;
                }
            }
        }

        /**
         * Добавление тегов с исключением дубликатов
         */
        $tags = collect(
            array_filter(
                array_map(
                    function ($tag) {
                        return $tag != null ? new Tag(['text' => $tag]) : null;
                    },
                    array_unique($tags)
                )
            )
        );

        $user->tags()->saveMany($tags);
    }
}
