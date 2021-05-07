    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header" id="top">
                            <h2 class="pageheader-title">User Settings</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Settings</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Settings</li>
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
                            $gender = $_POST['gender'];
                            $hotel = $_POST['hotel'];
                            $timezone = $_POST['timezone'];
                            $sql = "UPDATE users SET gender='$gender', hotel='$hotel', timezone='$timezone' WHERE userid=$id";
                            $result = mysqli_query($con, $sql);

                            echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/index.php?page=settings"/>';
                            echo '<div class="alert alert-success" role="alert">User preferences successfully updated.</div>';
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
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
                                        <label for="inputText3" class="col-form-label">Username</label>
                                        <input id="inputText3" type="text" placeholder="<?php echo $row['username']; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3">Agency</label>
                                        <input id="inputText3" type="text" placeholder="<?php echo $row['agencyname']; ?>" class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText3">Member since</label>
                                        <input id="inputText3" type="text" placeholder="20-20-2019" class="form-control" disabled>
                                        <p>If the date isn't correct please contact your supervisor</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText3">Registered on</label>
                                        <input id="inputText3" type="text" placeholder="<?php echo $register_date; ?>" class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="input-select">Gender</label>
                                        <select class="form-control" id="input-select" name="gender">
                                            <option><?php echo $row['gender']; ?></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Non-binary</option>
                                            <option>I rather not say</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="input-select">Hotel Country</label>
                                        <select class="form-control" id="input-select" name="hotel">
                                            <option><?php echo $row['hotel']; ?></option>
                                            <option>COM</option>
                                            <option>Nederland</option>
                                            <option>Germany</option>
                                            <option>France</option>
                                            <option>Italy</option>
                                            <option>Turkey</option>
                                            <option>Finland</option>
                                            <option>Spain</option>
                                            <option>Sweden</option>
                                            <option>Brazil</option>
                                            <option>Denmark</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="input-select">Timezone</label>
                                        <select class="form-control" id="input-select" name="timezone">
                                            <option>UTC</option>
                                        </select>
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
                        <li><a href="" class="active">User Settings</a></li>
                        <li><a href="index.php?page=settings-profile">Profile Settings</a></li>
                        <li><a href="index.php?page=settings-avatar">Set Avatar</a></li>
                        <li><a href="#select">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
