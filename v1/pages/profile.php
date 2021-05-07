<?php
$id = $_GET['userid'];
$sql = "SELECT * FROM users LEFT JOIN agencies USING (agencyid) WHERE userid=$id"; // SQL with parameters
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {

    $time = strtotime($row['registered_since']);
    $register_date = date('d-m-Y',$time);
?>
    <title><?php echo $sitename; ?> - Profile of <?php echo $row['username']; ?></title>

    <div class="influence-profile">
        <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2"><?php echo $row['username']; ?>'s Profile </h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $row['username']; ?>'s Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar text-center d-block">
                            <img src="<?php echo $row["avatar"]; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                        </div>
                        <div class="text-center">
                            <h2 class="font-24 mb-0"><?php echo $row['username']; ?></h2>
                            <p><?php echo $row['agencyname']; ?></p>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h3 class="font-16">Information</h3>
                        <div class="">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-calendar-alt mr-2"></i><b>Member since:</b> <?php echo $register_date; ?> </li>
                                <li class="mb-0"><i class="fas fa-star mr-2"></i><b>Medals:</b> 1</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h3 class="font-16">Special units</h3>
                        <div>
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
                    <div class="card-body border-top">
                        <h3 class="font-16">Social Channels</h3>
                        <div class="">
                            <ul class="mb-0 list-unstyled">
                                <li class="mb-1"><a href="https://twitter.com/<?php echo $row['twitter']; ?>" target="_newtab"><i class="fab fa-fw fa-twitter-square mr-1 twitter-color"></i><?php echo $row['twitter']; ?></a></li>
                                <li class="mb-1"><a href="#"><i class="fab fa-fw fa-discord mr-1 instagram-color"></i><?php echo $row['discord']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                <div class="influence-profile-content pills-regular">
                    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Achievements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">About me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Guestbook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Timeline</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="section-block">
                                        <h3 class="section-title">My Achievements</h3>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">0</h1>
                                            <p>Something here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">0</h1>
                                            <p>Something here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">0</h1>
                                            <p>Something here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="mb-1">0</h1>
                                            <p>Something here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-block">
                                <h3 class="section-title">My Medals</h3>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            raydevinlr has not earned medals yet
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="section-block">
                                        <h2 class="section-title">About me</h2>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <?php echo $row['about_me']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <iframe id="ytplayer" type="text/html" width="540" height="360" src="https://www.youtube.com/embed/<?php echo $row['youtube_embed']; ?>" frameborder="0"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="card">
                                <h5 class="card-header">Guestbook</h5>
                                <div class="card-body">
                                    <div class="review-block">
                                        <span class="text-dark font-weight-bold">XXXTentacruel</span><small class="text-mute"> Japanese Self Defence Force</small>
                                        <p class="review-text font-italic m-0">Nice achievements you got there</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link " href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                            <section class="cd-timeline js-cd-timeline">
                                <div class="cd-timeline__container">
                                    <!-- cd-timeline__block -->
                                    <div class="cd-timeline__block js-cd-block">
                                        <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                            <img src="../assets/vendor/timeline/img/cd-icon-movie.svg" alt="Movie">
                                        </div>
                                        <div class="cd-timeline__content js-cd-content">
                                            <h3>Got promoted to rank 4</h3>
                                            <p>Comment here</p>
                                            <span class="cd-timeline__date">28 January, 2021</span>
                                        </div>
                                    </div>
                                    <div class="cd-timeline__block js-cd-block">
                                        <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                            <img src="../assets/vendor/timeline/img/cd-icon-movie.svg" alt="Movie">
                                        </div>
                                        <div class="cd-timeline__content js-cd-content">
                                            <h3>Started at FBI</h3>
                                            <p>Rank 1 </p>
                                            <span class="cd-timeline__date">25 January, 2021</span>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end campaign tab one -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end campaign data -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>
<?php
}
?>