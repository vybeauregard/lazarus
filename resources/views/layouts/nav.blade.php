@foreach(config('menus') as $menu => $visible)
    @if($visible)
    <li><a href="{{ route($menu . '.index') }}">{{ title_case(str_replace("-", " ", $menu)) }}</a></li>
    @endif
@endforeach
