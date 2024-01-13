<?php
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ad = $_POST['Ad'];
    $Soyad = $_POST['Soyad'];
    $ePosta = $_POST['Eposta'];
    $Parola = $_POST['parola'];
    $ConfirmParola = $_POST['confirm_parola'];

    // Check if passwords match
    if ($Parola !== $ConfirmParola) {
        echo "<script>alert('Parolalar uyuşmuyor.'); window.location.href='../signup.html';</script>";
        exit;
    }

    // Check if password is at least 8 characters long
    if (strlen($Parola) < 8) {
        echo "<script>alert('Şifre en az 8 karakter olmalıdır.'); window.location.href='../signup.html';</script>";
        exit;
    }

    // E-posta adresinin kullanılıp kullanılmadığını kontrol et
    $kontrolIfade = $baglanti->prepare("SELECT COUNT(*) as sayi FROM users WHERE Eposta = :Eposta");
    $kontrolIfade->bindParam(':Eposta', $ePosta, PDO::PARAM_STR, 45);
    $kontrolIfade->execute();
    $kullaniciSayisi = $kontrolIfade->fetch(PDO::FETCH_ASSOC)['sayi'];
    $kontrolIfade->closeCursor();

    if ($kullaniciSayisi > 0) {
        // E-posta daha önce kullanılmışsa JavaScript alert mesajı göster
        echo "<script>alert('E-Posta Daha Önce Kullanılmış.'); window.location.href='../signup.html';</script>";
        exit;
    }

    // Parolayı hashle
    $hashedParola = password_hash($Parola, PASSWORD_DEFAULT);

    // Kullanıcıyı ekleyen sorguyu hazırla ve çalıştır
    $eklemeIfade = $baglanti->prepare("INSERT INTO users (Ad, Soyad, Eposta, Parola) VALUES (:Ad, :Soyad, :Eposta, :Parola)");
    $eklemeIfade->bindParam(':Ad', $Ad, PDO::PARAM_STR, 45);
    $eklemeIfade->bindParam(':Soyad', $Soyad, PDO::PARAM_STR, 45);
    $eklemeIfade->bindParam(':Eposta', $ePosta, PDO::PARAM_STR, 45);
    $eklemeIfade->bindParam(':Parola', $hashedParola, PDO::PARAM_STR, 255);

    if ($eklemeIfade->execute()) {
        // Kullanıcı eklendi, JavaScript alert mesajı göster
        echo "<script>alert('Kullanıcı eklendi');</script>";
        // Yönlendirme yap
        header("Location: http://localhost/Projects/DepremBagis/login.html");
        exit;
    } else {
        // Hata durumunda ne yapılacaksa buraya ekleyebilirsiniz
        echo "<script>alert('Kullanıcı eklenirken bir hata oluştu.');</script>";
        // Hata mesajını göster, işlemi sonlandır
        exit;
    }
}
$baglanti = null;
