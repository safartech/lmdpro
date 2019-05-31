@extends('layouts.default')

@section('css')


    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/pickers/daterange/daterange.css') }}">



@endsection
@section('js')

    <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    {{--<script src="{{ asset('app-assets/js/scripts/forms/wizard-steps.js') }}"></script>--}}

    <script type="module" src="{{ asset('js/app/inscription.js') }}"></script>



    <template id="inscription">
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Espace Inscription</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="card-text">
                                    <p>This is the most basic and default form having form sections. To add form section use <code>.form-section</code> class with any heading tags. This form has the buttons on the bottom left corner which is the default position.</p>
                                </div>
                                <form class="form">
                                    <div class="form-body">
                                        <h4 class="form-section text-uppercase"><i class="ft-user"></i> Identité</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">Nom</label>
                                                    <input type="text"  class="form-control" placeholder="Nom"  v-model="newInscription.nom">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Prénoms</label>
                                                    <input type="text"  class="form-control" placeholder="Prénoms"   v-model="newInscription.prenoms">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Nom de jeune fille</label>
                                                    <input type="text"  class="form-control" placeholder="Nom Jeune Fille" v-model="newInscription.nom_jeune">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Telephone</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Téléphone"  v-model="newInscription.telephone">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">date de naissance</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Date de Naissance"  v-model="newInscription.date_nsce">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">lieu de naissance</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Lieu de Naissance"  v-model="newInscription.lieu_nsce">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Pays</label>
                                                    <select id="projectinput5" v-model="newInscription.pays" class=" form-control">
                                                        <option value="Togo" selected="" > Togo</option>
                                                        <option value="Benin" selected="" > Benin</option>
                                                        <option value="Gabon" selected="" > Gabon</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Nationalité</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Nationalité" v-model="newInscription.nationalite" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Ethnie</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Ethnie" v-model="newInscription.ethnie" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">Préfecture</label>
                                                    <input type="text" id="projectinput4" class="form-control" placeholder="Préfecture" v-model="newInscription.prefecture">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Sexe</label>
                                                    <fieldset class="text-center">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input bg-primary" v-model="newInscription.sexe" value="M" name ="homme" id="colorRadio1">
                                                            <label class="custom-control-label" for="colorRadio1">Homme</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input bg-warning " v-model="newInscription.sexe" value="F" name="femme" id="colorRadio2">
                                                            <label class="custom-control-label" for="colorRadio2">Femme</label>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Situation Familiale</label>
                                                    <fieldset class="text-center">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input " v-model="newInscription.situation_mat" name="cel" value="Célibataire" id="sf1">
                                                            <label class="custom-control-label" for="sf1">Célibataire</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input" v-model="newInscription.situation_mat" name="mar" value="Marié" id="sf2">
                                                            <label class="custom-control-label" for="sf2">Marié</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input" v-model="newInscription.situation_mat" name="div" value="Divorcé" id="sf3">
                                                            <label class="custom-control-label" for="sf3">Divorcé</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" class="custom-control-input" v-model="newInscription.situation_mat" name="veuf" value="Veuf" id="sf4">
                                                            <label class="custom-control-label" for="sf4">Veuf / Veuve</label>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Adresse</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Adresse" v-model="newInscription.adresse">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Email</label>
                                                    <input type="email" id="projectinput3" class="form-control" placeholder="E-mail" v-model="newInscription.email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Nom du Père</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Nom du Père" v-model="newInscription.nom_pere">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">Prénoms du Père</label>
                                                    <input type="text" id="projectinput4" class="form-control" placeholder="Prénoms du père" v-model="newInscription.prenoms_pere">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput3">Profession du Père</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Profession du père" v-model="newInscription.profession_pere">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Nom de la  Mère</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="nom de la Mère"  v-model="newInscription.nom_mere">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">Prénoms de la  Mère</label>
                                                    <input type="text" id="projectinput4" class="form-control" placeholder="Prénoms de la Mère"  v-model="newInscription.prenoms_mere">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput3">Profession de la Mère</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Profession Mère"  v-model="newInscription.profession_mere">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Personne à prévenir</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Personne à Prévenir" v-model="newInscription.pers_prevenir">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">Numéro(Personne à prevenir)</label>
                                                    <input type="text" id="projectinput4" class="form-control" placeholder="Numero Personne" v-model="newInscription.prevenir_tel">
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Renseignement Baccalauréat</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Année Obtention Bac</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Année" v-model="newInscription.annee_bac">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Serie Bac</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Serie Bac" v-model="newInscription.serie_bac">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Numéro de Table (Bac)</label>
                                                    <input type="text" id="projectinput3" class="form-control" placeholder="Numéro de Table" v-model="newInscription.num_table">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">Numéro Attestation(Bac)</label>
                                                    <input type="text" id="projectinput4" class="form-control" placeholder="Numéro Attestation" v-model="newInscription. num_attestation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput2">Pays Obtention du Bac</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Pays du BAC" v-model="newInscription.pays_bac ">
                                                </div>
                                            </div>

                                        </div>


                                        <h4 class="form-section"><i class="la la-paperclip"></i> Inscription</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Année Académique</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Année Académique" v-model="newInscription.annee_id ">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput6">Domaine</label>
                                                    <select id="projectinput6" v-model="newInscription.domaine_id" class="form-control">
                                                        <option :value="domaines.id" selected=""  v-for="domaines in domaine"> @{{ domaines.nom }}</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Parcours / Grade</label>
                                                    <select id="projectinput5"v-model="newInscription.parcours_id" class="form-control">
                                                        <option :value="t_parcour.id" selected=""  v-for="t_parcour in t_parcours">@{{ t_parcour.nom }}</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput6">Mention Choisie</label>
                                                    <select id="projectinput6" v-model="newInscription.mention_id" class="form-control">
                                                        <option :value="mention.id" selected=""  v-for="mention in mentions">@{{ mention.nom }}</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Spécialité Choisie</label>
                                                    <select id="projectinput5" v-model="newInscription.filiere_id" class="form-control">
                                                        <option :value="filiere.id" selected=""  v-for="filiere in filieres">@{{ filiere.nom }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput5">Cycle</label>
                                                    <select id="projectinput5" v-model="newInscription.cycle_id" class="form-control">
                                                        <option :value="cycles.id" selected="" v-for="cycles in cycle">@{{ cycles.nom }}</option>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Etude Antérieur depuis l'obtion du Bac</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Année Antérieur</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Année Antérieur" v-model="newInscription.annee_ant ">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Université Précédante</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Université" v-model="newInscription.univ_ant " >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Domaine</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Domaine" v-model="newInscription.domaine_ant ">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Etablissement</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Etablissement Antérieur" v-model="newInscription.etabliss_ant ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput2">Parcours</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Parcours Antérieur" v-model="newInscription.parcours_ant ">
                                                </div>
                                            </div>

                                        </div>






                                    </div>

                                    <div class="form-group float-right">
                                        <button type="button" class="btn btn-info mr-1  btn-sm" @click="addEtudiant()">
                                            <i class="la la-check-square-o"></i> Soumettre
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </section>

    </template>

    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>


@endsection

@section('content')



    <Inscription></Inscription>
@endsection



