@extends('admin.master')
@section('header')
    <!--page level css -->
    <link href="{{ asset('public/admin_assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('public/admin_assets/vendors/jvectormap/jquery-jvectormap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin_assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_assets/css/only_dashboard.css') }}" />
    <!--end of page level css-->
@endsection
@section('page_title')
{{ trans('admin.dashboard') }}
@endsection
@section('content-header')
@section('content')
<!-- Include single delete confirmation model -->
{{-- @include('admin.contacts.confirm-delete') --}}
<!-- end include single delete confirmation model -->  
{{-- <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
        <!-- Trans label pie charts strats here-->
        <div class="lightbluebg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 text-right">
                            <span>{{ trans('admin.courses_total_visits') }}</span>
                            <div class="number" id="courses_total_visits"></div>
                        </div>
                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
        <!-- Trans label pie charts strats here-->
        <div class="redbg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 text-right">
                            <span>{{ trans('admin.jobs_total_visits') }}</span>
                            <div class="number" id="jobs_total_visits"></div>
                        </div>
                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
        <!-- Trans label pie charts strats here-->
        <div class="goldbg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 text-right">
                            <span>{{ trans('admin.news_total_visits') }}</span>
                            <div class="number" id="news_total_visits"></div>
                        </div>
                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
        <!-- Trans label pie charts strats here-->
        <div class="palebluecolorbg no-radius">
            <div class="panel-body squarebox square_boxs">
                <div class="col-xs-12 pull-left nopadmar">
                    <div class="row">
                        <div class="square_box col-xs-7 text-right">
                            <span>{{ trans('admin.changes_total_visits') }}</span>
                            <div class="number" id="changes_total_visits"></div>
                        </div>
                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--/row-->

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-border">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                    {{ trans('admin.license') }} 
                    <small>{{ trans('admin.framework') }}</small>
                </h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr class="success">
                            <td>{{ trans('admin.project_name') }}</td>
                            <td>{{ trans('project.project_name') }}</td>
                        </tr>
                        <tr class="warning">
                            <td>{{ trans('admin.sowfware_category') }}</td>
                            <td>{{ trans('project.sowfware_category') }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('admin.license') }}</td>
                            <td>{{ trans('admin.license_var') }}</td>
                        </tr>
                        <tr class="success">
                            <td>{{ trans('admin.specialty') }}</td>
                            <td>{{ trans('project.specialty') }}</td>
                        </tr>
                        <tr class="danger">
                            <td>{{ trans('admin.framework') }}</td>
                            <td>{{ config('core.framework') }}</td>
                        </tr>
                        <tr class="warning">
                            <td>{{ trans('admin.version') }}</td>
                            <td>{{ config('core.version') }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('admin.date_of_issue') }}</td>
                            <td>{{ trans('project.production_date') }}</td>
                        </tr>
                        <tr class="danger">
                            <td>{{ trans('admin.copywite') }}</td>
                            <td>{{ trans('admin.copywite_var') }}</td>
                        </tr>
                         <tr class="warning">
                            <td>{{ trans('admin.last_update') }}</td>
                            <td>{{ trans('admin.last_update_var') }}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>

        <div class="panel blue_gradiant_bg">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left" style="text-align: center; font-size: 20px;">
                                    <p style="padding-top: 7px;">{{ trans('admin.inno_thanks') }}</p>
                                </div>
                                <div class="pull-right" style="float: right !important;">
                                    <img src="{{ asset('public/images/uistacks.png') }}" style="margin: 0 auto;">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                  </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-border">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="mail" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                     {{ trans('admin.new_messages') }}
                    {{-- <small></small> --}}
                </h3>
            </div>
            <div class="panel-body" style="min-height: 500px;">
              <div class="table-responsive">
                @if(isset($contacts) && $contacts->count())
                    <table class="table table-bordered">
                        <thead class="flip-content">
                            <tr>
                              <th>{{ trans('admin.from')}}</th>
                              <th>{{ trans('admin.phone')}}</th>
                              {{-- <th>{{ trans('admin.email')}}</th> --}}
                              <th>{{ trans('admin.message_subject')}}</th>
                              <th>{{ trans('admin.receive_date')}}</th>
                              <th>{{ trans('admin.operations')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($contacts as $contact)
                            <tr>
                              <td> {{ strip_tags(str_limit($contact->name, $limit = 15, $end = '...')) }} </td>
                              <td> {{ $contact->phone }} </td>
                              {{-- <td> {{ $contact->mail }} </td> --}}
                              <td>{{ strip_tags(str_limit($contact->subject, $limit = 15, $end = '...')) }} </td>
                              <td> {{ $contact->created_at }} </td>
                              <td>
                                  <a href="{{ action('ContactsController@show', $contact->id) }}"><i class="fa fa-eye"></i> {{ trans('admin.message_details')}}</a>
                                  @if($contact->reply_status == '0')
                                  <a href="{{ action('ContactsController@reply', $contact->id) }}"><i class="fa fa-reply"></i> {{ trans('admin.reply')}}</a>
                                  @endif
                                  <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $contact->id }}" data-title="{{ $contact->subject }}" href="#full-width"><i class="fa fa-trash-o"></i> {{ trans('admin.delete') }}</a>
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                    </table>
                @else
                <h2 style="text-align: center;">{{ trans('admin.no_new_messages') }}</h2>
                @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <!-- begining of page level js -->
    <!--  todolist-->
    <script src="{{ asset('public/admin_assets/js/todolist.js') }}"></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('public/admin_assets/vendors/charts/easypiechart.min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/vendors/charts/jquery.easypiechart.min.js') }}"></script>
    <!--for calendar-->
    <script src="{{ asset('public/admin_assets/vendors/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin_assets/vendors/fullcalendar/calendarcustom.min.js') }}" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('public/admin_assets/vendors/charts/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin_assets/vendors/charts/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{ asset('public/admin_assets/vendors/charts/jquery.sparkline.js') }}"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('public/admin_assets/vendors/countUp/countUp.js') }}"></script>
    <!--   maps -->
    <script src="{{ asset('public/admin_assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
     <script src="{{ asset('public/admin_assets/vendors/jscharts/Chart.js') }}"></script>
    <script src="{{ asset('public/admin_assets/js/dashboard.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        var composeHeight = $('#calendar').height() +21 - $('.adds').height();
        $('.list_of_items').slimScroll({
            color: '#A9B6BC',
            height: composeHeight + 'px',
            size: '5px'
        });
    });
    </script>
{{-- <script type="text/javascript">

    var courses_total_visits = {{ $courses_total_visits }};
    var demo = new countUp("courses_total_visits", 0, courses_total_visits, 0, 6, options);
    demo.start();

    var jobs_total_visits = {{ $jobs_total_visits }};
    var demo = new countUp("jobs_total_visits", 0, jobs_total_visits, 0, 6, options);
    demo.start();

    var news_total_visits = {{ $news_total_visits }};
    var demo = new countUp("news_total_visits", 0, news_total_visits, 0, 6, options);
    demo.start();

    var changes_total_visits = {{ $changes_total_visits }};
    var demo = new countUp("changes_total_visits", 0, changes_total_visits, 0, 6, options);
    demo.start();

    var courses = {{ $courses }};
    var demo = new countUp("courses", 0, courses, 0, 6, options);
    demo.start();

    var jobs = {{ $jobs }};
    var demo = new countUp("jobs", 0, jobs, 0, 6, options);
    demo.start();

    var news = {{ $news }};
    var demo = new countUp("news", 0, news, 0, 6, options);
    demo.start();
</script> --}}
<!--single delete item -->
<script type="text/javascript">
function confirmDelete(item) {
    var id = item.getAttribute("data-id");
    var title = item.getAttribute("data-title");

    $("#confirm-id").val(id);
    document.getElementById("confirm-title").innerHTML = title;
}
</script>
<!--end single delete item -->
<!-- end of page level js -->
@endsection