@extends('layouts.main2')

@section('content')

<div class="row">

    <script>
        var url = "{{url('/statistics/get')}}";
        var Countries = new Array();
        var Stats = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            //debugger;
            response.data.forEach(function(data){
                Countries.push(data.country);
                Stats.push(data.stats);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  responsive: true,
                  aspectRatio: 1,
                  data: {
                      labels:Countries,
                      datasets: [{
                          label: 'Ilość mieszkańców',
                          data: Stats,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
        </script>

<div class="title m-b-md">
    Statystyki
</div>

<div class="col-md-10 col-md-offset-1">

    <div class="panel panel-default">
        <div class="panel-heading"><b>Ilość mieszkańców w danym kraju</b></div>
        <div class="panel-body">
            <canvas id="canvas" width="100%"></canvas>
        </div>
    </div>

</div>


</div>
@endsection