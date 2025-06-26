<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class DataTable extends Component
{
    public function __construct(
        public string $entity,
        public LengthAwarePaginator $items,
        public array $columns,
        public array $sortable = []
    ) {}

    public function render()
    {
        return view('components.data-table');
    }
}
