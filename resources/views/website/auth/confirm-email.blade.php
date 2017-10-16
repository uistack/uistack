@extends('website.master')
@section('content')
    <div class="bg-full-page ms-hero-bg-dark ms-hero-img-airplane back-fixed">
        <div class="mw-500 absolute-center">
            <div class="card color-dark shadow-6dp animated fadeIn animation-delay-7">
                <div class="ms-hero-bg-primary ms-hero-img-mountain">
                    <h2 class="text-center no-m pt-4 pb-4 color-white index-1">Login Form</h2>
                </div>
                <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-transparent indicator-primary" role="tablist">
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
                            <i class="zmdi zmdi-key"></i> Recovery</a>
                    </li>
                </ul>
                <div class="card-block">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="ms-login-tab">
                            <form>
                                <fieldset>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                            <label class="control-label" for="ms-form-user">Username</label>
                                            <input type="text" id="ms-form-user" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                            <label class="control-label" for="ms-form-pass">Password</label>
                                            <input type="password" id="ms-form-pass" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-xs-5">
                                            <div class="form-group no-mt">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Remember </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <button class="btn btn-raised btn-primary pull-right">Login</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <div class="text-center">
                                <h3>Login with</h3>
                                <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook">
                                    <i class="zmdi zmdi-facebook"></i> Facebook</a>
                                <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter">
                                    <i class="zmdi zmdi-twitter"></i> Twitter</a>
                                <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google">
                                    <i class="zmdi zmdi-google"></i> Google</a>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="ms-register-tab">
                            <form>
                                <fieldset>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                            <label class="control-label" for="ms-form-user">Username</label>
                                            <input type="text" id="ms-form-user" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                            <label class="control-label" for="ms-form-email">Email</label>
                                            <input type="email" id="ms-form-email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                            <label class="control-label" for="ms-form-pass">Password</label>
                                            <input type="password" id="ms-form-pass" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                            <label class="control-label" for="ms-form-pass">Re-type Password</label>
                                            <input type="password" id="ms-form-pass" class="form-control">
                                        </div>
                                    </div>
                                    <button class="btn btn-raised btn-block btn-primary">Register Now</button>
                                </fieldset>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">
                            <fieldset>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <label class="control-label" for="ms-form-user">Username</label>
                                        <input type="text" id="ms-form-user" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <label class="control-label" for="ms-form-email">Email</label>
                                        <input type="email" id="ms-form-email" class="form-control">
                                    </div>
                                </div>
                                <button class="btn btn-raised btn-block btn-primary">Send Password</button>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center animated fadeInUp animation-delay-7">
                <a href="index-2.html" class="btn btn-white">
                    <i class="zmdi zmdi-home"></i> Go Home</a>
            </div>
        </div>
    </div>
@endsection