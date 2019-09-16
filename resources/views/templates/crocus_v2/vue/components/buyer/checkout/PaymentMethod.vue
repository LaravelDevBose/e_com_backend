<template>
    <form action="" id="co-payment-form">
        <dl id="checkout-payment-method-load">
            <dt>
                <input type="radio" id="p_method_checkmo" value="checkmo" name="payment[method]" title="Check / Money order" onClick="payment.switchMethod('checkmo')" class="radio">
                <label for="p_method_checkmo">Check / Money order</label>
            </dt>
            <dd>
                <fieldset class="form-list">
                </fieldset>
            </dd>
            <dt>
                <input type="radio" id="p_method_ccsave" value="ccsave" name="payment[method]" title="Credit Card (saved)" onClick="payment.switchMethod('ccsave')" class="radio">
                <label for="p_method_ccsave">Credit Card (saved)</label>
            </dt>
            <dd>
                <fieldset class="form-list">
                    <ul id="payment_form_ccsave" style="display: none;">
                        <li>
                            <div class="input-box">
                                <label for="ccsave_cc_owner">Name on Card <span class="required">*</span></label>
                                <br>
                                <input type="text" disabled="" title="Name on Card" class="input-text required-entry" id="ccsave_cc_owner" name="payment[cc_owner]" value="">
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="ccsave_cc_type">Credit Card Type <span class="required">*</span></label>
                                <br>
                                <select disabled="" id="ccsave_cc_type" name="payment[cc_type]" class="required-entry validate-cc-type-select">
                                    <option value="">--Please Select--</option>
                                    <option value="AE">American Express</option>
                                    <option value="VI">Visa</option>
                                    <option value="MC">MasterCard</option>
                                    <option value="DI">Discover</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="ccsave_cc_number">Credit Card Number <span class="required">*</span></label>
                                <br>
                                <input type="text" disabled="" id="ccsave_cc_number" name="payment[cc_number]" title="Credit Card Number" class="input-text validate-cc-number validate-cc-type" value="">
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="ccsave_expiration">Expiration Date <span class="required">*</span></label>
                                <br>
                                <div class="v-fix">
                                    <select disabled="" id="ccsave_expiration" style="width: 140px;" name="payment[cc_exp_month]" class="required-entry">
                                        <option value="" selected="selected">Month</option>
                                        <option value="1">01 - January</option>
                                        <option value="2">02 - February</option>
                                        <option value="3">03 - March</option>
                                        <option value="4">04 - April</option>
                                        <option value="5">05 - May</option>
                                        <option value="6">06 - June</option>
                                        <option value="7">07 - July</option>
                                        <option value="8">08 - August</option>
                                        <option value="9">09 - September</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </select>
                                </div>
                                <div class="v-fix">
                                    <select disabled="" id="ccsave_expiration_yr" style="width: 103px;" name="payment[cc_exp_year]" class="required-entry">
                                        <option value="" selected="selected">Year</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="ccsave_cc_cid">Card Verification Number <span class="required">*</span></label>
                                <br>
                                <div class="v-fix">
                                    <input type="text" disabled="" title="Card Verification Number" class="input-text required-entry validate-cc-cvn" id="ccsave_cc_cid" name="payment[cc_cid]" style="width: 3em;" value="">
                                </div>
                                <a href="#" class="cvv-what-is-this">What is this?</a> </div>
                        </li>
                    </ul>
                </fieldset>
            </dd>
        </dl>
    </form>
</template>

<script>
    export default {
        name: "PaymentMethod"
    }
</script>

<style scoped>

</style>
