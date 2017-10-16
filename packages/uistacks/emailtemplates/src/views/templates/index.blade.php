@php
    $breadcrumbs = [
    ['url' => '', 'name' => trans('Emailtemplates::emailtemplate.emailtemplates')]
    ];

    $dbTable = '';
    if($items->count()){
    $dbTable = $items[0]['table'];
    }

@endphp

@extends('admin.master')
@section('page_title')
    {{trans('Emailtemplates::emailtemplate.emailtemplates')}}
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            {{--<div class="admin-top-operation">--}}
                {{--<a class="btn btn-default" href="{{ action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@create')}}">{{ trans('Core::operations.create') }} {{ trans('Emailtemplates::emailtemplate.emailtemplates') }}</a>--}}
            {{--</div>--}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('Core::operations.id') }}</th>
                        <th>{{ trans('Emailtemplates::emailtemplate.subject') }}</th>
                        <th>{{ trans('Emailtemplates::emailtemplate.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if(isset($item->trans->subject))
                                    {{  trim($item->trans->subject) }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection