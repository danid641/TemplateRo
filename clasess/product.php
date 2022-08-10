<?php

class product extends createSQLq
{

    public function __construct()
    {

        global $item_list;
        global $result;

        $users = new users;
        $this->db();
        $conn = $this->conn;
        $username =  $users->username;

        if (isset($_GET['cart'])) {
            $cart = $_GET['cart'];

            $this->RunSql("SELECT * FROM library WHERE owner='$username'", 'verify_aleready_own_product_ver', 'num', true);
            $verify_aleready_own_product_ver = $this->verify_aleready_own_product_ver;

            if ($verify_aleready_own_product_ver['row'] == 0) {
                $this->RunSql("SELECT * FROM products WHERE id='$cart'", 'verify_creator', 'normal', true);
                $this->RunSql("SELECT * FROM products WHERE id='$cart'", 'verify_exist_product', 'num', true);
                $verify_exist_product = $this->verify_exist_product;
                $verify_creator = $this->verify_creator;

                if ($verify_exist_product['row'] == 1 && $verify_creator['row']['creator'] != $username) {
                    if (empty($_SESSION['cart']) or empty($_SESSION['cart_price'])) {
                        $_SESSION['cart'] = array();
                        $_SESSION['cart_price'] = array();
                    }

                    $marks = $_GET['cart'];

                    $this->RunSql("SELECT * FROM products WHERE id='$marks'", 'Get_price', 'normal', true);
                    $get_price = $this->Get_price;


                    if (in_array($marks, $_SESSION['cart'])) {
                    } else {
                        $add = array_push($_SESSION['cart'], $_GET['cart']);
                        $add_price = array_push($_SESSION['cart_price'], $get_price['row']['Product Price']);
                    }
                }
            }
        }

        if (isset($_GET['favorite'])) {
            $favorite = $_GET['favorite'];

            if (empty($_SESSION['favorite'])) {
                $_SESSION['favorite'] = array();
            } else {
                $item_list = $_SESSION['favorite'];
            }

            $verify_exist_product = "SELECT * FROM products WHERE id='$favorite'";
            $verify_exist_product_result = mysqli_query($conn, $verify_exist_product);
            $verify_exist_product_row = mysqli_num_rows($verify_exist_product_result);

            if ($verify_exist_product_row == 1) {
                if (!in_array($favorite, $_SESSION['favorite'])) {
                    array_push($_SESSION['favorite'], $favorite);
                }
            }
        }

        if (isset($_GET['r-cart'])) {
            $item = $_GET['r-cart'];
            if (($item = array_search($item, $_SESSION['favorite'])) !== false) {
                unset($_SESSION['favorite'][$item]);
            }
        }

        if (isset($_GET['r-favorite'])) {
            $item = $_GET['r-favorite'];
            if (($item = array_search($item, $_SESSION['favorite'])) !== false) {
                unset($_SESSION['favorite'][$item]);
            }
        }
    }

    public function GetProduct($from, $where)
    {

        global $result;

        $this->db();
        $users = new users;
        $conn = $this->conn;
        $username = $users->username;

        if (!empty($where) && !empty($from)) {
            $fetch_product = "SELECT * FROM $from WHERE $where";
        } elseif (!empty($from)) {
            $fetch_product = "SELECT * FROM $from";
        } else {
            return 'error';
        }

        $result = $conn->query($fetch_product);

        if (empty($from) or !$result) {
            $createError = new CreateErorr;
            $createError->CreateErorr("Fatal Error", 'parameter from is empty please enter a parameter value and try again', false);
            error_reporting(E_PARSE);
        }
        $this->result = $result;
        if ($result->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {

                $users = "SELECT * FROM users WHERE username ='" . $row['creator'] . "'";
                $resultss = mysqli_query($conn, $users);
                $rows = mysqli_fetch_array($resultss);
?>
                <div class="col-lg-4 col-md-6">
                    <div class="product-single latest-single">
                        <div class="featured-badge"><span>Featured</span></div>
                        <div class="product-thumb">
                            <figure>
                                <img src="/view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                <figcaption>
                                    <ul class="list-unstyled">
                                        <?php if ($row['creator'] != $username) { ?><li><a href="?cart=<?php echo $row['id']; ?>"><span class="icon-basket"></span></a></li><?php } ?>
                                        <li><a href="<?php echo $row['Live Demo']; ?>">Live Demo</a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- Ends: .product-thumb -->
                        <div class="product-excerpt">
                            <h5>
                                <a href="single-product-v2?id=<?php echo $row['id']; ?>"><?php echo $row['Product Name']; ?></a>
                            </h5>
                            <ul class="titlebtm">
                                <li>
                                    <?php if (!empty($rows['avatar'])) {
                                        echo '<img  class="auth-img" src="/view-image.php?image_id=' . $rows['avatar'] . '"alt="user avatar">';
                                    } else {
                                        echo '<style>.d {background-color:#' . $hex_string = bin2hex(openssl_random_pseudo_bytes(3)) . '; border-radius: 100%; width: 30px; height: 30px; justify-content: center; align-items: center; display: flex; font-size: 20px; text-transform: uppercase; color: white;}</style> <div class="auth-img d">' . $_SESSION['account']['userData']['username'][0] . '</div>';
                                    } ?>
                                    <p><a href="author?creator=<?php echo $row['creator']; ?>"><?php echo $row['creator'];  ?></a></p>
                                </li>
                            </ul>
                            <ul class="product-facts clearfix">
                                <li class="price"><?php if ($row['Product Price'] == 0) {
                                                        echo "Free";
                                                    } else {
                                                        echo '&euro;' . $row['Product Price'];
                                                    } ?></li>
                                <li class="sells">
                                    <?php
                                    $sql = "SELECT * FROM library WHERE `Product id`='" . $row['id'] . "'";
                                    $query = mysqli_query($conn, $sql);
                                    $total_seels = mysqli_num_rows($query);
                                    ?>  
                                    <span class="icon-basket"></span><?php echo $total_seels;    ?>
                                </li>
                                <li class="product-fav">
                                    <a href="<?php

                                                if (!empty($_SESSION['favorite'])) {

                                                    if (in_array($row['id'], $_SESSION['favorite'])) {
                                                        echo '?r-favorite=' . $row['id'];
                                                    } else {
                                                        echo '?favorite=' . $row['id'];
                                                    }
                                                } else {
                                                    echo '?favorite=' . $row['id'];
                                                }

                                                ?>"><?php
                                                    if ($row['creator'] != $username) {
                                                        if (!empty($_SESSION['favorite'])) {
                                                            if (in_array($row['id'], $_SESSION['favorite'])) {
                                                                echo '<i style="color: red;" class="bi bi-heart-fill" title="Add to collection" data-toggle="tooltip"></i>';
                                                            } else {
                                                                echo '<span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>';
                                                            }
                                                        } else {
                                                            echo '<span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>';
                                                        }
                                                    }

                                                    ?> </a>
                                </li>
                                <li class="product-rating">
                                    <ul class="list-unstyled">
                                        <li><span class="rate_active"></span></li>
                                        <li><span class="rate_active"></span></li>
                                        <li><span class="rate_active"></span></li>
                                        <li><span class="rate_active"></span></li>
                                        <li><span class="rate_disabled"></span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Ends: .product-excerpt -->
                    </div><!-- Ends: .product-single -->
                </div><!-- ends: .col-lg-4 -->
<?php
            }
        }
    }
}
