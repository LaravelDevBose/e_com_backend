@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Address Book')

@section('PageCss')

@endsection

@section('Content')
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 wow bounceInUp animated">
                <div id="checkout-step-billing" class="step a-item" style>
                    <form id="co-billing-form" action>
                        <fieldset class="group-select">
                            <fieldset>
                                <legend>Address Book</legend>
                                <ul>
                                    <li>
                                        <div class="input-box name-firstname">
                                            <label for="billing:firstname">
                                                First Name
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="First Name" />
                                        </div>
                                        <div class="input-box name-lastname">
                                            <label for="billing:lastname">
                                                Last Name
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="Last Name" />
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-box">
                                            <label for="billing:company">Company</label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="Company" />
                                        </div>
                                        <div class="input-box">
                                            <label for="billing:street1">
                                                Address
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <textarea class="input-text required-entry" placeholder="Address"></textarea>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-box">
                                            <label for="billing:city">
                                                City
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="City" />
                                        </div>
                                        <div id class="input-box">
                                            <label for="billing:region">
                                                State/Province
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <select defaultvalue="1" id="billing:region_id" name="billing[region_id]" title="State/Province" class="validate-select input-text" style>
                                                <option value>Please select region, state or province</option>
                                                <option value="1">Alabama</option>
                                                <option value="2">Alaska</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-box">
                                            <label for="billing:postcode">
                                                Zip/Postal Code
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="Zip/Postal Code" />
                                        </div>
                                        <div class="input-box">
                                            <label for="billing:country_id">
                                                Country
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <select name="billing[country_id]" id="billing:country_id" class="validate-select" title="Country">
                                                <option value></option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-box">
                                            <label for="billing:telephone">
                                                Telephone
                                                <span class="required">*</span>
                                            </label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="Telephone" />
                                        </div>
                                        <div class="input-box">
                                            <label for="billing:fax">Fax</label>
                                            <br />
                                            <input type="text" name="billing" class="input-text required-entry" placeholder="Fax" />
                                        </div>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="billing[save_in_address_book]" value="1" title="Save in address book" id="billing:save_in_address_book" onChange="shipping.setSameAsBilling(false);" class="checkbox" />
                                        <label for="billing:save_in_address_book">Save in address book</label>
                                    </li>
                                    <li>
                                        <p class="require">
                                            <em class="required">*</em>Required Fields
                                        </p>
                                        <button type="button" class="button continue" onClick="billing.save()">
                                            <span>Continue</span>
                                        </button>
                                    </li>
                                </ul>
                            </fieldset>
                        </fieldset>
                    </form>
                </div>
            </section>

            <!-- right side -->
            @include('templates.crocus_v2.buyer.partials.right_side')
        </div>
    </div>
</div>
@endsection

@section('PageJs')

@endsection
