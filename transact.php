<?php
include('conn.php');
if (isset($_GET)) {
    $uid = $_GET['id'];
}
if (isset($_POST['submit'])) {
    $to = $_POST['r-user'];
    $amt = $_POST['amt'];
    $from = $uid;

    // RECEIVER SQL
    $sql1 = "SELECT `name`, `acc_balance` FROM `customers` WHERE `id` = '$to'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);

    // SENDER SQL
    $sql2 = "SELECT `name`, `acc_balance` FROM `customers` WHERE `id` = '$from'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

    if ($amt > $row2['acc_balance']) {
?>
        <script>
            alert('Error, Amount exceeding banlance!!');
        </script>
    <?php
    } elseif ($amt == 0) {
    ?>
        <script>
            alert('Amount cannot be zero!!');
        </script>
    <?php
    } elseif ($amt < 0) {
    ?>
        <script>
            alert('Negative values are not allowed!!');
        </script>
        <?php
    } else {

        // UPDATE RECEIVER BALANCE
        $receiverbal = $row1['acc_balance'];
        $new_r_bal = $receiverbal + $amt;
        $sql = "UPDATE `customers` SET `acc_balance` = '$new_r_bal' WHERE `id` = '$to'";
        $result_r = mysqli_query($conn, $sql);

        // UPDATING SENDER BALANCE
        $senderbalance  = $row2['acc_balance'];
        $new_s_bal = $senderbalance - $amt;
        $sql = "UPDATE `customers` SET `acc_balance` = '$new_s_bal' WHERE `id` = '$from'";
        $s_result = mysqli_query($conn, $sql);

        $sender = $row2['name'];
        $receiver = $row1['name'];

        $sql = "INSERT INTO `transaction` (`sender`, `receiver`, `amt_trf`, `sender_bal`, `receiver_bal`, `date_time`) VALUES ('$sender', '$receiver', '$amt', '$new_s_bal', '$new_r_bal', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
        ?>
            <script>
                alert('Transaction Successsfull 👍');
                window.open('transaction_history.php', '_self');
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Error: <?php echo mysqli_error($conn); ?>');
            </script>
<?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SFB - Transact Money</title>
    <script src="https://kit.fontawesome.com/6ccdd39db5.js" crossorigin="anonymous"></script>
    <style>
        <?php include('css/transact.css'); ?>
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="logo"></a>
        </div>
    </header>

    <section id="transact">
        <div class="container">
            <div class="heading">
                <h1>Online Transaction</h1>
            </div>
            <div class="details">
                <table class="user-details">
                    <thead>
                        <tr>
                            <th>Id No.</th>
                            <th>Sender Name</th>
                            <th>Sender Email</th>
                            <th>Account Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `customers` WHERE `id` = '$uid';";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['acc_balance']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form">
                <form method="POST" onsubmit="return validate()">
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td class="label">Transact To : </td>
                                <td class="input">
                                    <select name="r-user" id="r-user" class="select-receiver">
                                        <option value="0">--Select--</option>
                                        <?php
                                        $sql = "SELECT * FROM `customers` WHERE `id` != '$uid'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] . ' (Available Balance : ' . $row['acc_balance'] . ')'; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Amount : </td>
                                <td class="input"><i class="fa-solid fa-indian-rupee-sign"></i><input type="tel" name="amt" id="amt" required><label class="zeros">.00</label></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="button"><button type="submit" name="submit" class="submit-btn"><i class="fa-brands fa-paypal"></i>Transfer now</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>

    <script>
        function validate() {
            if (document.getElementById('r-user').value == 0) {
                alert('Please select do you wanna transfer..')
                return false
            }
            return true
        }
    </script>
</body>

</html>