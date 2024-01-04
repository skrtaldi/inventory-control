<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 78px;
            background: #000000;
            padding: 6px 14px;
            z-index: 99;
            transition: all 0.5s ease;
        }
        .sidebar.open {
            width: 250px;
        }
        .sidebar .logo-details {
            height: 60px;
            display: flex;
            align-items: center;
            position: relative;
        }
        .sidebar .logo-details .icon {
            opacity: 0;
            transition: all 0.5s ease;
        }
        .sidebar .logo-details .logo_name {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            opacity: 0;
            transition: all 0.5s ease;
        }
        .sidebar.open .logo-details .icon,
        .sidebar.open .logo-details .logo_name {
            opacity: 1;
        }
        .sidebar .logo-details #btn {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 22px;
            transition: all 0.4s ease;
            font-size: 23px;
            text-align: center;
            cursor: pointer;
            transition: all 0.5s ease;
            
        }
        .sidebar.open .logo-details #btn {
            text-align: right;
        }
        .sidebar i {
            color: #fff;
            height: 60px;
            min-width: 50px;
            font-size: 28px;
            text-align: center;
            line-height: 60px;
        }
        .sidebar .nav-list {
            margin-top: 20px;
            height: 100%;
        }
        .sidebar li {
            position: relative;
            margin: 8px 0;
            list-style: none;
        }
        .sidebar li .tooltip{
            position: absolute;
            top: -20px;
            left: calc(100% + 15px);
            z-index: 3;
            background: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 400;
            opacity: 0;
            white-space: nowrap;
            pointer-events: none;
            transition: 0%;
        }
        .sidebar li:hover .tooltip {
            opacity: 1;
            pointer-events: auto;
            transition: all 0.4s ease;
            top: 50%;
            transform: translateY(-50%);
        }
        .sidebar.open li .tooltip {
            display: none;
        }
        .sidebar input {
            font-size: 15px;
            color: #fff;
            font-weight: 400;
            outline: none;
            height: 50px;
            width: 100%;
            width: 50px;
            border: none;
            border-radius: 12px;
            transition: all 0.5s ease;
            background: #1d1b31;
        }
        .sidebar.open input {
            padding: 0 20px 0 50px;
            width: 100%;
        }
        .sidebar .fa-search{
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 22px;
            background: #1d1b31;
            color: #fff;
        }
        .sidebar.open .fa-search:hover {
            background: #1d1b31;
            color: #fff;
        }
        .sidebar .fa-search:hover {
            background: #fff;
            color: #11101d;
        }
        .sidebar li a {
            display: flex;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            align-items: center;
            text-decoration: none;
            transition: all 0.4s ease;
            background: #11101d;
        }
        .sidebar li a:hover {
            background: #fff;
        }
        .sidebar li a .links_name {
            color: #fff;
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: 0.4s;
        }
        .sidebar.open li a .links_name {
            opacity: 1;
            pointer-events: auto;
        }
        .sidebar li a:hover .links_name,
        .sidebar li a:hover i {
            transition: all 0.5s ease;
            color: #11101d;
        }
        .sidebar li i {
            height: 50px;
            line-height: 50px;
            font-size: 18px;
            border-radius: 12px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".fas fa-search");
            
            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange();
            });
    
            searchBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange();
            });
    
            function menuBtnChange() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("fab fa-bars", "fab fa-bars-alt-right");
                } else {
                    closeBtn.classList.replace("fab fa-bars-alt-right", "fab fa-bars");
                }
            }
        });
    </script>    
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="fab fa-cuttlefish icon"></i>
            <div class="logo_name">SumberRahayu</div>
            <i class="fas fa-bars" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-th-large"></i>
                        <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href={{ route('barang') }}>
                    <i class="fas fa-box"></i>
                        <span class="links_name">Barang</span>
                </a>
                <span class="tooltip">Barang</span>
            </li>
            <li>
                <a href="{{ route('admin') }}">
                    <i class="fas fa-chart-pie"></i>
                        <span class="links_name">Inventaris</span>
                </a>
                <span class="tooltip">Inventaris</span>
            </li>
            <li>
                <a href="{{ route('supplier') }}">
                    <i class="fas fa-truck"></i>
                        <span class="links_name">Supplier</span>
                </a>
                <span class="tooltip">Supplier</span>
            </li>
            <li>
                <a href="{{ route('customer') }}">
                    <i class="fas fa-users" id="btn"></i>
                        <span class="links_name">Customer</span>
                </a>
                <span class="tooltip">Customer</span>
            </li>
            <li>
                <a href="{{ route('user') }}">
                    <i class="fas fa-regular fa-user"></i>
                        <span class="links_name">User Control</span>
                </a>
                <span class="tooltip">User Control</span>
            </li>
        </ul>
    </div>
</body>
</html>