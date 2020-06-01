<template>
    <div class="block-language-wrapper">
        <a role="button"  @click.prevent="showCityModal()" class="block-language" href="#">
            {{ selectedCity.text}} <span class="caret"></span>
        </a>
        <div class="modal fade" id="quickView" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document" style="top: 10%;">
                <form @submit.prevent="setCity()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="display: inline-block;" id="exampleModalLabel">Select Your City</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: inline-block;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="city-name" class="col-form-label">City:</label>
                                <select name="" id="city-name" class="form-control" v-model="formData.cityKey">
                                    <option value="" disabled>Select Your Closest City</option>
                                    <option v-if="cities" v-for="(city, index) in cities" :key="index" :value="city.key" >{{ city.text }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Change City</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "HeaderCityList",
        data(){
            return{
                selectedCity: {},
                formData: {
                    cityKey: 0,
                }
            }
        },
        mounted() {
            this.cities.filter(city => {
                if(city.key === +localStorage.getItem('cityKey')) {
                    this.selectedCity = city;
                }
                return city;
            });
            if(localStorage.getItem('cityKey') == null) {
                this.showCityModal();
            }
        },
        methods:{
            ...mapActions(['changeCity']),
            setCity(){
                this.changeCity(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            localStorage.setItem('cityKey', this.formData.cityKey);
                            $('#quickView').modal('hide');
                            this.$noty.success(response.message);
                            setTimeout(()=> {
                                location.reload();
                            }, 1200);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
                    .catch(error => {
                        this.$noty.error('Something Wrong. Try Again.');
                    });
            },
            showCityModal(){
                $('#quickView').modal('show');
            }
        },
        computed:{
            ...mapGetters(['cities'])
        }
    }
</script>

<style scoped>

</style>
