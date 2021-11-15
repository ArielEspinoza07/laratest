<li class="">
    <a data-toggle="collapse" href="#{{$item['route']}}" aria-expanded="false" class="collapse">
        <i class="{{$item['icon']}}"></i>
        <p>{{$item['name']}}<b class="caret"></b></p>
    </a>
    <div class="collapse" id="{{$item['route']}}" style="">
        <ul class="nav">
            @forelse($item['sub_menu'] as $subItem)
                @if(count(explode('/', request()->getPathInfo())) > 2)
                    <li class="{{$subItem['name'] === $breadCrumb[explode('/', request()->getPathInfo())[2]]['name'] ? 'active' : '' }}">
                        <a href="{{$subItem['route']}}">
                            <i class="{{$subItem['icon']}}"></i>
                            <p class="sidebar-normal">{{$subItem['name']}}</p>
                        </a>
                    </li>
                @else
                    <li class="{{$subItem['name'] === $breadCrumb[last(explode('/', request()->getPathInfo()))]['name'] ? 'active' : '' }}">
                        <a href="{{$subItem['route']}}">
                            <i class="{{$subItem['icon']}}"></i>
                            <p class="sidebar-normal">{{$subItem['name']}}</p>
                        </a>
                    </li>
                @endif
            @empty
            @endforelse
        </ul>
    </div>
</li>

