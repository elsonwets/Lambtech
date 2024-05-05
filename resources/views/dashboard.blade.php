@extends('nav')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Statistiques</div>
                    <div id="myPlot" style="width:100%;max-width:700px"></div>


                    <hr>


                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
