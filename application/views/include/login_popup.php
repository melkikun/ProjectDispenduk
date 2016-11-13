<div class="container" id="container-login">
    <div class="modern-p-form p-form-modern-purple">
        <div class="p-btn-pannel p-fixed p-pos-left">
        </div>
        <div>
            <input type="checkbox" id="popup-form-id" class="hide p-show-check" checked=""/>
            <!-- Remove label below to remove background -->
            <label for="popup-form-id" class="p-popup-bg"></label>
            <div class="p-popup p-action-block">
                <form class="p-form p-shadowed p-form-sm" action="#" method="post" action="./json/ajax-success.json" data-js-validate="true" data-js-highlight-state-msg="true" data-js-show-valid-msg="true" data-js-ajax-form="" data-js-ajax-before-hide-block="successBlockName;failBlockName" data-js-ajax-before-show-block="loadingBlockName" data-js-ajax-success-show-block="successBlockName" data-js-ajax-success-hide-block="formBlockName;failBlockName" data-js-ajax-fail-show-block="failBlockName" data-js-ajax-always-hide-block="loadingBlockName">
                    <!-- Start: title -->
                    <div class="p-title text-left">
                        <span class="p-title-side">Login&nbsp;&nbsp;<i class="fa fa-sign-in"></i></span>
                    </div>
                    <!-- End: title -->
                    <div data-js-block="successBlockName" class="collapse">
                        <h4>Form data send successfully!</h4>
                        <div data-js-block="successContentBlock" class="collapse"></div>
                        <div class="text-right">
                            <a href="./ajax-popup-form-login.html" class="btn">reload</a>
                        </div>
                    </div>
                    <div data-js-block="failBlockName" class="collapse">
                        <h4>Form data send failed!</h4>
                        <div data-js-block="errorContentBlock" class="collapse"></div>
                    </div>
                    <div data-js-block="formBlockName">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Start: login <input:text> -->
                                <div class="form-group">
                                    <label for="login" class="p-label-required">Username</label>
                                    <div class="input-group p-has-icon">
                                        <input type="text" id="login" name="login" placeholder="Login" required="required" class="form-control" />
                                        <span class="input-group-state">
                                            <span class="p-position">
                                                <span class="p-text">
                                                    <span class="p-required-text"><i class="fa fa-star"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="p-field-cb"></span>
                                        <span class="input-group-icon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <!-- End: login <input:text> -->
                                <!-- Start: password <input:password> -->
                                <div class="form-group">
                                    <label for="password" class="p-label-required">Password</label>
                                    <div class="input-group p-has-icon">
                                        <input type="password" id="password" name="password" placeholder="Password" required="required" minlength="6" maxlength="10" data-msg-minlength="Password should have at least 6 characters" data-msg-maxlength="Password should have max 10 characters" class="form-control" />
                                        <span class="input-group-state">
                                            <span class="p-position">
                                                <span class="p-text">
                                                    <span class="p-required-text"><i class="fa fa-star"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="p-field-cb"></span>
                                        <span class="input-group-icon"><i class="fa fa-lock"></i></span>
                                    </div>
                                </div>
                                <!-- End: password <input:password> -->
                                <p>
                                    <a class="p-colored-link" href="#">Forgot password?</a>
                                </p>
                                <div class="clearfix"></div>
                                <!-- Start: keepLogged <checkbox> -->
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="keep-logged" name="keepLogged" />
                                            <span class="p-check-icon">
                                                <span class="p-check-block"></span>
                                            </span>
                                            <span class="p-label">Keep me logged in</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- End: keepLogged <checkbox> -->
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn" type="submit" name="confirm"><i class="fa fa-sign-in"></i>&nbsp;login</button>
                        </div>
                        <div class="text-right">
                            <button class="btn" type="submit" name="confirm"><i class="fa fa-sign-in"></i>&nbsp;login</button>
                        </div>
                    </div>
                    <label class="p-hide-form p-action-link" for="popup-form-id"><i class="fa fa-times"></i></label>
                </form>
            </div>
        </div>
    </div>
    <!-- End: modern skin - Login (popup) -->
</div>