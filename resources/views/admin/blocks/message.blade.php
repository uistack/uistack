{{--@if (Session::has('message'))--}}
{{--<div class="alert {{ Session::get('alert-class', 'alert-info') }}">--}}
{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--{{ Session::get('message') }}--}}
{{--</div>--}}
{{--@endif--}}
<link href="{{ asset('public/website_assets/css/toastr.min.css') }}" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function() {
        // Override global options
        @if (Session::get('alert-class') == "alert-success")
        toastr.success('{{Session::get('message')}}', '{{ trans("Core::operations.success") }}', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @elseif(Session::get('alert-class') == "alert-danger")
        toastr.error('{{Session::get('message')}}', '{{ trans("Core::operations.error") }}', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @elseif(Session::get('alert-class') == "alert-warning")
        toastr.warning('{{Session::get('message')}}', '{{ trans("Core::operations.warning") }}', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @elseif(Session::get('alert-class') == "alert-info")
        toastr.info('{{Session::get('message')}}', '{{ trans("Core::operations.warning") }}', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @endif
    });
</script>
<script src="{{ asset('public/website_assets/js/toastr.min.js') }}" type="text/javascript"></script>

@if(isset($errors) && $errors->count() > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
