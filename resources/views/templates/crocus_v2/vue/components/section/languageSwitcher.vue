<template>
    <div class="dropdown block-language-wrapper">
        <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#">
            <img :alt="selectedLang.label" :src="selectedLang.flag">{{ selectedLang.label}} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li role="presentation" v-for="(lang,index) in languagesInfo" :key="index">
                <a href="#" @click.prevent="setLanguage(lang.name)">
                    <img :alt="lang.label" :src="lang.flag">{{ lang.label}}
                </a>
            </li>
        </ul>
    </div>
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
                        flag:'/crocus_v2/images/flags/english.png'
                    },
                    {
                        name:'so',
                        label:'Somalia',
                        flag:'/crocus_v2/images/flags/somalia.png'
                    }
                ],
                selectedLang: {},
            }
        },
        created() {
            this.languagesInfo.filter(lang => {
                if(lang.name === localStorage.getItem('lang')) {
                    this.selectedLang = lang;
                }
                return lang;
            });

            if(typeof localStorage.getItem('lang') === "undefined") {
                this.selectedLang = this.languagesInfo[0];
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
