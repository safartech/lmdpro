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
            etudiants:[],
            inscriptions:[],
            annees:[],
            cycles:[],
            type_parcours:[],
            filieres:[],
            domaines:[],
            mentions:[],
            parcoursChoisi:[],

            oldInsc:{
                annee:{},
                etudiant:{},
                type_parcours:{},
                cycle:{},
                domaine:{},
                mention:{},
                filiere:{},
                inscription_id:'',
            },

            delInsc:{
                etudiant:{},
                inscription_id:'',
            }
        }
    },

    mounted(){
        this.initView()
        this.loadDatas()
    },

    computed:{},

    methods:{
        initView(){

            // Action a faire sur chaque selection de recherche
            $('.selection').on('change',e=>{
                this.onSelectionChange(
                    $('#selected_annee').val(),
                    $('#selected_parcours').val(),
                    $('#selected_cycle').val(),
                    $('#selected_filiere').val()
                )
            })
        },

        showUpdateModal(insc){
            this.oldInsc.etudiant = insc.etudiant
            this.oldInsc.annee = insc.annee
            this.oldInsc.filiere = insc.filiere
            this.oldInsc.cycle = insc.cycle
            this.oldInsc.type_parcours = insc.type_parcours
            this.oldInsc.mention = insc.mention
            this.oldInsc.domaine = insc.domaine
            this.oldInsc.inscription_id = insc.id

            $('#updateModal').modal('show')
        },

        showDeleteModal(insc){
            this.delInsc.etudiant = insc.etudiant
            this.delInsc.inscription_id = insc.id

            $('#deleteModal').modal('show')
        },

        updateEtudiant(){
            instance.post('etudiant/update_etudiant', this.oldInsc).then(res=> {
                console.log(res.data)
                this.loadDatas()
            }).catch(err=>{
                console.log(err.response.data)
            });
        },

        deleteEtudiant(){
            instance.post('etudiant/delete_etudiant', this.delInsc).then(res=> {
                console.log(res.data)
                this.loadDatas()
            }).catch(err=>{
                console.log(err.response.data)
            });
        },

        loadDatas(){
            this.loading()
            instance.get('etudiant/load_datas').then(res=>{
                // console.log(res.data)
                $.unblockUI()
                this.inscriptions = res.data.inscriptions
                this.etudiants = res.data.inscriptions
                this.annees = res.data.annees
                this.cycles = res.data.cycles
                this.type_parcours = res.data.type_parcours
                this.filieres = res.data.filieres
                this.domaines = res.data.domaines
                this.mentions = res.data.mentions
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

        onSelectionChange(anneeId, parcoursId, cycleId, filiereId){
            if(anneeId == 0 && parcoursId == 0 && cycleId == 0 && filiereId == 0){
                this.inscriptions = this.etudiants
            }
            else{
                this.inscriptions = this.etudiants

                if(anneeId != 0){
                    this.inscriptions = this.inscriptions.filter(x=>x.annee_id==anneeId)
                }

                if(filiereId != 0){
                    this.inscriptions = this.inscriptions.filter(x=>x.filiere_id==filiereId)
                }

                if(parcoursId != 0){
                    this.inscriptions = this.inscriptions.filter(x=>x.type_parcours_id==parcoursId)
                    // this.parcoursChoisi = this.type_parcours.filter(x=>x.type_parcours_id==parcoursId)

                    // this.cycles = this.cycles.filiter(x=>x.parcours_id==this.parcoursChoisi.parcours_id)
                }

                if(cycleId != 0){
                    this.inscriptions = this.inscriptions.filter(x=>x.cycle_id==cycleId)
                }
            }
        }
    }
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
