<title><?php echo $sitename; ?> - Dashboard</title>

<?php
$sql = "SELECT * FROM users LEFT JOIN agencies USING (agencyid) WHERE userid=?"; // SQL with parameters
$id = $_SESSION['userid'];
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


while ($row = $result->fetch_assoc()) {

    $time = strtotime($row['registered_since']);
    $register_date = date('d-m-Y',$time);

?>
<div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2"><?php echo $row['agencyname']; ?> Dashboard </h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $row['agencyname']; ?> Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Developer Announcement</h4>
                    <p>We are still working on Project Athena. Some features on the site not may work as it should be. Please be patient we are fixing it as soon as possible!</p>
                    <hr>
                    <p class="mb-0">- raydevinlr, Project Athena Developer</p>
                </div>
                <div class="card influencer-profile-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="text-center">
                                    <img src="<?php echo $row["avatar"]; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="user-avatar-info">
                                    <div class="m-b-20">
                                        <div class="user-avatar-name">
                                            <h2 class="mb-1"><?php echo $row['username']; ?></h2>
                                        </div>
                                        <div class="rating-star  d-inline-block"></div>
                                    </div>
                                    <div class="float-right"><!--<img src="https://www.habbo.com/habbo-imaging/avatarimage?hb=image&user=<?php echo $row['username']; ?>&direction=4&head_direction=3&gesture=sml&size=n">--></div>
                                    <div class="user-avatar-address">
                                        <p class="border-bottom pb-3">
                                            <span class="d-xl-inline-block d-block mb-2"><i class="fas fa-building mr-2 text-primary "></i><?php echo $row['agencyname']; ?></span>
                                            <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fas fa-calendar-alt mr-2 text-primary "></i>Joined date: <?php echo $register_date; ?>  </span>
                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fas fa-transgender mr-2 text-primary "></i><?php echo $row['gender']; ?></span>
                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fas fa-globe mr-2 text-primary "></i>Habbo <?php echo $row['hotel']; ?></span>
                                        </p>
                                        <div class="mt-3">
                                            <?php
                                            $sql = "SELECT * FROM user_units LEFT JOIN agencies_units USING (unitid) WHERE userid=$id";
                                            $result = mysqli_query($con, $sql);

                                            while ($units_row = mysqli_fetch_array($result)) {

                                                echo '<a href="#" class="badge badge-light mr-1">';
                                                echo $units_row['unitname'];
                                                echo '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Promotions</h5>
                            <h2 class="mb-0"> 0 total</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                            <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Trainings</h5>
                            <h2 class="mb-0"> 0 total</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                            <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Logs</h5>
                            <h2 class="mb-0">14 total</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                            <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Pending rewards</h5>
                            <h2 class="mb-0"> 0 credits total</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                            <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Timezone</h5>
                    <div class="card-body">
                        <?php
                        date_default_timezone_set('UTC');
                        $today = date("F j, Y, g:i a");

                        echo $today . "<br>";
                        echo date_default_timezone_get();
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Welcome message</h5>
                    <div class="card-body">
                        <?
                        $agencyid = $_SESSION['agencyid'];
                        $sql = "SELECT * FROM settings LEFT JOIN agencies USING (agencyid) WHERE agencyid=$agencyid";
                        $result = mysqli_query($con, $sql);

                        while ($settings = mysqli_fetch_array($result)) {
                            echo $settings['welcome_message'];
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Announcements</h5>
                    <div class="card-body">
                        We need new members!
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Most Promotions</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0"></th>
                                <th class="border-0"></th>
                                <th class="border-0">Username</th>
                                <th class="border-0">Promotions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="m-r-10"><img src="https://www.habbo.nl/habbo-imaging/avatarimage?user=permperm&direction=4&head_direction=3&gesture=sml&size=1&headonly=1" alt="user" class="rounded" width="45"></div>
                                </td>
                                <td>raydevinlr</td>
                                <td>0 promotions </td>
                            </tr>
                            <tr>
                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Most Trainings</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0"></th>
                                <th class="border-0"></th>
                                <th class="border-0">Username</th>
                                <th class="border-0">Promotions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="m-r-10"><img src="https://www.habbo.nl/habbo-imaging/avatarimage?user=permperm&direction=4&head_direction=3&gesture=sml&size=1&headonly=1" alt="user" class="rounded" width="45"></div>
                                </td>
                                <td>raydevinlr</td>
                                <td>0 trainings </td>
                            </tr>
                            <tr>
                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Most Transfers</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0"></th>
                                <th class="border-0"></th>
                                <th class="border-0">Username</th>
                                <th class="border-0">Promotions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="m-r-10"><img src="https://www.habbo.nl/habbo-imaging/avatarimage?user=permperm&direction=4&head_direction=3&gesture=sml&size=1&headonly=1" alt="user" class="rounded" width="45"></div>
                                </td>
                                <td>raydevinlr</td>
                                <td>0 transfers </td>
                            </tr>
                            <tr>
                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="section-block">
                    <h3 class="section-title">Upcoming events</h3>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card campaign-card text-center">
                    <div class="card-body">
                        <div class="campaign-img"><img src="assets/images/dribbble.png" alt="user" class="user-avatar-xl"></div>
                        <div class="campaign-info">
                            <h3 class="mb-1">Event name</h3>
                            <p class="mb-3">Short description of event</p>
                            <p class="mb-1">Hosted by: <span class="text-dark font-medium ml-2">raydevinlr</span></p>
                            <p>Date: <span class="text-dark font-medium ml-2">21-01-2021 at 06:00 pm</span></p>
                            <a href="#">room link</a><a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card campaign-card text-center">
                    <div class="card-body">
                        <div class="campaign-img"><img src="assets/images/dribbble.png" alt="user" class="user-avatar-xl"></div>
                        <div class="campaign-info">
                            <h3 class="mb-1">Event name</h3>
                            <p class="mb-3">Short description of event</p>
                            <p class="mb-1">Hosted by: <span class="text-dark font-medium ml-2">raydevinlr</span></p>
                            <p>Date: <span class="text-dark font-medium ml-2">21-01-2021 at 06:00 pm</span></p>
                            <a href="#">room link</a><a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card campaign-card text-center">
                    <div class="card-body">
                        <div class="campaign-img"><img src="assets/images/dribbble.png" alt="user" class="user-avatar-xl"></div>
                        <div class="campaign-info">
                            <h3 class="mb-1">Event name</h3>
                            <p class="mb-3">Short description of event</p>
                            <p class="mb-1">Hosted by: <span class="text-dark font-medium ml-2">raydevinlr</span></p>
                            <p>Date: <span class="text-dark font-medium ml-2">21-01-2021 at 06:00 pm</span></p>
                            <a href="#">room link</a><a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card campaign-card text-center">
                    <div class="card-body">
                        <div class="campaign-img"><img src="assets/images/dribbble.png" alt="user" class="user-avatar-xl"></div>
                        <div class="campaign-info">
                            <h3 class="mb-1">Event name</h3>
                            <p class="mb-3">Short description of event</p>
                            <p class="mb-1">Hosted by: <span class="text-dark font-medium ml-2">raydevinlr</span></p>
                            <p>Date: <span class="text-dark font-medium ml-2">21-01-2021 at 06:00 pm</span></p>
                            <a href="#">room link</a><a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>