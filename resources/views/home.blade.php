@extends('layouts.default')

@section('css')@endsection
@section('js')@endsection


@section('header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Bordered Navigation</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Navigation</a>
                    </li>
                    <li class="breadcrumb-item active">Bordered Navigation
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
            <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    WELCOME TO LMDPRO
    <section id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">Description</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="card-text">
                    <p>Bordered navigation separate first level of main navigation by adding border. You can check bordered
                        navigation on left side navigation menu.</p>
                </div>
                <div class="alert bg-success alert-icon-left mb-2" role="alert">
                    <span class="alert-icon"><i class="la la-pencil-square"></i></span>
                    <strong>Experience it!</strong>
                    <p>This page contain navigation menu with bordered options example, check at the left hand side of the
                        page.</p>
                </div>
            </div>
        </div>
    </section>
    <!--/ Description -->
    <!-- CSS Classes -->
    <section id="css-classes" class="card">
        <div class="card-header">
            <h4 class="card-title">CSS Classes</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="card-text">
                    <p>This table contains all classes related to the vertical bordered navigation option.</p>
                    <p>All these options can be set via following classes:</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Classes</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><code>.menu-bordered</code></th>
                                <td>To create vertical bordered navigation, you need to add <code>.menu-bordered</code>
                                    class in navigation <code>&lt;div&gt;</code> tag. Refer HTML markup line no 12.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
