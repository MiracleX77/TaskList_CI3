<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/tasklist.css">

</head>

<body>
    <main class="container">
        <nav class="sidebar">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo" class=""logoimg>
                <h1>Tasklist</h1>
            </div>
            <div class="menu">
                <a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a>
                <a href="<?php echo base_url('tasklist')?>" class="active"><i class="fa-solid fa-square-check"></i></a>
                <a href="<?php echo base_url('account')?>"><i class="fa fa-user"></i></a>
                <a href="<?php echo base_url('home')?>"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </nav>
        <div class="content">
            <div class="header">
                <h1>Tasklist</h1>
                <div class="openMenu" id="menuIcon"><i class="fa-solid fa-bars"></i></div>
                <ul class="nav-list">
                        <li><a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a></li>
                        <li><a href="<?php echo base_url('tasklist')?>" class="active"><i class="fa-solid fa-square-check"></i></a></li>
                        <li><a href="<?php echo base_url('account')?>"><i class="fa fa-user"></i></a></li>
                </ul>
                
                <div class="btn-tasklist">
                    <button class="btn"><i class="fa-solid fa-square-check"></i>Done</button>
                    <button class="btn"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                    <button class="btn"><i class="fa-solid fa-square-plus"></i>Add</button>

                    <!-- store up -->
                    <!-- <a href="#" class="btn btn-add"><i class="fa-solid fa-square-check"></i>Done</a>
                    <a href="#" class="btn btn-delete"><i class="fa-sharp fa-solid fa-trash"></i>Delete</a>
                    <a href="#" class="btn btn-done"><i class="fa-solid fa-square-plus"></i>Add</a> -->

                </div>
            </div>
            <hr/>

            <div class="tasklist">
                <div class="btn-content" id="btnPage">
                    <button onclick="getTask('incomplete',1)" class="btn active">All task </button>
                    <button onclick="getTask('due_today',1)" class="btn">Due today</button>
                    <button onclick="getTask('done',1)" class="btn">Done</button>
                </div>
                <div class="btn-incontent">
                    <button onclick="showDropdown()" class="dropbtn">All Task</button>
                        <div id="myDropdown" class="dropdown-content">
                            <button onclick="getTask('incomplete',1)">All Task</button>
                            <button onclick="getTask('due_today',1)" >Due Today</button>
                            <button onclick="getTask('done',1)">Done</button>
                        </div>
                </div>
                <div class="btn-fnTasklist">
                    <button class="btn"><i class="fa-solid fa-square-check"></i>Done</button>
                    <button class="btn"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                    <button class="btn"><i class="fa-solid fa-square-plus"></i>Add</button>
                </div>


            </div>
            <div class="tasklist-content">
                <!-- <div id=tasks></div> -->
                
                
            </div>
        </div>
    </main>


    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="assets/js/tasklistPage/get_check.js"></script>
    <script src="assets/js/tasklistPage/onpage_tasklist.js"></script>
    <script src="assets/js/tasklistPage/dropdown.js"></script>
    <script src="assets/js/tasklistPage/get_task.js"></script>
    <script>
        getTask('incomplete',1);
    </script>
    
</body>

</html>
