<!doctype html>
<html>
    <head>
        <title>Drop down menu</title>
        <style type="text/css"><?php include('css/main.css'); ?></style>
        <script type="text/javascript"><?php echo include('js/main.js'); ?></script>
        <script type="text/javascript"><?php echo include('js/async.js'); ?></script>
    </head>
    <body>

        <div class="main">
            <div class="myribbon">
                <div class="logoDiv">
                    <table>
                        <tr>
                            <td style="width:60px;">
                                <img src="images/rr.png" />
                            </td>
                            <td>
                                <p class="cyname">Cling</p>
                                <p class="cas">Chat, advertise, have fun</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="navigation">
                    <div class="navigationButton">
                        Home
                    </div>
                    <div class="navigationButton">
                        Profile
                    </div>
                    <div class="navigationButton">
                        Inbox
                    </div>
                    <div class="navigationButton">
                        Chat
                    </div>
                    <div class="navigationButton">
                        Others
                        <div class="menuArrow">
                            <div class="svg_arrow">
                                <?php include('images/svg/arrow_down.svg'); ?>
                            </div>
                        </div>
                        <div class="navigationOptions" style="display:none;">
                            <div class="extraNavigation">Followers</div>
                            <div class="extraNavigation">Following</div>
                            <div class="extraNavigation">Pages</div>
                            <div class="extraNavigation">Ads</div>
                            <div class="extraNavigation">Help</div>
                            <div class="extraNavigation"><a href="index.php?logout" style="display:block; color:#000;">logout</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="leftDesk">
                    <div style="margin:5px;" class="pscn">
                        <div class="mypost" style="background:#053b72; color:#fff;padding: 50px;font-size: 15px;text-align: center;font-weight: bold;line-height: 1.7;">
                            <h2>Welcome home!</h2>
                            <p>Please feel free to navigate the whole site, click any button you see around and follow any links.<br />It's free and safe in here!</p>
                        </div>
                        <?php
                            $p = mysqli_query($db,"select u.fname fname, u.lname lname, u.profile profile, p.text text, p.id id from user u join post p on p.userId=u.id order by rand()") or die(mysqli_error($db));
                            while($post = mysqli_fetch_assoc($p)){
                                //images if any
                                $postId = $post['id'];
                                $im = mysqli_query($db,"select * from postImages where postId = '$postId' order by rand()") or die(mysqli_error($db));
                                ?>
                                    <div class="mypost">
                                        <div class="mprf">
                                            <table>
                                                <tr>
                                                    <td style="width:60px;">
                                                        <div class="pio">
                                                            <?php
                                                                if($post['profile'] != ''){
                                                                    ?>
                                                                        <img src="photos/profile/profilePhoto/<?php echo $profile; ?>" />
                                                                    <?php
                                                                }
                                                            ?>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="cyname"><?php echo $post['fname'].' '.$post['lname']; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                            <?php
                                                if(mysqli_num_rows($im) > 0){
                                                    ?>
                                                        <div class="pimage">
                                                            <?php
                                                            while($ii = mysqli_fetch_assoc($im)){
                                                                ?>
                                                                    <div class="psim">
                                                                        <img src="photos/thumbs/<?php echo $ii['imageName'].'.'.$ii['extension']; ?>" />
                                                                    </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                        <div class="ptxt">
                                            <?php
                                                echo $post['text'];
                                            ?>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="myUpdates">
                    <div style="margin:5px;">
                        <div class="newPost">
                            <p class="phh">Wanna say something?</p>
                            <div class="mytextarea" contenteditable="true"></div>
                            <div class="updims">
                                <div class="uploader" style="background:#eee; border:1px solid #ccc;">
                                    <div class="camera_uploader">
                                        <?php include('images/svg/camera.svg'); ?>
                                    </div>
                                    <input type="file" class="piUpd" accept="image/*" multiple />
                                </div>
                                <span class="clear"></span>
                                <input type="hidden" value="" id="images" />
                            </div>
                            <button class="theSubmitButton">submit</button>
                            <span class="clear"></span>
                        </div>
                        <!-- This will be used for updates -->
                    </div>
                </div>
                <span class="clear"></span>
            </div>
        </div>
        <div class="overlay"></div>
        <div id="loader" style="display:none;"><div style="text-align:center"><img src="images/loader.png" class="myloader" /></div></div>
    </body>
</html>
