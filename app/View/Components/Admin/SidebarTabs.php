<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarTabs extends Component
{
    public $text;
    public $href;
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct(string $text, string $href = "#", string $icon)
    {
        $this->text = $text;
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar-tabs');
    }
}
