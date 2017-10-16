@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => '/'.Lang::getLocale().'/admin/countries', 'name' => trans('Countries::countries.countries')];
    $action = action('\UiStacks\Countries\Controllers\AreasController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Countries::countries.area')];
        $action = action('\UiStacks\Countries\Controllers\AreasController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Countries::countries.area')];
    }
@endphp

@extends('admin.master')
@section('page_title')
{{ trans('Countries::countries.countries') }}: {{ $pageNameMode }} {{ trans('Countries::countries.area') }}
@endsection
@section('content')
<!-- Include Media model -->
@include('Media::modals.modal')
<!-- end include Media model -->

<!-- Include Media model -->
@include('Media::modals.gallery-modal')
<!-- end include Media model -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ trans('Countries::countries.area') }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ $action }}" method="POST" role="form">
                    @if($method === 'PATCH')
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    {{ csrf_field() }}
                    <div class="col-md-9">
                        @include('Core::groups.languages', [
                            'fields' => [
                                0 => [
                                    'type' => 'input_text',
                                    'properties' => [
                                        'field_name' => 'name',
                                        'name' => trans('Core::operations.name'),
                                        'placeholder' => ''
                                    ]
                                    
                                ]
                            ]
                        ])
                    </div>
                    <div class="col-md-3 sidbare">
                        <!-- Language field -->
                        @include('Core::fields.languages')
                        <!-- End Language field -->

                        @php
                            $options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
                            if(isset($countries) && $countries->count()){
                                foreach ($countries as $country) {
                                    $countryName = '';
                                    if($country->trans){
                                        $countryName = $country->trans->name;
                                    }
                                    $options[] = ['value' => $country->id, 'name' => $countryName];
                                }
                            }
                            $value = '';
                            if(isset($item) && $item->country_id){
                                $value = $item->country_id;
                            }
                        @endphp

                        @include('Core::fields.select', [
                            'field_name' => 'country',
                            'name' => trans('Countries::countries.country'),
                            'options' => $options,
                            'value' => $value
                        ])

                        <hr>

                        @include('Core::fields.checkbox', [
                            'field_name' => 'active',
                            'name' => trans('admin.active'),
                            'placeholder' => ''
                        ])
                        <div class="checkbox">
                            <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                        </div>
                        
                        <button type="submit" class="btn btn-block btn-primary">{{ $submitButton }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<!--Language -->
@include('Core::language.scripts.scripts')
<!--end Language -->

<!--Media -->
@include('Media::scripts.scripts')
<!--end media -->

<!--jquery-dependency-fields -->
<script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
<!--end jquery-dependency-fields -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#lang-en').attr('onClick','return false');
        $('#lang-ar').attr('onClick','return false');
    });
</script>
@endsection