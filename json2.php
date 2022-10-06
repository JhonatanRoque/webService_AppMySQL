<?php
echo "Estoy donde es";
    $json = '["HTTPCLIENT", "HTTPURLCONNECTION", "VOLLEY", "RETROFIT"]';
    $json1 = '["ANDROID", "iOS", "macOS", "ChromeOS"]';
    $data = json_decode($json);
    echo "<br>".$data[2];
?>