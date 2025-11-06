<?php
function saveFormData() {
    $file = "data.txt";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $q5 = $_POST["q5"];

    if (isset($name, $email, $age, $q1, $q2, $q3, $q4, $q5)) {
        $fp = fopen($file, "a+");
        $txt = "Name: " . $name . "\nEmail: " . $email . "\nAge: " . $age . 
               "\nQ1: " . $q1 . "\nQ2: " . $q2 . "\nQ3: " . $q3 . "\nQ4: " . $q4 . "\nQ5: " . $q5 . "\n\n";
        fwrite($fp, $txt);
        fclose($fp);
        header("Location: data.php");
        exit();
    } 
    else {
        echo json_encode(array("error" => "Missing form data"));
    }
}

function readData($filename) {
    $data = [
        "Q1" => [],
        "Q2" => [],
        "Q3" => [],
        "Q4" => [],
        "Q5" => []
    ];

    if (file_exists($filename)) {
        $file = fopen($filename, 'r');

        while (($line = fgets($file)) !== false) {
            $line = trim($line);

            if (strpos($line, 'Q1:') === 0) {
                $ans = trim(substr($line, 3));
                if ($ans !== '') $data["Q1"][$ans] = ($data["Q1"][$ans] ?? 0) + 1;
            }
            if (strpos($line, 'Q2:') === 0) {
                $ans = trim(substr($line, 3));
                if ($ans !== '') $data["Q2"][$ans] = ($data["Q2"][$ans] ?? 0) + 1;
            }
            if (strpos($line, 'Q3:') === 0) {
                $ans = trim(substr($line, 3));
                if ($ans !== '') $data["Q3"][$ans] = ($data["Q3"][$ans] ?? 0) + 1;
            }
            if (strpos($line, 'Q4:') === 0) {
                $ans = trim(substr($line, 3));
                if ($ans !== '') $data["Q4"][$ans] = ($data["Q4"][$ans] ?? 0) + 1;
            }
            if (strpos($line, 'Q5:') === 0) {
                $ans = trim(substr($line, 3));
                if ($ans !== '') $data["Q5"][$ans] = ($data["Q5"][$ans] ?? 0) + 1;
            }
        }

        fclose($file);
    }

    return $data;
}


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'saveFormData':
        saveFormData();
        break;

    case 'readData':
        $filename = 'data.txt';
        $data = readData($filename);
        echo json_encode($data);
        break;

    default:
        echo json_encode(array("error" => "Invalid action"));
        break;
}
?>
