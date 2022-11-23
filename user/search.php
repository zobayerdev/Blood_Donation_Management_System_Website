<html>

<head>
    <title>Blood Donation Management System</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdc.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<style>
    .card-header {
        color: #fff;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        border: 1px solid;
        border-color: #fff;
    }

    table {
        width: 100%;
        table-layout: auto;
        color: #fff;
        border: 1px solid;
    }

    .dropbtn {
        background-color: #FF0000;
        color: white;
        padding: 8px;
        width: 100px;
        font-size: 16px;
        margin-top: 12px;
        left: 49%;
        transition: all 400ms;
    }

    select {
        scroll-behavior: smooth;
        border-width: medium;
        border-color: #fff;
        outline: none;
    }

    .form-control {
        left: 44%;
        top: 37%;
        border-radius: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        display: flex;
        position: absolute;
        background-color: #000;
        color: #fff;
        min-width: 25px;
        height: 40px;
        z-index: 1;
    }

    .head_table {
        background-color: #D32027;
    }


    th {
        padding: 12px 15px;
        text-align: center;
        font-weight: 600;
        font-size: 15px;
        color: #fff;
        text-transform: uppercase;
    }

    td {
        padding: -10px 15px;
        text-align: center;
        vertical-align: middle;
        font-weight: 400;
        font-size: 14px;
        color: #fff;
        border-bottom: #fff;
    }

    .error {
        padding: 10px;
        font-size: 15px;
    }

    h4 {
        text-align: center;
        font-weight: 600;
        font-size: 25px;
    }

    option:checked,
    option:hover {
        color: white;
        background: #3e8e41;
    }

    .dropbtn:hover {
        background-color: #3e8e41;
        border-color: #3e8e41;
        transform: translateY(-1px);
    }


    .send {
        align-items: center;
        background-clip: padding-box;
        background-color: #08A045;
        border: 1px solid transparent;
        border-radius: .25rem;
        box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-flex;
        font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 1.25;
        margin: 0;
        min-height: 3rem;
        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
        position: relative;
        text-decoration: none;
        transition: all 250ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        width: 100%;
    }

    .send:hover,
    .send:focus {
        background-color: #fff;
        color: #000;
        box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
    }

    .send:hover {
        transform: translateY(-1px);
    }

    .send:active {
        background-color: #08A045;
        box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
        transform: translateY(0);
    }
</style>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="../index.html">
                <img src="../images/logo.png" class="logo">
            </a>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../user/login-user.php">Login</a></li>
                <li><a href="../user/search.php">Search Donor</a></li>
                <li><a href="../admin/login.php">Admin</a></li>
                <li><a href="../html/contact.html">About Us</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Search Blood</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <select name="search" class="form-control">
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                            <button type="submit" class="dropbtn">Search</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="zz" class="col-md-12">
                    <div class="card mt-4">
                        <div id="ts" class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="head_table">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Blood Group</th>
                                        <th>Send Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $con = mysqli_connect("localhost","root","","bdms");
                                    
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT name, email, mobile, age, gender, division, district, blood FROM users WHERE CONCAT(blood) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                    <tr class="data">
                                        <td><?= $items['name']; ?></td>
                                        <td><?= $items['email']; ?></td>
                                        <td><?= $items['mobile']; ?></td>
                                        <td><?= $items['age']; ?></td>
                                        <td><?= $items['gender']; ?></td>
                                        <td><?= $items['division']; ?></td>
                                        <td><?= $items['district']; ?></td>
                                        <td><?= $items['blood']; ?></td>
                                        <td><button class="send">Send Message</button></td>
                                    </tr>

                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                    <tr>
                                        <td class="error" colspan="1">No Record Found</td>
                                    </tr>

                                    <?php
                                        }
                                    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>