/**
 * Created by User on 30/03/2019.
 */


import {url} from '../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Credit = {
    template:'#credit',
    data(){
        return {
            departements:[],
            filieres:[],
            semestres:[],
            ues:[],
            matieres:[],
            selectedFiliere:{},
            currentDepartement:[],
            currentCredits:[],
            newCredit:{
                filiere_id:null,
                semestre_id:null,
                matiere_id:null,
                credits:1
            }
        }
    },
    mounted(){
        this.initView()
        this.loadDatas()
    },
    computed:{
        validate(){
            return this.newCredit.filiere_id!=null &&
                this.newCredit.semestre_id!=null &&
                this.newCredit.matiere_id!=null &&
                this.newCredit.credits!=null

        }
    },
    methods:{
        initView(){
            $('#select2-filiere').select2().on('change',(e)=>{
                // alert($('#select2-filiere').val())
                this.newCredit.filiere_id=$('#select2-filiere').val()
            });
            $('#select2-ue').select2().on('change',(e)=>{
                // alert($('#select2-ue').val())
                this.matieres = this.ues.find(u=>u.id==$('#select2-ue').val()).matieres
                let options = [{
                    id:"",
                    text:"Selectionner une matière",
                    disabled:true,
                    selected:true
                }]
                this.matieres.forEach(m=>{
                    options.push({
                        id:m.id,
                        text:m.nom
                    })
                })
                $('#select2-matiere').empty()
                $('#select2-matiere').select2({
                        data:options
                    }
                )
            });
            $('#select2-matiere').select2().on('change',(e)=>{
                // alert($('#select2-matiere').val())
                this.newCredit.matiere_id=$('#select2-matiere').val()
            });
            $('#select2-semestre').select2().on('change',(e)=>{
                // alert($('#select2-semestre').val())
                this.newCredit.semestre_id=$('#select2-semestre').val()
            })



        },
        loadDatas(){
            this.loading()
            instance.get('credit/load_datas').then(res=>{
                console.log(res.data)
                $.unblockUI()
                this.departements = res.data.departements
                this.ues = res.data.ues
                this.filieres = res.data.filieres
                this.semestres = res.data.semestres
            }).catch(err=>{
                $.unblockUI()
                console.log(err.response.data)
            })
        },
        loading(){
            $.blockUI({
                message: '<div class="semibold"><span class="ft-refresh-cw icon-spin text-left"></span>&nbsp; Chargement ...</div>',
                overlayCSS: {
                    backgroundColor: '#FFF',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    width: 'auto',
                    backgroundColor: '#333'
                },
                // onOverlayClick: $.unblockUI
            });
        },
        onFiliereSelect(filiere){

            // this.initView()
            this.currentDepartement = filiere.departement
            // this.filieres = this.departements.find(d=>d.id==this.currentDepartement.id).filieres
            this.selectedFiliere = filiere
            this.currentCredits = filiere.credits

            let options = [{
                id: filiere.id,
                text: filiere.nom,
                selected:true
            }]

            $('#select2-filiere').empty()
            $('#select2-filiere').select2({data:options})
            this.newCredit.filiere_id = filiere.id
        },

        addNewCredit(){
            // console.log(this.newCredit)
            instance.post('credit/add_credit',this.newCredit).then(res=>{
                this.mySwal("Success", "Nouveau crédit ajouté", "success");
                console.log(res.data)
            }).catch(err=>{
                this.mySwal("Error!", "Crédit non ajouté", "error");
                console.log(err.response.data)
            })
        },

        mySwal(message,text,type){
            swal(message,text,type)
        }
    }
}

new Vue({
    el:'#app',
    data:{},
    mounted(){

    },
    components:{
        Credit
    }
})