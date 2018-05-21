<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['sessVar'])) exit;
    $ims = data($_POST['images']);
    $text = data($_POST['text']);
    $me = $_SESSION['sessVar'];
    $i = $me['id'];

    if($ims == '' && $text == '') exit;

    //insert new record
    $query = mysqli_query($db,"insert into post (`date`,`text`,`userId`) value(now(),'$text','$i')") or die(mysqli_error($db));

    //we need to get the post ID from the database
    $get = mysqli_query($db,"select * from post where `text` = '$text' and `userId` = '$i' order by id desc limit 1") or die(mysqli_error($db));
    $data = $get->fetch_assoc();
    $postId = $data['id'];

    //insert images in relation to the above post
    if($ims != ''){
        $array = explode(',',$ims);
        for($i = 0; $i < count($array); $i++){
            if($array[$i] != '' && file_exists('../photos/photos/'.$array[$i])){
                $info = pathinfo($array[$i]);
                $name = $info['filename'];
                $extension = $info['extension'];
                $img = mysqli_query($db,"insert into postImages (`postId`,`imageName`,`extension`) value('$postId','$name','$extension')") or die(mysqli_error($db));
            }
        }
    }

    //retrive the whole post
    $p = mysqli_query($db,"select u.fname fname, u.lname lname, u.profile profile, p.text text, p.id id from user u join post p on p.userId=u.id where p.id = '$postId'") or die(mysqli_error($db));
    while($post = mysqli_fetch_assoc($p)){
        //images if any
        $im = mysqli_query($db,"select * from postImages where postId = '$postId' order by rand()") or die(mysqli_error($db));
        ?>
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
        <?php
    }
?>
