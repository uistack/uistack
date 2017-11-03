<style type="text/css">
    .list-group-menu > .list-group-item > a {
        display: block;
        padding: 0px 15px !important;
    }
    .sidebar.sidebar-skin-white .list-group-menu .list-group-item a:hover {
        color: #37C5FD;
    }
</style>
<div class="sidebar right sidebar-size-3 sidebar-offset-0 sidebar-visible-desktop sidebar-skin-white" id="sidebar-library">
    <div data-scrollable>
        @if(isset($sections))
            @foreach($sections as $sc)
                <h4 class="category">{{ $sc->trans->title }}</h4>
                @php
                    $arrContents = UiStacks\Tutorials\Models\Tutorial::where('section_id', $sc->id)->where('active', 1)->get();
                @endphp
                <ul class="sidebar-block list-group list-group-menu list-group-minimal">
                    {{--<li class="list-group-item active"><a href="#"><span class="badge pull-right">30+</span> Programming</a></li>--}}
                    @if(isset($arrContents))
                        @foreach($arrContents as $c)
                            <li class="list-group-item">
                                <a href="{{ action('LearnController@index',[$item->slug,$c->slug]) }}" class="list-group-item">
                                    {{ $c->trans->name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            @endforeach
        @endif
    </div>
</div>