<?php 
    require "connect.php";

    if (isset($_POST['submit'])) {
        htmlspecialchars(trim($fname = $_POST['fname']));
        htmlspecialchars(trim($lname = $_POST['lname']));
        htmlspecialchars(trim($email = $_POST['email']));
        htmlspecialchars(trim($gender = $_POST['gender']));
        htmlspecialchars(trim($country_code = $_POST['country_code']));
        htmlspecialchars(trim($country = $_POST['country']));
        htmlspecialchars(trim($phone_number = $_POST['phone_number']));
        htmlspecialchars(trim($year = $_POST['year']));
        htmlspecialchars(trim($month = $_POST['month']));
        htmlspecialchars(trim($day = $_POST['day']));
        $kyc_session = 1;

        $sql = "INSERT INTO kyc (kyc_user_id, kyc_session, fname, lname, email, gender, country_code, country, phone_number, year, month, day) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $smtp = $connection->prepare($sql);
        $smtp->bind_param('ssssssssssss', $user_id, $kyc_session, $fname, $lname, $email, $gender, $country_code, $country, $phone_number, $year, $month, $day);
        $smtp->execute();
        echo "<script>
                alert('KYC form uploaded successfully');
                window.location.href = '../dashboard/kyc-form-address'
             </script>";
    }



    if (isset($_POST['submit_two'])) {
        htmlspecialchars(trim($address = $_POST['address']));
        htmlspecialchars(trim($zip_code = $_POST['zip_code']));
        htmlspecialchars(trim($apartment_number = $_POST['apartment_number']));
        htmlspecialchars(trim($city = $_POST['city']));
        htmlspecialchars(trim($state = $_POST['state']));
        $kyc_session = 2;

        $sql = "UPDATE kyc SET address = ?, zip_code = ?, apartment_number = ?, city = ?, state = ?, kyc_session = ? WHERE kyc_user_id = '$user_id'";
        $smtp = $connection->prepare($sql);
        $smtp->bind_param('ssssss', $address, $zip_code, $apartment_number, $city, $state, $kyc_session);
        $smtp->execute();
        echo "<script>
                alert('KYC form updated successfully');
                window.location.href = '../dashboard/kyc-form-address'
             </script>";

    }

?>