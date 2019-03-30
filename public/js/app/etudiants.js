/**
 * Created by User on 30/03/2019.
 */

import {url} from '../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Etudiant = {
    template:'#etudiant',
    data(){
        return {

        }
    },
    mounted(){
        // alert()
    },
    computed:{},
    methods:{}
}

new Vue({
    el:'#app',
    data:{},
    mounted(){

    },
    components:{
        Etudiant
    }
})