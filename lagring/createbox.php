<?php
    include('../config/session.php');
    $result = $db->query("SELECT eske_nummer FROM esker ORDER BY id DESC LIMIT 1");
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if (!($stmt = $db->prepare("INSERT INTO esker (eske_nummer, added_by) VALUES (:eske_nummer, :user_id )"))) {
        echo "Prepare failed: (" . $db->errno . ") " . $db->error;
    } else {
        $user_id = $_SESSION['user_id'];
        $eske_nummer = $row['eske_nummer']+1;
        $stmt->bindParam(":eske_nummer",$eske_nummer);
        $stmt->bindParam(":user_id",$user_id);
        if(!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            echo "Nytt eske nummer: " . $eske_nummer;
        }
    }
?>
