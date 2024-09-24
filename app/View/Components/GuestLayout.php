<?php

namespace App\View\Components;

use App\Models\Department;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component {
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View {
        $departments = Department::query()
            ->orderBy('name', "asc")
            ->get();
        return view('layouts.guest', compact('departments'));
    }
}
