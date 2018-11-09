var graphData = null;

$(document).ready(function () {


    //First AJAX call populates dropdown
    $.ajax({
        type: 'GET',
        url: 'https://api.fixer.io/latest?',
        success: function (data) {
            var currencyNoBase = Object.keys(data.rates);
            var currencyWithBase = currencyNoBase.concat(data.base).sort();
            //Populate dropdown lists with currency names
            $.each(currencyWithBase, function (val, text) {
                $('.currencies').append($('<option />').val(val).html(text).attr('id', text));
            });
            //Set default currencies in base and target
            $('#base').val('8');
            $('#target').val('30');
        },
        dataType: 'json'
    });

    //return selected base currency
    $('#curr1').on('input', helperUpdate);

    function helperUpdate() {
        var base = $('#base option:selected').text();
        var url = 'https://api.fixer.io/latest?base=' + base;

        updateCurrencyCalculation(url);

    }

    //Clear input fields when changing currency
    $('#base').on('change', clearInput);

    function clearInput() {
        $('#curr1').val('');
        $('#curr2').val('');
    };

    //Event recognition for target currency option change
    $('select#target').on('change', helperUpdate);

    function updateCurrencyCalculation(url) {
        //Second AJAX call sets base currency
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data2) {
                var target = $('#target option:selected').text();
                var curr1 = $('#curr1').val();
                var curr2 = $('#curr2').val();
                var converted = curr1 * data2.rates[target];

                $('#curr2').val(converted.toFixed(2));
                console.log(converted);
            },
            dataType: 'json'
        });
    }

    //Swap currencies
    function swapCurrencies() {
        var temp = $("#base").val();
        $("#base").val($("#target").val());
        $("#target").val(temp);

        helperUpdate();
    }

    $('#swap').on('click', swapCurrencies);

    //====== Fetch historical exchange rate ======// 
    function fetchHistoricalRate(baseInput, targetInput) {

        var baseTarget = baseInput + '/' + targetInput;

        $('#chart').html('<p id="loading">Fetching data... This may take a while.</p>');

        $.ajax({
            url: 'http://www.cislondon.co.uk/fx/candlestick.php?key=Iv10gxvX1uo9Qt&symbol=' + baseInput + targetInput,
            success: function (response) {
                //Optional variables for several time queries
                var responseFull = response.LT30Arr.slice(1);
                var responseYear = response.LT30Arr.slice(1).slice(-365);
                var responseHalfYear = response.LT30Arr.slice(1).slice(-180);
                var responseMonth = response.LT30Arr.slice(1).slice(-30)
                graphData = responseYear.map(function (day) {
                    return {
                        x: parseInt(Date.parse(day[0]) / 1000),
                        y: day[1]
                    };
                });

                $('#loading').hide();
                renderGraph(baseTarget);

                console.log(baseInput + targetInput);
            },
            dataType: 'jsonp'
        });
    }

    //Generate chart
    $('#history').on('click', function () {
        var base = $('#base option:selected').text();
        var target = $('#target option:selected').text();
        $('#chart').empty();
        $('#legend').empty();
        fetchHistoricalRate(base, target);
    });

});


//CHART

// instantiate graph!
function renderGraph(name) {
    var graph = new Rickshaw.Graph({
        element: document.getElementById("chart"),
        width: 800,
        height: 300,
        renderer: 'line',
        series: [
            {
                name: name, //put variable that shows currency pair
                color: "#6060c0",
                data: graphData
            }
        ],
        min: 'auto' //determines relative height of Y-axis
    });
    var time = new Rickshaw.Fixtures.Time();
    var years = time.unit('years');

    var axes = new Rickshaw.Graph.Axis.Time({
        graph: graph,
        timeUnit: years
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph
    });

    var legend = new Rickshaw.Graph.Legend({
        graph: graph,
        element: document.getElementById('legend')

    });

    axes.render();

}
