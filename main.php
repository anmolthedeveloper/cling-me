<!doctype html>
<html>
    <head>
        <title>Drop down menu</title>
        <style type="text/css"><?php include('css/main.css'); ?></style>
        <script type="text/javascript"><?php echo include('js/main.js'); ?></script>
    </head>
    <body>
        <div class="main">
            <div class="navigation">
                <div class="navigationButton">
                    Home
                </div>
                <div class="navigationButton">
                    Profile
                </div>
                <div class="navigationButton">
                    Projects
                    <div class="menuArrow">
                        <div class="svg_arrow">
                            <?php include('images/svg/arrow_down.svg'); ?>
                        </div>
                    </div>
                    <div class="navigationOptions">
                        <div class="extraNavigation">School management</div>
                        <div class="extraNavigation">Character Encryptor</div>
                        <div class="extraNavigation">Accounting system</div>
                        <div class="extraNavigation">World of fame</div>
                        <div class="extraNavigation">Johata</div>
                    </div>
                </div>
                <div class="navigationButton">
                    Tutorials
                </div>
                <div class="navigationButton">
                    Others
                </div>
            </div>
        </div>
    </body>
</html>
