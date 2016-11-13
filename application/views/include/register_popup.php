<div class="container" id="container-register">
    <!-- Start: modern skin - Registration (popup) -->
    <!-- Replace all 'popup-form-id1' with your unique id if needed -->
    <div class="modern-p-form p-form-modern-purple">
        <div class="p-btn-pannel p-fixed p-pos-left">
            <label for="popup-form-id1" class="btn hide"><i class="fa fa-hand-pointer-o"></i></label>
        </div>
        <div>
            <input type="checkbox" id="popup-form-id1" class="hide p-show-check" checked=""/>
            <!-- Remove label below to remove background -->
            <label for="popup-form-id1" class="p-popup-bg"></label>
            <div class="p-popup p-action-block">
                <form class="p-form p-shadowed p-form-sm" action="#" method="post" action="./json/ajax-success.json" data-js-validate="true" data-js-highlight-state-msg="true" data-js-show-valid-msg="true" data-js-ajax-form="" data-js-ajax-before-hide-block="successBlockName;failBlockName" data-js-ajax-before-show-block="loadingBlockName" data-js-ajax-success-show-block="successBlockName" data-js-ajax-success-hide-block="formBlockName;failBlockName" data-js-ajax-fail-show-block="failBlockName" data-js-ajax-always-hide-block="loadingBlockName">
                    <!-- Start: title -->
                    <div class="p-title text-left">
                        <span class="p-title-side">Registration&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></span>
                    </div>
                    <!-- End: title -->
                    <div data-js-block="successBlockName" class="collapse">
                        <h4>Form data send successfully!</h4>
                        <div data-js-block="successContentBlock" class="collapse"></div>
                        <div class="text-right">
                            <a href="./ajax-popup-form-registration.html" class="btn">reload</a>
                        </div>
                    </div>
                    <div data-js-block="failBlockName" class="collapse">
                        <h4>Form data send failed!</h4>
                        <div data-js-block="errorContentBlock" class="collapse"></div>
                    </div>
                    <div data-js-block="formBlockName">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Start: subtitle -->
                                <div class="p-subtitle p-no-offs text-left">
                                    <span class="p-title-side">account details</span>
                                </div>
                                <!-- End: subtitle -->
                                <!-- Start: login <input:text> -->
                                <div class="form-group">
                                    <label for="login" class="p-label-required">Login</label>
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
                                <!-- Start: email <input:email> -->
                                <div class="form-group">
                                    <label for="email" class="p-label-required">Email</label>
                                    <div class="input-group p-has-icon">
                                        <input type="email" id="email" name="email" placeholder="your@mail.com" required="required" class="form-control" />
                                        <span class="input-group-state">
                                            <span class="p-position">
                                                <span class="p-text">
                                                    <span class="p-required-text"><i class="fa fa-star"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="p-field-cb"></span>
                                        <span class="input-group-icon"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                </div>
                                <!-- End: email <input:email> -->
                                <div class="row">
                                    <div class="col-md-6">
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
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Start: confirmPassword <input:password> -->
                                        <div class="form-group">
                                            <label for="confirm-password" class="p-label-required">Confirm password</label>
                                            <div class="input-group p-has-icon">
                                                <input type="password" id="confirm-password" name="confirmPassword" placeholder="Confirm password" required="required" data-rule-equalto="#password" data-msg-equalto="Please confirm password" class="form-control" />
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
                                        <!-- End: confirmPassword <input:password> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- Start: subtitle -->
                                <div class="p-subtitle p-no-offs text-left">
                                    <span class="p-title-side">Your details</span>
                                </div>
                                <!-- End: subtitle -->
                                <!-- Start: firstName <input:text> -->
                                <div class="form-group">
                                    <label for="first-name" class="p-label-required">First name</label>
                                    <div class="input-group p-has-icon">
                                        <input type="text" id="first-name" name="firstName" placeholder="First name" required="required" class="form-control" />
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
                                <!-- End: firstName <input:text> -->
                                <!-- Start: lastName <input:text> -->
                                <div class="form-group">
                                    <label for="last-name" class="p-label-required">Last name</label>
                                    <div class="input-group p-has-icon">
                                        <input type="text" id="last-name" name="lastName" placeholder="Last name" required="required" class="form-control" />
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
                                <!-- End: lastName <input:text> -->
                                <!-- Start: gender <radiogroup> -->
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="p-form-cg pt-form-inline">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" value="male" />
                                                <span class="p-check-icon">
                                                    <span class="p-check-middle"><i class="fa fa-male"></i></span>
                                                </span>
                                                <span class="p-label">Male</span>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" value="female" />
                                                <span class="p-check-icon">
                                                    <span class="p-check-middle"><i class="fa fa-female"></i></span>
                                                </span>
                                                <span class="p-label">Female</span>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" value="other" />
                                                <span class="p-check-icon">
                                                    <span class="p-check-block"></span>
                                                </span>
                                                <span class="p-label">other</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: gender <radiogroup> -->
                            </div>
                        </div>
                        <!-- Start: captcha <input:text> -->
                        <div class="form-group p-captcha-group">
                            <label for="captcha" class="p-label-required">Captcha</label>
                            <div class="input-group">
                                <input type="text" id="captcha" name="captcha" placeholder="Please input code" required="required" data-rule-captcha="true" data-js-captcha="true" class="form-control" />
                                <span class="input-group-state">
                                    <span class="p-position">
                                        <span class="p-text">
                                            <span class="p-required-text"><i class="fa fa-star"></i></span>
                                        </span>
                                    </span>
                                </span>
                                <span class="p-field-cb"></span>
                            </div>
                        </div>
                        <!-- End: captcha <input:text> -->
                        <div class="clearfix"></div>
                        <!-- Start: terms <checkbox> -->
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="terms" name="terms" required="required" data-msg-required="You should agree with Terms of service to continue." />
                                    <span class="p-check-icon">
                                        <span class="p-check-block"></span>
                                    </span>
                                    <span class="p-label">I have read and agree with
                                        <a href="#" target="_blank">Terms of service</a>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <!-- End: terms <checkbox> -->
                        <div data-js-block="loadingBlockName" class="progress collapse">
                            <div class="progress-bar progress-bar-fp progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                        <div class="text-right">
                            <button class="btn" type="submit" name="confirm"><i class="fa fa-check-square-o"></i>&nbsp;register</button>
                        </div>
                    </div>
                    <label class="p-hide-form p-action-link" for="popup-form-id1"><i class="fa fa-times"></i></label>
                </form>
            </div>
        </div>
    </div>
    <!-- End: modern skin - Registration (popup) -->
</div>