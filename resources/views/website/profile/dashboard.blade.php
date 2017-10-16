@extends('website.master')
@section('page_title')

@endsection
@section('content')
    <div class="db-main-blk">
        <div class="container">
            <div class="db-main-menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="{{ action('WebsiteController@dashboard') }}" >My Account</a>
                    </li>
                    <li role="presentation">
                        <a href="{{ action('StoreController@index') }}" >My Shops</a>
                    </li>
                    {{--<li role="presentation" class="active"><a href="#db-acc-set" aria-controls="home" role="tab" data-toggle="tab">My Account</a></li>--}}
                    {{--<li role="presentation"><a href="#db-mysho-set" aria-controls="profile" role="tab" data-toggle="tab">My Shops</a></li>--}}
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="db-acc-set">
                        <div class="comm-inner-head clearfix"> <span>Edit Profile</span>
                            <div class="view-more pull-right"> <i class="fa fa-long-arrow-left"></i>Back</div>
                        </div>
                        <div class="prof-data comm-form">
                            <div class="view-user-img-blk">
                                <div class="view-user-img relative user-upl-img"> <img src="{{url('/')}}/public/website_assets/images/user.png"> <span class=" animate"><i class="fa fa-upload"></i>
                                  <input type="file">
                                  </span>
                                </div>
                            </div>
                            <div class=" user-edit-form">
                                <div class="form-group row">
                                    <div class="col-sm-4 col-xs-12">
                                        <label>Name:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control"  placeholder="Name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-btn text-center">
                                            <button class="btn cust-btn animate text-uppercase" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------ Login Modal ------------------>
    <div class="cust-modal">
        <div class="modal fade" id="view-per-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button>
                    <div class="modal-body">
                        <div class="sign-form">

                            <div class="view-data comm-form">
                                <div class="view-user-img-blk">
                                    <div class="view-user-img"><img src="{{url('/')}}/public/website_assets/images/user12.png"></div>
                                </div>
                                <div class=" user-view-form">
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>First Name :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>John</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>Last Name :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>Doe</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>User Name :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>JohnD</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>Email Address :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>John@gmail.com</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>Comp. Name :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>ASD</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>Contry :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>India</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>State :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>Maharashtra</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xs-5">
                                            <label>Mobile No. :</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <label>7894561232</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection