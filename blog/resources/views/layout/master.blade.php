<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .top, .footer{
            width:100%;
            background:#000;
            height:50px;
        }
        .left, .right{
            float: left;
            min-height: 600px;
        }
        .left{
            width:200px;
            background: #ccc;
        }
        .right{
            width:800px;
        }
        .footer{
            clear:both;
        }
        ul{
            list-style-type: none;
            padding-left:0;
        }
        ul li a{
            text-decoration: none;
            border-bottom: 1px solid #f1f1f1;
            display: block;
            line-height: 28px;
            padding-left: 20px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="top"></div>
    <div class="left">
        <ul>
            <li><a href="{{ route('backend.dashboard.index') }}">Dashboard</a></li>
            <li><a href="{{ route('backend.product.index') }}">Product Management</a></li>
            <li><a href="{{ route('backend.category.index') }}">Category Management</a></li>
            <li><a href="{{ route('backend.news.index') }}">News Management</a></li>
            <li><a href="{{ route('backend.user.index') }}">User Management</a></li>
        </ul>
    </div>
    <div class="right">
        @yield('main')
    </div>
    <div class="footer"></div>
</body>
</html>