@extends('layouts.default')

@section('css')
!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/selects/select2.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/animate/animate.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
@endsection

@section('js')

<!-- BEGIN VENDOR JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/forms/select/form-select2.js"></script>
<script src="app-assets/js/scripts/modal/components-modal.js"></script>

    <template id="etudiant">

        <div>
            <section id="description" class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4 class="card-title">Espace des etudiants</h4>
                        <p>Gestion des etudiants</p>
                        <div class="heading-elements">
                            <button class="btn btn-success float-md-right" type="button"><i class="ft-plus icon-left"></i>Ajouter</button>
                        </div>
                    </div>

                    <div class="card-header">
                        <form class="form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5">Année académique</label>
                                            <select id="selected_annee" class="selection custom-select form-control">
                                                <option :value="0">Toutes les annees</option>
                                                <option v-for="an in annees" :value="an.id">@{{ an.annee }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5">Parcours</label>
                                            <select id="selected_parcours" class="selection custom-select form-control">
                                                <option :value="0">Tous les parcours</option>
                                                <option v-for="parc in type_parcours" :value="parc.id">@{{ parc.nom }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5">Cycle  </label>
                                            <select id="selected_cycle" class="selection custom-select form-control">
                                                <option :value="0">Tous les cycles</option>
                                                <option v-for="cyc in cycles" :value="cyc.id">@{{ cyc.nom }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5">Filiere</label>
                                            <select id="selected_filiere" class="selection custom-select form-control">
                                                <option :value="0">Toutes les filieres</option>
                                                <option v-for="fil in filieres" :value="fil.id">@{{ fil.nom }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nom et prénoms</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Telephone</th>
                                        <th class="text-center">Adresse</th>
                                        <th class="text-center">Actions disponibles</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="(insc, i) in inscriptions">
                                        <td class="text-center">@{{ i+1 }}</td>
                                        <td class="text-center">@{{ insc.etudiant.nom }} @{{ insc.etudiant.prenoms }}</td>
                                        <td class="text-center">@{{ insc.etudiant.email }}</td>
                                        <td class="text-center">@{{ insc.etudiant.telephone }}</td>
                                        <td class="text-center">@{{ insc.etudiant.adresse }}</td>
                                        <td class="text-center">
                                            <!-- <button class="btn btn-info" type="button"><i class="ft-eye"></i></button> -->
                                            <button class="btn btn-danger" type="button" data-toggle="modal" @click="showDeleteModal(insc)"><i class="ft-trash"></i></button>
                                            <button class="btn btn-primary" type="button" data-toggle="modal" @click="showUpdateModal(insc)"><i class="ft-edit"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                           </table>
                      </div>
                  </div>
              </div>

              <!--  Modal de mise a jour -->
              <div class="modal fade text-left " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                          <div class="modal-header bg-primary">
                              <h4 class="modal-title white" id="myModalLabel16">Modifier un étudiant</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                          <div class="modal-body">
                              <form class="form">
                                  <div class="form-body">
                                      <h4 class="form-section text-uppercase"><i class="ft-user"></i> Identité</h4>
                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Matricule</label>
                                                      <input type="text" v-model="oldInsc.etudiant.matricule" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Nom</label>
                                                      <input type="text" v-model="oldInsc.etudiant.nom" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Prénoms</label>
                                                      <input type="text" v-model="oldInsc.etudiant.prenoms" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Nom de jeune fille</label>
                                                      <input type="text" v-model="oldInsc.etudiant.nom_jeune" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Date de naissance</label>
                                                      <input type="date" class="form-control" v-model="oldInsc.etudiant.date_nsce">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Lieu de naissance</label>
                                                      <input type="text" v-model="oldInsc.etudiant.lieu_nsce" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Sexe</label>
                                                      <input type="text" v-model="oldInsc.etudiant.sexe" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="row">

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Pays</label>
                                                      <input type="text" v-model="oldInsc.etudiant.pays" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Ethnie</label>
                                                      <input type="text" v-model="oldInsc.etudiant.ethnie" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label for="projectinput4">Prefecture</label>
                                                      <input type="text" v-model="oldInsc.etudiant.prefecture" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">

                                          </div>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label for="projectinput5">Situation Familiale</label>
                                                      <input type="text" v-model="oldInsc.etudiant.situation_mat" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Nationalité</label>
                                                      <input type="text" v-model="oldInsc.etudiant.nationalite" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Adresse</label>
                                                      <input type="text" v-model="oldInsc.etudiant.adresse" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Email</label>
                                                      <input type="text" v-model="oldInsc.etudiant.email" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Telephone</label>
                                                      <input type="text" v-model="oldInsc.etudiant.telephone" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Nom du père</label>
                                                      <input type="text" v-model="oldInsc.etudiant.nom_pere" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Prénoms du père</label>
                                                      <input type="text" v-model="oldInsc.etudiant.prenoms_pere" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Profession du père</label>
                                                      <input type="text" v-model="oldInsc.etudiant.profession_pere" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Nom de la mère</label>
                                                      <input type="text" v-model="oldInsc.etudiant.nom_mere" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Prénoms de la  mère</label>
                                                      <input type="text" v-model="oldInsc.etudiant.prenoms_mere" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Profession de la mère</label>
                                                      <input type="text" v-model="oldInsc.etudiant.profession_mere" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">

                                          </div>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Personne à prévenir</label>
                                                      <input type="text" v-model="oldInsc.etudiant.pers_prevenir" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Téléphone (Personne à prevenir)</label>
                                                      <input type="text" v-model="oldInsc.etudiant.prevenir_tel" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <h4 class="form-section text-uppercase"><i class="la la-paperclip"></i> Baccalauréat</h4>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Pays</label>
                                                      <input type="text" v-model="oldInsc.etudiant.pays_bac" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Année</label>
                                                      <input type="text" v-model="oldInsc.etudiant.annee_bac" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Serie</label>
                                                      <input type="text" v-model="oldInsc.etudiant.serie_bac" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Numéro de table</label>
                                                      <input type="text" v-model="oldInsc.etudiant.num_table" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Numéro de l'attestation</label>
                                                      <input type="text" v-model="oldInsc.etudiant.num_attestation" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <h4 class="form-section text-uppercase"><i class="la la-paperclip"></i> Inscription</h4>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Année Académique</label>
                                                      <select class="custom-select form-control" v-model="oldInsc.annee.id">
                                                          <option v-for="an in annees" :value="an.id">@{{ an.annee }}</option>
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Parcours / Grade</label>
                                                      <select class="custom-select form-control" v-model="oldInsc.type_parcours.id">
                                                          <option v-for="typ in type_parcours" :value="typ.id">@{{ typ.nom }}</option>
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Cycle</label>
                                                      <select class="custom-select form-control" v-model="oldInsc.cycle.id">
                                                          <option v-for="cyc in cycles" :value="cyc.id">@{{ cyc.nom }}</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Domaine</label>
                                                      <select class="custom-select form-control" v-model="oldInsc.domaine.id">
                                                          <option v-for="dom in domaines" :value="dom.id">@{{ dom.nom }}</option>
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Mention</label>
                                                      <select class="custom-select form-control" v-model="oldInsc.mention.id">
                                                          <option v-for="men in mentions" :value="men.id">@{{ men.nom }}</option>
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Spécialité / Filiere</label>
                                                      <select class="custom-select form-control" v-model="oldInsc.filiere.id">
                                                          <option></option>
                                                          <option v-for="fil in filieres" :value="fil.id">@{{ fil.nom }}</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>

                                          <h4 class="form-section text-uppercase"><i class="la la-paperclip"></i> Etude antérieure depuis l'obtention du Bac</h4>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Année</label>
                                                      <input type="text" v-model="oldInsc.etudiant.annee_ant" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Université</label>
                                                      <input type="text" v-model="oldInsc.etudiant.univ_ant" class="form-control">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Etablissement</label>
                                                      <input type="text" v-model="oldInsc.etudiant.etabliss_ant" class="form-control">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Parcours</label>
                                                      <input type="text" class="form-control" v-model="oldInsc.etudiant.parcours_ant">
                                                  </div>
                                              </div>

                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label>Domaine</label>
                                                      <input type="text" class="form-control" v-model="oldInsc.etudiant.domaine_ant">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                  <div class="form-group float-right">

                                  </div>
                              </form>
                          </div>

                          <div class="modal-footer">
                              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Annuler</button>
                              <button type="button" class="btn btn-outline-primary" @click="updateEtudiant()">Modiifer</button>
                          </div>
                      </div>
                  </div>
              </div>

              <!--  Modal de suppression -->
              <div class="modal fade text-left " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header bg-danger">
                              <h4 class="modal-title white" id="myModalLabel16">Supprimer un étudiant</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                          <div class="modal-body">
                              <p class="text-center">Attention !, vous êtes sur le point de supprimer cet étudiant.<br>Voulez-vous continuer ?</p>
                          </div>

                          <div class="modal-footer">
                              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Annuler</button>
                              <button type="button" class="btn btn-outline-danger" @click="deleteEtudiant()">Supprimer</button>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>
  </template>

    <script type="module" src="{{ asset('js/app/etudiants.js') }}"></script>

@endsection

@section('content')
    <Etudiant></Etudiant>
@endsection
