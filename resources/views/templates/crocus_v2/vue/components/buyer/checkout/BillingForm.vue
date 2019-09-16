<template>
    <form id="co-billing-form" action="">
        <fieldset class="group-select">
            <ul>
                <li>
                    <label for="billing-address-select">Select a billing address from your address book or enter a new address.</label>
                    <br>
                    <select name="billing_address_id" id="billing-address-select" class="address-select" title="">
                        <option value="">New Address</option>
                        <option value="1" selected="selected">Jon D, Hunts Ville, MG, Alabama 46532, United States</option>
                    </select>
                </li>
                <li id="billing-new-address-form" >
                    <fieldset>
                        <legend>New Address</legend>
                        <input type="hidden" name="billing[address_id]" value="4269" id="billing:address_id">
                        <ul>
                            <li>
                                <div class="customer-name">
                                    <div class="input-box name-firstname">
                                        <label for="billing_firstname"> First Name <span class="required">*</span> </label>
                                        <br>
                                        <input type="text" id="billing_firstname"  value="pranali" title="First Name" class="input-text required-entry">
                                    </div>
                                    <div class="input-box name-lastname">
                                        <label for="billing_lastname"> Last Name <span class="required">*</span> </label>
                                        <br>
                                        <input type="text" id="billing_lastname"  value="d" title="Last Name" class="input-text required-entry">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <label for="billing_street">Address <span class="required">*</span></label>
                                <br>
                                <input type="text" title="Street Address" name="billing_street" id="billing_street" value="Hunts Ville" class="input-text required-entry">
                            </li>
                            <li>
                                <input type="text" title="Street Address 2"   value="" class="input-text">
                            </li>
                            <li>
                                <div class="input-box">
                                    <label for="billing_city">City <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="City"  value="MG" class="input-text required-entry" id="billing_city">
                                </div>
                                <div id="" class="input-box">
                                    <label for="billing_region">State/Province <span class="required">*</span></label>
                                    <br>
                                    <select  id="billing_region"  title="State/Province" class="validate-select" style="">
                                        <option value="">Please select region, state or province</option>
                                        <option value="1">Alabama</option>
                                        <option value="2">Alaska</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-box">
                                    <label for="billing_postcode">Zip/Postal Code <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="Zip/Postal Code" id="billing_postcode" value="46532" class="input-text validate-zip-international required-entry">
                                </div>
                                <div class="input-box">
                                    <label for="billing_country_id">Country <span class="required">*</span></label>
                                    <br>
                                    <select id="billing_country_id" class="validate-select" title="Country">
                                        <option value=""> </option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>

                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-box">
                                    <label for="billing:telephone">Telephone <span class="required">*</span></label>
                                    <br>
                                    <input type="text" name="billing[telephone]" value="454541" title="Telephone" class="input-text required-entry" id="billing:telephone">
                                </div>
                                <div class="input-box">
                                    <label for="billing:fax">Fax</label>
                                    <br>
                                    <input type="text" name="billing[fax]" value="" title="Fax" class="input-text" id="billing:fax">
                                </div>
                            </li>
                            <li>
                                <input type="checkbox" value="1" title="Save in address book" id="billing_save_in_address_book" onChange="shipping.setSameAsBilling(false);" class="checkbox">
                                <label for="billing_save_in_address_book">Save in address book</label>
                            </li>
                        </ul>
                    </fieldset>
                </li>
                <li>
                    <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_yes" value="1" onClick="$('shipping:same_as_billing').checked = true;" class="radio">
                    <label for="billing:use_for_shipping_yes">Ship to this address</label>
                    <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_no" value="0" checked="checked" onClick="$('shipping:same_as_billing').checked = false;" class="radio">
                    <label for="billing:use_for_shipping_no">Ship to different address</label>
                </li>
            </ul>
            <p class="require"><em class="required">* </em>Required Fields</p>
            <button type="button" class="button continue" onClick="billing.save()"><span>Continue</span></button>
        </fieldset>
    </form>
</template>

<script>
    export default {
        name: "BillingForm",
        data(){
            return{
                formData:{
                    first_name:'',
                    last_name:'',
                    phone_no:'',
                    address:'',
                    city:'',
                    state:'',
                    postal_code:'',
                    country:'',
                    address_type:'',
                }
            }
        }
    }
</script>

<style scoped>

</style>
