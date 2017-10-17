<div id="cb-sidebar" data-swiftype-index="false">
    <div id="cb-sidebar-overlay"></div>
    <div id="cb-guide">
        <div class="cb-sidebar-header hidden-sm hidden-xs">
            <div class="cb-sidebar-logo">
                <a href="{{ url("/") }}">
                    <span><img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" alt="UiStacks" width="24" style="height:24px;"></span>
                    <span class="cb-sidebar-logo-title">UiStacks</span>
                </a>
            </div>
            {{--<div class="cb-sidebar-version">--}}
            {{--<a href="https://apidocs.chargebee.com/docs/api"  class="active">V2</a>--}}
            {{--<a href="https://apidocs.chargebee.com/docs/api/v1">V1</a>--}}
            {{--</div>--}}
        </div>
        <div class="cb-sidebar-divider hidden-sm hidden-xs"></div>

        <div class="cb-doc-search">
            <!-- Search template starts here. Do not make change in any custom attribute or id  -->
            <form id="swift-search-form" data-cb-type="api" autocomplete="false">
                <div class="input-group">
                    <input class="form-control" placeholder="Search" autofocus="autofocus" type="text" data-cb-search="input"/>
                    <span class="input-group-btn">
                                        <input value="" type="submit" class="btn btn-primary"/>
                                    </span>
                </div>
            </form>
            <!-- Search template ends here-->
        </div>
        @if(isset($sections))
            @foreach($sections as $sc)
                <h4 class="cb-aside-nav-title">{{ $sc->trans->title }}</h4>
                @php
                    $arrContents = UiStacks\Tutorials\Models\Tutorial::where('section_id', $sc->id)->where('active', 1)->get();
                @endphp
                <ul class="list-group">
                    @if(isset($arrContents))
                        @foreach($arrContents as $c)
                            <li>
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