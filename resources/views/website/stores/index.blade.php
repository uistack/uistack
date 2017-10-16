@php
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp
@extends('website.master')
@section('page_title')

@endsection
@section('content')
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <div class="db-main-blk">
        <div class="container">
            <div class="db-main-menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a href="{{ action('WebsiteController@dashboard') }}" >My Account</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="{{ action('StoreController@index') }}" >My Shops</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="db-mysho-set">
                        <form method="POST" action="{{ action('\UiStacks\Stores\Controllers\StoresController@bulkOperations')}}" id="bulk" class="form-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="table-responsive cust-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="check_all" id="checkall">
                                        </th>
                                        <th>
                                            {{ trans('Stores::stores.store') }}
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>{{ trans('Core::operations.status') }}</th>
                                        <th>{{ trans('Core::operations.created_at') }}</th>
                                        <th>{{ trans('Core::operations.operations') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--<tr>--}}
                                    {{--<td>01</td>--}}
                                    {{--<td>ASDDD</td>--}}
                                    {{--<td>425, Marketyard Pune-1444</td>--}}
                                    {{--<td>--}}
                                    {{--<div class="action-list">--}}
                                    {{--<ul class="clearfix">--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:void(0)" class="colo-app"><i class="fa fa-eye"></i></a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:void(0)" class="colo-yellow"><i class="fa fa-edit"></i></a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:void(0)" class="colo-rej"><i class="fa fa-trash"></i></a>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    @foreach($items as $item)
                                        <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                            <td>
                                                <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                            </td>
                                            <td class="user_name_col_{{$item->id}}">
                                                @if($item->trans)
                                                    {{ $item->trans->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($item->trans))
                                                    {{ $item->trans->location }}
                                                @else
                                                    {{ 'N/A' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->active == true)
                                                    {{ trans('Core::operations.active') }}
                                                @else
                                                    {{ trans('Core::operations.inactive') }}
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a class="colo-app" href="{{ action('StoreController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                                <a class="colo-rej" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="operation">{{ trans('Core::operations.with_select') }}</label>
                                <select name="operation" id="operation" class="form-control" required="required">
                                    <option value="">- {{ trans('Core::operations.select') }} -</option>
                                    <option value="activate">{{ trans('Core::operations.activate') }}</option>
                                    <option value="deactivate">{{ trans('Core::operations.deactivate') }}</option>
                                    <option value="delete">{{ trans('Core::operations.delete') }}</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('Core::operations.go') }}</button>
                            <div class="table-footer">
                                <div class="count"><i class="fa fa-folder-o"></i> {{ $items->total() }} {{ trans('Core::operations.item') }}</div>
                                <div class="pagination-area"> {!! $items->render() !!} </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection