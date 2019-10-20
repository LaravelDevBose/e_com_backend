<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
            <tr class="first last">
                <th>#</th>
                <th>Name </th>
                <th>Phone No</th>
                <th>
                    <span class="nobr">Full Address</span>
                </th>
                <th class="text-center">View|Edit </th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="addressBooks" v-for="(addressBook,index) in addressBooks" :class="{'first':index === 0, 'last':(index+1) === addressBooks.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                <td>1</td>
                <td>{{ addressBook.first_name }} {{ addressBook.last_name }}</td>
                <td>{{ addressBook.phone_no }}</td>
                <td>
                    <span class="price">{{addressBook.full_address  }}</span>
                </td>
                <td class="a-center last text-center">
                    <a href="#" @click.prevent="editAddressBook(addressBook.address_id)"> <i class="fa fa-pencil"></i></a>
                </td>
            </tr>
            <tr v-else class="last even">
                <td colspan="6">No Address Found </td>
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
