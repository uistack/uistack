@extends('website.master')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/tp_swiftype.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/learn.css') }}" />
@endsection
@section('content')
    <div id="cb-wrapper-api-docs" class="">
        @include('website.regions.learn-header')
        <div id="cb-container" class="container">
            <div id="cb-sidebar" data-swiftype-index="false">
                <div id="cb-sidebar-overlay"></div>
                <div id="cb-guide">
                    <div class="cb-sidebar-header hidden-sm hidden-xs">
                        <div class="cb-sidebar-logo">
                            <a href="{{ url("/") }}">
                                <span><img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" alt="ChargeBee API Documentation" width="24" style="height:24px;"></span>
                                <span class="cb-sidebar-logo-title">API</span>
                            </a>
                        </div>
                        {{--<div class="cb-sidebar-version">--}}
                            {{--<a href="https://apidocs.chargebee.com/docs/api"  class="active">V2</a>--}}
                            {{--<a href="https://apidocs.chargebee.com/docs/api/v1">V1</a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="cb-sidebar-divider hidden-sm hidden-xs"></div>

                    <div class="cb-doc-search">
                        <!-- Search template starts here. Do not make change in any custom attribute or id  -->
                        <form id="swift-search-form" data-cb-type="api" autocomplete="false">
                            <div class="input-group">
                                <input class="form-control" placeholder="Search" autofocus="autofocus" type="text" data-cb-search="input"/>
                                <span class="input-group-btn">
                                        <input value="" type="submit" class="btn btn-primary"/>
                                    </span>
                            </div>
                        </form>
                        <!-- Search template ends here-->
                    </div>
                    {{--<h4 class="cb-aside-nav-title">Getting Started</h4>--}}
                    <ul class="list-group">
                        <li>
                            <a href="/docs/api" class="list-group-item">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="/docs/api/subscriptions"  class="list-group-item">
                                Subscriptions
                            </a>
                        </li>
                        <li>
                            <a href="/docs/api/customers"  class="list-group-item">
                                Customers
                            </a>
                        </li>
                        <li>
                            <a href="/docs/api/payment_sources"  class="list-group-item">
                                Payment sources
                            </a>
                        </li>
                        <li>
                            <a href="/docs/api/cards"  class="list-group-item">
                                Cards
                            </a>
                        </li>
                        <li>
                            <a href="/docs/api/invoices"  class="list-group-item">
                                Invoices
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/credit_notes"  class="list-group-item">
                                Credit notes
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/unbilled_charges"  class="list-group-item">
                                Unbilled charges
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/orders"  class="list-group-item">
                                Orders
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/transactions"  class="list-group-item">
                                Transactions
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/hosted_pages"  class="list-group-item">
                                Hosted pages
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/estimates"  class="list-group-item">
                                Estimates
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/plans"  class="list-group-item">
                                Plans
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/addons"  class="list-group-item">
                                Addons
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/coupons"  class="list-group-item">
                                Coupons
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/coupon_codes"  class="list-group-item">
                                Coupon codes
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/addresses"  class="list-group-item">
                                Addresses
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/events"  class="list-group-item">
                                Events
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/comments"  class="list-group-item">
                                Comments
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/downloads"  class="list-group-item">
                                Downloads
                            </a>
                        </li>



                        <li>
                            <a href="/docs/api/portal_sessions"  class="list-group-item">
                                Portal sessions
                            </a>
                        </li>






                        <li>
                            <a href="/docs/api/site_migration_details"  class="list-group-item">
                                Site migration details
                            </a>
                        </li>




                        <li>
                            <a href="/docs/api/time_machines"  class="list-group-item">
                                Time machines
                            </a>
                        </li>





                        <li>
                            <a href="https://www.chargebee.com/open-source/" class="list-group-item" target="_blank">
                                Open Source
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="cb-content" class="cb-content">
                <div class="cb-content__wrapper">



























                    <script type="text/javascript">
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                        ga('create', 'UA-27953252-1', 'chargebee.com');
                        ga('send', 'pageview');
                    </script>




                    <style>

                        .lang-sh-content {
                            display:none;
                        }

                        .lang-rb-content {
                            display:none;
                        }

                        .lang-py-content {
                            display:none;
                        }

                        .lang-java-content {
                            display:none;
                        }

                        .lang-cs-content {
                            display:none;
                        }

                        .lang-js-content {
                            display:none;
                        }

                    </style>




                    <div class="page-header">
                        <h1>Orders</h1>
                    </div>
                    <p> The Order resource can be used for integrating ChargeBee with any shipping/order management application (like ShipStation) </p>
                    <p> Orders are not automatically generated or updated by ChargeBee currently. They have to be created/updated either via api or merchant web console (a.k.a admin console). </p>
                    <p> An order can be created against an invoice irrespective of the status of the invoice and an invoice can have multiple orders associated with it. </p>


                    <h4>Sample order <small class="text-muted">[ JSON ]</small></h4>
                    <div class="cb-code-io" data-swiftype-index='false'>
                        <code class="prettyprint lang-js">{
                            &quot;id&quot;: &quot;XpbG8t4OvwWgjzM&quot;,
                            &quot;invoice_id&quot;: &quot;1&quot;,
                            &quot;status&quot;: &quot;new&quot;,
                            &quot;reference_id&quot;: &quot;1002&quot;,
                            &quot;fulfillment_status&quot;: &quot;Awaiting Shipment&quot;,
                            &quot;note&quot;: &quot;This is a test note&quot;,
                            &quot;created_at&quot;: 1505917597,
                            &quot;status_update_at&quot;: 1505917597,
                            &quot;object&quot;: &quot;order&quot;
                            }</code>
                    </div>


                    <h4>Model Class</h4>
                    <div class="cb-code-io" data-swiftype-index='false'>
            <pre class="prettyprint lang-php">
ChargeBee_Order</pre>
                    </div>


                    <div class="page-header">
                        <h2 id="order_attributes" data-heading="heading">Order attributes<a href="#order_attributes"></a></h2>
                    </div>

                    <!--attributes-->
                    <div class="cb-list-group">


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_id"><a class="cb-link-anchor" href="#order_id"></a>id</samp>
                            </div>
                            <div class="cb-list-desc">
                                Uniquely identifies the order.<br/><dfn class="text-muted">string, max chars=40</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_invoice_id"><a class="cb-link-anchor" href="#order_invoice_id"></a>invoiceId</samp>
                            </div>
                            <div class="cb-list-desc">
                                The invoice number which acts as an identifier for invoice and is generated sequentially.<br/><dfn class="text-muted">string, max chars=50</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_status"><a class="cb-link-anchor" href="#order_status"></a>status</samp>
                            </div>
                            <div class="cb-list-desc">
                                The status of this order.<br/><dfn class="text-muted">optional, enumerated string, default=new</dfn><br><div class="cb-enum-parent md"><div class="cb-enum-parent-title">Possible values are</div><samp class="enum" data-swiftype-index="false">new</samp><dfn class="">Order has been created.</dfn><samp class="enum" data-swiftype-index="false">processing</samp><dfn class="">Order is being processed.</dfn><samp class="enum" data-swiftype-index="false">complete</samp><dfn class="">Order has been processed successfully.</dfn><samp class="enum" data-swiftype-index="false">cancelled</samp><dfn class="">Order has been cancelled.</dfn><samp class="enum" data-swiftype-index="false">voided</samp><dfn class="">Order has been voided.</dfn></div>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_reference_id"><a class="cb-link-anchor" href="#order_reference_id"></a>referenceId</samp>
                            </div>
                            <div class="cb-list-desc">
                                Reference id can be used to map the orders in the shipping/order management application to the orders in ChargeBee. The reference_id generally is same as the order id in the third party application.<br/><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_fulfillment_status"><a class="cb-link-anchor" href="#order_fulfillment_status"></a>fulfillmentStatus</samp>
                            </div>
                            <div class="cb-list-desc">
                                The fulfillment status of an order as reflected in the shipping/order management application. Typical statuses include Shipped,Awaiting Shipment,Not fulfilled etc;.<br/><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_note"><a class="cb-link-anchor" href="#order_note"></a>note</samp>
                            </div>
                            <div class="cb-list-desc">
                                The custom note for the order.<br/><dfn class="text-muted">optional, string, max chars=250</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_tracking_id"><a class="cb-link-anchor" href="#order_tracking_id"></a>trackingId</samp>
                            </div>
                            <div class="cb-list-desc">
                                The tracking id of the order.<br/><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_batch_id"><a class="cb-link-anchor" href="#order_batch_id"></a>batchId</samp>
                            </div>
                            <div class="cb-list-desc">
                                Unique id to identify a group of orders.<br/><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_created_by"><a class="cb-link-anchor" href="#order_created_by"></a>createdBy</samp>
                            </div>
                            <div class="cb-list-desc">
                                The source (or the user) from where the order has been created.<br/><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_created_at"><a class="cb-link-anchor" href="#order_created_at"></a>createdAt</samp>
                            </div>
                            <div class="cb-list-desc">
                                The time at which the order was created.<br/><dfn class="text-muted">timestamp(UTC) in seconds</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="order_status_update_at"><a class="cb-link-anchor" href="#order_status_update_at"></a>statusUpdateAt</samp>
                            </div>
                            <div class="cb-list-desc">
                                The time at which the order status was last updated.<br/><dfn class="text-muted">optional, timestamp(UTC) in seconds</dfn><br>
                            </div>
                        </div>


                    </div>
                    <div>







                        <div class="cb-list-group">


                        </div>
                    </div>
                    <!--Custom Fields-->







                    <div class="page-header">
                        <h2 id="create_an_order" data-heading="heading">Create an order<a href="#create_an_order">&para;</a></h2>
                    </div>
                    Creates an order for an invoice. If 'status' is not passed while creating an order, the default status('new') is set.










                    <div class="h4">

                        Sample Code

                        <div class="copytoclip-wrapper">

                            <div class="copytoclip">
            <pre id="copy_create_an_order">
require 'ChargeBee.php';
ChargeBee_Environment::configure(&quot;{site}&quot;,&quot;{site_api_key}&quot;);
$result = ChargeBee_Order::create(array(
  &quot;invoiceId&quot; =&gt; &quot;1&quot;));
$order = $result-&gt;order();</pre>
                                <div class="copy" data-clipboard text="Click to Copy">copy</div>
                            </div>

                        </div>
                    </div>
                    <div class="cb-code-io" data-swiftype-index='false'>
<pre class="prettyprint lang-php">
require 'ChargeBee.php';
ChargeBee_Environment::configure(&quot;{site}&quot;,&quot;{site_api_key}&quot;);
$result = ChargeBee_Order::create(array(
  &quot;invoiceId&quot; =&gt; &quot;1&quot;));
$order = $result-&gt;order();</pre>
                    </div>


                    <h4>Sample Result <small class="text-muted">[ JSON ]</small></h4>

                    <div class="cb-code-io" data-swiftype-index='false'>
                        <code class="prettyprint lang-js">{&quot;order&quot;: {
                            &quot;id&quot;: &quot;3Nl8KVeQVm9GeS3Q&quot;,
                            &quot;invoice_id&quot;: &quot;1&quot;,
                            &quot;status&quot;: &quot;new&quot;,
                            &quot;created_by&quot;: &quot;full_access_key_v1&quot;,
                            &quot;created_at&quot;: 1505917716,
                            &quot;status_update_at&quot;: 1505917716,
                            &quot;object&quot;: &quot;order&quot;
                            }}
                        </code>
                    </div>




                    <h4>Method</h4>
                    <div class="cb-code-io" data-swiftype-index='false'>
<pre class="prettyprint lang-php">
ChargeBee_Order::create(array(&lt;param name&gt; =&gt; &lt;value&gt;,&lt;param name&gt; =&gt; &lt;value&gt; ...))
</pre>
                    </div>


                    <div class="page-header">
                        <h4>Input Parameters</h4>
                    </div>
                    <div class="cb-list-group">



                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_id"><a class="cb-link-anchor" href="#create_an_order_id"></a>id</samp>
                            </div>
                            <div class="cb-list-desc">
                                Uniquely identifies the order. If not given, this will be auto-generated.<br><dfn class="text-muted">optional, string, max chars=40</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_invoice_id"><a class="cb-link-anchor" href="#create_an_order_invoice_id"></a>invoiceId</samp>
                            </div>
                            <div class="cb-list-desc">
                                The invoice number which acts as an identifier for invoice and is generated sequentially.<br><dfn class="text-muted">required, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_status"><a class="cb-link-anchor" href="#create_an_order_status"></a>status</samp>
                            </div>
                            <div class="cb-list-desc">
                                The status of this order.<br><dfn class="text-muted">optional, enumerated string, default=new</dfn><br><div class="cb-enum-parent md"><div class="cb-enum-parent-title">Possible values are</div><samp class="enum" data-swiftype-index="false">new</samp><dfn class="">Order has been created.</dfn><samp class="enum" data-swiftype-index="false">processing</samp><dfn class="">Order is being processed.</dfn><samp class="enum" data-swiftype-index="false">complete</samp><dfn class="">Order has been processed successfully.</dfn><samp class="enum" data-swiftype-index="false">cancelled</samp><dfn class="">Order has been cancelled.</dfn><samp class="enum" data-swiftype-index="false">voided</samp><dfn class="">Order has been voided.</dfn></div>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_reference_id"><a class="cb-link-anchor" href="#create_an_order_reference_id"></a>referenceId</samp>
                            </div>
                            <div class="cb-list-desc">
                                Reference id can be used to map the orders in the shipping/order management application to the orders in ChargeBee. The reference_id generally is same as the order id in the third party application.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_fulfillment_status"><a class="cb-link-anchor" href="#create_an_order_fulfillment_status"></a>fulfillmentStatus</samp>
                            </div>
                            <div class="cb-list-desc">
                                The fulfillment status of an order as reflected in the shipping/order management application. Typical statuses include Shipped,Awaiting Shipment,Not fulfilled etc;.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_note"><a class="cb-link-anchor" href="#create_an_order_note"></a>note</samp>
                            </div>
                            <div class="cb-list-desc">
                                The custom note for the order.<br><dfn class="text-muted">optional, string, max chars=250</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_tracking_id"><a class="cb-link-anchor" href="#create_an_order_tracking_id"></a>trackingId</samp>
                            </div>
                            <div class="cb-list-desc">
                                The tracking id of the order.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="create_an_order_batch_id"><a class="cb-link-anchor" href="#create_an_order_batch_id"></a>batchId</samp>
                            </div>
                            <div class="cb-list-desc">
                                Unique id to identify a group of orders.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>





                    </div>

                    <div class="page-header">
                        <h4>Returns</h4>
                    </div>
                    <div class="cb-list-group">


                        <div class="cb-list">
                            <div class="cb-list-item">
                                <a href="/docs/api/orders">
                                    order
                                </a>
                            </div>
                            <div class="cb-list-desc">
                                Resource object representing order.<br>

                                <dfn class="text-muted">always returned</dfn>

                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <h2 id="update_an_order" data-heading="heading">Update an order<a href="#update_an_order">&para;</a></h2>
                    </div>
                    Updates an order. If the status of an order is changed while updating the order, the status_update_at attribute is set with the current time.

                    <div class="page-header">
                        <h4>Input Parameters</h4>
                    </div>
                    <div class="cb-list-group">
                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="update_an_order_status"><a class="cb-link-anchor" href="#update_an_order_status"></a>status</samp>
                            </div>
                            <div class="cb-list-desc">
                                The status of this order.<br><dfn class="text-muted">optional, enumerated string</dfn><br><div class="cb-enum-parent md"><div class="cb-enum-parent-title">Possible values are</div><samp class="enum" data-swiftype-index="false">new</samp><dfn class="">Order has been created.</dfn><samp class="enum" data-swiftype-index="false">processing</samp><dfn class="">Order is being processed.</dfn><samp class="enum" data-swiftype-index="false">complete</samp><dfn class="">Order has been processed successfully.</dfn><samp class="enum" data-swiftype-index="false">cancelled</samp><dfn class="">Order has been cancelled.</dfn><samp class="enum" data-swiftype-index="false">voided</samp><dfn class="">Order has been voided.</dfn></div>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="update_an_order_reference_id"><a class="cb-link-anchor" href="#update_an_order_reference_id"></a>referenceId</samp>
                            </div>
                            <div class="cb-list-desc">
                                Reference id can be used to map the orders in the shipping/order management application to the orders in ChargeBee. The reference_id generally is same as the order id in the third party application.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="update_an_order_fulfillment_status"><a class="cb-link-anchor" href="#update_an_order_fulfillment_status"></a>fulfillmentStatus</samp>
                            </div>
                            <div class="cb-list-desc">
                                The fulfillment status of an order as reflected in the shipping/order management application. Typical statuses include Shipped,Awaiting Shipment,Not fulfilled etc;.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="update_an_order_note"><a class="cb-link-anchor" href="#update_an_order_note"></a>note</samp>
                            </div>
                            <div class="cb-list-desc">
                                The custom note for the order.<br><dfn class="text-muted">optional, string, max chars=250</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="update_an_order_tracking_id"><a class="cb-link-anchor" href="#update_an_order_tracking_id"></a>trackingId</samp>
                            </div>
                            <div class="cb-list-desc">
                                The tracking id of the order.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="update_an_order_batch_id"><a class="cb-link-anchor" href="#update_an_order_batch_id"></a>batchId</samp>
                            </div>
                            <div class="cb-list-desc">
                                Unique id to identify a group of orders.<br><dfn class="text-muted">optional, string, max chars=50</dfn><br>
                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <h4>Returns</h4>
                    </div>
                    <div class="cb-list-group">
                        <div class="cb-list">
                            <div class="cb-list-item">
                                <a href="/docs/api/orders">
                                    order
                                </a>
                            </div>
                            <div class="cb-list-desc">
                                Resource object representing order.<br>

                                <dfn class="text-muted">always returned</dfn>

                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <h2 id="retrieve_an_order" data-heading="heading">Retrieve an order<a href="#retrieve_an_order">&para;</a></h2>
                    </div>
                    Retrieves an order corresponding to the order id passed.
                    <div class="page-header">
                        <h4>Returns</h4>
                    </div>
                    <div class="cb-list-group">
                        <div class="cb-list">
                            <div class="cb-list-item">
                                <a href="/docs/api/orders">
                                    order
                                </a>
                            </div>
                            <div class="cb-list-desc">
                                Resource object representing order.<br>

                                <dfn class="text-muted">always returned</dfn>

                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <h2 id="list_orders" data-heading="heading">List orders<a href="#list_orders">&para;</a></h2>
                    </div>
                    Lists the available orders.
                    <div class="page-header">
                        <h4>Input Parameters</h4>
                    </div>
                    <div class="cb-list-group">
                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_limit"><a class="cb-link-anchor" href="#list_orders_limit"></a>limit</samp>
                            </div>
                            <div class="cb-list-desc">
                                Limits the number of resources to be returned.<br><dfn class="text-muted">optional, integer, default=10, min=1, max=100</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_offset"><a class="cb-link-anchor" href="#list_orders_offset"></a>offset</samp>
                            </div>
                            <div class="cb-list-desc">
                                Allows you to fetch the next set of resources. The value used for this parameter must be the value returned for next_offset parameter in the previous API call.<br><dfn class="text-muted">optional, string, max chars=1000</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_sort_by"><a class="cb-link-anchor" href="#list_orders_sort_by"></a>sortBy[<span class="text-muted">&lt;sort-order&gt;</span>]</samp>
                            </div>
                            <div class="cb-list-desc">
                                Sorts based on the specified attribute. <br><b>Supported attributes :</b> <dfn>created_at</dfn><br><b>Supported sort-orders : </b><dfn>asc, desc</dfn><br><br><b>Example <span class="cb-char-arrow">→</span> </b><i>"sortBy[asc]" => "created_at"</i><br>This will sort the result based on the 'created_at' attribute in ascending(earliest first) order.<br><dfn class="text-muted">optional, string filter</dfn><br>
                            </div>
                        </div>


                        <div class="cb-list">
                            <div class="cb-list-item"><h5><strong>Filter Params </strong></h5></div>
                            <div class="cb-list-desc"><h5>
                                    For operator usages, see the <a href="./#pagination_and_filtering">Pagination and Filtering</a> section.
                                </h5>
                            </div>
                        </div>


                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_id"><a class="cb-link-anchor" href="#list_orders_id"></a>id[<span class="text-muted">&lt;operator&gt;</span>]</samp>
                            </div>
                            <div class="cb-list-desc">
                                To filter based on Order Id.<br><b>Supported operators : </b>is, isNot, startsWith, in, notIn<br><br><b>Example <span class="cb-char-arrow">→</span> </b><i>"id[is]" => "890"</i><br><dfn class="text-muted">optional, string filter</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_invoice_id"><a class="cb-link-anchor" href="#list_orders_invoice_id"></a>invoiceId[<span class="text-muted">&lt;operator&gt;</span>]</samp>
                            </div>
                            <div class="cb-list-desc">
                                To filter based on Order Invoice Id.<br><b>Supported operators : </b>is, isNot, startsWith, in, notIn<br><br><b>Example <span class="cb-char-arrow">→</span> </b><i>"invoiceId[is]" => "INVOICE_982"</i><br><dfn class="text-muted">optional, string filter</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_status"><a class="cb-link-anchor" href="#list_orders_status"></a>status[<span class="text-muted">&lt;operator&gt;</span>]</samp>
                            </div>
                            <div class="cb-list-desc">
                                To filter based on Order Status. Possible values are : <dfn>new, processing, complete, cancelled, voided.</dfn><br><b>Supported operators : </b>is, isNot, in, notIn<br><br><b>Example <span class="cb-char-arrow">→</span> </b><i>"status[isNot]" => "processing"</i><br><dfn class="text-muted">optional, enumerated string filter</dfn><br>
                            </div>
                        </div>

                        <div class="cb-list cb-list-action">
                            <div class="cb-list-item">
                                <samp id="list_orders_created_at"><a class="cb-link-anchor" href="#list_orders_created_at"></a>createdAt[<span class="text-muted">&lt;operator&gt;</span>]</samp>
                            </div>
                            <div class="cb-list-desc">
                                To filter based on Order Created At.<br><b>Supported operators : </b>after, before, on, between<br><br><b>Example <span class="cb-char-arrow">→</span> </b><i>"createdAt[after]" => "1435054328"</i><br><dfn class="text-muted">optional, timestamp(UTC) in seconds filter</dfn><br>
                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <h4>Returns</h4>
                    </div>
                    <div class="cb-list-group">
                        <div class="cb-list">
                            <div class="cb-list-item">
                                <a href="/docs/api/orders">
                                    order
                                </a>
                            </div>
                            <div class="cb-list-desc">
                                Resource object representing order.<br>

                                <dfn class="text-muted">always returned</dfn>

                            </div>
                        </div>
                        <div class="cb-list">
                            <div class="cb-list-item">
                                <samp>next_offset</samp>
                            </div>
                            <div class="cb-list-desc">
                                This attribute is returned only if more resources are present. To fetch the next set of resources use this value for the input parameter &ldquo;offset&rdquo;.<br>
                                <dfn class="text-muted">optional, string, max chars=1000</dfn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/tp_apidocs.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/tp_swiftype.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/learn.js') }}"></script>

@stop