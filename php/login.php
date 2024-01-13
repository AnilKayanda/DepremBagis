<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ePosta = $_POST['Eposta'];
    $Parola = $_POST['Parola'];

    // E-posta adresinin kullanılıp kullanılmadığını kontrol et
    $kontrolIfade = $baglanti->prepare("SELECT * FROM users WHERE Eposta = :Eposta");
    $kontrolIfade->bindParam(':Eposta', $ePosta, PDO::PARAM_STR, 45);
    $kontrolIfade->execute();
    $kullanici = $kontrolIfade->fetch(PDO::FETCH_ASSOC);
    $kontrolIfade->closeCursor();

    if (!$kullanici) {
        // E-posta kayıtlı değilse
        echo  "<script>alert('Bu e-posta adresi ile kayıtlı kullanıcı bulunamadı.'); window.location.href='../signup.html';</script>";
        exit;
    }

    // Parola kontrolü
    if (password_verify($Parola, $kullanici['Parola'])) {
        // Giriş başarılı, oturum başlat
        $_SESSION['Eposta'] = $kullanici['Eposta'];
        $_SESSION['Ad'] = $kullanici['Ad'];
        $_SESSION['ID'] = $kullanici['ID'];

        // Yönlendirme yap
        header("Location:http://localhost/Projects/DepremBagis/index.html");
        exit;
    } else {
        // Giriş başarısız, oturumu sıfırla ve hata mesajı göster
        session_unset();
        echo  "<script>alert('Hatalı şifre girişi.'); window.location.href='../login.html';</script>";
        exit;
    }
}

$baglanti = null;
