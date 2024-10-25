<!-- view_users.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h2>Registered Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Address</th>
        </tr>

        <?php
        // MySQL Database Connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registration_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the users table
        $sql = "SELECT id, full_name, email, phone_number, birth_date, gender, course, addresss FROM users";
        $result = $conn->query($sql);

        // Display data in a table
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["full_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone_number"]. "</td><td>" . $row["birth_date"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["course"]. "</td><td>" . $row["addresss"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </table>
</body>
</html>
