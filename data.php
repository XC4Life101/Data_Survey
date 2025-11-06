<?php
    include 'action.php';
    $data = readData('data.txt');
    $jsonData = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Survey Data</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <header>
            <h1>Survey Central</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="survey.php">Survey</a></li>
                    <li><a href="data.php" class="active">Data</a></li>
                </ul>
            </nav>
        </header>
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <select id="questionSelect" class="cta-button" style="margin: 20px;">
        </select>
        <script>
            const chartData = <?php echo $jsonData; ?>;
            generateDropdown(chartData);
        </script>
        <footer>
            <p>&copy; 2024 Survey Central; Created by Liam Zadoorian</p>
        </footer>
    </body>
</html>
