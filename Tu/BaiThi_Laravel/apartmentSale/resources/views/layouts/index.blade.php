<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    {{--    <link href="{{asset('css/shop-homepage.css"')}}" rel="stylesheet">--}}
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="header">
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Welcome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <?php

            $category = array(
                '1' => 'Category1',
                '2' => 'Category2',
                '3' => 'Category3',
                '4' => 'Category4',
                '5' => 'Category5',
                '6' => 'Category6'
            );

            ?>
            <h1 class="my-4">Ha Noi City Apartments For Sale</h1>
            <div class="list-group">
                <?php
                foreach ($category as $key => $value){
                ?>
                <a href="#" class="list-group-item"><?php echo $value?></a>
                <?php
                }
                ?>

            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9" style="margin-top: 10px">
            <div class="row">

                @foreach($listItem as $item)
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card h-100">


                            <a href="#"><img class="card-img-top" src="{{asset('img/111.jpg')}}" alt=""></a>


                            <div class="card-body text">
                                <h4 class="card-title"><div>Name - <?php echo $item['name']?></div></h4>
                                <h5><div>Adress - <?php echo $item['adress']?></div></h5>
                                <h5><p class="card-text">Price - <?php echo $item['price']?></p></h5>
                                <h5 class="status"><p class="card-text">Status - <?php echo $item['status']?></p></h5>
                            </div>
                            <div class="card-footer">
                                <a href="edit.php?id=4">View</a>
                                <!-- <a href="delete.php?id=--><?php // echo $product['id']?><!--">xoa</a>-->

                                <form action="delete.php" method="get" onsubmit="return confirm('Sure ?');">
                                    <input type="hidden" name="id" value="5">
                                    <input type="submit" value="Add to cart">
                                </form>

                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </div>
                        </div>


                    </div>
                @endforeach

            </div>
            <!-- /.row -->
            <div style="display: block">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <?php
                        for ($p = 0;$p < 5;$p++) {
                        ?>
                        <li class="page-item">
                            <a href="index.php?page=<?php echo $p + 1; ?>"
                               class="page-link"><?php echo $p + 1; ?></a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>

            </div>

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

</body>
</html>
