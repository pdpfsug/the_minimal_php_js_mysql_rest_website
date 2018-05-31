<?php
    $conn = mysqli_connect('localhost', 'phpminimal', 'phpcrazy') or die('Connection error');
    mysqli_select_db($conn, 'esempio') or die('DB error');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        /* Parse JSON:
         * prende il testo in formato JSON e lo riporta in una struttura PHP
         * sia esso un ARRAY ASSOCIATIVO, o una lista, o una semplice stringa
         *
         * In questo caso è un array associativo perché il JSON che trasmette la posizione
         * è tipo:
         *          {"lat": "43.3499293",
         *           "lon": "12.9138412",
         *           "timestamp": "2018-05-17T19:08Z"
         *          }
         */
        $data = json_decode(file_get_contents('php://input'), true);

        /* Insert data:
         * Inserisce i dati nel database
         */
        $user_id = $_SESSION["user_id"];
        mysqli_query($conn, "INSERT INTO posizione (user_id, timestamp, lat, lon, msg) VALUES($user_id, ".$data['timestamp'].", ".$data['lat'].", ".$data['lon'].", '')");

    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {

        header('Content-type: application/json;');
        echo '
            [
                {"id": 1, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 2, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 3, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 4, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 5, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 6, "user": "radeox", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 7, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"},
                {"id": 8, "user": "tapion", "lat": 43.3499293, "lon": 12.9138412, "timestamp": "now"}
            ]
        ';
        // TODO
        // $sql = $conn->prepare("SELECT * FROM posizione");
        // $sql->execute();

        // $result = $sql->get_result();
        // Giusto cosi? Bhooo
        // echo json_encode($result);
    }

    mysqli_close($conn);
?>
