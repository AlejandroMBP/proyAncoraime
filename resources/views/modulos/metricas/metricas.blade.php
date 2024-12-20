@extends('Administrador.app')

@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

                <li class="active">Metricas</li>
            </ol>
        </section>
        <!-- Counters Section Starts -->
        <div class="dashboard1">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="counter-box">
                        <div class="shadow bg1">
                            <div class="text-white text-center">
                                <i class="fa fa-user-o fa-2x"></i>
                                <div class="mt-2">Visitors</div>
                                <h3 class="mt-1 count">10000</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="counter-box">
                        <div class="shadow bg2">
                            <div class="text-center text-white">
                                <i class="fa fa-money fa-2x"></i>
                                <div class="mt-2">Total Earning</div>
                                <div class="money">
                                    <h3>$</h3>
                                    <h3 class="mt-1 count">75800</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="counter-box">
                        <div class="shadow bg3">
                            <div class="text-center text-white">
                                <i class="fa fa-thumbs-o-up fa-2x"></i>
                                <div class="mt-2">Total Likes</div>
                                <h3 class="mt-1 count">5000</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="counter-box">
                        <div class="shadow bg4">
                            <div class="text-center text-white">
                                <i class="fa fa-opencart fa-2x"></i>
                                <div class="mt-2">Order Placed</div>
                                <h3 class="mt-1 count">7000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counters Section Ends -->
            <!-- Chart Section Starts -->
            <div class="row chartjs">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="cardbg">
                        <h6 class="title-inner text-uppercase">Population Growth</h6>
                        <div class="chart-wrapper">
                            <canvas id="grouped-bar-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="cardbg">
                        <h6 class="title-inner text-uppercase">World Population</h6>
                        <div class="chart-wrapper">
                            <canvas id="multiline-doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chart Section Ends -->
            <!-- Client Section Starts -->
            <div class="row">
                <div class="col-xl-9 col-lg-6 col-12">
                    <div class="cardbg">
                        <h6 class="title-inner text-uppercase">Clients</h6>
                        <div class="table-responsive">
                            <table class="table m-0 table-striped">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Ordered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Mary</td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley</td>
                                        <td>Greer</td>
                                        <td>bradley@example.com</td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td>Brenden</td>
                                        <td>Wagner</td>
                                        <td>brenden@example.com</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle</td>
                                        <td>Williamson</td>
                                        <td>brielle@example.com</td>
                                        <td>04</td>
                                    </tr>
                                    <tr>
                                        <td>Bruno</td>
                                        <td>Dooley</td>
                                        <td>bruno@example.com</td>
                                        <td>09</td>
                                    </tr>
                                    <tr>
                                        <td>Caesar</td>
                                        <td>Vance</td>
                                        <td>caesar@example.com</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric</td>
                                        <td>Kelly</td>
                                        <td>cedric@example.com</td>
                                        <td>14</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Client Section Ends -->
                <!-- Profile Section Starts -->
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="cardbg">
                        <img class="card-img-top" src="assets/images/img_avatar2.png" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer
                            </p>
                            <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
                    </div>
                </div>
                <!-- Profile Section Ends -->
            </div>
            <div class="row">
                <!-- Order Section Starts -->
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="cardbg">
                        <h6 class="title-inner text-uppercase">Completed Order</h6>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Apple</span>
                                <span class="float-right">10%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Samsung</span>
                                <span class="float-right">40%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                    role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Motorola</span>
                                <span class="float-right">50%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated"
                                    role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Lenovo</span>
                                <span class="float-right">70%</span>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
                                    role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Order Section Ends -->
                <!-- Order Review Section Starts -->
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="cardbg">
                        <h6 class="title-inner text-uppercase">Order Review</h6>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Placed</span>
                                <span class="float-right">1000</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-animated" role="progressbar" style="width: 90%"
                                    aria-valuenow="1000" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Confirmed</span>
                                <span class="float-right">900</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-animated" role="progressbar"
                                    style="width: 75%" aria-valuenow="900" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Success</span>
                                <span class="float-right">800</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-animated" role="progressbar"
                                    style="width: 60%" aria-valuenow="800" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title">Cancelled</span>
                                <span class="float-right">100</span>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar bg-danger progress-bar-animated" role="progressbar"
                                    style="width: 20%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Order Review Section Ends -->
                <!-- Social Section Starts -->
                <div class="col-xl-4 col-lg-12 col-12">
                    <div class="cardbg">
                        <h6 class="title-inner text-uppercase">Social Traffic</h6>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title"><i class="fa fa-instagram"></i></span>
                                <span class="float-right instagram">Instgram</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-insta progress-bar-striped progress-bar-animated"
                                    role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                    aria-valuemax="100">45%</div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title"><i class="fa fa-twitter"></i></span>
                                <span class="float-right twitter">Twitter</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-twitter progress-bar-animated"
                                    role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                    aria-valuemax="100">40%</div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title"><i class="fa fa-facebook"></i></span>
                                <span class="float-right facebook">Facebook</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-facebook progress-bar-animated"
                                    role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100">50%</div>
                            </div>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title mb-2">
                                <span class="title"><i class="fa fa-linkedin"></i></span>
                                <span class="float-right linkedin">Linkedin</span>
                            </div>
                            <div class="progress mb-0">
                                <div class="progress-bar progress-bar-striped bg-linkedin progress-bar-animated"
                                    role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100">70%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Section Ends -->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- estos escripts son necesarios para mostrar esta vista se agrega con un push --}}
    <script src="assets/js/charts/Chart.bundle.min.js"></script>
    <script src="assets/js/charts/bar/grouped-bar-chart.js"></script>
    <script src="assets/js/charts/pie/doughnut-chart-multiline.js"></script>
    <script src="assets/js/dashboard/dashboard1.js"></script>
@endpush
