    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Our TV-Shows</h4>
            <p class="card-text" style="text-align: justify; border-bottom: 2px solid #eee;">
                <?php
                $sql = "SELECT * FROM movies ORDER BY id DESC";
                $result = mysqli_query($db, $sql);
                $column_counter = 0; // Initialize counter
                echo '<div class="containe">';

                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $description = $row['description'];
                    $viewTime = $row['viewTime'];
                    $id = $row['id'];
                    $image = $row['image'];
                    $dpl = "<img src='images/$image' class='card-img-top' style='width:100%;height:300px;'>";

                    $fullText = $description;
                    $truncatedText = strlen($description) > 50 ? substr($description, 0, 50) . '...' : $description;

                    if ($column_counter % 3 == 0) { // Open new row every 4 columns
                        if ($column_counter != 0) {
                            echo '</div>'; // Close previous row
                        }
                        echo '<div class="row">'; // Open new row
                    }
                    $option = isset($_SESSION['email']) ? 'dashboard.php' : 'login.php';
                    echo '
                        <div class="col-md-3">
                            <div class="card" style="width:100%;">
                                ' . $dpl . '
                                <div class="card-body">
                                    <h5 class="card-title">' . $title . '</h5>
                                    <h6 class="card-title text-warning">' . $viewTime . '</h6>
                                    <p class="card-text">
                                        <span id="truncatedText_' . $id . '">' . $truncatedText . '</span>
                                        <span id="fullText_' . $id . '" style="display:none;">' . $fullText . '</span>
                                        <a href="javascript:void(0);" id="toggleLink_' . $id . '" onclick="toggleText(' . $id . ');">Read more</a>


                                    </p><a href="viewMovie.php?id='.$id.'" class="btn btn-warning">More</a>
                                    <a href="'. $option .'" class="btn btn-warning">Researve Ticket</a>
                                </div>
                            </div>
                        </div>
                    ';

                    $column_counter++;
                }

                echo '</div>'; // Close last row
                echo '</div>';
                ?>
            </p>
        </div>
    </div>