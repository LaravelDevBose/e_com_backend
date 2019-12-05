<template>
    <div class="shipping-form">
        <form id="shipping-zip-form" method="post" action="#estimatePost/">
            <p>Enter your destination to get a shipping estimate.</p>
            <ul class="form-list">
                <li>
                    <label class="required" for="country"><em>*</em>Country</label>
                    <div class="input-box">
                        <select title="Country" class="validate-select" id="country" name="country_id">
                            <option value=""> </option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                        </select>
                    </div>
                </li>
                <li>
                    <label for="region_id">State/Province</label>
                    <div class="input-box">
                        <select style="" title="State/Province" name="region_id" id="region_id" defaultvalue="" class="required-entry validate-select">
                            <option value="">Please select region, state or province</option>
                            <option value="1" title="Alabama">Alabama</option>
                        </select>
                        <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                    </div>
                </li>
                <li>
                    <label for="postcode">Zip/Postal Code</label>
                    <div class="input-box">
                        <input type="text" value="" name="estimate_postcode" id="postcode" class="input-text validate-postcode">
                    </div>
                </li>
            </ul>
            <div class="buttons-set11">
                <button class="button get-quote"  title="Get a Quote" type="button"><span>Get a Quote</span></button>
            </div>
            <!--buttons-set11-->
        </form>
    </div>
</template>

<script>
    export default {
        name: "ShippingForm"
    }
</script>

<style scoped>

</style>
