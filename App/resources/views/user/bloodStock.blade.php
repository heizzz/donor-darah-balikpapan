@extends('layouts.app')

@section('title', 'Stok Darah')
@section('backPage', route('home'))

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-8 offset-md-2 mb-3">
        <label for="id" class="form-label">Lokasi</label>
        <select class="form-select form-select-large" name="id" id="id">
            @if(!isset($id))
                <option value="Seluruh Rumah Sakit" id="default" selected>Seluruh Rumah Sakit</option>
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}" id="{{ route('user-stock-detail', $hospital->id) }}">{{ $hospital->name }}</option>
                @endforeach
            @else
            <option value="Seluruh Rumah Sakit" id="default">Seluruh Rumah Sakit</option>
                @foreach ($hospitals as $hospital)
                    @if($hospital->id == $id)
                        <option value="{{ $hospital->id }}" id="{{ route('user-stock-detail', $hospital->id) }}" selected>{{ $hospital->name }}</option>
                    @else
                        <option value="{{ $hospital->id }}" id="{{ route('user-stock-detail', $hospital->id) }}">{{ $hospital->name }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
    <div id="main" class="w-100" style="height: 480px;"></div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.common.min.js"></script>
    <script type="text/javascript">
        $('select#id').on('change', function(e) {
            console.log(e);
            var link = e.target.selectedOptions[0].getAttribute("id");
            if (link == "default") {
                location.href = "{{ route('user-stock-index' )}}";
            } else {
                location.href = link;
            }

            // blum main AJAX
        });
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('main'));
        var xAxisData = [];
        var seriesData = [];

        @foreach($bloodStocks as $bloodstock)
            xAxisData.push('{{$bloodstock->name}}');
            seriesData.push('{{$bloodstock->totalBlood}}');
        @endforeach

        // Specify the configuration items and data for the chart
        var chartTitle = 'Stok Darah sekitar Balikpapan';
        // {{-- @if('{{$id}}' != null)
        //      chartTitle = 'Stok Darah di {{ $rsName }}'
        // @endif --}}
        var option = {
        title: {
            text: chartTitle
        },
        tooltip: {},
        legend: {
            data: ['Jumlah'],
            orient: 'vertical',
            right: 'center',
            bottom: 0,
        },
        xAxis: {
            data: xAxisData
        },
        yAxis: {},
        series: [
            {
                name: 'Jumlah',
                type: 'bar',
                data: seriesData
            }
        ]
        };

        // Display the chart using the configuration items and data just specified.
        myChart.setOption(option);
        myChart.resize();

        $(window).on('resize', function(){
            if(myChart != null && myChart != undefined){
                myChart.resize();
            }
        });
    </script>
@endsection
