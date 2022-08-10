    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "digital";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Could not connect to the database host: " . mysqli_connect_error());
    }

    //Set the character set of the connection
    if (!mysqli_set_charset($conn, "UTF8")) {
        die("mysqli_set_charset() failed");
    }


    if (isset($_SESSION['account']['UserData']['username'])) {
        $username = $_SESSION['account']['userData']['username'];

        $s = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $s);
        $verify = mysqli_num_rows($result);

        if ($verify == 0) {
            header("location: logout.php");
        }
    }

    $verify_product = "SELECT * FROM products";
    $result_product = mysqli_query($conn, $verify_product);


    foreach ($result_product as $row) {

        $creator = $row['creator'];

        $verify_users_sql = "SELECT * FROM users WHERE username='$creator'";
        $verify_users_result = mysqli_query($conn, $verify_users_sql);
        $verify_users = mysqli_fetch_array($verify_users_result);

        if ($creator != $verify_users['username']) {
            $action = "DELETE FROM products WHERE creator='$creator'";
            $action_result = mysqli_query($conn, $action);
        }
    }

    if (!empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        foreach ($cart as $list) {
            $fs = "'" . $list . "'";
            $nns[] = $fs;
        }

        $cart_items =  implode(',', $nns);


        $sql_verify_exist_item = "SELECT * FROM products WHERE id IN ($cart_items)";
        $result = mysqli_query($conn, $sql_verify_exist_item);
        $verify_exist_item = mysqli_num_rows($result);


        $cart_item = count($_SESSION['cart']);

        if ($verify_exist_item != $cart_item) {
            unset($_SESSION['cart']);
            unset($_SESSION['cart_price']);
        }
    }

    function array_check_multiple_values($search, $source)
    {
        return (count(array_intersect($search, $source)) == count($search));
    }


    // array_push($_SESSION['favorite'], 39);

    if (!empty($_SESSION['favorite'])) {
        $sql_verify_exist_item_favorite = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql_verify_exist_item_favorite);

        $i = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CheckProduct[$i] = $row['id'];
                $i++;
            }
        }

        if (!array_check_multiple_values($_SESSION['favorite'], $CheckProduct)) {
            $RemoveValue = array_diff($_SESSION['favorite'], $CheckProduct);
            $c =  count($RemoveValue);

            $in = 1;
            while ($in <= $c) {
                $arrs = $RemoveValue;
                $as = $arrs[$in];
                $unsetval = array_search($as, $_SESSION['favorite']);
                
                unset($_SESSION['favorite'][$unsetval]);
                header("refresh:5;url=/inc/connect.php");
                $in++;
            }
        }
    }

    ?>
      