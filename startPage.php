<!doctype html>

<html>
    <head>
        <title>Update</title>
        <style><?php include('css/startPage.css'); ?></style>
        <script type="text/javascript"><?php include('js/startPage.js'); ?></script>
    </head>
    <body>
        <div class="main" style="padding:10px 0px; opacity:0;">
            <div class="leftMenu" style="padding:20px 0px;">
                <div style="border-right:3px solid #00d7ff;">
                    <img src="images/rr.png" /><br />
                    <p style="font-size:16px;">Welcome to cling</p>
                    <button>login</button>
                    <button>signup</button>
                    <span class="clear"></span>
                </div>
            </div>
            <div class="rightMenu">
                <div style="margin:5px;">
                    <div class="loginForm" style="display:none;">
                        <div style="margin:5px; max-width:280px; margin:0px auto;">
                            <div class="formElement">
                                <p style="text-align:center; font-weight:bold; font-size:16px;">Login </p>
                                <table>
                                    <tr>
                                        <td>Email</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="Email" /></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                    </tr>
                                    <tr>
                                        <td><input type="password" placeholder="Password" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button style="opacity:0;"></button>
                                            <button style="width:100%; background:#053b72;">Login</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="lprogress" style="text-align:left; color:#000; font-weight:bold;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="signupForm" style="display:block;">
                        <p style="text-align:center; font-weight:bold; font-size:16px;">Create account </p>
                        <div class="formContainer" style="margin-left:0px;" data-left="0">
                            <div class="formElement">
                                <table>
                                    <tr>
                                        <td>First Name</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="First Name" /></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="Last Name" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button style="opacity:0;"></button>
                                            <button style="width:100%;">Next</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="formElement">
                                <table>
                                    <tr>
                                        <td>Email</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="Email" /></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="Phone" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button>Back</button>
                                            <button>Next</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="formElement">
                                <table>
                                    <tr>
                                        <td>Country</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="New password" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button>Back</button>
                                            <button>next</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="formElement">
                                <table>
                                    <tr>
                                        <td>New password</td>
                                    </tr>
                                    <tr>
                                        <td><input type="password" placeholder="New password" /></td>
                                    </tr>
                                    <tr>
                                        <td>Confirm password</td>
                                    </tr>
                                    <tr>
                                        <td><input type="password" placeholder="confirm password" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button>Back</button>
                                            <button>Next</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="formElement">
                                <table>
                                    <tr>
                                        <td>
                                            <select class="uss">
                                                <option>Month</option>
                                                <?php
                                                    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
                                                    for($month = 0; $month < count($months); $month++){
                                                        ?>
                                                            <option><?php echo $months[$month]; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="uss">
                                                <option>Day</option>
                                                <?php

                                                    for($counter = 1; $counter < 32; $counter++){
                                                        ?>
                                                            <option><?php echo $counter; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="uss">
                                                <option>Year</option>
                                                <?php
                                                    $max = date('Y')-2;
                                                    $min = $max - 100;
                                                    for($max; $max > $min; $max--){
                                                        ?>
                                                            <option><?php echo $max; ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button>Back</button>
                                            <button>signup</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="sprogress" style="text-align:left; color:#000; font-weight:bold;"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <span class="clear"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loader" style="display:none;"><div style="text-align:center"><img src="images/loader.png" class="myloader" /></div></div>
    </body>
</html>
