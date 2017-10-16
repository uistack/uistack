@if(Auth::user()->userRole->role_id == '1')
    <div class="page-sidebar sidebar-nav">
        <ul id="menu" class="page-sidebar-menu">

            <li class="{{ Request::is('admin') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin') ? 'active' : '' }}">
                <a href="{{url('/')}}/{{Lang::getlocale()}}/admin">
                    <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">{{ trans('admin.dashboard') }}</span>
                </a>
            </li>

            @if(isset($adminMenu))
                @foreach($adminMenu as $list)
                    <li class="{{ Request::is(ltrim($list['list_head']['link'], '/').'*') ? 'active' : '' }}">
                        @if($list['list_head'] && $list['list_head']['name'] && $list['list_head']['link'])
                            <a href="{{url('/')}}{{ $list['list_head']['link'] }}">
                                @if(isset($list['icon']))
                                    <i class="livicon" data-name="{{ $list['icon'] }}" data-size="20" data-c="#ffffff" data-hc="#00bc8c" data-loop="true"></i>
                                @endif
                                <span class="title">{{ $list['list_head']['name'] }}</span>
                                @if(isset($list['list_tree']))
                                    <span class="fa arrow"></span>
                                @endif
                            </a>
                        @endif

                        @if(isset($list['list_tree']))
                            <ul class="sub-menu">
                                @foreach($list['list_tree'] as $li)
                                    @if($li['name'] && $li['link'])

                                        <li class="{{ Request::is(ltrim($li['link'], '/')) ? 'active' : '' }}">
                                            <a href="{{url('/')}}{{ $li['link'] }}">
                                                @if(Lang::getlocale() == 'en')
                                                    <i class="fa fa-angle-double-right"></i>
                                                @endif
                                                {{ $li['name'] }}
                                                @if(Lang::getlocale() == 'ar')
                                                    <i class="fa fa-angle-double-left"></i>
                                                @endif
                                                @if(isset($li['badge']))
                                                    {!! $li['badge'] !!}
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
@else
    <div class="page-sidebar sidebar-nav">
        <ul id="menu" class="page-sidebar-menu">

            <li class="{{ Request::is('admin') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin') ? 'active' : '' }}">
                <a href="{{url('/')}}/{{Lang::getlocale()}}/admin">
                    <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">{{ trans('admin.dashboard') }}</span>
                </a>
            </li>


            <?php
            $all_permission = Auth::user()->hasPermission;
            if (isset($all_permission) && count($all_permission) > 0) {
            foreach ($all_permission as $key => $value) {
                $arr_user_permission[] = $all_permission{$key}->getPermission->model;
            }


            $temp_array = array(0 => "ads",1=>"ads-sections",2 => "ads-car-companies" , 3 => "ads-cars-types" , 4 => "ads-cars-models");
            if(isset($all_permission) && count($all_permission) > 0)
            {
                foreach($temp_array as $key=>$temp_value)
                {
                    if(in_array($temp_value, $arr_user_permission))
                    {
                        $arr_user_permission[] = "tale-list";
                        break;
                    }
                }
            }

            $list_link = array();
            $list_head_link = "";
            $list_tree_link = "";
            ?>
            @if(isset($adminMenu))
                @foreach($adminMenu as $list)
                    <?php
                    $list_head_link = explode("/", $list['list_head']['link']);
                    ?>

                    <?php
                    if (in_array($list_head_link[3], $arr_user_permission)) {
                    ?>
                    <li class="{{ Request::is(ltrim($list['list_head']['link'], '/').'*') ? 'active' : '' }}">
                        @if($list['list_head'] && $list['list_head']['name'] && $list['list_head']['link'])
                            <a href="{{url('/')}}{{ $list['list_head']['link'] }}">
                                @if(isset($list['icon']))
                                    <i class="livicon" data-name="{{ $list['icon'] }}" data-size="20" data-c="#ffffff" data-hc="#00bc8c" data-loop="true"></i>
                                @endif
                                <span class="title">{{ $list['list_head']['name'] }}</span>
                                @if(isset($list['list_tree']))
                                    <span class="fa arrow"></span>
                                @endif
                            </a>
                        @endif
                        <?php
                        }
                        ?>

                        @if(isset($list['list_tree']))
                            <ul class="sub-menu">
                                @foreach($list['list_tree'] as $li)
                                    <?php
                                    $list_tree_link = explode("/", $li['link']);
                                    if (in_array($list_tree_link[3], $arr_user_permission)) {
                                    ?>
                                    @if($li['name'] && $li['link'])
                                        <li class="{{ Request::is(ltrim($li['link'], '/')) ? 'active' : '' }}">
                                            <a href="{{url('/')}}{{ $li['link'] }}">
                                                @if(Lang::getlocale() == 'en')
                                                    <i class="fa fa-angle-double-right"></i>
                                                @endif
                                                {{ $li['name'] }}
                                                @if(Lang::getlocale() == 'ar')
                                                    <i class="fa fa-angle-double-left"></i>
                                                @endif
                                                    @if(isset($li['badge']))
                                                        {!! $li['badge'] !!}
                                                    @endif
                                            </a>
                                        </li>
                                    @endif
                                    <?php
                                    }
                                    ?>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif

        </ul>

        <?php
        }
        ?>


    </div>




@endif