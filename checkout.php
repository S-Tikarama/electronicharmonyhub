<?php
    $amount = $_POST['amount'];
    $username = $_POST['username'];

    $paisa = $amount * 100;
    echo $username. 'test';

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "return_url": "http://localhost/electronic/success.php",
    "website_url": "https://127.0.0.1/",
    "amount": "' . $paisa . '",
    "purchase_order_id": "Order01",
        "purchase_order_name": "test",

    "customer_info": {
        "name": "' . $username . '",
        "email": "test@khalti.com",
        "phone": "9800000001"
    }
    }

    ',
    CURLOPT_HTTPHEADER => array(
        'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
        'Content-Type: application/json',
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    
    // Check if response is not empty and parse JSON
    if (!empty($response)) {
        $responseData = json_decode($response, true);

        // Check if payment_url is present in the response
        if (isset($responseData['payment_url'])) {
            $value = $responseData['payment_url'];
            echo $value;
            header("Location: $value");
        } else {
            echo "Payment URL not found in response.";
        }
    } else {
        echo "Empty response received.";
    }
?>
    