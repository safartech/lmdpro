
/**
 * Created by User on 30/03/2019.
 */

import {url} from '../base_url.js'

let instance = axios.create({
    baseURL : url
});

let Etudiant={
    template:"#etudiant",
    data(){
        return {

            Etudiants:[],
            updateEtudiant:{},



        }
    },
    methods:{



        mySwal(message,text,type){
            swal(message,text,type)},

        showEditorModal(Etudiant){

            this.updateEtudiant=Etudiant;
            // $('#date-nsce2').attr('data-date',eleve.date_nsce)

            $('#inlineForm').modal('show');


        },

        Edit(){

            instance.put('update_Etudiant/'+this.updateEtudiant.id,this.updateEtudiant).then(res=> {

                this.mySwal("success!", "Modification avec Success", "success");
                this.loadDatas();
            }).catch(err=>{
                console.log(err.response.data)
                this.mySwal("Error!", "Erreur Modification", "error");
            })

        },

        loadDatas(){

            instance.get('EtudiantListe').then(res=>{

            this.Etudiants=res.data.etudiant

                console.log(res.data)


            }).catch(err=>{
                alert('fau')
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
            Etudiant
        }


    }

)



