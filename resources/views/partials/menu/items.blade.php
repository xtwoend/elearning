@foreach($items as $item)
    <li>
        @if($item->link) <a @if($item->hasChildren())  class="auto"  href="#" @else href="{{ $item->url() }}" @endif>
            @if($item->hasChildren()) 
            <span class="pull-right text-muted">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-down text-active"></i>
            </span>
            @endif
            {!! $item->icon !!}
            <span>{{ $item->title }}</span>           
        </a>
        @else
            {{$item->title}}
        @endif
        @if($item->hasChildren())
            <ul class="nav dk text-sm">
                @foreach($item->children() as $child)
                    <li><a href="{{ $child->url() }}"> {!! $item->icon !!}<span>{{ $child->title }}</span></a></li>
                @endforeach
            </ul>
        @endif
    </li>
    @if($item->divider)
        <li{{\HTML::attributes($item->divider)}}></li>
    @endif
@endforeach