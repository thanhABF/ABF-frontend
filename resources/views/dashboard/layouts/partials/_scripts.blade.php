<!-- JavaScript -->
<script src="{{ asset('assets/js/bundle.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/charts/gd-analytics.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/libs/jqvmap.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/charts/gd-default.js?ver=2.1.0') }}"></script>


@if(Route::currentRouteName() == 'dashboard.index' xor Route::currentRouteName() == 'dashboard.indext')
<script type="text/javascript">
var tradesData = {
  //labels: ["01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan", "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan", "17 Jan", "18 Jan", "19 Jan", "20 Jan", "21 Jan", "22 Jan", "23 Jan", "24 Jan", "25 Jan", "26 Jan", "27 Jan", "28 Jan", "29 Jan", "30 Jan"],
  labels: <?php echo $date_chart; ?>,
  dataUnit: 'BTC',
  lineTension: .1,
  datasets: [{
    label: "Current Month",
    color: "#798bff",
    dash: 0,
    background: NioApp.hexRGB('#798bff', .15),
    //data: [0.1, 0.08, 0.12, 0.18, 0.09, 0.14, 0.15, 0.2, 0.14, 0.13, 0.21, 0.16, 0.17, 0.09, 0.04, 0.06, 0.1, 0.08, 0.12, 0.2, 0.18, 0.16, 0.22, 0.15, 0.16, 0.13, 0.18, 0.21, 0.12, 0.16]
    data: <?php echo $profit_chart; ?>
  }]
};

var barChartData = {
  //labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
  labels: <?php echo $date_chart; ?>,
  dataUnit: '',
  datasets: [{
    label: "",
    color: "#9cabff",
    //data: [-110, 80, 125, 55, 95, 75, 90, 110, 80, 125, 55, 95, 75, 90, 110, 80, 125, 55, 95, 75, 90, 110, 80, 125, 55, 95, 75, 90, 75, 90]
    data: <?php echo $netprofitpercent_chart; ?>
  }]
};

var barChartDataProfit = {
  //labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
  labels: <?php echo $date_chart; ?>,
  dataUnit: '',
  datasets: [{
    label: "NetProfit, BTC",
    color: "#9cabff",
    //data: [-110, 80, 125, 55, 95, 75, 90, 110, 80, 125, 55, 95, 75, 90, 110, 80, 125, 55, 95, 75, 90, 110, 80, 125, 55, 95, 75, 90, 75, 90]
    data: <?php echo $profit_chart; ?>
  }]
};
</script>
@endif

@if(Route::currentRouteName() == 'dashboard.indext2')
<script type="text/javascript">
var tradesData = {
  labels: ["01 Apr", "02 Apr", "03 Apr", "04 Apr", "05 Apr", "06 Apr", "07 Apr", "08 Apr", "09 Apr", "10 Apr", "11 Apr", "12 Apr", "13 Apr", "14 Apr", "15 Apr", "16 Apr", "17 Apr", "18 Apr", "19 Apr", "20 Apr", "21 Apr", "22 Apr", "23 Apr", "24 Apr", "25 Apr", "26 Apr", "27 Apr", "28 Apr", "29 Apr", "30 Apr"],
  dataUnit: '%',
  lineTension: .1,
  datasets: [{
    label: "Current Month",
    color: "#798bff",
    dash: 0,
    background: NioApp.hexRGB('#798bff', .15),
    data: [-0.26, 0.04, 0.75, 1.04, 1.22, 1.94, 1.9, 2.00, 2.02, 2.1, 2.12, 2.52, 3.14, 4.45, 4.74, 5.11, 5.04, 5.49, 5.89, 6.04, 6.10, 6.82, 6.98, 7.14, 7.63, 8.03, 8.22, 8.24, 8.63, 8.98]
  }]
};
</script>
@endif

@if(Route::currentRouteName() == 'dashboard.invoices')
<script type="text/javascript">
NioApp.DataTable.init = function () {
  NioApp.DataTable('.invoiceTable', {
    "order": [[ 0, "desc" ]]
  });
  //$.fn.DataTable.ext.pager.numbers_length = 7;
}; // Extra @v1.1
</script>
@endif

<script src="{{ asset('assets/js/example-chart.js?ver=2.1.0') }}"></script>
