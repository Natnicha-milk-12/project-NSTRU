@extends('layouts.home-user')

@section('title')
    ระบบบันทึกเหตุการณ์ด้านความมั่นคงและความปลอดภัย
@endsection

@section('content')
    <?php
    $strMonthShort = ['', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
    ?>
    <form action="#" method="POST" enctype="multipart/form-data">

        <div class="row mb-2 needs-validation">
            <div class=" container">
                <h3 class="mb-0b text-dark d-flex justify-content-center">
                    ระบบบันทึกเหตุการณ์ด้านความมั่นคงและความปลอดภัย
                </h3>
                <h3 class="mb-0b text-dark d-flex justify-content-center">
                    สำนักวิทยบริการและเทคโนโลยีสารสนเทศ
                    ม.ราชภัฏนครศรีธรรมราช
                </h3>
                <hr>
                <h4 class="mb-0b  text-primary d-flex justify-content-center">
                    ข้อมูลสถิติของเหตุการณ์ด้านความมั่นคงและความปลอดภัย
                </h4>
            </div>
            <div class="col-sm-3 py-3">
                <div class="card shadow " style="color: aliceblue">
                    <div class="card-body" style=" background: linear-gradient(45deg, #f39292,#ed3939);">
                        <div class="row mb-2 needs-validation">
                            <div class="col-sm-12 ">
                                <a style="font-size: 18px">เหตุการณ์ทั้งหมด</a>

                            </div>
                            <div class="col-sm-4">
                                <h2 class="card-title">{{ $countaccidents[0]->accidents_day_ago }}
                                    {{ $countaccidents[0]->accidents_count }}</h2>
                            </div>
                            <div class="col-sm-8 text-end ">
                                <i class="bi bi-shield-fill-exclamation " style="font-size:40px"> </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 py-3">
                <div class="card shadow " style="color: aliceblue">
                    <div class="card-body" style=" background: linear-gradient(45deg, #e3d861,#e2b324);">
                        <div class="row mb-2 needs-validation">
                            <div class="col-sm-12 ">
                                <a style="font-size: 18px">ช่วงหนึ่งสัปดาห์</a>

                            </div>
                            <div class="col-sm-4  ">
                                <h2 class="card-title">
                                    {{ $countaccidents[1]->accidents_count }}</h2>
                            </div>
                            <div class="col-sm-8 text-end">
                                <i class="bi bi-activity" style="font-size:40px"> </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 py-3">
                <div class="card shadow " style="color: aliceblue">
                    <div class="card-body" style=" background: linear-gradient(45deg, #30E3CA,#058d94);">
                        <div class="row mb-2 needs-validation">
                            <div class="col-sm-12 ">
                                <?php
                                $date = new DateTime();
                                $end_month = $strMonthShort[(int) $date->format('m')];
                                // $end_month = $date->format('d/m/Y');
                                
                                $date->sub(new DateInterval('P29D'));
                                $start_month = $strMonthShort[(int) $date->format('m')];
                                // $start_month = $date->format('d/m/Y');
                                echo "<a style=\"font-size: 18px\">ช่วงหนึ่งเดือน  ", '(' . $start_month . '-' . $end_month . ')', '</a>';
                                ?>

                            </div>
                            <div class="col-sm-4 ">
                                <h2 class="card-title">
                                    {{ $countaccidents[2]->accidents_count }}</h2>
                            </div>
                            <div class="col-sm-8 text-end ">
                                <i class="bi bi-bar-chart-line" style="font-size:40px"> </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 py-3">
                <div class="card shadow " style="color: aliceblue">
                    <div class="card-body" style=" background: linear-gradient(45deg, #3ebbed,#0770c6);">
                        <div class="row mb-2 needs-validation">
                            <div class="col-sm-12 ">
                                <?php
                                $date = new DateTime();
                                $end_month = $strMonthShort[(int) $date->format('m')];
                                // $end_month = $date->format('d/m/Y');
                                
                                $date->sub(new DateInterval('P89D'));
                                $start_month = $strMonthShort[(int) $date->format('m')];
                                // $start_month = $date->format('d/m/Y');
                                echo "<a style=\"font-size: 18px\">ช่วงสามเดือน  ", '(' . $start_month . '-' . $end_month . ')', '</a>';
                                ?>

                            </div>
                            <div class="col-sm-4">
                                <h2 class="card-title">
                                    {{ $countaccidents[3]->accidents_count }}</h2>
                            </div>
                            <div class="col-sm-8 text-end ">
                                <i class="bi bi-bar-chart-steps" style="font-size:40px"> </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-4 py-3">

                @foreach ($countaccidents as $accidents)
                    <p>{{ $accidents->accidents_day_ago }}:{{ $accidents->accidents_count }}</p>
                @endforeach
                <p>{{ $countaccidents[0]->accidents_day_ago }} {{ $countaccidents[0]->accidents_count }}</p>
            </div> --}}

            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="card-body ">
                        <div class="d-flex justify-content-center">
                            <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ทั้งหมด</a>
                        </div>
                        <canvas id="myCharteveryday"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ในช่วงหนึ่งสัปดาห์</a>
                        </div>
                        <canvas id="myChart7dayago"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ในช่วงหนึ่งเดือน</a>
                        </div>
                        <canvas id="myChart30dayago"></canvas>
                    </div>
                </div>
            </div>



            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ในช่วงสามเดือน</a>
                        </div>
                        <canvas id="myChart90dayago"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="d-flex justify-content-center">
                        <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ทั้งหมด</a>
                    </div>
                    <div class="card-body">

                        <canvas id="myCharteverydayPolarArea"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="d-flex justify-content-center">
                        <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ในช่วงหนึ่งสัปดาห์</a>
                    </div>
                    <div class="card-body">

                        <canvas id="myChart7dayPolarArea"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="d-flex justify-content-center">
                        <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ในช่วงหนึ่งเดือน</a>
                    </div>
                    <div class="card-body">

                        <canvas id="myChart30dayPolarArea"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 py-3">
                <div class="card shadow ">
                    <div class="d-flex justify-content-center">
                        <a style="font-size: 16px">กราฟแสดงข้อมูลเหตุการณ์แบ่งตามหมวดหมู่ในช่วงสามเดือน</a>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart90dayPolarArea"></canvas>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-12 py-3">
                <div class="card shadow ">
                    <div class="d-flex justify-content-center">
                        <h5 class="mb-0b text-primary d-flex justify-content-center">
                            กราฟแสดงข้อมูลงบประมาณรวมและจำนวนโครงการวิจัยแบ่งตามคณะในมหาวิทยาลัยทักษิณและแบ่งตามปีงบประมาณ
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="myChartdayRadar"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>
    </form>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // console.log(JSON.parse("{{ json_encode($countaccidents) }}"));
        console.log({!! json_encode($accidentstats) !!});
        var accidentstats = {!! json_encode($accidentstats) !!};
        var data = [];
        data.push([], [], [], [], );
        var labels = [];
        labels.push([], [], [], [], );
        accidentstats.forEach(element => {
            switch (element.accidents_day_ago) {
                case null:
                    labels[0].push(element.accidents_categors_name);
                    data[0].push(element.accidents_count);
                    break;
                case '7':
                    labels[1].push(element.accidents_categors_name);
                    data[1].push(element.accidents_count);
                    break;
                case '30':
                    labels[2].push(element.accidents_categors_name);
                    data[2].push(element.accidents_count);
                    break;
                case '90':
                    labels[3].push(element.accidents_categors_name);
                    data[3].push(element.accidents_count);
                    break;
            }
        });

        var ctx = document.getElementById('myCharteveryday').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels[0],
                datasets: [{
                    label: 'ข้อมูลทั้งหมด',
                    data: data[0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var ctx = document.getElementById('myChart7dayago').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels[1],
                datasets: [{
                    label: 'ข้อมูลช่วงหนึ่งสัปดาห์',
                    data: data[1],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255,1)',
                        'rgba(255, 159, 64, 1 )'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('myChart30dayago').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels[2],
                datasets: [{
                    label: 'ข้อมูลช่วงหนึ่งเดือน',
                    data: data[2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var ctx = document.getElementById('myChart90dayago').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels[3],
                datasets: [{
                    label: 'ข้อมูลช่วงสามเดือน',
                    data: data[3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('myCharteverydayPolarArea').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels[0],
                datasets: [{
                    label: 'My Dataset',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    data: data[0],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var ctx = document.getElementById('myChart7dayPolarArea').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels[1],
                datasets: [{
                    label: 'My Dataset',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    data: data[1],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var ctx = document.getElementById('myChart30dayPolarArea').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels[2],
                datasets: [{
                    label: 'My Dataset',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    data: data[2],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var ctx = document.getElementById('myChart90dayPolarArea').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels[3],
                datasets: [{
                    label: 'My Dataset',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    data: data[3],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        var ctx = document.getElementById('myChartdayRadar').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'polarArea',

            data: {
                datasets: [{
                        label: labels[0],
                        data: [0],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }, {
                        label: labels[1],
                        data: [1],
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'
                    }, {
                        label: labels[2],
                        data: [2],
                        fill: true,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgb(255, 206, 86)',
                        pointBackgroundColor: 'rgb(255, 206, 86)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 206, 86)'
                    },
                    {
                        label: labels[3],
                        data: [3],
                        fill: true,
                        backgroundColor: 'rgba(255, 100, 86, 0.2)',
                        borderColor: 'rgb(255, 100, 86)',
                        pointBackgroundColor: 'rgb(255, 100, 86)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 100, 86)'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endsection
