
/**
 * Created by User on 30/03/2019.
 */

import {url} from '../base_url.js'

let instance = axios.create({
    baseURL : url
});

let Inscription={
    template:"#inscription",
    data(){
        return {
            filiere:[],
            parcours:[],
            cycle:[],
            departement:[],
            newInscription:{
                nom : '',
                prenom:'',
                adresse:'',
                contact:'',
                sexe:'F',
                date_nsce:'',
                departement_id:'',
                parcours_id:'',
                cycle_id:'',
                filiere_id:'',
                Bac:'',
                email:'',
                password:'',
                passwordconf:'',
                serie:'',


            }


        }
    },
    methods:{

        addEtudiant(){



            instance.post('add_etudiant',this.newInscription).then(res=> {
                if(res.data==12)
                    alert('pass different')
                else
                    alert('cool')


                this.loadDatas();

            }).catch(err=>{
                alert('fau')

                console.log(err.response.data);
            })


        },

        loadDatas(){

            instance.get('inscription').then(res=>{
alert('12')
            }).catch(err=>{
                console.log(err.response.data)
            })
        }

    },
    mounted(){
        this.loadDatas();
    }

    ,
    computed:{

    }
}
new Vue(
    {
        el:"#app",
        data:{

        },
        methods: {

        },
        components:{
            Inscription
        }


    }

)



