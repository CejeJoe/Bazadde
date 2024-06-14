<?php
include "dashboard/api/dbcon.php";
function truncate_text($text, $limit) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, strpos($text, ' ', $limit)) . '... <a href="#">Read More</a>';
    }
    return $text;
}
// Pagination Variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 5;
$offset = ($page - 1) * $records_per_page;

$dt = "SELECT * FROM post ORDER BY id DESC LIMIT $offset, $records_per_page;";
$res = mysqli_query($conn, $dt);
$rescheck = mysqli_num_rows($res);

if ($rescheck > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo "
        <div class='news-block'>
            <div class='news-block-top'>
                <a href='news-detail.html'>
                    <img src='dashboard/api/".$row["img"]."' class='news-image img-fluid' alt=''>
                </a>
                <div class='news-category-block'>
                    <a href='#' class='category-block-link'>
                        ".$row["nam"]."
                    </a>
                </div>
            </div>
            <div class='news-block-info'>
                <div class='d-flex mt-2'>
                    <div class='news-block-date'>
                        <p>
                            <i class='bi-calendar4 custom-icon me-1'></i>
                            ".$row["dates"]."
                        </p>
                    </div>
                </div>
                <div class='news-block-title mb-2'>
                    <h4>".$row["nam"]."</h4>
                </div>
                <div class='news-block-body'>
                     <p>".truncate_text($row["details"], 100)."</p>
                </div>
            </div>
        </div>
        ";
    }
}

// Pagination Links
$sql = "SELECT COUNT(*) AS total FROM post";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $records_per_page);

echo "<ul class='pagination justify-content-center'>";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
}
echo "</ul>";

?>
