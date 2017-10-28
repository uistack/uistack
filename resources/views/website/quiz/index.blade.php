@extends('website.master')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/tp_swiftype.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/quiz/quiz.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/main.css') }}" />
@endsection
@section('content')
    <div id="cb-wrapper-api-docs" class="">
        @include('website.regions.learn-header')
        <div id="cb-container" class="container">
            @include('website.learn.blocks.left-menu')
            <div id="cb-content" class="cb-content">
                <p>Answer these questions. There's no time limit. </p>
                {{--<div class="">--}}
                {{--<div class="">--}}
                {{--<p class="" style="margin-bottom:30px;">1. What does ASP stand for?</p>--}}
                {{--<form role="form" name="quizform" action="quiztest.asp?qtest=ASP" method="post">--}}
                {{--<input type="hidden" name="starttime" value="4/10/2016 6:02:08 AM">--}}
                {{--<input type="hidden" name="answers" value="0000000000000000000000000" size="25">--}}
                {{--<input type="hidden" name="qnumber" value="1" size="25">--}}
                {{--<div class="radio">--}}
                {{--<label><input type="radio" name="quiz" id="1" value="1"> Active Server Pages</label>--}}
                {{--</div>--}}
                {{--<div class="radio">--}}
                {{--<label><input type="radio" name="quiz" id="2" value="2"> All Standard Pages</label>--}}
                {{--</div>--}}
                {{--<div class="radio">--}}
                {{--<label><input type="radio" name="quiz" id="3" value="3"> A Server Page</label>--}}
                {{--</div>--}}
                {{--<div class="radio">--}}
                {{--<label><input type="radio" name="quiz" id="4" value="4"> Active Standard Pages</label>--}}
                {{--</div>--}}
                {{--<br>--}}
                {{--<input type="submit" class="w3-btn w3-orange w3-large w3-text-white" value=" Next ">--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--</div>--}}
                <form role="form" name="quizform" action="{{ action('QuizController@submitQuiz') }}" method="post">
                    <input type="hidden" name="starttime" value="4/10/2016 6:02:08 AM">
                    <input type="hidden" name="answers" value="0000000000000000000000000" size="25">
                    <input type="hidden" name="qnumber" value="1" size="25">
                    @if(isset($items))
                        @php
                        $i = 0;
                        @endphp
                        @foreach($items as $item)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    #{{ $i+1 }}. {{ $item->trans->question_text }}
                                </div>
                                <div class = "panel-body">
                                    <div class="radio">
                                        <label><input type="radio" name="quiz" id="1" value="1"> Active Server Pages</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="quiz" id="2" value="2"> All Standard Pages</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="quiz" id="3" value="3"> A Server Page</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="quiz" id="4" value="4"> Active Standard Pages</label>
                                    </div>
                                    {{--<button type="submit" class="btn btn-sm btn-warning pull-right" name="btn_next" id="btn_next" >Next →</button>--}}
                                </div>
                            </div>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-warning" name="btn_next" id="btn_next" >Next →</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/tp_apidocs.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/tp_swiftype.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/learn.js') }}"></script>
@stop