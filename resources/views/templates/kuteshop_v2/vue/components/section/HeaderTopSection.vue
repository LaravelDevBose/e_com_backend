<template>
    <ul class=" nav-left" >
        <li ><span><i class="fa fa-phone" aria-hidden="true"></i>+ 00 123 456 789</span></li>
        <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> Contact us today !</span></li>
        <li class="dropdown switcher  switcher-language">
            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger" aria-expanded="false">
                <img class="switcher-flag" alt="flag" src="/kuteshop_v2/images/flags/flag_english.png">
                <span>English</span>
                <i aria-hidden="true" class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu switcher-options ">
                <li class="switcher-option" v-for="(lang,index) in languagesInfo" :key="index">
                    <a href="#" @click.prevent="setLanguage(lang.name)">
                        <img class="switcher-flag" :alt="lang.label" :src="lang.flag">{{ lang.label}}
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</template>

<script>
    import {mapActions} from 'vuex';
    export default {
        name: "HeaderTopSection",
        data(){
            return{
                languagesInfo:[
                    {
                        name:'en',
                        label:'English',
                        flag:'/kuteshop_v2/images/flags/flag_english.png'
                    },
                    {
                        name:'so',
                        label:'Somalia',
                        flag:'/kuteshop_v2/images/flags/flag_somalia.png'
                    }
                ]
            }
        },
        methods:{
            ...mapActions([
                'changeLanguage',
            ]),
            setLanguage(langName){
                AppStorage.storeLangInfo(langName);
                this.changeLanguage(langName)
                    .then(response=>{
                        if(response.code === 200){
                            console.log(response.data);
                            location.reload();
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>
