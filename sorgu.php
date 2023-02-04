<?php
error_reporting(0);
header("Content-Type: application/json; charset=utf-8");
require_once 'system/encryption.php';
require_once 'config/config.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

while (ob_get_level() && @ob_end_clean()) {;}

$context = stream_context_create( [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

if (!(empty($_GET['ct']) || empty($_GET['salt']) || empty($_GET['iv']) || strlen($_GET['iv']) != 32 || strlen($_GET['salt']) != 16)) {
    $arr = array(
        "ct" => $_GET['ct'],
        "iv" => $_GET['iv'],
        "salt" => $_GET['salt']
    );
    $jsonString = json_encode($arr);
    $decrypted = cryptoJsAesDecrypt(ENC_KEY, $jsonString);
    try {
        if ($decrypted != null) {
            if (str_contains($decrypted, "/sorgu.php?ct=") && str_contains($decrypted, "&iv=") && str_contains($decrypted, "&salt=")) {
                header("Content-Type: application/json; charset=utf-8");
                echo json_encode(array("error" => "true", "message" => "Bu hizmeti bu hizmetin ürettiği bağlantıyı şifrelemek için kullanamazsınız."), JSON_UNESCAPED_UNICODE); //turkce karakterleri kullanmami sagladi ikinci parametre
                exit();
            }
            try {
                $url_headers = get_headers($decrypted, 1, $context);
                if (isset($url_headers['Content-Type'])) {
                    if (is_array($url_headers['Content-Type'])) {
                        header('Content-Type: ' . $url_headers['Content-Type'][0]);
                    } else {
                        header('Content-Type: ' . $url_headers['Content-Type']);
                    }
                    while (ob_get_level() && @ob_end_clean()) {;
                    }
                    echo file_get_contents($decrypted);
                    exit;
                }
                $c = file_get_contents($decrypted);
            } catch (Exception $e) {
                header("Content-Type: image/png; charset=utf-8");
                echo file_get_contents("img/404.png");
                exit();
            }
        } else {
            header("Content-Type: image/png; charset=utf-8");
            echo file_get_contents("img/404.png");
            exit();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    header('Content-Type: ' . getimagesizefromstring($c)['mime']);
    while (ob_get_level() && @ob_end_clean()) {;
    }
    echo $c;
} else {
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode(array("error" => "true", "message" => "Lütfen geçerli bir bağlantı giriniz. Parametreler eksik veya hatalı."), JSON_UNESCAPED_UNICODE);
}