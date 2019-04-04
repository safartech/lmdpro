/**
 * Created by User on 02/04/2019.
 */
import {url} from '../base_url.js'
let instance = axios.create({
    baseURL : url
});

let Note = {
    template:'#note',
    data(){
        return {
            annees:[],
            inscriptions:[],
            filteredInscriptions:[],
            departements:[],
            filieres:[],
            cycles:[],
            semestres:[],
            ues:[],
            selectedAnnee:{},
            selectedDep:{},
            selectedFiliere:{},
            selectedCycle:{},
            selectedSemestre:{},
            selectedMatiere:{},
            etudiants:[],
            credits:[],
            filteredCredits:[],
            selectedAnneeId:null,
            selectedFiliereId:null,
            selectedCycleId:null,
            selectedSemestreId:null,
            selectedCreditId : null,
            // selectedMatiereId:null,
            matieres:[],
            notes:[],
            filteredNotes:[],
            selectedCredit:{},
            showDevoirInputs:false,
            showExamInputs:false,
            showRattrapInputs:false,
        }
    },
    mounted(){
        this.initView()
        this.loadDatas()
    },
    computed:{
        ready(){
            return this.selectedAnneeId!=null
            && this.selectedFiliereId!= null
            && this.selectedCycleId!=null;
        },
        getInscriptions(){
            if(this.ready){
                return this.inscriptions.filter(i=>
                i.annee_id==this.selectedAnneeId &&
                i.filiere_id==this.selectedFiliereId &&
                i.cycle_id==this.selectedCycleId)
            }
        },
        getNotes(){

            let notes =  this.notes.filter(n=>n.annee_id==this.selectedAnneeId &&
                n.filiere_id == this.selectedFiliereId &&
                n.semestre_id == this.selectedSemestreId &&
                n.matiere_id == this.selectedCreditId
            )
            console.log("notes",notes)
            return notes
        }
    },
    methods:{
        initView(){
            $('#select2-annee').select2().on('change',(e)=>{
                this.selectedAnnee = this.annees.find(a=>a.id==$('#select2-annee').val())
                this.selectedAnneeId = $('#select2-annee').val()
                this.filteredInscriptions = this.inscriptions.filter(i=>i.filiere_id==this.selectedFiliere.id && i.annee_id==this.selectedAnneeId && i.cycle_id==this.selectedCycleId)
                /*let insc_ids = []
                this.filteredInscriptions.forEach(i=>{
                    insc_ids.push(i.id)
                })
                console.log(insc_ids)
                this.filteredNotes = this.notes.filter(n=>insc_ids.includes(insc_ids))*/
                // console.log("Inscriptions",this.filteredInscriptions)
                /*this.filteredInscriptions.forEach(i=>{
                    this.etudiants.push(i.etudiant)
                })*/

            });

            $('#select2-filiere').select2().on('change',(e)=>{
                $('#select2-matiere').empty()
                this.selectedFiliere = this.filieres.find(f=>f.id==$('#select2-filiere').val())
                this.selectedFiliereId = $('#select2-filiere').val()
                this.filteredInscriptions = this.inscriptions.filter(i=>i.filiere_id==this.selectedFiliere.id && i.annee_id==this.selectedAnneeId && i.cycle_id==this.selectedCycleId)
                // this.filteredCredits = this.credits.filter(c=>c.filiere_id==this.selectedFiliere.id)
                this.filteredCredits = this.credits.filter(c=>c.filiere_id == this.selectedFiliereId && c.semestre_id == this.selectedSemestreId)
                // console.log("Credits",this.filteredCredits)
                /*let insc_ids = []
                this.filteredInscriptions.forEach(i=>{
                    insc_ids.push(i.id)
                })
                console.log(insc_ids)
                this.filteredNotes = this.notes.filter(n=>insc_ids.includes(insc_ids))*/
                // console.log("Inscriptions",this.filteredInscriptions)
                let matiereOptions = [{
                    id:"",
                    text:"Selectionner une matiere",
                    disabled:true,
                    selected:true
                }]
                this.filteredCredits.forEach(c=>{
                    // this.matieres.push(c.matiere)
                    // id = credit.id poour faire référence au crédit à valider
                    matiereOptions.push({
                        id:c.id,
                        text:c.matiere.nom+' ('+c.credits+' crédits)'
                    });
                    $('#select2-matiere').empty()
                    $('#select2-matiere').select2({
                        data:matiereOptions
                    })
                })
            });

            $('#select2-cycle').select2().on('change',(e)=>{
                $('#select2-matiere').empty()
                this.selectedCycle = this.cycles.find(c=>c.id==$('#select2-cycle').val())
                this.selectedCycleId = $('#select2-cycle').val()
                this.filteredInscriptions = this.inscriptions.filter(i=>i.filiere_id==this.selectedFiliere.id && i.annee_id==this.selectedAnneeId && i.cycle_id==this.selectedCycleId)
                // console.log("Inscriptions",this.filteredInscriptions)
                /*let insc_ids = []
                this.filteredInscriptions.forEach(i=>{
                    insc_ids.push(i.id)
                })
                console.log(insc_ids)
                this.filteredNotes = this.notes.filter(n=>insc_ids.includes(insc_ids))*/
                let semestreOptions = [{
                    id:"",
                    text:"Selectionner un semestre",
                    disabled:true,
                    selected:true
                }]
                this.selectedCycle.semestres.forEach(s=>{
                    semestreOptions.push({
                        id:s.id,
                        text:s.nom
                    });
                    $('#select2-semestre').empty()
                    $('#select2-semestre').select2({
                        data:semestreOptions
                    })
                })
            });

            $('#select2-semestre').select2().on('change',(e)=>{
                $('#select2-matiere').empty()
                this.selectedSemestre = this.semestres.find(s=>s.id==$('#select2-semestre').val())
                this.selectedSemestreId = $('#select2-semestre').val()
                // this.filteredCredits = this.credits.filter(c=>c.semestre_id==this.selectedSemestre.id)
                this.filteredCredits = this.credits.filter(c=>c.filiere_id == this.selectedFiliereId && c.semestre_id == this.selectedSemestreId)
                // console.log("Credits",this.filteredCredits)
                let matiereOptions = [{
                    id:"",
                    text:"Selectionner une matiere",
                    disabled:true,
                    selected:true
                }]
                this.filteredCredits.forEach(c=>{
                    // this.matieres.push(c.matiere)
                    matiereOptions.push({
                        // id = credit.id poour faire référence au crédit à valider
                        id:c.id,
                        text:c.matiere.nom+' ('+c.credits+' crédits)'
                    });
                    $('#select2-matiere').empty()
                    $('#select2-matiere').select2({
                        data:matiereOptions
                    })
                })
            });

            $('#select2-matiere').select2().on('change',(e)=>{
                this.selectedCreditId = $('#select2-matiere').val()
                this.selectedCredit = this.filteredCredits.find(c=>c.id==this.selectedCreditId)
                // let x = this.getCredits

            });

        },
        loadDatas(){
            this.loading()
            instance.get('notes/load_datas').then(res=>{
                console.log(res.data)
                this.annees = res.data.annees
                this.inscriptions = res.data.inscriptions
                this.filteredInscriptions = res.data.inscriptions
                this.departements = res.data.departements
                this.cycles = res.data.cycles
                this.ues = res.data.ues
                this.filieres = res.data.filieres
                this.credits = res.data.credits
                this.filteredCredits = res.data.credits
                this.semestres = res.data.semestres
                this.notes = res.data.notes
                // this.filteredNotes = res.data.notes
                $.unblockUI()
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

        devoirCaseClick(){
            this.showDevoirInputs = true
            this.showExamInputs = false
            this.showRattrapInputs = false
        },
        hideDevoirInputs(){
            this.showDevoirInputs = false
        },

        examCaseClick(){
            this.showExamInputs = true
            this.showDevoirInputs = false
            this.showRattrapInputs = false
        },
        hideExamInputs(){
            this.showExamInputs = false
        },

        rattrapCaseClick(){
            // alert()
            this.showRattrapInputs = true
            this.showDevoirInputs = false
            this.showExamInputs = false
        },
        hideRattrapInputs(){
            this.showRattrapInputs = false
        },

        updateNoteAndEscape(note){
            this.showRattrapInputs = false
            this.showDevoirInputs = false
            this.showExamInputs = false
            instance.post('update_note',note).then(res=>{
                console.log(res.data)
            }).catch(err=>{
                console.log(err.response.data)
            })
        },



        updateNote(note){
            // console.log(note)
            instance.post('update_note',note).then(res=>{
                console.log(res.data)
            }).catch(err=>{
                console.log(err.response.data)
            })
        },



        getCredits(){
            return this.selectedCredit.credits
        }
    }
}

let vm = new Vue({
    el:'#app',
    data:{},
    components:{ Note }
})