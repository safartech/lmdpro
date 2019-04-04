@extends('layouts.default')

@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}" xmlns: xmlns:
          xmlns: xmlns: xmlns:>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <!-- END VENDOR CSS-->

@endsection

@section('js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/echarts/echarts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/project-bug-list.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/project-summary-bug.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/ui/jquery-ui/date-pickers.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

    <template id="note">
        <div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Paramètres</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Années universitaires: </label>
                                                <select id="select2-annee" class="select2 form-control">
                                                    <option value=""  selected disabled>Selectionner une année</option>
                                                    <option v-for="annee in annees" :value="annee.id">@{{ annee.annee }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Filieres: </label>
                                                <select id="select2-filiere" class="select2 form-control">
                                                    <option value=""  selected disabled>Selectionner une filiere</option>
                                                    <optgroup v-for="dep in departements" :label="dep.nom">
                                                        <option v-for="filiere in dep.filieres" :value="filiere.id">@{{ filiere.nom }}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cycles: </label>
                                                <select id="select2-cycle" class="select2 form-control">
                                                    <option value=""  selected disabled>Selectionner une cycle</option>
                                                    <option v-for="cycle in cycles" :value="cycle.id">@{{ cycle.nom }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Semestre: </label>
                                                <select id="select2-semestre" class="select2 form-control">
                                                    <option value=""  selected disabled>Selectionner un semestre</option>
                                                    {{--<option v-for="semestre in semestres" :value="semestre.id">@{{ semestre.nom }}</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Matières: </label>
                                                <select id="select2-matiere" class="select2 form-control">
                                                    <option value=""  selected disabled>Selectionner une matiere</option>
                                                    {{--<option v-for="c in getCredits" value="">@{{ c.id }}</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des étudiants (@{{ getNotes.length }} étudiants)</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inlineForm"><i class="ft-plus white"></i> Définir un nouveau crédit</button>
                                    <span class="dropdown">
                        <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>
                        <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="la la-calendar"></i> Due Date</a>
                            <a href="#" class="dropdown-item"><i class="la la-random"></i> Priority </a>
                            <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i> Progress</a>
                            <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign to</a>
                        </span>
                    </span>
                                    <a class="btn btn-success btn-sm" data-action="collapse"><i class="ft-minus white"></i></a>
                                    <a class="btn btn-success btn-sm" data-action="reload"><i class="ft-rotate-cw white"></i></a>
                                    <a class="btn btn-success btn-sm" data-action="expand"><i class="ft-maximize white"></i></a>
                                    <button class="btn btn-success btn-sm"><i class="ft-settings white"></i></button>
                                    {{--<ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>--}}

                                </div>

                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Task List table -->
                                    <div class="">
                                        <table class="table table-striped table-hover table-sm table-bordered " >
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                {{--<th colspan="2" class="text-center">Etudiants</th>--}}
                                                <th class="text-center">Nom</th>
                                                <th class="text-center">Prénoms</th>
                                                <th class="text-center">Devoir</th>
                                                <th class="text-center">Examen</th>
                                                <th class="text-center">Rattrapage</th>
                                                {{--<th class="text-center">Crédits</th>--}}
                                                <th class="text-center">Validation</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-if="getNotes.length==0">
                                                <td class="text-center" colspan="7">Aucun étudiant trouvé.</td>
                                            </tr>
                                            <tr v-for="(note,i) in getNotes">
                                                <td class="text-center">@{{ i+1 }}</td>
                                                <td class="text-center">@{{ note.etudiant.nom }}</td>
                                                <td class="text-center">@{{ note.etudiant.prenoms }}</td>
                                                <td class="text-center" @click="devoirCaseClick()">
                                                    <span v-show="!showDevoirInputs">@{{ note.devoir }}</span>
                                                    <input  type="number" min="0" max="20" class="form-control" :disabled="selectedCreditId==null" @keyup.enter="updateNoteAndEscape(note)" @keyup.esc="updateNoteAndEscape(note)" @blur="updateNote(note)" v-model="note.devoir"   v-show="showDevoirInputs">
                                                </td>
                                                <td class="text-center" @click="examCaseClick()">
                                                    <span v-show="!showExamInputs">@{{ note.examen }}</span>
                                                    <input  type="number" min="0" max="20" class="form-control" :disabled="selectedCreditId==null" @keyup.enter="updateNoteAndEscape(note)" @keyup.esc="updateNoteAndEscape(note)" @blur="updateNote(note)" v-model="note.examen"   v-show="showExamInputs">
                                                </td>
                                                <td class="text-center" @click="rattrapCaseClick()">
                                                    <span v-show="!showRattrapInputs">@{{ note.rattrapage }}</span>
                                                    <input  type="number" min="0" max="20" class="form-control" :disabled="selectedCreditId==null" @keyup.enter="updateNoteAndEscape(note)" @keyup.esc="updateNoteAndEscape(note)" @blur="updateNote(note)" v-model="note.rattrapage"   v-show="showRattrapInputs">
                                                </td>
                                                {{--<td class="text-center">@{{ getCredits() }}</td>--}}
                                                <td class="text-center"><span class="badge badge-danger">Non validé</span></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal -->
        </div>
    </template>

    <script type="module" src="{{ asset('js/app/notes.js') }}"></script>
@endsection


@section('header')
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Gestion des notes</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    {{--<li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Apps</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Project</a>
                    </li>--}}
                    <li class="breadcrumb-item active">Notes de contrôle (ou devoir), d'examen et de rattrapage des étudiants.
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
        </div>
    </div>
@endsection

@section('content')

    <Note></Note>

@endsection
