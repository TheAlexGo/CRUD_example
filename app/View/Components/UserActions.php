<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserActions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    /**
     * Модель пользователя
     *
     * @var User
     */
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.user-actions');
    }
}
