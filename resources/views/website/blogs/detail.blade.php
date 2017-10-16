@extends('website.master')
@section('content')
	<style type="text/css">
		body .sb-site-container {
			-webkit-transform: none;
			transform: none;
			background-color: #ffffff !important;
			min-height: 0;
		}
		.blog-items{
			padding-left: 2px !important;
		}
		div.post-media {
			border-top: 1px solid #EEEEEE;
			margin: 15px 0 0 0;
			padding: 20px 0 15px 0;
		}
		div.post-media h4 {
			color: #0B80FF;
		}
		div.post-author div.img-thumbnail {
			display: inline-block;
			float: left;
			margin-right: 20px;
		}
		.img-thumbnail {
			display: inline-block;
			width: 100% \9;
			max-width: 100%;
			height: auto;
			padding: 4px;
			line-height: 1.42857143;
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 4px;
			-webkit-transition: all .2s ease-in-out;
			-o-transition: all .2s ease-in-out;
			transition: all .2s ease-in-out;
		}
		.img-thumbnail {
			line-height: 1.42857143;
		}
		div.post-media p {
			line-height: 20px;
			margin: 0;
			padding: 0;
		}
		div.post-media {
			border-top: 1px solid #EEEEEE;
			margin: 15px 0 0 0;
			padding: 20px 0 15px 0;
		}
		.media > .pull-left {
			margin-right: 10px;
		}
		div.post-comments img.media-object {
			height: 60px;
			position: relative;
			top: 2px;
			width: 60px;
		}
		.media-object {
			display: block;
		}
		.media-heading {
			margin: 0 0 5px;
		}
		.media, .media .media {
			margin-top: 15px;
		}
		.user-alpha-icon {
			border-radius: 50%;
			background-color: #97287A;
			color: #fff;
			padding: 0px 7px;
		}
	</style>
	<div class="sb-site-container">
		@include('website.home.blocks.top-head')
		@include('website.regions.header')
		<div class="container">
			<div class="text-center">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Deals Page -->
				<ins class="adsbygoogle"
					 style="display:block"
					 data-ad-client="ca-pub-4141596849655811"
					 data-ad-slot="8098943268"
					 data-ad-format="auto"></ins>
				<script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
		<div class="container">
			<h1 class="right-line">Blog</h1>
			<div class="alert alert-light alert-info">
				<p><strong><i class="zmdi zmdi-info"></i></strong>Learn to code and take control of your future.</p>
			</div>
			<div class="row">
				<div class="col-md-9">
					@if(isset($item))
						<div class="col-md-12 blog-items">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">{{ $item->trans->name }}</h3>
								</div>
								<div class="card-block">
									{!! $item->trans->body !!}
								</div>
							</div>
						</div>
						<div class="post-media post-author">
							<h4><i class="fa fa-user"></i>Author</h4>
							<div class="img-thumbnail">
								<a href="blog_post.html">
									{{--<img alt="Author" src="{{ asset('public/website_assets/img/node.png') }}" width="50" height="50">--}}
									<h1 class="user-alpha-icon">A</h1>
								</a>
							</div>
							<p>
								<strong class="name">
									<a href="#">
										{{ $item->author->name }}
									</a></strong>
							</p>
							<p>
								-- By CEO, SYBACE
							</p>
						</div>
						<div class="post-media post-comments">
							<h4><i class="fa fa-comments"></i>Comments (3)</h4>
							@if(isset($comments))
								@foreach($comments as $c => $comment)
									<div class="media">
										<a class="pull-left" href="#">
											<img class="media-object" alt="" src="{{ asset('public/website_assets/img/node.png') }}">
										</a>
										<div class="media-body">
											<h5 class="media-heading">{{ $comment->commentedBy->name }}</h5>
											<span class="pull-right"> <span> <a href="#" onclick="showReplyModal('{{ $comment->id }}','{{ $item->id }}');"><i class="fa fa-reply"></i> Reply</a></span> </span>
											<p>
												{{ $comment->trans->body }}
											</p>
											<span class="date pull-right">{{ $comment->trans->created_at }}</span>
											<hr>
											<!-- Nested media object -->
											<div class="media">
												<a class="pull-left" href="#">
													<img class="media-object" alt="" src="{{ asset('public/website_assets/img/node.png') }}">
												</a>
												<div class="media-body">
													<h5 class="media-heading">Media heading </h5>
													<span class="pull-right"> <span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span> </span>
													<p>
														Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
													</p>
													<span class="date pull-right">January 12, 2014 at 1:38 pm</span>
												</div>
											</div>
											<!--end media-->
											<hr>
											<div class="media">
												<a class="pull-left" href="#">
													<img class="media-object" alt="" src="{{ asset('public/website_assets/img/node.png') }}">
												</a>
												<div class="media-body">
													<h5 class="media-heading">Media heading </h5>
													<span class="pull-right"> <span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span> </span>
													<p>
														Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
													</p>
													<span class="date pull-right">January 12, 2014 at 1:38 pm</span>
												</div>
											</div>
											<!--end media-->
										</div>
									</div>
								@endforeach
							@endif
						</div>
						<div class="post-block post-leave-comment">
							<h3>Leave a comment</h3>
							<form id="frm_comment" method="post" action="{{ action('BlogController@comment',$item->slug) }}">
								@if(Auth::guest())
									<div class="row">
										<div class="form-group">
											<div class="col-md-6">
												<label>
													Your name *
												</label>
												<input id="name" name="name" class="form-control" maxlength="100" value="" type="text">
											</div>
											<div class="col-md-6">
												<label>
													Your email address *
												</label>
												<input id="email" name="email" class="form-control" maxlength="100" value="" type="email">
											</div>
										</div>
									</div>
								@endif
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>
												Comment *
											</label>
											<textarea id="comment" name="comment" class="form-control" rows="10" maxlength="5000"></textarea>
										</div>
									</div>
								</div>
								<input id="post_id" name="post_id" class="form-control" value="{{ $item->id }}" type="hidden">
								<div class="row">
									<div class="col-md-12">
										<!-- <input data-loading-text="Loading..." class="btn btn-main-color" value="Post Comment" type="submit"> -->
										<button class="btn btn-warning btn-raised pull-right" type="submit"><i class="fa fa-send"></i> Send<div class="ripple-container"></div></button>
										<button type="button" class="btn btn-danger  pull-right">Cancel</button>
									</div>
								</div>
							</form>
						</div>
				</div>

				@endif
			</div>
			<div class="col-md-3">
				<div data-WRID="WRID-150503454621794760" data-widgetType="searchWidget" data-class="affiliateAdsByFlipkart" height="250" width="300" ></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
			</div>
			<!--<div class="col-md-3">
                <div class="card card-success">
                    <div class="card-header">
                        <i class="fa fa-list-alt" aria-hidden="true"></i> Summary</div>
                    <div class="card-block">
                        <ul class="list-unstyled">
                            <li>
                                <strong>Price: </strong> $1984.26</li>
                            <li>
                                <strong>Tax: </strong> $47.22</li>
                            <li>
                                <strong>Tax: </strong> $47.22</li>
                            <li>
                                <strong>Shipping costs: </strong>
                                <span class="color-warning">$5.25</span>
                            </li>
                        </ul>
                        <h3>
                            <strong>Total:</strong>
                            <span class="color-success">$2456.45</span>
                        </h3>
                        <a href="javascript:void(0)" class="btn btn-raised btn-success btn-block btn-raised mt-2 no-mb">
                            <i class="zmdi zmdi-shopping-cart-plus"></i> Purchase</a>
                    </div>
                </div>
            </div>-->
		</div>
	</div>
	<!-- container -->
	@include('website.regions.footer')
	</div>
	<!-- sb-site-container -->
	@include('website.regions.leftbar')
@endsection
@section('footer')
	<div class="modal modal-royal" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog animated zoomIn animated-3x" role="document">
			<div class="modal-content">
				<form class="form-horizontal" id="frm_comment_popup" method="post" action="{{ action('BlogController@comment',$item->slug) }}">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
						<h3 class="modal-title" id="myModalLabel">Leave your comment</h3>
					</div>
					<input type="hidden" id="current_comment_id" name="comment_id" />
					<input type="hidden" id="current_post_id" name="post_id" />
					<div class="modal-body">
						<div class="form-group is-empty">
							<label for="textArea" class="col-md-2 control-label">Textarea</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" id="textArea" name="comment" required></textarea>
								<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-raised btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        function showReplyModal(id,post_id) {
            $('#current_comment_id').val(id);
            $('#current_post_id').val(post_id);
            $("#replyModal").modal({
                show:true
            });
        }
	</script>
	<script defer src="{{ asset('public/website_assets/js/customize/blog.js') }}" type="text/javascript"></script>
@stop