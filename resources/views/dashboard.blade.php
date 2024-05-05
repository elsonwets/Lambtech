@extends('nav')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Statistiques</div>
                    <div id="myPlot" style="width:100%;max-width:700px"></div>

                    <script>
                        const xArray = ["Homme", "FEMME"];
                        const yArray = [14, 6];

                        const layout = { title: "Nombre de contrats CDI et CDD" };

                        const data = [{labels:xArray, values:yArray, type:"pie"}];

                        Plotly.newPlot("myPlot", data, layout);
                    </script>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">Nombre total d'étudiant</div>
                                <div class="card-body">
                                    <h2 class="card-title" style="color: #0c6af3">20</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header"> Nombre de professeur</div>
                                <div class="card-body">
                                    <h2 class="card-title" style="color: #0c6af3">9</h2>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Nombre d'administrateur</div>
                                <div class="card-body">
                                    <h2 class="card-title" style="color: #0c6af3">1</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
