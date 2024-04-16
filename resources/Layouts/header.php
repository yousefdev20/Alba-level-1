    <style>
        body, html {
            margin: 0;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #4CAF50;
            color: #fff;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
        }

        /* LOGO */
        .logo {
            font-size: 32px;
        }

        /* NAVBAR MENU */
        .menu {
            display: flex;
            gap: 1em;
            font-size: 18px;
            list-style-type: none;
        }

        .menu li:hover {
            background-color: #4c9e9e;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .menu li {
            padding: 5px 14px;
        }

        /* DROPDOWN MENU */
        .services {
            position: relative;
        }

        .dropdown {
            background-color: rgb(1, 139, 139);
            padding: 1em 0;
            position: absolute; /*WITH RESPECT TO PARENT*/
            display: none;
            border-radius: 8px;
            top: 35px;
        }

        .dropdown li + li {
            margin-top: 10px;
        }

        .dropdown li {
            padding: 0.5em 1em;
            width: 8em;
            text-align: center;
        }

        .dropdown li:hover {
            background-color: #4c9e9e;
        }

        .services:hover .dropdown {
            display: block;
        }
    </style>
<nav class="navbar">
    <!-- LOGO -->
    <div class="logo">Freelancer</div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
        <div class="menu">
            <li>
                <a href="<?php echo route('admin.service.index');?>">Service</a>
            </li>

            <li>
                <a href="<?php echo route('admin.index');?>">Project</a>
            </li>

            <li>
                <a href="<?php echo route('auth.logout');?>">Logout</a>
            </li>
        </div>
    </ul>
</nav>