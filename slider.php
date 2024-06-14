<?php
include "dashboard/api/dbcon.php";
  $dt = "SELECT * FROM slider ;";
  $res = mysqli_query($conn, $dt);
  $rescheck = mysqli_num_rows($res);

  if ($rescheck > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      echo "
      <div class='carousel-item active'>
                                    <img src='dashboard/api/".$row["img1"]."'
                                        class='carousel-image img-fluid' alt='...' style='>

                                    <div class='carousel-caption d-flex flex-column justify-content-end'>
                                        <h1>".$row["title1"]."</h1>

                                        <p>".$row["detail1"]."</p>
                                    </div>
                                </div>
                                  <div class='carousel-item '>
                                    <img src='dashboard/api/".$row["img2"]."'
                                        class='carousel-image img-fluid' alt='...' style='>

                                    <div class='carousel-caption d-flex flex-column justify-content-end'>
                                        <h1>".$row["title2"]."</h1>

                                        <p>".$row["detail2"]."</p>
                                    </div>
                                </div>
                                 <div class='carousel-item '>
                                    <img src='dashboard/api/".$row["img3"]."'
                                        class='carousel-image img-fluid' alt='...' style='>

                                    <div class='carousel-caption d-flex flex-column justify-content-end'>
                                        <h1>".$row["title3"]."</h1>

                                        <p>".$row["detail3"]."</p>
                                    </div>
                                </div>
      ";
      ?>