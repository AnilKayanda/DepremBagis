<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Bağış miktarını ve kullanıcı ID'sini al
    $donationAmount = $_POST['donationAmount'];
    $userID = $_SESSION['ID'];

    // Diğer seçeneği seçildiyse ve customAmount gönderildiyse
    if ($donationAmount == 'Diger' && isset($_POST['customAmount'])) {
        $customAmount = $_POST['customAmount'];

        // Virgülle ayrılmış değeri nokta ile ayrılmış hale getir
        $customAmount = str_replace(',', '.', $customAmount);

        // MySQL veritabanına bağış bilgilerini ekle
        $eklemeSorgu = $baglanti->prepare("INSERT INTO bagis (ID, BagisMiktari, Tarih) VALUES (?, ?, NOW())");
        $eklemeSorgu->bindParam(1, $userID, PDO::PARAM_INT);
        $eklemeSorgu->bindParam(2, $customAmount, PDO::PARAM_STR);

        if ($eklemeSorgu->execute()) {
            // Hata Ayıklama: Bu bloğun çalıştığından emin olmak için bir mesaj gönder
            exit(); // Yönlendirmenin ardından başka kodların çalışmasını önlemek için
        } else {
            // Bağış eklenemediyse hata mesajını göster
            echo "<script>alert('Bağışınız alınırken bir hata ile karşılaşıldı.');</script>";
        }
    } else {
        // Diğer seçeneği seçilmemişse veya customAmount gönderilmemişse, bağış miktarını ekleyin
        $eklemeSorgu = $baglanti->prepare("INSERT INTO bagis (ID, BagisMiktari, Tarih) VALUES (?, ?, NOW())");
        $eklemeSorgu->bindParam(1, $userID, PDO::PARAM_INT);
        $eklemeSorgu->bindParam(2, $donationAmount, PDO::PARAM_INT);

        if ($eklemeSorgu->execute()) {
            // Hata Ayıklama: Bu bloğun çalıştığından emin olmak için bir mesaj gönder
            exit(); // Yönlendirmenin ardından başka kodların çalışmasını önlemek için
        } else {
            // Bağış eklenemediyse hata mesajını göster
            echo "<script>alert('Bağışınız alınırken bir hata ile karşılaşıldı.');</script>";
        }
    }

    // İşlem sonrası bağlantıyı kapat
    $baglanti = null;
} else {
    // POST metodu ile çağrılmadıysa hata mesajı göster
    echo "Geçersiz istek!";
}
