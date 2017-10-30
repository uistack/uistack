@extends('website.master')
@section('page_title')
    Dashboard
@endsection
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/jquery-linedtextarea.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/dashboard.css') }}" />
@endsection
@section('content')
    <div class='wrapper'>
        @include('website.regions.dash-header')
        <div id="cb-main-content">
            <div class="cb-container">
                <div id="cb-settings-nav">
                    @include('website.regions.leftbar')
                </div>
                <div class="cb-detail-container">
                    <h2  class="cb-sub-title-text" >Organization Address
                    </h2>
                    <ul  class="cb-form-fl" >
                        <li  class="cb-form-row" >
                            <label  class="cb-form-label" >
                            </label>
                            <div class='cb-form-field'>
                                <div id="cb-add-info" class="cb-highlight cb-important">
                                    <h4>Please update your organization address.
                                    </h4>
                                    <p>This address will appear in your invoices under the logo.
                                    </p>
                                    <a id="cb-add-org-addr" class="cb-primary-button" href="/sites/edit_organization_address">
                                        Add Address
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div  class="cb-form-container" >
                        <form  id="sites_update"  name="sites_update"  method="post"  action="/sites/update"  ajax="true"  ajaxEvent="formhandler"  autocomplete="on"  data-loading-text="Loading..."  validate="true" >
                            <h2  class="cb-sub-title-text" >Site Info &amp; Billing Rules
                            </h2>
                            <ul  class="cb-form-fl" >
                                <li  class="cb-form-row" >
                                    <label  class="cb-form-label" >
                                    </label>
                                    <div class='cb-form-field'>
                                        <div  class="cb-inline " >
                                            <input  id="hide_zero_line_items"  name="hide_zero_line_items"  type="checkbox"  class="cb-input"  _label="Hide Zero Value Line Items" />
                                            <label  class="cb-label"  for="hide_zero_line_items" >Hide Zero Value Line Items
                                            </label>
                                        </div>
                                        <div  class="cb-field-help" >Enable this to hide any zero value line items on invoices and hosted pages.
                                        </div>
                                    </div>
                                </li>
                                <li  class="cb-form-row cb-disable_chkbox" >
                                    <label  class="cb-form-label" >
                                    </label>
                                    <div class='cb-form-field'>
                                        <div  class="cb-inline " >
                                            <input  id="site_settings.0.prop_value_true"  name="site_settings.0.prop_value"  type="checkbox"  class="cb-input"  value="true"  _label="Collect Invoice On Update Payment Method" />
                                            <label  class="cb-label"  for="site_settings.0.prop_value_true" >Collect Invoice On Update Payment Method
                                            </label>
                                        </div>
                                        <input type ='hidden'  name="site_settings.0.prop_name"  value="100" />
                                        <input type ='hidden'  name="site_settings_idxs"  value="0" />
                                        <div  class="cb-field-help" >Enabling this will attempt to collect the latest (only one) unpaid invoice, upon card update.
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <h2  class="cb-sub-title-text" >Calendar Billing
                            </h2>
                            <ul  class="cb-form-fl" >
                                <div class="cb-mar-bot--md">
                                    <div class="cb-alert__container">
                                        <div class="cb-alert__content">
                                            <div style="max-width: 600px"> Bill your customers on specific dates, have different renewal dates for different subscriptions, bill all the subscriptions of your customer on a single date, and do much more.
                                                <p>
                                                    <br> Contact
                                                    <a href="mailto:support@chargebee.com">support@chargebee.com
                                                    </a> to enable Calendar Billing.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                            <h2  class="cb-sub-title-text" >Consolidated Invoicing
                            </h2>
                            <ul  class="cb-form-fl" >
                                <div class="cb-mar-bot--md">
                                    <div class="cb-alert__container">
                                        <div class="cb-alert__content">
                                            <div style="max-width: 600px"> Enabling this feature will consolidate charges of multiple subscriptions into
                                                <b>a single invoice
                                                </b>, based on currency, payment method, etc.
                                                <p>
                                                    <br>Contact
                                                    <a href="mailto:support@chargebee.com">support@chargebee.com
                                                    </a> to enable this feature.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                            <h2  class="cb-sub-title-text" >Payment Terms
                            </h2>
                            <ul  class="cb-form-fl" >
                                <div class="text-center cb-mar-bot--md  cb-mar-top--md">
                                </div>
                                <div class="cb-mar-bot--md">
                                    <div class="cb-alert__container">
                                        <div class="cb-alert__content">
                                            <div style="max-width: 600px"> If you use payment terms such as Net D, this option is for you. Enable this option to set credit period for your customers, and to display the due date on their invoices.
                                            </div>
                                        </div>
                                        <div class="cb-alert__action" style="margin-right:42px;">
                                            <a id="enable_netd" cb-modal="true" href="/sites/enable_netd_ui" class="cb-link cb-link--flat"> ENABLE PAYMENT TERMS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                            <h2  class="cb-sub-title-text" >Fraud Monitor Settings
                            </h2>
                            <ul  class="cb-form-fl" >
                                <li  class="cb-form-row" >
                                    <label  class="cb-form-label" >
                                    </label>
                                    <div class='cb-form-field'>
                                        <div  class="cb-inline " >
                                            <input  id="fraud_monitor"  name="fraud_monitor"  type="checkbox"  class="cb-input"  _label="Display alerts on fraud detection at customer level" />
                                            <label  class="cb-label"  for="fraud_monitor" >Display alerts on fraud detection at customer level
                                            </label>
                                        </div>
                                        <div  class="cb-field-help" >Displays alerts about fraudulent activity by customers on the customer details page. By default, transaction-level alerts are displayed.
                                            <a href="https://www.chargebee.com/docs/stripe-radar.html#suspicious-customers" target="_blank"> Learn more
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <div class="cb-disabled"  data-tipsy-gravity-s="true" original-title="This option is available only if you are using Stripe." style="pointer-events: auto;">
                                    <li  class="cb-form-row" >
                                        <label  class="cb-form-label" >
                                        </label>
                                        <div class='cb-form-field'>
                                            <div  class="cb-inline "  style="display: -webkit-box; display: -ms-flexbox; display: flex;" >
                                                <input  id="fraud_alert"  name="fraud_alert"  type="checkbox"  class="cb-input"  disabled  _label="Send email notifications from UiStacks on fraud detection (Sent to site admins and customer support staff)" />
                                                <label  class="cb-label"  for="fraud_alert" >Send email notifications from UiStacks on fraud detection (Sent to site admins and customer support staff)
                                                </label>
                                            </div>
                                            <div  class="cb-field-help" >UiStacks will send email notifications on detection of any suspicious and fraudulent activities.
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                            <h2  class="cb-sub-title-text" >Card Address Verification
                            </h2>
                            <ul  class="cb-form-fl" >
                                <p>
                                    Enable the specific billing address fields that should be validated while accepting card information.
                                    Please ensure that these settings are in sync with your payment gateway settings.
                                </p>
                                <div class="cb-highlight">
                                    Note: This configuration is applicable ONLY if the card details are passed to UiStacks via API.
                                    If you use hosted payment pages to collect card details, you should configure the card fields in
                                    <a href="/hosted_pages_settings/hp_fields">Field Configurations
                                    </a>.
                                </div>
                                <li  class="cb-form-row" >
                                    <label  class="cb-form-label" >Address Verification Settings
                                    </label>
                                    <div class='cb-form-field'>
                                        <ul style="padding-left:0px;">
                                            <li>
                                                <div  class="cb-inline " >
                                                    <input  id="street_address_1"  name="street_address"  type="checkbox"  class="cb-input"  value="1"  _label="Street Address" />
                                                    <label  class="cb-label"  for="street_address_1" >Street Address
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div  class="cb-inline " >
                                                    <input  id="city_2"  name="city"  type="checkbox"  class="cb-input"  value="2"  _label="City" />
                                                    <label  class="cb-label"  for="city_2" >City
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div  class="cb-inline " >
                                                    <input  id="postal_code_4"  name="postal_code"  type="checkbox"  class="cb-input"  value="4"  _label="ZIP/Postal Code" />
                                                    <label  class="cb-label"  for="postal_code_4" >ZIP/Postal Code
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div  class="cb-inline " >
                                                    <input  id="country_8"  name="country"  type="checkbox"  class="cb-input"  value="8"  _label="Country" />
                                                    <label  class="cb-label"  for="country_8" >Country
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div  class="cb-form-button cb-fix-footer cn-js--disable" >
                                <input  type="submit"  value="Update Site Info &amp; Billing Rules" />
                            </div>
                            <input type='hidden' name='_csrf_token'  value="myOjV3CdrVcuAnJllv2EvuUxxpLakHHL8" />
                        </form>
                    </div>
                    <script>var sites_update = {
                            "validators":{
                                "site.name":{
                                    "allow_blank":true,"length":{
                                        "message":" should not have more than 100 characters","maximum":100}
                                }
                                ,"site.country_code":{
                                    "allow_blank":true,"length":{
                                        "message":" should not have more than 10 characters","maximum":10}
                                }
                                ,"site.currency":{
                                    "allow_blank":true}
                                ,"hide_zero_line_items":{
                                    "allow_blank":true,"length":{
                                        "message":" should not have more than 5 characters","maximum":5}
                                }
                                ,"site_settings_idxs":{
                                    "allow_blank":true}
                                ,"site_settings.*.prop_name":{
                                    "allow_blank":true}
                                ,"site_settings.*.prop_value":{
                                    "allow_blank":true}
                                ,"default_net_days":{
                                    "allow_blank":true,"numeric":{
                                        "message":"should be a number"}
                                    ,"strictInt":{
                                        "message":"decimal values are not allowed"}
                                }
                                ,"account-fields-check-box":{
                                    "allow_blank":true}
                                ,"fraud_monitor":{
                                    "allow_blank":true,"length":{
                                        "message":" should not have more than 2147483647 characters","maximum":2147483647}
                                }
                                ,"fraud_alert":{
                                    "allow_blank":true,"length":{
                                        "message":" should not have more than 2147483647 characters","maximum":2147483647}
                                }
                                ,"street_address":{
                                    "allow_blank":true,"numeric":{
                                        "message":"should be a number"}
                                    ,"strictInt":{
                                        "message":"decimal values are not allowed"}
                                }
                                ,"city":{
                                    "allow_blank":true,"numeric":{
                                        "message":"should be a number"}
                                    ,"strictInt":{
                                        "message":"decimal values are not allowed"}
                                }
                                ,"postal_code":{
                                    "allow_blank":true,"numeric":{
                                        "message":"should be a number"}
                                    ,"strictInt":{
                                        "message":"decimal values are not allowed"}
                                }
                                ,"country":{
                                    "allow_blank":true,"numeric":{
                                        "message":"should be a number"}
                                    ,"strictInt":{
                                        "message":"decimal values are not allowed"}
                                }
                            }
                            ,"strategy":"onsubmit","stripEmptyParams":false};
                    </script>
                </div>
            </div>
        </div>
        @include('website.regions.dash-footer')
    </div>

@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/user/modernizr-2.5.3.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/user/ajaxhandler.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/user/collapse.js') }}"></script>
@stop