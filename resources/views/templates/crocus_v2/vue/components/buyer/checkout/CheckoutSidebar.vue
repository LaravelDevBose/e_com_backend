<template>
    <div class="block block-progress">
        <div class="block-title ">Your Checkout</div>
        <div class="block-content">
            <dl>
                <dt class="complete"> Billing Address <span class="separator">|</span> <a onClick="checkout.gotoSection('billing'); return false;" href="#billing">Change</a> </dt>
                <dd class="complete">
                    <address>
                        Jon Doh<br>
                        Jollen Group LTD.<br>
                        29 East Stree<br>
                        Behanam<br>
                        Huntsville,  Alabama, 35801<br>
                        United States<br>
                        T: 3349067 <br>
                        F: 2344532
                    </address>
                </dd>
                <dt class="complete"> Shipping Address <span class="separator">|</span> <a onClick="checkout.gotoSection('shipping');return false;" href="#payment">Change</a> </dt>
                <dd class="complete">
                    <address>
                        Jon Doh<br>
                        Jollen Group LTD.<br>
                        29 East Stree<br>
                        Behanam<br>
                        Huntsville,  Alabama, 35801<br>
                        United States<br>
                        T: 3349067 <br>
                        F: 2344532
                    </address>
                </dd>
                <dt class="complete"> Shipping Method <span class="separator">|</span> <a onClick="checkout.gotoSection('shipping_method'); return false;" href="#shipping_method">Change</a> </dt>
                <dd class="complete"> Flat Rate - Fixed <br>
                    <span class="price">$15.00</span> </dd>
                <dt> Payment Method </dt>
            </dl>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CheckoutSidebar"
    }
</script>

<style scoped>

</style>
