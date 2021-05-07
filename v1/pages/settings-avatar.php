    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header" id="top">
                            <h2 class="pageheader-title">Avatar Settings</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Settings</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Avatar Settings</li>
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

                            echo '<div class="alert alert-success" role="alert">Profile preferences successfully updated.</div>';
                            header('refresh: 2; url=index.php?page=settings-profile');
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Current Avatar</h4>
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
                                        <img src="<?php echo $row["avatar"]; ?>" alt="User Avatar" class="img-thumbnail user-avatar-xxl">
                                        <p>This is your current avatar you can change it below</p>
                                    </div>
                                    <h4>Upload avatar</h4>
                                    <div class="form-group">
                                        <label for="inputText3">Select image to upload: </label><br>
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <input type="submit" name="save_settings" class="btn btn-success" value="Save Avatar">
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
                        <li><a href="index.php?page=settings-profile">Profile Settings</a></li>
                        <li><a href="index.php?page=settings-avatar" class="active">Set Avatar</a></li>
                        <li><a href="#select">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
