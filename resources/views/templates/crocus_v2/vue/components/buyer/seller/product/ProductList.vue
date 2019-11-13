<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
            <tr class="first last">
                <th>#</th>
                <th style="max-width:70px;">Image</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Condition</th>
                <th class="text-center">Qty</th>
                <th class="text-right">Price</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action </th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="individualSellerProducts.length !== 0" v-for="(product,index) in individualSellerProducts" :class="{'first':index === 0, 'last':(index+1) === individualSellerProducts.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                <td>{{ index+=1 }}</td>
                <td>
                    <img v-if="product.thumbnail" :src="product.thumbnail.image_path" :alt="product.product_title" class="img-responsive" style="max-width: 50px; max-height: 50px">
                </td>
                <td>
                    <div>
                        <p>{{ product.product_title }}</p>
                        <p>{{ product.sku }}</p>
                    </div>
                </td>
                <td>
                    <span v-if="product.brand !== null">{{ product.brand.name }}</span>
                </td>
                <td>
                    <span class="badge badge-success" v-if="product.condition === 1">New</span>
                    <span class="badge badge-primary" v-else-if="product.condition === 2">Used</span>
                    <span class="badge badge-warning" v-else>Republish</span>
                </td>
                <td class="text-center">{{ product.total_qty }}</td>
                <td class="text-right">{{ product.price }}</td>
                <td class="text-center">
                    <span class="badge badge-danger">Status</span>
                </td>
                <td class="a-center last text-center">
                    <a href="#" > <i class="fa fa-pencil"></i></a>
                    <a href="#" > <i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <tr v-else class="last even">
                <td colspan="9">No Product Found</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "ProductList",
        data(){
            return{

            }
        },
        mounted() {
            this.getIndividualSellerProducts();
        },
        methods:{
            ...mapActions([
                'getIndividualSellerProducts',
            ])
        },
        computed:{
            ...mapGetters([
                'individualSellerProducts',
            ])
        }
    }
</script>

<style scoped>

</style>
