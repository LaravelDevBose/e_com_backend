<template>
    <div class="table-responsive">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr class="first last">
                <th>#</th>
                <th>{{ $t('form.full_name')}} </th>
                <th>{{ $t('form.phone_no')}}</th>
                <th>
                    <span class="nobr">{{ $t('buyer.address.full_address')}}</span>
                </th>
                <th class="text-center">{{ $t('buyer.address.action')}} </th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="addressBooks" v-for="(addressBook,index) in addressBooks" :class="{'first':index === 0, 'last':(index+1) === addressBooks.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                <td>{{ index+1 }}</td>
                <td>{{ addressBook.first_name }} {{ addressBook.last_name }}</td>
                <td>{{ addressBook.phone_no }}</td>
                <td>
                    <span class="price">{{addressBook.full_address  }}</span>
                </td>
                <td class="a-center last text-center">
                    <a href="#" @click.prevent="editAddressBook(addressBook.address_id)"> <i class="fas fa-edit"></i></a>
                </td>
            </tr>
            <tr v-else class="last even">
                <td colspan="6">{{ $t('buyer.address.no_address')}} </td>
            </tr>
            </tbody>
        </table>
        <!--        TODO Table Pagination-->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "AddressBookListPage",
        data(){
            return{
                reqData:{

                }
            }
        },
        mounted() {
            this.getAddressBooks(this.reqData);
        },
        methods:{
            ...mapActions([
                'getAddressBooks'
            ]),
            editAddressBook(addressId){
                location.href = `/buyer/address-book/${addressId}/edit`;
            }
        },
        computed:{
            ...mapGetters([
                'addressBooks'
            ])
        }
    }
</script>

<style scoped>

</style>
