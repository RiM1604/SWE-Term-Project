<?php

    require '_functions.php';
    $conn = db_connect();

    // Getting user details
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result))
    {
        $user_fullname = $row["user_fullname"];
        $user_name = $row["user_name"];
    }

// Delete admin record and logout on button press
    if(isset($_POST['delete_admin'])) {
       
        $sql = "DELETE FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        if($result)
            {
              header("Location: ../index.php");
            }
        else
            {
                echo mysqli_error($conn) ;
                exit() ;
            }
    }

?>



<!--
        <nav id="navbar">
            <ul>
                <li class="nav-item">
                    <?php 
                        echo $user_name;
                    ?>
                </li>
                <li class="nav-item">
                    <img class="adminDp" src="../assets/img/admin_pic.jpeg" alt="Admin Profile Pic" width="22px" height="22px">
                </li>
            </ul>
        </nav>
-->
    <main id="container">
        <div id="sidebar">
            <h4><i class="fas fa-bus"></i> OBTBS</h4>
            <div>
                <img class="adminDp" src="../assets/img/userav-min.png" height="125px" alt="Admin Profile Pic">
                <p>
                    <?php  echo '@'.$user_name;  ?>
                </p>
                <p>Administrator</p>
            </div>
            <ul id="options">

                <li class="option <?php if($page=='dashboard'){ echo 'active';}?>"> 
                    <a href="./dashboard.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                
               
                <li class="option <?php if($page=='bus'){ echo 'active';}?>">
                    <a href="./bus.php">
                    <i class="fas fa-bus"></i> Buses
                    </a>
                </li>

                <li class="option <?php if($page=='route'){ echo 'active';}?>">
                    <a href="./route.php">
                    <i class="fas fa-road"></i> Routes    
                    </a>
                </li>
                
                <li class="option <?php if($page=='customer'){ echo 'active';}?>">
                    <a href="./customer.php">
                    <i class="fas fa-users"></i> Customers
                    </a>
                </li>

                <li class="option <?php if($page=='booking'){ echo 'active';}?>">
                    <a href="./booking.php">
                    <i class="fas fa-ticket-alt"></i> Bookings
                    </a>
                </li>


                <li class="option <?php if($page=='seat'){ echo 'active';}?>">
                    <a href="./seat.php">
                    <i class="fas fa-th"></i> Seats
                    </a>
                </li>

<li class="option <?php if($page=='sales'){ echo 'active';}?>">
    <a href="./sales.php">
    <i class="fas fa-th"></i> Sales
    </a>
</li>
<li class="option <?php if($page=='admin'){ echo 'active';}?>">
    <a href="./admin.php">
    <i class="fas fa-th"></i> Admins
    </a>
</li>
            </ul>
        </div>


        <div id="main-content">
            <section id="welcome">
                <ul>
                    <li class="welcome-item">Welcome, 
                        <span id="USER">
                            <?php 
                                echo $user_fullname;
                            ?>
                        </span>
                    </li>
                    <li class="welcome-item">
                        <button id="logout" class="btn-sm">
                            <a href="../assets/partials/_logout.php">LOGOUT</a>
                        </button>
                    </li>
<li class="welcome-item">
<form method="post">
<button type="submit" name="delete_admin" class="btn-sm">DELETE
</button>
</form>
                </ul>
            </section>


