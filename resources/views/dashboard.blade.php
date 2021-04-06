@extends('layouts.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow bg-primary text-white border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                          </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Dossiers</p>
                                    <span class="h3 mb-0 text-white">{{$dossiers}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                          </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Ventes</p>
                                    <span class="h3 mb-0">{{$ventes}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-filter text-white mb-0"></i>
                          </span>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-0">Charges</p>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <span class="h3 mr-2 mb-0"> {{$charges}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-activity text-white mb-0"></i>
                          </span>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-0">Achats</p>
                                    <span class="h3 mb-0">{{$achats}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end section -->
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">type des comptables</strong>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor">
                        <div style="width:100%; height: 380px;" id="piechart"></div>

                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Last logged in compatble</strong>
                    <a class="float-right small text-muted" href="#!"></a>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush my-n3">
                        @foreach($users as $user)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <img src="/css/dashboard/assets/avatars/face-{{$user->id+1}}.jpg" alt="..." class="thumbnail-sm">
                                </div>
                                <div class="col">
                                    <strong>{{$user->name}}</strong>
                                    <div class="my-0 text-muted small">{{$user->role->nom}}</div>
                                </div>
                                <div class="col-auto">
                                    <strong class="badge badge-pill badge-success">{{$user->last_login}}</strong>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> <!-- / .list-group -->
                </div> <!-- / .card-body -->
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">Dossier par mois</strong>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div id="chart_div" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">Facture par mois</strong>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div id="chart_facture" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scriptJs")
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartBar);
        google.charts.setOnLoadCallback(drawChartBarFacture);


        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['pourcentage des comptable', 'pourcentage'],
                @php echo"['expert'," .$Allexpert."],"@endphp
                @php echo"['normal'," .$Allnormal."]"@endphp
            ]);

            var options = {
                title: 'Les comptables'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        function drawChartBar() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['mois', 'Dossiers', { role: 'style' }],
                @php
                    foreach ($monthlyDossier as $val){
                        echo"['".$val->month."'," .$val->data.", '#1b68ff'],";
                    }
                @endphp
            ]);

            var options = {title: 'Dossier par mois'};

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

        function drawChartBarFacture() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['mois', 'facture', { role: 'style' }],
                @php
                    foreach ($monthlyFacture as $val){
                        echo"['".$val->month."'," .$val->data.", '#3AD29F'],";
                    }
                @endphp
            ]);

            var options = {title: 'Dossier par mois'};

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_facture'));
            chart.draw(data, options);
        }


    </script>
@endsection
