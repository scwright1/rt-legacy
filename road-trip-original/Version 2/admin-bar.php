        <div id="admin-bar">
            <div class="menu-container" style="float: left;"  onmouseover="mouseOverMenu('user-menu', 'userBlock')" onmouseout="mouseOutMenu('user-menu','userBlock')">
                <div id="userBlock" class="bar-item-left">
                    <div id="userButton" class="bar-label-left">
                        User Admin
                    </div>
                </div>
                <div id="user-menu" class="bar-item-block">
                    <?php
			            if(!$_SESSION['id']):
                    ?>
                        <div class="menu-content">
                            You must login in order to use this menu.
                        </div>
                    <?php
                         else:
                    ?>
                        <div class="menu-content">
                            Thanks for logging in!<br />
                            User: <?php echo $_SESSION['usr']; ?><br />
                            Type: <?php echo $_SESSION['acc']; ?><br />
                            <input type="hidden" id="user_id" value=<?php echo $_SESSION['id'];?>></input>
                        </div>
                        <div class="menu-content">
                            <a href="?logoff" onclick="closeShutter();">Log off</a>
                        </div>
                    <?php
                          endif;
                    ?>
                </div>
            </div>
            <?php
                if($_SESSION['id']):               
            ?>
            <div class="menu-container" style="float: left;"  onmouseover="mouseOverMenu('map-menu', 'mapDataBlock')" onmouseout="mouseOutMenu('map-menu', 'mapDataBlock')">
                <div id="mapDataBlock" class="bar-item-left">
                    <div id="mapDataButton" class="bar-label-left">
                        Map Data
                    </div>
                </div>
                <div id="map-menu" class="bar-item-block">
                    <div class="menu-content">
                        Here is another section of menu
                    </div>
                    <div class="menu-content">
                        this is a third menu item.  it is a bit longer than the other two.
                        <ul>
                            <form action="php/saveToDb.php" method="post">
                                <input type="hidden" id="serialized" name="serialized"/>
                                <input type="submit" value="Save" onclick="saveToDatabase();" />
                            </form>
                            <li><a href="#">Save Locations To Database</a></li>
                            <li>item 2</li>
                            <li><img src="images/palette.png" width=50 height=10 /></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                 endif;
            ?>
            <div class="menu-container" style="float: left;"  onmouseover="mouseOverMenu('about-menu', 'aboutBlock')" onmouseout="mouseOutMenu('about-menu', 'aboutBlock')">
                <div id="aboutBlock" class="bar-item-left">
                    <div id="aboutButton" class="bar-label-left">
                        About Journee
                    </div>
                </div>
                <div id="about-menu" class="bar-item-block">
                    <div class="menu-content">
                        <b><?php echo $NAME ?></b><br />A Collaborative Trip Planner and Tracker | 
                        &copy; <?php echo date("Y"); ?>. <br /><img src="images/palette.png" width=50 height=10 /><br /><a href="http://www.stephencwright.co.uk">Stephen C. Wright</a><br />(A)v.0242
                    </div>
                </div>
            </div>
            <!-- search bar to go here, might have the DIV roll over after you log in -->
            <div id="search-container">
                <div id="search-container-inner">
                    <!-- a button is not needed for searching 
                    <div class="button">
                        Search
                    </div> -->
                    <!-- search input disabled before login -->
                    <input id="searchInput" size="41" disabled="disabled" style="float: left;">
                    <img src="images/search.png" width=22 height=22 style="float: right; margin-top:3px;"/>
                </div>
            </div>
            <!-- search bar end -->
        </div>
