<div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header" id="top">
                            <h2 class="pageheader-title">Profile Settings</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Settings</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php

                        if(isset($_POST['save_settings'])) {
                            $about = $_POST['about_me'];
                            $youtube = $_POST['youtube_embed'];
                            $twitter = $_POST['twitter'];
                            $discord = $_POST['discord'];
                            $sql = "UPDATE users SET about_me='$about', youtube_embed='$youtube', twitter='$twitter', discord='$discord' WHERE userid=$id";
                            $result = mysqli_query($con, $sql);

                            echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/index.php?page=settings-profile"/>';
                            echo '<div class="alert alert-success" role="alert">Profile preferences successfully updated.</div>';
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Profile Settings</h4>
                                <?php
                                $id = $_SESSION['userid'];
                                $sql = "SELECT * FROM users LEFT JOIN agencies USING (agencyid) WHERE userid=$id"; // SQL with parameters
                                $result = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_array($result)) {

                                    $time = strtotime($row['registered_since']);
                                    $register_date = date('d-m-Y',$time);

                                    ?>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">About me</label>
                                        <textarea class="form-control" id="FormControlTextarea1" name="about_me" rows="3" placeholder="Tell us something about yourself.."><?php echo $row['about_me']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3">YouTube Video</label>
                                        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">https://www.youtube.com/watch?v=</span></span>
                                            <input type="text" name="youtube_embed" value="<?php echo $row['youtube_embed']; ?>" class="form-control">
                                        </div>
                                        <p>Use the ID given behind the YouTube Link. Example: https://www.youtube.com/watch?v=<b><u>4D7u5KF7SP8</u></b></p>
                                    </div>
                                    <h4>Social Channels</h4>
                                    <div class="form-group">
                                        <label for="inputText3">Twitter</label>
                                        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">@</span></span>
                                            <input type="text" name="twitter" value="<?php echo $row['twitter']; ?>" class="form-control">
                                        </div>
                                        <p>Use the ID given behind the YouTube Link. Example: https://www.youtube.com/watch?v=<b><u>4D7u5KF7SP8</u></b></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3">Discord</label>
                                        <input id="inputText3" name="discord" type="text" value="<?php echo $row['discord']; ?>" class="form-control">
                                    </div>
                                    <input type="submit" name="save_settings" class="btn btn-success" value="Save Settings">
                                </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                <div class="sidebar-nav-fixed">
                    <ul class="list-unstyled">
                        <li><a href="index.php?page=settings">User Settings</a></li>
                        <li><a href="index.php?page=settings-profile" class="active">Profile Settings</a></li>
                        <li><a href="index.php?page=settings-avatar">Set Avatar</a></li>
                        <li><a href="#select">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
