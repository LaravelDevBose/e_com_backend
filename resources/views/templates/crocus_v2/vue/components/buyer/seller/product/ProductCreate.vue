<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <form  @submit.prevent="manipulateAddressBook">
            <fieldset class="group-select">
                <fieldset>
                    <legend>Address Book</legend>
                    <ul>
                        <li>
                            <div class="customer-name">
                                <div class="input-box name-firstname">
                                    <label for="billing_firstname"> Product Name <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="billing_firstname" v-model="formData.product_name" title="First Name" class="input-text required-entry">
                                </div>
                                <div class="input-box name-lastname">
                                    <label for="billing_lastname"> Category <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="billing_lastname" v-model="formData.category_id" title="Last Name" class="input-text required-entry">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="billing_telephone">Brand <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.brand_id" title="Telephone" class="input-text required-entry" id="billing_telephone">
                            </div>
                            <div class="input-box">
                                <label for="billing_street">Product Condition <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.product_condition" title="Street Address" id="billing_street" class="input-text required-entry">
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="billing_city">Highlight <span class="required">*</span></label>
                                <br>
                                <input type="text" title="City" v-model="formData.highlight" class="input-text required-entry" id="billing_city">
                            </div>
                            <div class="input-box">
                                <label for="billing_city">Description <span class="required">*</span></label>
                                <br>
                                <input type="text" title="City" v-model="formData.description" class="input-text required-entry" id="billing_city">
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="qty">Product Qty<span class="required">*</span></label>
                                <br>
                                <input type="number" v-model="formData.postal_code" title="Zip/Postal Code" id="qty" class="input-text required-entry">
                            </div>
                            <div class="input-box">
                                <label for="price">Product Price<span class="required">*</span></label>
                                <br>
                                <input type="number" v-model="formData.postal_code" title="Zip/Postal Code" id="price" class="input-text required-entry">
                            </div>
                        </li>
                        <li>
                            <p class="require">
                                <em class="required">*</em>Required Fields
                            </p>
                            <button :disabled="btnDisabled" type="submit" class="button continue">
                                <span v-if="is_edit">Update Address</span>
                                <span v-else>Save Address</span>
                            </button>
                        </li>
                    </ul>
                </fieldset>
            </fieldset>
        </form>
    </section>
</template>

<script>
    export default {
        name: "ProductCreate",
        data(){
            return{
                formData:{
                    product_name:'',
                    category_id:'',
                    brand_id:'',
                    highlight:'',
                    description:'',
                    product_condition:'',
                    product_images:[],
                    thumb_id:'',
                    product_type:1,
                    product_qty:'',
                    product_price:'',
                },
                btnDisabled:false,
                is_edit:false,
            }
        }
    }
</script>

<style scoped>

</style>
