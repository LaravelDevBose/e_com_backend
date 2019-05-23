<template>
    <div id="CreateProduct">
        <div class="content">
            <form action="" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Campaign Details</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Campaign Name:</label>
                                    <input type="text" class="form-control"  placeholder="Campaign name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Start Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                input-id="startDate"
                                                input-class="form-control"
                                                :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                                :week-start="6"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>End Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour

                                                input-id="startDate"
                                                input-class="form-control"
                                                :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                                :week-start="6"
                                                class="theme-orange"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group hidden">
                                    <label>Last Register Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                input-id="startDate"
                                                input-class="form-control"
                                                :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                                :week-start="6"
                                                class="theme-orange"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Voucher Code:</label>
                                    <textarea  rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Voucher Image:</label>
                                <attachment :multi_file="multiple" :folder="folder"></attachment>
                            </div>
                            <div class="col-md-2">
                                <button type="button" @click.prevent="campaignProduct" class="btn bg-teal-400 btn-labeled legitRipple btn-block"><b><i class="icon-plus3"></i></b> Add Products</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel" >
                    <div class="panel-heading bg-teal-700">
                        <h5 class="panel-title">Add Campaign Products</h5>
                    </div>

                    <div class="panel-body">

                    </div>
                </div>
                <div class="sticky-submit-btn" >
                    <div class="panel panel-default">
                        <div class="panel-body" >
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" class="btn btn-info btn-block">Draft<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>

                                <div class="col-md-2 col-md-offset-6">
                                    <div class="content-group-lg"  style="margin-bottom:0!important;">
                                        <div class="checkbox checkbox-switchery">
                                            <label>
                                                <input type="checkbox"  class="switchery-primary" checked>
                                                <span class="text-success text-bold" >Active</span>
<!--                                                <span class="text-danger text-bold" >Inactive</span>-->
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">Save Product <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "CreateProduct",
        data(){
            return {
                btnDisabled:false,
            }
        },
        created() {

        },
        methods:{

        },
        computed:{

        },
        watch:{

        }
    }
</script>

<style scoped>

</style>