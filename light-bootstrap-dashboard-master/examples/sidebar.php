<?php 
require "yetki.php";
$current_page = basename($_SERVER['PHP_SELF']);

?>




<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="../../anasayfa/main.php" class="simple-text">
                        Tunay
                    </a>
                </div>
                <ul class="nav">
                    <li <?php echo ($current_page == 'dashboard.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'user.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'table.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./table.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Üyeler</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'add-card.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./add-card.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Oyun Ekle</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'typography.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./typography.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Oyunlar</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'all_comments.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./all_comments.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Yorumlar</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'icons.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./icons.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'maps.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./maps.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li <?php echo ($current_page == 'notifications.php') ? 'class="active"' : ''; ?>>
                        <a class="nav-link" href="./notifications.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="upgrade.php">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Çıkış Yap</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


