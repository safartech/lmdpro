@extends('layouts.default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
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

    <template id="credit">
        <div>

            <div class="content-detached content-right">
                <div class="content-body">
                    <section class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@{{ currentDepartement.nom }} > @{{ selectedFiliere.nom }}</h4>
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
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>UE</th>
                                                    <th>Matiere</th>
                                                    <th>Semestre</th>
                                                    <th>Crédits</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-if="currentCredits.length==0">
                                                    <td class="text-center" colspan="6">Aucun crédit disponible pour la filiere selectionnée</td>
                                                </tr>
                                                <tr v-for="(credit,i) in currentCredits">
                                                    <td>@{{ i+1 }}</td>
                                                    <td>@{{ credit.matiere.ue.nom }}</td>
                                                    <td>@{{ credit.matiere.nom }}</td>
                                                    <td>@{{ credit.semestre.nom }}</td>
                                                    <td>@{{ credit.credits }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button class="btn btn-icon btn-info mr-1 btn-sm" data-toggle="tooltip" data-placement="top" data-original-toggle="Modifier"><i class="icon-pencil"></i></button>
                                                            <button class="btn btn-icon btn-danger mr-1 btn-sm"><i class="icon-close"></i></button>
                                                        </div>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table id="project-bugs-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Bug</th>
                                                    <th>Asignee</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td><a href="#" class="text-bold-600">#425</a></td>
                                                    <td>
                                                        <a href="#" class="text-bold-600">DataTable inline editable issue</a>
                                                        <p class="text-muted font-small-2">Phasellus vel elit volutpat, egestas urna a.</p>
                                                    </td>
                                                    <td class="text-center">
					                	<span class="avatar avatar-busy">
					                		<img src="../../../app-assets/images/portrait/small/avatar-s-14.png" alt="avatar" data-toggle="tooltip" data-placement="right" title="Joe Doe"><i class=""></i>
					                	</span>
                                                    </td>
                                                    <td><span class="badge badge-danger">Reopen</span></td>

                                                    <td>
					                	<span class="dropdown">
					                        <button id="btnSearchDrop12" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
					                        <span aria-labelledby="btnSearchDrop12" class="dropdown-menu mt-1 dropdown-menu-right">
					                            <a href="#" class="dropdown-item"><i class="ft-eye"></i> Open Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-check"></i> Complete Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-upload"></i> Assign to</a>
					                            <a href="#" class="dropdown-item"><i class="ft-trash"></i> Delete Bug</a>
					                        </span>
					                    </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" class="text-bold-600">#526</a></td>
                                                    <td>
                                                        <a href="#" class="text-bold-600">Vertical menu issue on iPad</a>
                                                        <p class="text-muted font-small-2">Phasellus vel elit volutpat, egestas urna a.</p>
                                                    </td>
                                                    <td class="text-center">
					                	<span class="avatar avatar-busy">
					                		<img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar" data-toggle="tooltip" data-placement="right" title="John Doe"><i class=""></i>
					                	</span>
                                                    </td>
                                                    <td><span class="badge badge-info">In Progress</span></td>

                                                    <td>
					                	<span class="dropdown">
					                        <button id="btnSearchDrop13" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
					                        <span aria-labelledby="btnSearchDrop13" class="dropdown-menu mt-1 dropdown-menu-right">
					                            <a href="#" class="dropdown-item"><i class="ft-eye"></i> Open Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-check"></i> Complete Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-upload"></i> Assign to</a>
					                            <a href="#" class="dropdown-item"><i class="ft-trash"></i> Delete Bug</a>
					                        </span>
					                    </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" class="text-bold-600">#995</a></td>
                                                    <td>
                                                        <a href="#" class="text-bold-600">Progress bar animation improvement</a>
                                                        <p class="text-muted font-small-2">Phasellus vel elit volutpat, egestas urna a.</p>
                                                    </td>
                                                    <td class="text-center">
					                	<span class="avatar avatar-busy">
					                		<img src="../../../app-assets/images/portrait/small/avatar-s-4.png" alt="avatar" data-toggle="tooltip" data-placement="right" title="Amy Doe"><i class=""></i>
					                	</span>
                                                    </td>
                                                    <td><span class="badge badge-warning">Open</span></td>

                                                    <td>
					                	<span class="dropdown">
					                        <button id="btnSearchDrop14" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
					                        <span aria-labelledby="btnSearchDrop14" class="dropdown-menu mt-1 dropdown-menu-right">
					                            <a href="#" class="dropdown-item"><i class="ft-eye"></i> Open Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-check"></i> Complete Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-upload"></i> Assign to</a>
					                            <a href="#" class="dropdown-item"><i class="ft-trash"></i> Delete Bug</a>
					                        </span>
					                    </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" class="text-bold-600">#992</a></td>
                                                    <td>
                                                        <a href="#" class="text-bold-600">Authentication API security issue</a>
                                                        <p class="text-muted font-small-2">Phasellus vel elit volutpat, egestas urna a.</p>
                                                    </td>
                                                    <td class="text-center">
					                	<span class="avatar avatar-busy">
					                		<img src="../../../app-assets/images/portrait/small/avatar-s-5.png" alt="avatar" data-toggle="tooltip" data-placement="right" title="Joe Doe"><i class=""></i>
					                	</span>
                                                    </td>
                                                    <td><span class="badge badge-danger">Reopen</span></td>

                                                    <td>
					                	<span class="dropdown">
					                        <button id="btnSearchDrop15" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
					                        <span aria-labelledby="btnSearchDrop15" class="dropdown-menu mt-1 dropdown-menu-right">
					                            <a href="#" class="dropdown-item"><i class="ft-eye"></i> Open Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-check"></i> Complete Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-upload"></i> Assign to</a>
					                            <a href="#" class="dropdown-item"><i class="ft-trash"></i> Delete Bug</a>
					                        </span>
					                    </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" class="text-bold-600">#956</a></td>
                                                    <td>
                                                        <a href="#" class="text-bold-600">Project page chart issue</a>
                                                        <p class="text-muted font-small-2">Phasellus vel elit volutpat, egestas urna a.</p>
                                                    </td>
                                                    <td class="text-center">
					                	<span class="avatar avatar-busy">
					                		<img src="../../../app-assets/images/portrait/small/avatar-s-16.png" alt="avatar" data-toggle="tooltip" data-placement="right" title="Joe Doe"><i class=""></i>
					                	</span>
                                                    </td>
                                                    <td><span class="badge badge-info">In Progress</span></td>

                                                    <td>
					                	<span class="dropdown">
					                        <button id="btnSearchDrop16" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
					                        <span aria-labelledby="btnSearchDrop16" class="dropdown-menu mt-1 dropdown-menu-right">
					                            <a href="#" class="dropdown-item"><i class="ft-eye"></i> Open Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-edit-2"></i> Edit Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-check"></i> Complete Bug</a>
					                            <a href="#" class="dropdown-item"><i class="ft-upload"></i> Assign to</a>
					                            <a href="#" class="dropdown-item"><i class="ft-trash"></i> Delete Bug</a>
					                        </span>
					                    </span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Bug</th>
                                                    <th>Asignee</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <div class="bug-list-sidebar-content">
                        <!-- Predefined Views -->
                        <div class="card" v-for="depart in departements">
                            <div class="card-header">
                                <h4 class="card-title">@{{ depart.nom }}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                        {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                                    </ul>
                                </div>
                            </div>
                            <!-- bug-list search -->
                            <div class="card-content collapse">
                                {{--<div class="card-body border-top-blue-grey border-top-lighten-5">
                                    <div class="bug-list-search">
                                        <div class="bug-list-search-content">
                                            <form action="#">
                                                <div class="position-relative">
                                                    <input type="search" class="form-control" placeholder="Search project bugs...">
                                                    <div class="form-control-position">
                                                        <i class="ft-search text-size-base text-muted"></i>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>--}}
                                <!-- /bug-list search -->

                                <!-- bug-list view -->
                                <div class="card-body ">
                                    <ul class="nav nav-pills flex-column nav-pill-toolbar">
                                        <li class="nav-item" v-for="filiere in depart.filieres">
                                            <a class="nav-link" :id="filiere.id" data-toggle="pill" :href="filiere.nom" aria-expanded="true" @click="onFiliereSelect(filiere)">@{{ filiere.nom }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled">Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Predefined Views -->

                        <!-- Bug Progress -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bug Progress</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body ">
                                    <div id="bug-pie-chart" class="height-400 echart-container"></div>
                                </div>
                            </div>
                        </div>
                        <!--/ Bug Progress -->

                        <!-- QA Team -->
                        <div class="card">
                            <div class="card-header mb-0">
                                <h4 class="card-title">QA Team</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body  py-0 px-0">
                                    <div class="list-group">
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Margaret Govan</h6>
                                                    <p class="font-small-2 mb-0">QA Analyst</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Bret Lezama</h6>
                                                    <p class="font-small-2 mb-0">QA Person</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Carie Berra</h6>
                                                    <p class="font-small-2 mb-0">QA Manager</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">Eric Alsobrook</h6>
                                                    <p class="font-small-2 mb-0">QA Lead</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="../../../app-assets/images/portrait/small/avatar-s-8.png" alt="avatar"><i></i></span></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading mb-0">John Alsobrook</h6>
                                                    <p class="font-small-2 mb-0">QA Person</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ QA Team -->
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <label class="modal-title text-text-bold-600" id="myModalLabel33">Ajouter un nouveau crédit</label>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Filière: </label>
                                    <select id="select2-filiere" class="select2 form-control">
                                        <option value=""  selected disabled>Selectionner un filière</option>
                                        <option v-for="filiere in filieres" :value="filiere.id">@{{ filiere.nom }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Semestre: </label>
                                    <select id="select2-semestre" class="select2 form-control">
                                        <option value=""  selected disabled>Selectionner une semestre</option>
                                        <option v-for="semestre in semestres" :value="semestre.id">@{{ semestre.nom }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>UES: </label>
                                    <select id="select2-ue" class="select2 form-control">
                                        <option value=""  selected disabled>Selectionner une UE</option>
                                        <option v-for="ue in ues" :value="ue.id">@{{ ue.nom }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Matieres: </label>
                                    <select id="select2-matiere" class="select2 form-control">
                                        <option value=""  selected disabled>Selectionner une Matière</option>
                                        {{--<option v-for="matiere in matieres" :value="matiere.id">@{{ matiere.nom }}</option>--}}
                                    </select>
                                </div>

                                <label>Crédits: </label>
                                <div class="form-group">
                                    <input type="number" min="1" placeholder="Nombre de crédits" v-model="newCredit.credits" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal" value="Annuler">
                                <input type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal" value="Ajouter" v-if="validate" @click="addNewCredit()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script type="module" src="{{ asset('js/app/credits.js') }}"></script>
@endsection


@section('header')
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Listes des crédits</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    {{--<li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Apps</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Project</a>
                    </li>--}}
                    <li class="breadcrumb-item active">Attribution des crédits pour chaque filière par matiere et par semestre.
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

    <Credit></Credit>
@endsection
