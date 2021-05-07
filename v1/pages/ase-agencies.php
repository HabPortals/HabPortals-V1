<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Agencies</h2>
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
                    <div class="card">
                        <h5 class="card-header">All Agencies</h5>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Owner</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT agencyid, agencyname FROM agencies";
                                    $result = mysqli_query($con, $sql);

                                    while ($units_row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $units_row['agencyname'] . "</td>";
                                        echo "<td>raydevinlr</td>";
                                        echo "<td>Edit</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="#" class="btn btn-success">Add Agency</a>
                </div>
            </div>
        </div>
    </div>
</div>