<header>
        <nav>
        <div class="logo_space"><img src="../img/Logo/ScoutProBlackBackground.png" alt=""></div>
            <div class="nav_first">
                
                
                <div class="menu_options">
                    <ul>
                        <li><a href="index.php">Player Database</a></li>
                        <li><a href="index.php">Player Analysis</a></li>
                        <li><a href="compareList.php">Comparative Analysis</a></li>
                        <li><a href="matchespage.php">Matches</a></li>
                    </ul>
                </div>
            </div>
            <div class="nav_second">
            <div class="divader_nav"></div>
            <div class="logout_space">
                <ul class="logout_list">
                <?php
                    if(isset($_SESSION["userEmail"])){
                    echo '<li> <img src="../img/Iconos/close-square-svgrepo-com.svg" alt=""><a type="submit" name="submit" href="../backend/logout.inc.php" class="logout_bottom" style="border-radius: 0 0 20px 20px ;">Log Out</a></li>';
                    }; ?>
                    <li><img src="../img/Iconos/settings-svgrepo-com.svg" alt=""><a href="">Settings</a></li>
                </ul>
            </div>
        </div>


        </nav>
    </header>