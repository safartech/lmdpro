@extends('layouts.default')

@section('css')@endsection
@section('js')

    <template id="etudiant">
        <div class="row">
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <label class="modal-title text-text-bold-600" id="myModalLabel33">Inline Login Form</label>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <label>Nom: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Email Address" class="form-control" v-model="updateEtudiant.etunom">
                                </div>
                                <label>Prenoms: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Email Address" class="form-control" v-model="updateEtudiant.etup">
                                </div>

                                <label>Email: </label>
                                <div class="form-group">
                                    <input type="email" placeholder="Email" class="form-control" v-model="updateEtudiant.etumail">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Annuler">
                                <input type="submit" class="btn btn-outline-primary btn-lg" value="Modifier" @click="Edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table head options with primary background</h4>
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

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary white">
                                <tr>
                                    <th>N°</th>
                                    <th>Nom & Prenom</th>
                                    <th>Sexe</th>
                                    <th>Departement</th>
                                    <th>Filiere</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(Etudiant,i) in Etudiants">
                                    <td>@{{ i+1 }}</td>
                                    <td>@{{ Etudiant.etunom }}  @{{Etudiant.etup}}</td>
                                    <td>@{{ Etudiant.etusexe }}</td>
                                    <td>@{{ Etudiant.depnom }}</td>
                                    <td>@{{ Etudiant.filnom }} | @{{ Etudiant.cyclenom }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-min-width mr-1 mb-1" @click="showEditorModal(Etudiant)"><i class="la la-edit"></i>  Info</button>
                                        <button type="button" class="btn btn-danger btn-min-width mr-1 mb-1"><i class="la la-trash"></i>  Danger</button>
                                    </td>
                                </tr>



                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script type="module" src="{{ asset('js/app/etudiants.js') }}"></script>
@endsection


@section('header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">LMD PRO</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Etudiants</a>
                    </li>

                </ol>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <Etudiant></Etudiant>
@endsection
