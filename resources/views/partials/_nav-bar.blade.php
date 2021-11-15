<div class="sidebar-wrapper">
    <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <ul class="nav">
        @forelse($menu as $item)
            @if($item['display'])
                @if(!empty($item['sub_menu']))
                    @include('partials._sub-menu-option')
                @else
                    @include('partials._menu-option')
                @endif
            @endif
        @empty
        @endforelse
    </ul>
</div>
