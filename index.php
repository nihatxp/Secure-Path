<?php
session_start();
require_once 'config/config.php';
$title = TITLE . " | " . "Ana Sayfa";
require_once 'inc/header.php';
require_once 'inc/form.php';
require_once 'system/encryption.php';
require_once 'system/functions.php';

if (isset($_POST['url']) && !empty($_POST['url'])) {
    $id = uniqid();
    $url = $_POST['url'];
    if (str_contains($url, "/sorgu.php?ct=") && str_contains($url, "&iv=") && str_contains($url, "&salt=")) {
        echo json_encode(array("error" => "true", "message" => "Bu hizmeti bu hizmetin ürettiği bağlantıyı şifrelemek için kullanamazsınız."), JSON_UNESCAPED_UNICODE);
    } else {
        @$url_headers = get_headers($url, 1);
        $contentType = null;
        if (isset($url_headers['Content-Type'])) {
            if (is_array($url_headers['Content-Type'])) {
                $contentType = $url_headers['Content-Type'][0];
            } else {
                $contentType = $url_headers['Content-Type'];
            }
        }

        $enc = cryptoJsAesEncrypt(ENC_KEY, $url);
        $enc = json_decode($enc, true);
        echo "<br>";

        if ($contentType == null) {
            echo "<center>URL'nin içeriği bulunamadı.</center>";
        } else {
            if(DOSYA_ONIZLEMESI){
                if (str_contains($contentType, "image")) {
                    echo "<img src='sorgu.php?ct=" . urlencode($enc["ct"]) . "&salt=" . urlencode($enc["salt"]) . "&iv=" . urlencode($enc["iv"]) . "' width='100%'>";
                } elseif (str_contains($contentType, "video")) {
                    echo "<video controls src='sorgu.php?ct=" . urlencode($enc["ct"]) . "&salt=" . urlencode($enc["salt"]) . "&iv=" . urlencode($enc["iv"]) . "' width='100%' height='100%'></video>";
                } elseif (str_contains($contentType, "audio")) {
                    echo "<audio controls src='sorgu.php?ct=" . urlencode($enc["ct"]) . "&salt=" . urlencode($enc["salt"]) . "&iv=" . urlencode($enc["iv"]) . "' width='100%' height='100%'></audio>";
                } else {
                    echo "<iframe src='sorgu.php?ct=" . urlencode($enc["ct"]) . "&salt=" . urlencode($enc["salt"]) . "&iv=" . urlencode($enc["iv"]) . "' width='100%' height='500px' style='' ></iframe>";
                }
            }
            $_SESSION[(string)$id]['url'] = "'sorgu.php?ct=" . urlencode($enc["ct"]) . "&salt=" . urlencode($enc["salt"]) . "&iv=" . urlencode($enc["iv"]) . "'";
            $_SESSION[(string)$id]['fakename'] = $enc['salt'] . ".png";
        }
    }
} else {
    echo "<center>Lütfen Dosya/Resim URL'si Giriniz</center>";
}
?>
<table>
    <tr class="heading">
        <th>Resim</th>
        <th>id</th>
        <th>Url</th>
        <th><a href="sil.php?action=deleteAll">Tümünü Sil</a></th>
    </tr>
    <?php
    foreach ($_SESSION as $key => $value) {
        echo "<tr>";
        echo "<td><img src=" . $value['url'] . " width='100px'>";
        echo $value['fakename'];
        echo "</td>";
        echo "<td>$key</td>";
        echo "<td ><a href= "  . $value['url'] . " target='_blank'>" . substr($value['url'], 1, 50) . "</a></td>";
        echo "<td><a href='sil.php?action=delete&id=$key'>sil</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<?php require_once 'inc/footer.php'; ?>