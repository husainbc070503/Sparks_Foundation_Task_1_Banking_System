<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFB - Transfer Money</title>
    <style>
        <?php include('css/viewntrf.css'); ?>
    </style>
    <script src="https://kit.fontawesome.com/6ccdd39db5.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="logo"></a>
        </div>
    </header>

    <section id="customers">
        <div class="container">
            <div class="heading">
                <h1>Transfer Money</h1>
            </div>
            <div class="custom-table">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Account Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `customers`;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $srno = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $srno . '.'; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['acc_balance']; ?></td>
                                    <td><a href="transact.php?id=<?php echo $row['id']; ?>">Transfer Money</a></td>
                                </tr>
                            <?php
                                $srno += 1;
                            }
                        } else {
                            ?>
                            <script>
                                alert('No users exist!');
                                window.open('index.php', '_self');
                            </script>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>