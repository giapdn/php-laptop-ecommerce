<div id="static">
    <ul class="tittle">
        <li>STT</li>
        <li>Loại hàng</li>
        <li>Số lượng</li>
        <li>Giá cao nhất</li>
        <li>Giá thấp nhất</li>
        <li>Giá trung bình</li>
    </ul>
    <?php
    $sql = "SELECT 
        categories.category_name as ctgryName, 
        COUNT(products.prodID) as count,
        MAX(products.prodPrice) as maxPrice,
        MIN(products.prodPrice) as minPrice,
        AVG(products.prodPrice) as avgPrice
        FROM categories
        LEFT JOIN products ON categories.category_id = products.category_id
        GROUP BY categories.category_name;
    ";
    $index = 0;
    try {
 
        $data = $conn->query($sql);
        if ($data->num_rows != 0) {
            while ($rows = $data->fetch_assoc()) {
                echo '<ul class="rows">
                    <li>' . $index++ . '</li>
                    <li>' . $rows["ctgryName"] . '</li>
                    <li>' . $rows["count"] . '</li>
                    <li>' . $rows["maxPrice"] . '</li>
                    <li>' . $rows["minPrice"] . '</li>
                    <li>' . $rows["avgPrice"] . '</li>
                </ul>';
            }
        } else {
            echo "Trống !";
        }
    } catch (\mysqli_sql_exception $th) {
        echo "oop: ". $th->getMessage();
    } finally {
        $conn->close();
    }
    ?>
</div>