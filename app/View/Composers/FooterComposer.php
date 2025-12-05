<?php

namespace App\View\Composers;

use App\Models\Links;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Get all links from database, ordered by name
        $footerLinks = Links::orderBy('name')->get();
        
        $view->with('footerLinks', $footerLinks);
    }
}
