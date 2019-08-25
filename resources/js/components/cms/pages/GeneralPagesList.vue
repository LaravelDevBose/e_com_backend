<template>
    <div class="content">
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Slider List</h5>
                <div class="heading-elements">
                    <a href="/admin/cms/pages/create" type="button" class="btn bg-orange-800 btn-sm" >Bulk Import <i class="icon-play3 position-right"></i></a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="padding:5px;">Slider Title</th>
                        <th>Sub Title</th>
                        <th>Slider Button</th>
                        <th>Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="slidersData" v-for="(slider , index) in slidersData" :key="slider.id">
                        <td>{{ index }}</td>
                        <td>
                            <span class="text text-bold"> {{ slider.title }}</span>
                        </td>
                        <td>
                            <span class="text text-bold"> {{ slider.subTitle }}</span>
                        </td>
                        <td>
                            <p class="text text-bold"> Text: {{ slider.btnText }}</p>
                            <a :href="slider.btnUrl" class="text text-small">Url: {{ slider.btnUrl}}</a>
                        </td>
                        <td style="padding:5px; width:200px;">
                            <img v-if="slider.attachment" :src="slider.attachment.image_path" :alt="slider.title" class="img-preview img-responsive" style="width:200px; height:100px;" >
                        </td>

                        <td class="text text-center">
                            <span class="badge badge-success" v-if="slider.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="sliderDelete(slider.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    export default {
        name: "GeneralPagesList"
    }
</script>

<style scoped>

</style>
