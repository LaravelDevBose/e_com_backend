@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Checkout')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li class="active"> Checkout</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Checkout</span>
            </h2>

            <div class="page-content checkout-page">
                <h3 class="checkout-sep">1. Checkout Method</h3>
                <div class="box-border">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Checkout as a Guest or Register</h4>
                            <p>Register with us for future convenience:</p>
                            <ul>
                                <li><label><input name="radio1" type="radio">Checkout as Guest</label></li>
                                <li><label><input name="radio1" type="radio">Register</label></li>
                            </ul>
                            <br>
                            <h4>Register and save time!</h4>
                            <p>Register with us for future convenience:</p>
                            <p><i class="fa fa-check-circle text-primary"></i> Fast and easy check out</p>
                            <p><i class="fa fa-check-circle text-primary"></i> Easy access to your order history and status</p>
                            <button class="button">Continue</button>
                        </div>
                        <div class="col-sm-6">
                            <h4>Login</h4>
                            <p>Already registered? Please log in below:</p>
                            <label>Email address</label>
                            <input class="form-control input" type="text">
                            <label>Password</label>
                            <input class="form-control input" type="password">
                            <p><a href="#">Forgot your password?</a></p>
                            <button class="button">Login</button>
                        </div>

                    </div>
                </div>
                <h3 class="checkout-sep">2. Billing Infomations</h3>
                <div class="box-border">
                    <ul>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="first_name" class="required">First Name</label>
                                <input class="input form-control" name="first_name" id="first_name" type="text">
                            </div>
                            <div class="col-sm-6">
                                <label for="last_name" class="required">Last Name</label>
                                <input name="last_name" class="input form-control" id="last_name" type="text">
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="company_name">Company Name</label>
                                <input name="company_name" class="input form-control" id="company_name" type="text">
                            </div>
                            <div class="col-sm-6">
                                <label for="email_address" class="required">Email Address</label>
                                <input class="input form-control" name="email_address" id="email_address" type="text">
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-xs-12">

                                <label for="address" class="required">Address</label>
                                <input class="input form-control" name="address" id="address" type="text">

                            </div>

                        </li>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="city" class="required">City</label>
                                <input class="input form-control" name="city" id="city" type="text">

                            </div>

                            <div class="col-sm-6">
                                <label class="required">State/Province</label>
                                <select class="input form-control" name="State">
                                    <option value="Alabama">Alabama</option>
                                    <option value="Illinois">Illinois</option>
                                    <option value="Kansas">Kansas</option>
                                </select>
                            </div>
                        </li>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="postal_code" class="required">Zip/Postal Code</label>
                                <input class="input form-control" name="postal_code" id="postal_code" type="text">
                            </div>

                            <div class="col-sm-6">
                                <label class="required">Country</label>
                                <select class="input form-control" name="Country">
                                    <option value="USA">USA</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Canada">Canada</option>
                                </select>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="telephone" class="required">Telephone</label>
                                <input class="input form-control" name="telephone" id="telephone" type="text">
                            </div>

                            <div class="col-sm-6">
                                <label for="fax">Fax</label>
                                <input class="input form-control" name="fax" id="fax" type="text">
                            </div>

                        </li>

                        <li class="row">
                            <div class="col-sm-6">
                                <label for="password" class="required">Password</label>
                                <input class="input form-control" name="password" id="password" type="password">
                            </div>

                            <div class="col-sm-6">
                                <label for="confirm" class="required">Confirm Password</label>
                                <input class="input form-control" name="confirm" id="confirm" type="password">
                            </div>
                        </li>
                        <li>
                            <button class="button">Continue</button>
                        </li>
                    </ul>
                </div>
                <h3 class="checkout-sep">3. Shipping Information</h3>
                <div class="box-border">
                    <ul>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="first_name_1" class="required">First Name</label>
                                <input class="input form-control" name="first_name_1" id="first_name_1" type="text">

                            </div>

                            <div class="col-sm-6">

                                <label for="last_name_1" class="required">Last Name</label>
                                <input class="input form-control" name="last_name_1" id="last_name_1" type="text">

                            </div>

                        </li>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="company_name_1">Company Name</label>
                                <input class="input form-control" name="company_name_1" id="company_name_1" type="text">

                            </div>

                            <div class="col-sm-6">

                                <label for="email_address_1" class="required">Email Address</label>
                                <input class="input form-control" name="email_address_1" id="email_address_1" type="text">

                            </div>

                        </li>

                        <li class="row">

                            <div class="col-xs-12">

                                <label for="address_1" class="required">Address</label>
                                <input class="input form-control" name="address_1" id="address_1" type="text">

                            </div>

                        </li>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="city_1" class="required">City</label>
                                <input class="input form-control" name="city_1" id="city_1" type="text">

                            </div>

                            <div class="col-sm-6">

                                <label class="required">State/Province</label>

                                <div class="custom_select">

                                    <select class="input form-control" name="State1">

                                        <option value="Alabama">Alabama</option>
                                        <option value="Illinois">Illinois</option>
                                        <option value="Kansas">Kansas</option>

                                    </select>

                                </div>

                            </div>

                        </li>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="postal_code_1" class="required">Zip/Postal Code</label>
                                <input class="input form-control" name="postal_code_1" id="postal_code_1" type="text">

                            </div>
                            <div class="col-sm-6">

                                <label class="required">Country</label>

                                <div class="custom_select">

                                    <select class="input form-control" name="Country2">

                                        <option value="USA">USA</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Canada">Canada</option>

                                    </select>

                                </div>

                            </div>

                        </li>

                        <li class="row">

                            <div class="col-sm-6">

                                <label for="telephone_1" class="required">Telephone</label>
                                <input class="input form-control" name="telephone_1" id="telephone_1" type="text">

                            </div>

                            <div class="col-sm-6">

                                <label for="fax_1">Fax</label>
                                <input class="input form-control" name="fax_1" id="fax_1" type="text">

                            </div>

                        </li>

                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">4. Shipping Method</h3>
                <div class="box-border">
                    <ul class="shipping_method">
                        <li>
                            <p class="subcaption bold">Free Shipping</p>
                            <label for="radio_button_3"><input checked="" name="radio_3" id="radio_button_3" type="radio">Free $0</label>
                        </li>

                        <li>
                            <p class="subcaption bold">Free Shipping</p>
                            <label for="radio_button_4"><input name="radio_3" id="radio_button_4" type="radio"> Standard Shipping $5.00</label>
                        </li>
                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">5. Payment Information</h3>
                <div class="box-border">
                    <ul>
                        <li>
                            <label for="radio_button_5"><input checked="" name="radio_4" id="radio_button_5" type="radio"> Check / Money order</label>
                        </li>

                        <li>

                            <label for="radio_button_6"><input name="radio_4" id="radio_button_6" type="radio"> Credit card (saved)</label>
                        </li>

                    </ul>
                    <button class="button">Continue</button>
                </div>
                <h3 class="checkout-sep">6. Order Review</h3>
                <div class="box-border">
                    <div class="table-responsive">
                        <table class="table table-bordered  cart_summary">
                            <thead>
                            <tr>
                                <th class="cart_product">Product</th>
                                <th>Description</th>
                                <th>Avail.</th>
                                <th>Unit price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th class="action"><i class="fa fa-trash-o"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cart_product">
                                    <a href="#"><img src="/kuteshop_v2/images/media/detail/product-100x122.jpg" alt="Product"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="#">Frederique Constant </a></p>
                                    <small class="cart_ref">SKU : #123654999</small><br>
                                    <small><a href="#">Color : Beige</a></small><br>
                                    <small><a href="#">Size : S</a></small>
                                </td>
                                <td class="cart_avail"><span class="label label-success">In stock</span></td>
                                <td class="price"><span>61,19 €</span></td>
                                <td class="qty">

                                    <input minlength="1" maxlength="12" name="qty1" id="qty1" value="1" class="form-control input-sm" type="text">
                                    <span data-field="qty1" data-type="minus" class="btn-number" ><i class="fa fa-caret-up"></i></span>
                                    <span data-field="qty1" data-type="plus" class="btn-number"><i class="fa fa-caret-down"></i></span>
                                </td>
                                <td class="price">
                                    <span>61,19 €</span>
                                </td>
                                <td class="action">
                                    <a href="#">Delete item</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_product">
                                    <a href="#"><img src="/kuteshop_v2/images/media/detail/product-100x122.jpg" alt="Product"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="#">Frederique Constant </a></p>
                                    <small class="cart_ref">SKU : #123654999</small><br>
                                    <small><a href="#">Color : Beige</a></small><br>
                                    <small><a href="#">Size : S</a></small>
                                </td>
                                <td class="cart_avail"><span class="label label-success">In stock</span></td>
                                <td class="price"><span>61,19 €</span></td>
                                <td class="qty">

                                    <input minlength="1" maxlength="12" name="qty0" id="qty0" value="1" class="form-control input-sm" type="text">
                                    <span data-field="qty0" data-type="minus" class="btn-number" ><i class="fa fa-caret-up"></i></span>
                                    <span data-field="qty0" data-type="plus" class="btn-number"><i class="fa fa-caret-down"></i></span>
                                </td>
                                <td class="price">
                                    <span>61,19 €</span>
                                </td>
                                <td class="action">
                                    <a href="#">Delete item</a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" rowspan="2"></td>
                                <td colspan="3">Total products (tax incl.)</td>
                                <td colspan="2">122.38 €</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td colspan="2"><strong>122.38 €</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                        <button class="button pull-right">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('PageJs')

@endsection
