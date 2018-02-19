@foreach(config('menus') as $menu => $visible)
    @if($visible)
    <li class="nav-item {{ Request::segments()[0] == $menu ? 'active' : '' }}">
        <a href="{{ route($menu . '.index') }}" class="nav-link">{{ ucwords($menu) }}
            @if(Request::segments()[0] == $menu)
            <span class="sr-only">(current)</span>
            @endif
        </a></li>
    @endif
@endforeach
