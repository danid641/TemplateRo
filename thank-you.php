<?php
require_once("inc/connect.php");
require_once("inc/banned_ip_russia.php");
if (isset($_COOKIE['thankyou'])) {
    header("Refresh:10; url=https://".$_SERVER['SERVER_NAME']."/index.php");
?>
    <Style>
        .th {
            width: 100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }

        .cth {
            background-color: rgba(255, 255, 128, .5);
            border: 1px solid black;
        }
    </style>
    <div class="th">
        <div class="cth" style="text-align: center;">
            <h1>thank you for purchase</h1>
            <p>thank you for purchase</p>
        </div>
    </div>
<?php
} else {
    echo '<h1 style="text-align:center; margin-top: 60px;">if you took the premium for free then you cant take it anymore.</h1>';
}
?>