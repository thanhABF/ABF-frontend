<!-- JavaScript -->
<script src="{{ asset('assets/js/bundle.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/charts/gd-analytics.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/libs/jqvmap.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/charts/gd-default.js?ver=2.1.0') }}"></script>

@if(Route::currentRouteName() == 'dashboard.index')
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
