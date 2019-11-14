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
                        <p>Name: {{ product.product_title }}</p>
                        <p>SKU: {{ product.sku }}</p>
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
                    <span class="badge badge-info">{{ product.status_label }}</span>
                </td>
                <td class="a-center last text-center">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="#" class="btn btn-sm btn-info" @click.prevent="editProductDetails(product.product_slug)"> <i class="fa fa-pencil"></i></a>
                        <a :href="'/product/'+product.product_slug" target="_blank" class="btn btn-sm btn-primary" > <i class="fa fa-eye"></i></a>
                        <a href="#" @click.prevent="deleteProductDetails(product.product_slug)" class="btn btn-sm btn-danger" > <i class="fa fa-trash"></i></a>
                    </div>

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
                'deleteIndividualSellerProduct'
            ]),
            editProductDetails(slug){
                location.href = `/buyer/seller/product/${slug}/edit`;
            },
            deleteProductDetails(slug){
                this.deleteIndividualSellerProduct(slug)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    });
            }
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
