@foreach(config('menus') as $menu => $visible)
    @if($visible)
    <li><a href="{{ route($menu . '.index') }}">{{ Illuminate\Support\Str::title(str_replace("-", " ", $menu)) }}</a></li>
    @endif
@endforeach
