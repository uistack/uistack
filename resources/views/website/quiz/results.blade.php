@extends('website.master')
@section('header')
    <style type="text/css">

    </style>
@endsection
@section('content')
    <div class="st-container">
        @include('website.regions.learn-header')
        @include('website.quiz.blocks.left-menu')
        @include('website.quiz.blocks.right-menu')
        {{--@include('website.regions.learn-header')--}}
        <div class="st-pusher" id="content">
            <!-- sidebar effects INSIDE of st-pusher: -->
            <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->
            <!-- this is the wrapper for the content -->
            <div class="st-content">
                <!-- extra div for emulating position:fixed of the menu -->
                <div class="st-content-inner padding-top-none">
                    <div class="page-section half bg-white">
                        <div class="container-fluid">
                            <div class="section-toolbar">
                                <div class="cell">
                                    <div class="media width-120 v-middle margin-none">
                                        <div class="media-left">
                                            <div class="icon-block bg-grey-200 s30"><i class="fa fa-question"></i></div>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-body-2 text-light margin-none">Questions</p>
                                            <p class="text-title text-primary margin-none">25</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="media width-120 v-middle margin-none">
                                        <div class="media-left">
                                            <div class="icon-block bg-grey-200 s30"><i class="fa fa-diamond"></i></div>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-body-2 text-light margin-none">Score</p>
                                            <p class="text-title text-success margin-none">800 pt</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-section equal">
                        <div class="container-fluid">
                            <form action="{{ action('QuizController@submitQuiz') }}" method="post" id="questionForm">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="text-subhead-2 text-light">Question 1 of {{ $items->count() }}</div>
                                @if(isset($questions))
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($questions as $qk => $question)
                                        <div id="q<?php echo $qk;?>" class="panel panel-default paper-shadow" data-z="0.5">
                                            <div class="panel-heading">
                                                <h4 class="text-headline">#{{ $i }} {{ $question->trans->question_text }}</h4>
                                            </div>
                                            <input
                                                    type="hidden"
                                                    name="questions[{{ $i }}]"
                                                    value="{{ $question->id }}">
                                            <div class="panel-body">
                                                @if(isset($question->options))

                                                    @foreach($question->options as $ok => $option)
                                                        @if($option->question_id == $question->id)
                                                            <div class="radio radio-primary">
                                                                {{--<div class="">--}}
                                                                <input
                                                                        type="radio"
                                                                        name="answers[{{ $question->id }}]"
                                                                        value="{{ $option->id }}">
                                                                <label for="{{ $option->trans->option }}">{{ $option->trans->option }}</label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $i+=1;
                                        @endphp
                                    @endforeach
                                    <div class="panel-footer">
                                        <div class="text-right">
                                            {{--<button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save</button>--}}
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-chevron-right fa-fw"></i> Submit Quiz</button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /st-content-inner -->
            </div>
            <!-- /st-content -->
        </div>
        @include('website.regions.footer-bottom')
    </div>
@endsection
@section('footer')
@stop