
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
            nom:"Farid",
            domaine:[],
            t_parcours:[],
            cycle:[],
            mentions:[],
            pays:[],
            newInscription:{
                nom : '',
                prenoms:'',
                adresse:'',
                nom_jeune:'',
                nationalite:'',
                sexe:'M',
                date_nsce:'',
                lieu_nsce:'',
                pays:'',
                ethnie:'',
                prefecture:'',
                situation_mat:'Célibataire',
                adresse:'',
                telephone:'',
                email:'',
                nom_pere:'',
                prenoms_pere:'',
                profession_pere:'',
                nom_mere:'',
                prenoms_mere:'',
                profession_mere:'',
                pers_prevenir:'',
                prevenir_tel:'',
                annee_bac:'',
                serie_bac:'',
                num_table:'',
                num_attestation:'',
                pays_bac:'',
                annee_ant:'',
                annee_ant_id:'',
                univ_ant:'',
                domaine_ant:'',
                etabliss_ant:'',
                parcours_ant:'',
                cycle_id:'',


            }


        }
    },
    methods:{

        addEtudiant(){



            instance.post('add_etudiant',this.newInscription).then(res=> {
                alert('bravo')
                this.loadDatas();

            }).catch(err=>{
                this.mySwal("Alert", "Echec d'Ajout de l'Etudiant", "error");

                console.log(err.response.data);
            })


        },

        mySwal(message,text,type){
            swal(message,text,type)},

        loadDatas(){

            instance.get('inscriptionEtudiant').then(res=>{

                this.pays=res.data.pays
                this.cycle=res.data.cycle
                this.t_parcours=res.data.t_parcours
                this.domaine=res.data.domaines
                this.mentions=res.data.mentions
                this.filieres=res.data.filieres


            }).catch(err=>{

                console.log(err.response.data)
            })
        }

    },
    mounted(){
        this.loadDatas();
        // Wizard tabs with numbers setup
        $(".number-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function (event, currentIndex) {
                alert("Form submitted.");
            }
        });

// Wizard tabs with icons setup
        $(".icons-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function (event, currentIndex) {
                alert("Form submitted.");
            }
        });

// Vertical tabs form wizard setup
        $(".vertical-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            stepsOrientation: "vertical",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function (event, currentIndex) {
                alert("Form submitted.");
            }
        });
        var form = $(".steps-validation").show();
        // this.loadDatas();
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



