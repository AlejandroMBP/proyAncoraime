@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Advanced Table
                <small>Tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Adavanced Tables</a></li>
                <li class="active">Basic Table</li>
            </ol>
            <div class="heading-title">
                <p>For more information please refer the link <a target="_blank"
                        href="https://datatables.net/">DataTables</a>.</p>
            </div>
        </section>

        <div class="card panel panel-default">
            <div class="card-header" id="headingTwo">
                <div class="panel-heading">
                    <h6 class="title-inner text-uppercase">Documentos</h6>
                </div>
            </div>
            <div id="collapseTwo" class="collapse show p-4" aria-labelledby="headingTwo" data-parent="#accordion">
                <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Extn.</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Michael</td>
                            <td>Bruce</td>
                            <td>Javascript Developer</td>
                            <td>Singapore</td>
                            <td>29</td>
                            <td>2011/06/27</td>
                            <td>$183,000</td>
                            <td>5384</td>
                            <td>m.bruce@datatables.net</td>
                        </tr>
                        <tr>
                            <td>Donna</td>
                            <td>Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                            <td>4226</td>
                            <td>d.snider@datatables.net</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('links')
    <link rel="stylesheet" href="{{ asset('assets/css/tables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tables/buttons.dataTables.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/tables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/tables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/tables/datatable.js') }}"></script>
@endpush
