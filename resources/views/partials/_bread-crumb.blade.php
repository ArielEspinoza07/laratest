<ol class="breadcrumb bg-transparent ml-3">
    @foreach(explode('/', request()->path()) as $index => $path)
        @if(last(explode('/', request()->getPathInfo())) === $path && !empty($breadCrumb[$path]))
            <li class="breadcrumb-item active">{{$breadCrumb[$path]['name']}}</li>
        @elseif(!empty($breadCrumb[$path]))
            <li class="breadcrumb-item">
                @if($index === 0)
                    {{$breadCrumb[$path]['name']}}
                @else
                    <a href="{{$breadCrumb[$path]['route']}}">{{$breadCrumb[$path]['name']}}</a>
                @endif
            </li>
        @endif
    @endforeach
</ol>
