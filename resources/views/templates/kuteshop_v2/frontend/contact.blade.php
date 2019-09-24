@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Contact Us')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li class="active">Contact</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2">Contact Us</span>
            </h2>

            <div class="page-content" id="contact">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="page-subheading">CONTACT FORM</h3>
                        <div class="contact-form-box">
                            <div class="form-selector">
                                <label>Subject Heading</label>
                                <select id="subject" class="form-control input-sm">
                                    <option value="Customer service">Customer service</option>
                                    <option value="Webmaster">Webmaster</option>
                                </select>
                            </div>
                            <div class="form-selector">
                                <label>Email address</label>
                                <input type="text" id="email" class="form-control input-sm">
                            </div>
                            <div class="form-selector">
                                <label>Order reference</label>
                                <input type="text" id="order_reference" class="form-control input-sm">
                            </div>
                            <div class="form-selector">
                                <label>Message</label>
                                <textarea id="message" rows="10" class="form-control input-sm"></textarea>
                            </div>
                            <div class="form-selector">
                                <button class="btn" id="btn-send-contact">Send</button>
                            </div>
                        </div>
                    </div>
                    <div id="contact_form_map" class="col-xs-12 col-sm-6">
                        <h3 class="page-subheading">Information</h3>
                        <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                        <br>
                        <ul>
                            <li>Praesent nec tincidunt turpis.</li>
                            <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                            <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                        </ul>
                        <br>
                        <ul class="store_info">
                            <li><i class="fa fa-home"></i>Our business address is 1063 Freelon Street San Francisco, CA 95108</li>
                            <li><i class="fa fa-phone"></i><span>+ 021.343.7575</span></li>
                            <li><i class="fa fa-phone"></i><span>+ 020.566.6666</span></li>
                            <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">support@kutetheme.com</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection

@section('PageJs')

@endsection
