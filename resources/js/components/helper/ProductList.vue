<template>
    <div class="ProductList">
        <table class="table table-striped table-hover table-bordered dataTable-basic">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" class="styled"  value="1" v-model="productIDs" >
                </th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>DOB</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 15px;">
                    <input type="checkbox" class="styled"  value="1" v-model="productIDs" >
                </td>
                <td style="width: 70px">
                    <a href="#">
                        <img :src="image" height="60" class="" alt="">
                    </a>
                </td>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="label label-success">Active</span></td>
            </tr>
            <tr>
                <td class="no-padding-right" style="width: 20px">
                    <input type="checkbox" class="styled" value="3"  v-model="productIDs">
                </td>
                <td style="width: 70px">
                    <a href="#">
                        <img :src="image" height="60" class="" alt="">
                    </a>
                </td>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="label label-success">Active</span></td>
            </tr>
            <tr>
                <td style="width: 20px">
                    <input type="checkbox" class="styled" value="2"  v-model="productIDs">
                </td>
                <td class="no-padding-right" style="width: 70px">
                    <a href="#">
                        <img :src="image" height="60" class="" alt="">
                    </a>
                </td>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="label label-success">Active</span></td>
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
                image:'https://media.moddb.com/images/engines/1/1/984/img-placeholder.2.jpg',
                productIDs:[]
            }
        },
        methods:{
            ...mapActions([
                'getActiveProducts'
            ])
        },
        watch:{
            productIDs:{
                handler(newValue, oldValue){
                    if(newValue === oldValue){
                        this.getActiveProducts(this.productIDs);
                    }
                }
            }
        }
    }
</script>

<style scoped>
    input[type=checkbox]:checked tr{
        background: green;
    }
</style>
