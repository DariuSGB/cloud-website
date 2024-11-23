<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Website</title>
    <link rel="icon" href="img/favicon.ico">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            background-color: #fff9e6; /* Soft yellow background */
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            margin: 0 auto;
            background-color: white; /* Table background white */
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            white-space: nowrap;
        }
        th {
            background-color: #f2f2f2;
        }
        .highlight {
            background-color: #d4edda; /* Soft green background */
        }
        .flag {
            width: auto;
            height: 100%;
            max-height: 300px; /* Adjust this value as needed */
        }
    </style>
</head>
<body>
    <?php
    // Set headers to prevent caching
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Get client IP address, HTTP method, URI, and scheme
    $client_ip = $_SERVER['REMOTE_ADDR'];
    $http_method = $_SERVER['REQUEST_METHOD'];
    $request_scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'HTTPS' : 'HTTP';
    $request_uri = $_SERVER['REQUEST_URI'];
    ?>
    <div class="container">
        <table>
            <tr>
                <th>Header</th>
                <th>Value</th>
            </tr>
            <tr class="highlight">
                <td>Client IP Address</td>
                <td><?php echo $client_ip; ?></td>
            </tr>
            <tr class="highlight">
                <td>HTTP Method</td>
                <td><?php echo $http_method; ?></td>
            </tr>
            <tr class="highlight">
                <td>Request Scheme</td>
                <td><?php echo $request_scheme; ?></td>
            </tr>
            <tr class="highlight">
                <td>Request URI</td>
                <td><?php echo $request_uri; ?></td>
            </tr>
            <?php
            $headers = getallheaders();
            ksort($headers); // Sort headers alphabetically by key
            foreach ($headers as $name => $value) {
                if (!empty($value)) {
                    echo "<tr><td>$name</td><td>$value</td></tr>";
                }
            }
            ?>
        </table>
        <img src="flag.php" alt="Flag" class="flag">
    </div>
</body>
</html>
