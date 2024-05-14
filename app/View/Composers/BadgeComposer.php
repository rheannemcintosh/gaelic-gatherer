<?php

namespace App\View\Composers;

use App\Repositories\BadgeRepository;
use Illuminate\View\View;

class BadgeComposer
{
    /**
     * Create a new badge composer.
     */
    public function __construct(
        protected BadgeRepository $badgeRepository,
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('badges', $this->badgeRepository->all());
    }
}
