<div class="kt-datatable">
    {{-- Tabla --}}
    <div class="overflow-x-auto">
        <table class="kt-table">
            <thead>
            <tr>
                @foreach($columns as $key => $column)
                    <th @class([
                            'cursor-pointer hover:bg-gray-50' => in_array($key, $sortable)
                        ])>
                        @if(in_array($key, $sortable))
                            <a href="{{ request()->fullUrlWithQuery(['sort' => $key, 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                               class="flex items-center gap-2">
                                {{ $column }}
                                @if(request('sort') === $key)
                                    <span class="text-xs">
                                            @if(request('direction') === 'asc')
                                            ↑
                                        @else
                                            ↓
                                        @endif
                                        </span>
                                @endif
                            </a>
                        @else
                            {{ $column }}
                        @endif
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            {{ $slot }}
            </tbody>
        </table>
    </div>

    {{-- Paginación y Resumen --}}
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-4">
        {{-- Info de registros --}}
        <div class="text-sm text-gray-700">
            {{ trans_choice('datatable.showing', $items->count(), [
                'first' => $items->firstItem() ?? 0,
                'last' => $items->lastItem() ?? 0,
                'total' => $items->total(),
                'entity' => trans_choice("entities.{$entity}", $items->total())
            ]) }}
        </div>

        {{-- Selector de registros por página --}}
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-700">{{ __('datatable.per_page') }}:</label>
            <select class="kt-select w-20"
                    onchange="window.location.href = this.value">
                @foreach([10, 20, 50, 100] as $value)
                    <option value="{{ request()->fullUrlWithQuery(['per_page' => $value]) }}"
                        @selected($items->perPage() === $value)>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Paginación --}}
        {{ $items->links() }}
    </div>
</div>
