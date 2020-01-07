<template>
    <ul>
        <li class="switcher-option" v-for="(lang,index) in languagesInfo" :key="index">
            <a href="#" @click.prevent="setLanguage(lang.name)">
                <img class="switcher-flag" :alt="lang.label" :src="lang.flag">{{ lang.label}}
            </a>
        </li>
    </ul>
</template>

<script>
    import {mapActions} from 'vuex';
    export default {
        name: "languageSwitcher",
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
