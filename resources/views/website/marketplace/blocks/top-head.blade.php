{{--<div id="ms-preload" class="ms-preload">--}}
    {{--<div id="status">--}}
        {{--<div class="spinner">--}}
            {{--<div class="dot1"></div>--}}
            {{--<div class="dot2"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Modal -->
<div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog animated zoomIn animated-3x" role="document">
        <div class="modal-content">
            <div class="modal-header shadow-2dp no-pb">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close"></i>
                </span>
                </button>
                <div class="modal-title text-center">
                    <span class="ms-logo ms-logo-white ms-logo-sm mr-1">SB</span>
                    <h3 class="no-m ms-site-title">Sy
                        <span>Bace</span>
                    </h3>
                </div>
                <div class="modal-header-tabs">
                    <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab" class="withoutripple">
                                <i class="zmdi zmdi-account"></i> Login</a>
                        </li>
                        <li role="presentation">
                            <a href="#ms-register-tab" aria-controls="ms-register-tab" role="tab" data-toggle="tab" class="withoutripple">
                                <i class="zmdi zmdi-account-add"></i> Register</a>
                        </li>
                        <li role="presentation">
                            <a href="#ms-recovery-tab" aria-controls="ms-recovery-tab" role="tab" data-toggle="tab" class="withoutripple">
                                <i class="zmdi zmdi-key"></i> Recovery Pass</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="ms-login-tab">
                        @include('website.blocks.page-message')
                        <form name="frm_login" id="frm_login" action="{{ action('WebsiteController@postLogin') }}" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <label class="control-label" for="ms-form-user">Username</label>
                                        {{--<input type="text" id="ms-form-user" class="form-control">--}}
                                        <input required class="form-control" id="user_email" name="user_email" type="text">
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                        <label class="control-label" for="ms-form-pass">Password</label>
                                        {{--<input type="password" id="ms-form-pass" class="form-control">--}}
                                        <input class="form-control" name="user_password" id="user_password" type="password" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group no-mt">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="remember" value="1"> Remember Me </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-raised btn-primary pull-right">Login</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div class="text-center">
                            <h3>Login with</h3>
                            <a href="{{ url('/auth/facebook') }}" class="wave-effect-light btn btn-raised btn-facebook">
                                <i class="zmdi zmdi-facebook"></i> Facebook</a>
                            <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter">
                                <i class="zmdi zmdi-twitter"></i> Twitter</a>
                            <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google">
                                <i class="zmdi zmdi-google"></i> Google</a>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ms-register-tab">
                        @include('website.blocks.page-message')
                        <form name="frm_registration" id="frm_registration" action="{{ action('WebsiteController@postRegister') }}" method="post" >
                            <fieldset>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <label class="control-label" for="ms-form-user">Username</label>
                                        {{--<input type="text" id="ms-form-user" class="form-control">--}}
                                        <input required class="form-control" id="name" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <label class="control-label" for="ms-form-email">Email</label>
                                        {{--<input type="email" id="ms-form-email" class="form-control">--}}
                                        <input required class="form-control" id="email" name="email" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                                        <label class="control-label" for="ms-form-user">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"/>
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                        <label class="control-label" for="ms-form-pass">Password</label>
                                        {{--<input type="password" id="ms-form-pass" class="form-control">--}}
                                        <input type="password" class="form-control" id="password" name="password"/>
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                        <label class="control-label" for="ms-form-pass">Re-type Password</label>
                                        {{--<input type="password" id="ms-form-pass" class="form-control">--}}
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"/>
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <div class="form-group no-mt">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember" value="1"> I have read the terms and conditions and pledge to abide by them </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-block btn-primary">Register Now</button>
                            </fieldset>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">
                        @include('website.blocks.page-message')
                        <form name="frm_forgot_password" id="frm_forgot_password" action="{{ action('WebsiteController@forgotPasswordUserValidation') }}" method="post" autocomplete="off">
                        <fieldset>
                            <div class="form-group label-floating">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                    <label class="control-label" for="ms-form-user">Username</label>
                                    <input type="text" id="ms-form-user" class="form-control" id="reset_username" name="reset_username">
                                </div>
                            </div>
                            <div class="form-group label-floating">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                    <label class="control-label" for="ms-form-email">Email</label>
                                    {{--<input type="email" id="ms-form-email" class="form-control">--}}
                                    <input required class="form-control" id="reset_email" name="reset_email" type="text">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-block btn-primary">Send Password</button>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>