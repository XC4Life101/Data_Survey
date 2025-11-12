<?php
function saveFormData() {
    $file = "data.txt";

    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $q5 = $_POST["q5"];

    if (isset($name, $birthdate, $q1, $q2, $q3, $q4, $q5)) {
        $fp = fopen($file, "a+");

        $timestamp = strtotime($birthdate);
        $birthM = date("F", $timestamp);
        $birthD = date("j", $timestamp);

        $txt = "Name: $name\nBirth Month: $birthM\nBirth Day: $birthD\n";
        $txt .= "Q1: $q1\nQ2: $q2\nQ3: $q3\nQ4: $q4\nQ5: $q5\n\n";

        fwrite($fp, $txt);
        fclose($fp);
        header("Location: data.php");
        exit();
    } else {
        echo json_encode(array("error" => "Missing form data"));
    }
}

function readData($filename) {
    $data = [
        "Birth Month" => [],
        "Birth Day" => [],
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
            foreach ($data as $key => $val) {
                if (strpos($line, "$key:") === 0) {
                    $ans = trim(substr($line, strlen("$key:")));
                    if ($ans !== '') {
                        // Handle multiple answers separated by '/'
                        $parts = array_map('trim', explode('/', $ans));
                        foreach ($parts as $part) {
                            $data[$key][$part] = ($data[$key][$part] ?? 0) + 1;
                        }
                    }
                }
            }
        }
        fclose($file);
    }

    return $data;
}

// Action routing
$action = $_GET['action'] ?? '';
switch ($action) {
    case 'saveFormData':
        saveFormData();
        break;
    case 'readData':
        $data = readData('data.txt');
        echo json_encode($data);
        break;
    default:
        echo json_encode(array("error" => "Invalid action"));
        break;
}
?>
