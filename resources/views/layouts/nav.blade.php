@foreach(config('menus') as $menu => $visible)
    @if($visible)
    <li><a href="{{ route($menu . '.index') }}">{{ ucwords($menu) }}</a></li>
    @endif
@endforeach
