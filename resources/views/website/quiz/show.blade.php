@extends('website.master')
@section('content')
<div class="sb-site-container">
    @include('website.home.blocks.top-head')
    @include('website.regions.header')
    <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-primary">
        <div class="container">
            <div class="text-center">
                <span class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 mt-2 animated zoomInDown animation-delay-5">SB</span>
                <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">
                    {{ $item->trans->title }}
                </h1>
                {{--<p class="lead lead-lg color-white text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Discover our projects and the--}}
                    {{--<span class="color-warning">rigorous process</span> of creation. Our principles are creativity, design, experience and knowledge.</p>--}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card card-hero animated slideInUp animation-delay-8 mb-6">
            <div class="card-block">
                {{--<h2 class="color-primary">{{ $item->trans->title }}</h2>--}}
                <div class="row">
                    {!! $item->trans->body !!}
                    {{--<div class="col-md-6 text-justify">--}}
                        {{--<p class="dropcaps">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam ipsa id saepe, quos ullam fugiat velit pariatur alias cumque. Architecto et vitae perferendis cumque ratione officiis? Quas quod, rerum dolores qui. Iste magnam ipsam laborum.--}}
                            {{--Natus quis maiores est qui maxime, consectetur ipsam esse quaerat facilis quos repudiandae eaque magni laboriosam amet.</p>--}}
                        {{--<p>Perferendis, blanditiis unde fugiat voluptas molestias velit asperiores rerum ipsam animi eum temporibus at numquam, nobis voluptates minus maxime cum obcaecati! Tenetur sit corporis laudantium inventore officia officiis odio repellat--}}
                            {{--dolore quos repudiandae voluptas ad facere, amet placeat animi voluptatem distinctio beatae.</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 text-justify">--}}
                        {{--<p>Non sequi adipisci nostrum natus rem accusamus itaque repellendus illum neque! Voluptate, error commodi a quaerat eveniet tenetur reiciendis nulla doloremque iusto repellat quis asperiores, quibusdam architecto culpa facere aliquam placeat--}}
                            {{--eaque amet, optio nobis alias maiores. Nulla perferendis impedit hic placeat veniam distinctio error.</p>--}}
                        {{--<p>Tenetur numquam a, nesciunt neque odit amet, qui quibusdam natus assumenda quas omnis, aspernatur quisquam nobis illum ea distinctio tempora quaerat. Aperiam cumque, eveniet similique praesentium, temporibus, id quis labore aspernatur--}}
                            {{--quod placeat ducimus fuga consequuntur numquam autem. Voluptates repellat.</p>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    @include('website.regions.footer')
</div>
@include('website.regions.leftbar')
@endsection
@section('footer')

@stop