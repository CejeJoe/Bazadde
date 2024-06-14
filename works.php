<?php
include "dashboard/api/dbcon.php";

// Pagination Variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 9;
$offset = ($page - 1) * $records_per_page;

$dt = "SELECT * FROM gallery ORDER BY id DESC LIMIT $offset, $records_per_page;";
$res = mysqli_query($conn, $dt);
$rescheck = mysqli_num_rows($res);

if ($rescheck > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo "
        <div class='col-lg-4 col-md-6 col-12 mb-4 mb-lg-0'>
            <div class='custom-block-wrap'>
                <img src='dashboard/api/".$row["img"]."' class='custom-block-image img-fluid' alt=''>

                <div class='custom-block'>
                    <div class='custom-block-body'>
                        <h5 class='mb-3'>".$row["title"]."</h5>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}

// Pagination Links
$sql = "SELECT COUNT(*) AS total FROM gallery";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $records_per_page);

echo "<ul class='pagination justify-content-center'>";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
}
echo "</ul>";

?>
