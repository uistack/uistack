@php

    $breadcrumbs = [
    ['url' => url('/').'/'.Lang::getLocale().'/admin/topics/', 'name' => trans('Uiquiz::quiz.topics')],
    ['url' => url('/').'/'.Lang::getLocale().'/admin/questions/', 'name' => trans('Uiquiz::quiz.questions')],
    ['url' => '', 'name' => trans('Uiquiz::quiz.questions-options')]
    ];

    $dbTable = '';
    if($items->count()){
    $dbTable = $items[0]['table'];
    }

@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Uiquiz::quiz.questions-options') }}
@endsection
@section('content')
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <style type="text/css">
        .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid #DDD;
            text-align: left !important;
            vertical-align: middle;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="admin-top-operation">
                <a class="btn btn-default" href="{{ action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@create')}}">{{ trans('Core::operations.create') }} {{ trans('Uiquiz::quiz.question-option') }}</a>
            </div>
            @if($items->count() || $_GET)
                @include('Quiz::quiz.question-option-filter')
            @endif
            @if($items->count())
                <form method="POST" action="{{ url('/')."/ar/admin/questions-options/bulk-operations" }}" id="bulk" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th>{{ trans('Core::operations.id') }}</th>
                                <th>{{ trans('Uiquiz::quiz.question') }}</th>
                                <th>{{ trans('Uiquiz::quiz.name') }}</th>
                                <th>{{ trans('Uiquiz::quiz.correct') }}</th>
                                <th>{{ trans('Core::operations.status') }}</th>
                                <th>{{ trans('Core::operations.operations') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--{{dd($items)}}--}}
                            @if(isset($items))
                                @foreach($items as $item)
                                    @if(isset($item->trans))
                                        <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                            <td>
                                                <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                            </td>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                {{ $item->question->trans->question_text or '' }}
                                            </td>
                                            <td>
                                                {{ $item->trans->option or '' }}
                                            </td>
                                            <td>
                                                @if($item->trans)
                                                    {{ $item->trans->correct == 1 ? 'Yes' : 'No' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->active == true)
                                                    {{ trans('Core::operations.active') }}
                                                @else
                                                    {{ trans('Core::operations.inactive') }}
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@edit',[$item->id]) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                                <a class="btn btn-sm btn-danger" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                {{trans('Uiquiz::quiz.no_message_found')}}
                            @endif
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
            @else
                <div class="text-center">
                    <h1>{{ trans('admin.no_results_found') }}
                        {{--<a href="{{ action('\UiStacks\Uiquiz\Controllers\UiquizController@index')}}">{{ trans('admin.back') }}</a>--}}
                    </h1>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('footer')
    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection