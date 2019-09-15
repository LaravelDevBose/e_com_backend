<template>
    <div class="cart wow bounceInUp animated">
        <div class="page-title">
            <h2>Shopping Cart</h2>
        </div>
        <div class="table-responsive">
            <cart-list-table></cart-list-table>
        </div>
        <!-- BEGIN CART COLLATERALS -->
        <div class="cart-collaterals row">
            <div class="col-sm-4 col-sm-offset-8">
                <div class="totals">
                    <h3>Shopping Cart Total</h3>
                    <div class="inner">
                        <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                            <colgroup>
                                <col>
                                <col width="1">
                            </colgroup>
                            <tfoot>
                            <tr>
                                <td colspan="1" class="a-left" style=""><strong>Grand Total</strong></td>
                                <td class="a-right" style=""><strong><span class="price">$77.38</span></strong></td>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td colspan="1" class="a-left" style=""> Subtotal </td>
                                <td class="a-right" style=""><span class="price">$77.38</span></td>
                            </tr>
                            </tbody>
                        </table>
                        <ul class="checkout">
                            <li>
                                <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button>
                            </li>
                        </ul>
                    </div>
                    <!--inner-->
                </div>
            </div>
        </div>
        <!--cart-collaterals-->
    </div>
</template>

<script>
    import CartListTable from "./CartListTable";
    export default {
        name: "CartPage",
        components: {CartListTable}
    }
</script>

<style scoped>

</style>
