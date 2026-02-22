<!DOCTYPE html>
<html>
<head>
    <title>Customer Order History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Customer Order History</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Date</th>
        </tr>

        <!-- This data should be fetched dynamically using PHP -->
        <?php
        $conn = new mysqli("localhost","root","","ecommerce");

        $sql = "SELECT c.name, p.product_name, o.quantity, o.total_amount, o.order_date
                FROM Orders o
                JOIN Customers c ON o.customer_id = c.customer_id
                JOIN Products p ON o.product_id = p.product_id
                ORDER BY o.order_date DESC";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['total_amount']}</td>
                    <td>{$row['order_date']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>