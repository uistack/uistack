<style type="text/css">
    .alert {
        position: relative;
        margin: 0.5rem 0 1rem 0;
        background-color: #fff;
        transition: box-shadow .25s;
        border-radius: 2px;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    }
    .alert-danger{
        background-color: #FFEBEE !important;
        color: #F44336 !important;
    }
    .alert-success{
        background-color: #E8F5E9 !important;
        color: #4CAF50 !important;
    }
    .alert-warning{
        background-color: #fff3e0 !important;
        color: #ff9800 !important;
    }
    .alert-info{
        background-color: #ede7f6 !important;
        color: #673ab7 !important;
    }
</style>
@if(isset($errors) && $errors->count() > 0)
    <div class="alert alert-danger" style="margin-top: 10px;">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif