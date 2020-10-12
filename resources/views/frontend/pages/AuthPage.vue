<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li class="active"> Checkout</li>-->
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Authorization</span>
            </h2>

            <div class="page-content checkout-page">
                <div class="box-border">
                    <div class="row">
                        <div class="col-sm-6">
                            <!--<h4>Checkout as a Guest or Register</h4>
                            <p>Register with us for future convenience:</p>
                            <ul>
                                <li><label><input name="radio1" v-model="option" :value="3" type="radio">Checkout as Guest</label></li>
                                <li><label><input name="radio1" v-model="option" :value="2" type="radio">Register</label></li>
                            </ul>
                            <br>
                            <h4>Register and save time!</h4>
                            <p>Register with us for future convenience:</p>
                            <p><i class="fa fa-check-circle text-primary"></i> Fast and easy check out</p>
                            <p><i class="fa fa-check-circle text-primary"></i> Easy access to your order history and status</p>
                            <button class="button">Continue</button>-->
                            <register-component></register-component>
                        </div>
                        <div class="col-sm-6">
                            <login-component></login-component>
                            <!--<guest-component v-if="option === 3"></guest-component>
                            <register-component v-if="option === 2"></register-component>-->
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </main><!-- end MAIN -->
</template>

<script>
import GuestComponent from "../components/auth/GuestComponent";
import LoginComponent from "../components/auth/LoginComponent";
import RegisterComponent from "../components/auth/RegisterComponent";
export default {
    name: "AuthPage",
    components: {
        RegisterComponent,
        LoginComponent,
        GuestComponent
    },
    data(){
        return{
            option: 1,
        }
    }
}
</script>

<style scoped>

</style>
