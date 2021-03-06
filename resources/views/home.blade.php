@extends('layouts.base')

@section('title', 'Duration of service')
@section('content')
    <p>
    <li>This graph is about duration of service at "employee" table.</li>
    </p>

    <div class="container">
        <div class="data">
            <table>
            <tr><th>duration</th><th>count</th></tr>
            @foreach ($employees_num as $en)
                <tr>
                <td>{{$loop->index}}</td>
                <td>{{$en}}</td>
                </tr>
            @endforeach
            </table>
        </div>
        <br>

        <div class="graph">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script type="text/javascript" src="https://github.com/nagix/chartjs-plugin-colorschemes/releases/download/v0.2.0/chartjs-plugin-colorschemes.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    @foreach ($employees_num as $en)
                        "{{$loop->index}}",
                    @endforeach
                    ],
                datasets: [{
                    data: [
                        @foreach ($employees_num as $en)
                            {{$en}},
                        @endforeach
                    ]
                }]
            },
            options: {
                hover: {mode: null},
                title: {
                    display: true,
                    text: 'Duration of Service'
                },
                plugins: {
                    colorschemes: {
                        scheme: 'brewer.Paired12'
                    }
                }
            }
        });
    </script>
@endsection