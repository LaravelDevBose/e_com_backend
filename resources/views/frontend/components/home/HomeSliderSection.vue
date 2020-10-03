<template>
    <div class="block-slide-main slide-opt-3" >
        <carousel :data="sliders" :controls="true"></carousel>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';

export default {
    name: "HomeSliderSection",
    data(){
        return{
            sliders: [],
        }
    },
    beforeCreate() {
        try {
            axios.get('/front/get-sliders')
                .then(({data})=>{
                    data.data .forEach(slider=>{
                        let item = `<div
                            data-background="#666a69"
                            class="item item${slider.id}"
                        >
                            <a class="img-slide">
                                <img src="${slider.attachment.image_path}" alt="${slider.title}">
                            </a>
                        </div>`;
                        this.sliders.push(item);
                    })
                })
        }catch (error){
            console.log(error);
        }
    },
    /*methods:{
        ...mapActions([
            'getSliders'
        ])
    },
    computed:{
        ...mapGetters(['sliders'])
    }*/
}
</script>

<style scoped>

</style>
