@extends('admin.layout.main')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-2">
                <h3 class="card-body text-white">Customer</h3>
                <div class="card-footer d-flex align-items-center justify-content-between" style="align-items: center;">
                    <a class="small  stretched-link" >View customer</a>
                    <h3 class="count text-white">{{$customer}}</h3>
                    <i class="fas fa-address-card icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <h3 class="card-body text-white">Category</h3>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link text-white" href="thong-tin-hoa-don">View category</a>
                    <h3 class="count text-white">{{$category}}</h3>
                    <i class="fas fa-receipt icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <h3 class="card-body text-white">Product</h3>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small  stretched-link text-white"  href="danh-sach-admin">View product</a>
                    <h3 class="count text-white">{{$product}}</h3>
                    <i class="fas fa-users-cog icon-count"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <h3 class="card-body text-white">Staff</h3>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link text-white" href="danh-sach-mon?trang=1">View staff</a>
                    <h3 class="count text-white">{{$staff}}</h3>
                    <i class="fas fa-brush icon-count"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="piechart" style="width: 1050px; height: 500px;"></div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['cate_name', 'number_cate'],
            <?php foreach ($chart as $key) {
                echo "['" . $key->name . "', " . $key->number_cate . "],";
            }  ?>
        ]);

        var options = {
            title: 'Thống kê sản phẩm theo danh mục'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@endsection