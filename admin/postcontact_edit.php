<?php

include('root.php');

    try{
        $sql = "UPDATE contact  SET iframe = :iframe  WHERE contact_id = :contact_id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'contact_id' => 1, 'iframe' => $_POST['iframe'] ]);

        $sql = "UPDATE contact  SET name_address = :name_address  WHERE contact_id = :contact_id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'contact_id' => 1, 'name_address' => $_POST['name_address'] ]);

        $sql = "UPDATE contact  SET tel = :tel  WHERE contact_id = :contact_id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'contact_id' => 1, 'tel' => $_POST['tel'] ]);

        $sql = "UPDATE contact  SET email = :email  WHERE contact_id = :contact_id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'contact_id' => 1, 'email' => $_POST['email'] ]);

        header("Location: contact.php");
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>