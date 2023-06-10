@section('title')
    Home
@endsection
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$orderCount}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$productCount}}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$userCount}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$blogCount}}</h3>

                <p>Blogs</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="{{route('blog.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div id="products" style="height: 500px;"></div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div id="blogs" style="height: 500px;"></div>
            </div>
          </section>
          <!-- right col -->
        </div>

        <div class="row">
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div id="chart-div" style="width: 700px; height: 550px;"></div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div id="chart-div-2" style="width: 700px; height: 550px;"></div>
            </div>
          </section>
        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('js-custom')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  
  <script>
  google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

  function drawChart() {
    const dataTable = new google.visualization.DataTable();
    dataTable.addColumn({type: 'string', 'id': 'category'});
    dataTable.addColumn({type: 'number', 'id': 'amount'});
    
    dataTable.addRows(@json($revenueDatas));

    const options = {
      "vega": {
        "$schema": "https://vega.github.io/schema/vega/v4.json",
        "width": 500,
        "height": 500,
        "padding": 5,

        'data': [{'name': 'table', 'source': 'datatable'}],

        "signals": [
          {
            "name": "tooltip",
            "value": {},
            "on": [
              {"events": "rect:mouseover", "update": "datum"},
              {"events": "rect:mouseout",  "update": "{}"}
            ]
          }
        ],

        "scales": [
          {
            "name": "xscale",
            "type": "band",
            "domain": {"data": "table", "field": "category"},
            "range": "width",
            "padding": 0.05,
            "round": true
          },
          {
            "name": "yscale",
            "domain": {"data": "table", "field": "amount"},
            "nice": true,
            "range": "height"
          }
        ],

        "axes": [
          { "orient": "bottom", "scale": "xscale" },
          { "orient": "left", "scale": "yscale" }
        ],

        "marks": [
          {
            "type": "rect",
            "from": {"data":"table"},
            "encode": {
              "enter": {
                "x": {"scale": "xscale", "field": "category"},
                "width": {"scale": "xscale", "band": 1},
                "y": {"scale": "yscale", "field": "amount"},
                "y2": {"scale": "yscale", "value": 0}
              },
              "update": {
                "fill": {"value": "steelblue"}
              },
              "hover": {
                "fill": {"value": "red"}
              }
            }
          },
          {
            "type": "text",
            "encode": {
              "enter": {
                "align": {"value": "center"},
                "baseline": {"value": "bottom"},
                "fill": {"value": "#333"}
              },
              "update": {
                "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
                "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
                "text": {"signal": "tooltip.amount"},
                "fillOpacity": [
                  {"test": "datum === tooltip", "value": 0},
                  {"value": 1}
                ]
              }
            }
          }
        ]
      }
    };

    const chart = new google.visualization.VegaChart(document.getElementById('chart-div'));
    chart.draw(dataTable, options);
  }
  </script>

  <script>
    google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

    function drawChart() {
      const dataTable = new google.visualization.DataTable();
      dataTable.addColumn({type: 'string', 'id': 'category'});
      dataTable.addColumn({type: 'number', 'id': 'amount'});
      
      dataTable.addRows(@json($revenueYearDatas));

      const options = {
        "vega": {
          "$schema": "https://vega.github.io/schema/vega/v4.json",
          "width": 500,
          "height": 500,
          "padding": 5,

          'data': [{'name': 'table', 'source': 'datatable'}],

          "signals": [
            {
              "name": "tooltip",
              "value": {},
              "on": [
                {"events": "rect:mouseover", "update": "datum"},
                {"events": "rect:mouseout",  "update": "{}"}
              ]
            }
          ],

          "scales": [
            {
              "name": "xscale",
              "type": "band",
              "domain": {"data": "table", "field": "category"},
              "range": "width",
              "padding": 0.05,
              "round": true
            },
            {
              "name": "yscale",
              "domain": {"data": "table", "field": "amount"},
              "nice": true,
              "range": "height"
            }
          ],

          "axes": [
            { "orient": "bottom", "scale": "xscale" },
            { "orient": "left", "scale": "yscale" }
          ],

          "marks": [
            {
              "type": "rect",
              "from": {"data":"table"},
              "encode": {
                "enter": {
                  "x": {"scale": "xscale", "field": "category"},
                  "width": {"scale": "xscale", "band": 1},
                  "y": {"scale": "yscale", "field": "amount"},
                  "y2": {"scale": "yscale", "value": 0}
                },
                "update": {
                  "fill": {"value": "steelblue"}
                },
                "hover": {
                  "fill": {"value": "red"}
                }
              }
            },
            {
              "type": "text",
              "encode": {
                "enter": {
                  "align": {"value": "center"},
                  "baseline": {"value": "bottom"},
                  "fill": {"value": "#333"}
                },
                "update": {
                  "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
                  "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
                  "text": {"signal": "tooltip.amount"},
                  "fillOpacity": [
                    {"test": "datum === tooltip", "value": 0},
                    {"value": 1}
                  ]
                }
              }
            }
          ]
        }
      };

      const chart = new google.visualization.VegaChart(document.getElementById('chart-div-2'));
      chart.draw(dataTable, options);
    }
  </script>



  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable(@json($datas));

      var options = {
        title: "Shop's products"
      };

      var chart = new google.visualization.PieChart(document.getElementById('products'));

      chart.draw(data, options);
    }
  </script>


  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable(@json($blogDatas));

      var options = {
        title: "Shop's blogs"
      };

      var chart = new google.visualization.PieChart(document.getElementById('blogs'));

      chart.draw(data, options);
    }
  </script>

@endsection