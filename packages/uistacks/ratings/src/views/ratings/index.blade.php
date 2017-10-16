@php
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Ratings::ratings.ratings')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp
@extends('admin.master')
@section('page_title')
    {{ trans('Ratings::ratings.ratings') }}
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('public/website_assets/raty-master/lib/jquery.raty.css') }}">
    <script src="{{ asset('public/website_assets/raty-master/lib/jquery.raty.js') }}" type="text/javascript"></script>
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <div class="row">
        <div class="col-md-12">
            <div class="admin-top-operation">
                {{--<a class="btn btn-default" href="{{ url('/').'/'.Lang::getlocale().'/admin/ratings/create' }}">{{ trans('Core::operations.create') }} {{ trans('Ratings::ratings.rating') }}</a>--}}
            </div>
            @if($items->count() || $_GET)
                @include('Ratings::ratings.filter')
            @endif
            @if($items->count())
                <form method="POST" action="{{ action('\UiStacks\Ratings\Controllers\RatingsController@bulkOperations')}}" id="bulk" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                {{--<th>--}}
                                    {{--<input type="checkbox" name="check_all" id="checkall">--}}
                                {{--</th>--}}
                                <th>{{ trans('Core::operations.id') }}</th>
                                <th>{{ trans('Ratings::ratings.name') }}</th>
                                <th>{{ trans('Ratings::ratings.rated_by') }}</th>
                                <th>{{ trans('Stores::stores.store') }}</th>
                                <th>{{ trans('Ratings::ratings.rated_at') }}</th>
                                {{--<th>{{ trans('Core::operations.status') }}</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                    {{--<td>--}}
                                        {{--<input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">--}}
                                    {{--</td>--}}
                                    <td>{{ $item->id }}</td>
                                    <td class="user_name_col_{{$item->id}}">
                                        @if($item->trans)
                                            <span id="store_avg_rating<?php echo $key; ?>"></span>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#store_avg_rating<?php echo $key; ?>').raty({
                                                        readOnly: true,
                                                        start: '{{ $item->trans->rating }}',
                                                        score: '{{ $item->trans->rating }}',
                                                        path: "{{ url('/') }}/website_assets/raty-master/lib/images",
                                                        half: true
                                                    });
                                                });
                                            </script>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->author)
                                            {{ $item->author->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($item))
                                            {{ $item->store->trans->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    {{--<td>--}}
                                    {{--@if($item->active == true)--}}
                                        {{--{{ trans('Core::operations.active') }}--}}
                                    {{--@else--}}
                                        {{--{{ trans('Core::operations.inactive') }}--}}
                                    {{--@endif--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label for="operation">{{ trans('Core::operations.with_select') }}</label>--}}
                        {{--<select name="operation" id="operation" class="form-control" required="required">--}}
                            {{--<option value="">- {{ trans('Core::operations.select') }} -</option>--}}
                            {{--<option value="activate">{{ trans('Core::operations.activate') }}</option>--}}
                            {{--<option value="deactivate">{{ trans('Core::operations.deactivate') }}</option>--}}
                            {{--<option value="delete">{{ trans('Core::operations.delete') }}</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-primary">{{ trans('Core::operations.go') }}</button>--}}

                    <div class="table-footer">
                        <div class="count"><i class="fa fa-folder-o"></i> {{ $items->total() }} {{ trans('Core::operations.item') }}</div>
                        <div class="pagination-area"> {!! $items->render() !!} </div>
                    </div>
                </form>
            @else
                <div class="text-center">
                    @if($_GET)
                        <h1>{{ trans('admin.no_results_found') }} <a href="{{ url('/').'/'.Lang::getlocale().'/admin/ratings' }}">{{ trans('admin.back') }}</a></h1>
                    @elseif(Request::is(''.Lang::getlocale().'/admin/ratings'))
                        <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ url('/').'/'.Lang::getlocale().'/admin/ratings/create' }}">{{ trans('Core::operations.create') }} {{ trans('Ratings::ratings.rating') }}</a></h1>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/customize/rating.js') }}" type="text/javascript"></script>
    <!--end jquery-dependency-fields -->
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection