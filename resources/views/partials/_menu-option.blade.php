@if(count(explode('/', request()->getPathInfo())) > 2)
    <li class="{{$item['name'] === $breadCrumb[explode('/', request()->getPathInfo())[2]]['name'] ? 'active' : '' }}">
        <a href="{{$item['route']}}">
            <i class="{{$item['icon']}}"></i>
            <p>{{$item['name']}}</p>
        </a>
    </li>
@else
    <li class="{{$item['name'] === $breadCrumb[last(explode('/', request()->getPathInfo()))]['name'] ? 'active' : '' }}">
        <a href="{{$item['route']}}">
            <i class="{{$item['icon']}}"></i>
            <p>{{$item['name']}}</p>
        </a>
    </li>
@endif
