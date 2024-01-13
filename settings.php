<?php
session_start();
if (!isset($_SESSION['Eposta'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir
    header("Location:http://localhost/Projects/DepremBagis/login.html");
    exit();
}

// Veritabanı bağlantısını içe aktar
include "php/connection.php";

// Kullanıcının sahip olduğu paket bilgilerini çek
if (isset($_SESSION['Eposta'])) {
    $userID = $_SESSION['ID'];

    $sql = "SELECT Ad, Soyad, Eposta
            FROM users
            WHERE users.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // fetch_assoc fonksiyonu kullanarak verileri çek
        $userData = $result->fetch_assoc();

        if ($userData) {
            $Ad = $userData['Ad'];
            $Soyad = $userData['Soyad'];
            $Eposta = $userData['Eposta'];
        } else {
            echo "Kullanıcı bulunamadı.";
            exit;
        }
    } else {
        echo "Sorgu hatası: " . $stmt->error;
        exit;
    }

    $stmt->close();
}

if (isset($_SESSION['Eposta'])) {
    $userID = $_SESSION['ID'];

    $sql = "SELECT SUM(CAST(REPLACE(BagisMiktari, '.', '') AS DECIMAL(10, 2))) AS ToplamBagis FROM bagis WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // fetch_assoc fonksiyonu kullanarak verileri çek
        $row = $result->fetch_assoc();

        // Toplam bağış miktarını al
        $miktar = $row['ToplamBagis'];

        // Eğer bağış yapılmamışsa $miktar değişkenine özel bir değer ata
        if ($miktar === null) {
            $miktar = "0";
        }

        // Bağış miktarını göster
        echo "Toplam bağış miktarınız: $miktar TL";
    } else {
        echo "Sorgu hatası: " . $stmt->error;
        exit;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/contact.css">
    <style>
        #logout {
            border: solid 1px rgb(0, 0, 0);
            position: relative;
            border-radius: 0;
            width: 110px;
            height: 50px;
            cursor: pointer;
            transition: color 0.4s linear;
            color: black;
            background-color: #000000;
            color: #ffff;
            z-index: 2;
            margin-right: 2%;
            /* .button::before'un üzerinde olması için */
        }

        #logout:hover {
            background-color: #000000;
            border: none;
            color: #000000;
            text-shadow: #c4c4c4 1px 1px 2px;

        }

        #logout::before {
            content: '';
            position: absolute;
            width: 99%;
            height: 100%;
            top: 0;
            left: 0;
            border: solid 1px rgb(0, 0, 0);
            background-color: #e0e0e0;
            /* Çizgi rengi */
            transform-origin: 0 0;
            transition: transform 0.3s ease;
            z-index: 1;
            transform: scaleX(0);
            z-index: -1;
            /* Metnin altında olması için */
        }

        #logout:hover::before {
            transform: scaleX(1);
        }

        .container {
            position: relative;
            margin: 15% auto 5% auto;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;
            background-color: #F5F7F8;
            background-color: rgb(121, 0, 0);
            color: #ffff;
            text-shadow: #000000 3px 3px 5px;
            box-shadow: 10px 10px 15px black;
            border-radius: 30px;
        }



        .miktar {
            background-color: transparent;
        }

        #sayi {
            margin-left: auto;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        section {
            margin-top: 0;
        }
    </style>
</head>

<body>

    <header>
        <i class="fa-solid fa-hand-holding-heart"></i>
        <i class="fa-solid fa-bars" id="menuIcon"></i>

        <nav>
            <ul class=" nav_links">
                <li><a href="index.html">Anasayfa</a></li>
                <li><a href="bagis.php">Bağış Yap</a></li>
                <li><a href="haberler.php">Haberler</a></li>
            </ul>
        </nav>
        <a class="cta" href="contact.html"><button id="cta">Bize Ulaşın</button></a>
        <?php
        if (isset($_SESSION['Eposta'])) {
            echo '<a id="logout" href="index.html"><button id="logout"  onclick="logout()">Çıkış Yap</button></a>';
        } ?>
        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>



    <!-- SECTION -->

    <div class="container">
        <div class="miktar">
            <h2>Yaptığınız Bağış Miktarı</h2>
            <div id="sayi">
                <h3 id="counter"></h3>
                <h3> TL</h3>
            </div>

        </div>
    </div>


    <section>
        <!-- Section kısmını buraya taşıdım -->
        <h2>Bilgileriniz</h2>
        <form action="php/parola_degistir.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <input id="firstName" name="firstName" value="<?php echo $Ad ?>" readonly>
                </div>

                <div class="form-group">
                    <input id="lastName" name="lastName" value="<?php echo $Soyad ?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <input id="email" name="email" value="<?php echo $Eposta ?>" readonly>
            </div>

            <div class="form-group">
                <h5 style="margin-top: 5%; background-color:transparent;">Parolanızı Değiştirin</h5>
                <input type="password" id="exParola" name="exParola" placeholder="Mevcut Parolanız" required>
            </div>
            <div class="form-group">
                <input type="password" id="NewParola" name="NewParola" placeholder="Yeni Parolanız" required>
            </div>
            <button id="btn" type="submit"> <i class="fa-solid fa-paper-plane"></i></button>
        </form>
    </section>








    <!--  FOOTER  -->
    <footer>
        <div class="footer-content">
            <h3>Geleceğini Koru</h3>
            <p>"Geleceğini belki de bir dakika sonrını koruyor olabilirsin. Yapacağın küçük bir bağışla büyük bir fark
                yarat!"</p>
            <ul class="socials">
                <li><a target="_blank" href="https://www.instagram.com/anilkayanda/">
                        <i class="fa-brands fa-square-instagram"></i></a></li>
                <li><a href="mailto:anilkayanda@gmail.com"><i class="fa-solid fa-envelope"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin"></a></i></li>
                <li><a target="_blank" href="https://github.com/AnilKayanda"><i class="fa-solid fa-hand-holding-heart"></i>
                </li>
                <li><a target="_blank" href="https://twitter.com/anilkayanda"><i class="fa-brands fa-twitter"></i></a>
                </li>

            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2023 designed by <span>Anıl Kayanda</span></p>
        </div>
    </footer>

    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

        function logout() {
            // Sunucuya logout.php dosyasına istek gönder
            fetch('php/logout.php')
                .then(response => {
                    if (response.ok) {
                        // Başarılı bir şekilde çıkış yapıldıysa, sayfayı yenile
                        location.reload();
                    } else {
                        // Çıkış başarısızsa, hata mesajını göster veya başka bir şey yap
                        console.error('Çıkış yapılamadı');
                    }
                })
                .catch(error => {
                    console.error('Bağlantı hatası:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var menuIcon = document.getElementById('menuIcon');
            var navLinks = document.querySelector('.nav_links');

            menuIcon.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        });



        let currentNumber = 0;

        // Hedef elementi seçme
        const counterElement = document.getElementById('counter');

        // Animasyonlu şekilde miktarı arttırma fonksiyonu
        function startAnimation() {
            // Hedef miktarı belirleme (örneğin, 200000)
            const targetNumber = <?php echo $miktar ?>;

            // Animasyon süresi (saniye cinsinden)
            const duration = 2;

            // Interval süresi (ms cinsinden)
            const interval = 20;

            // Artış miktarı (her interval'de artırılacak miktar)
            const increment = (targetNumber - currentNumber) / (duration * 1000 / interval);

            // setInterval kullanarak animasyonu başlatma
            const animationInterval = setInterval(function() {
                currentNumber += increment;

                // Miktarı sayfa üzerinde gösterme
                counterElement.textContent = formatAmount(currentNumber);

                // Hedefe ulaşıldığında interval'ı temizleme
                if (currentNumber >= targetNumber) {
                    clearInterval(animationInterval);
                }
            }, interval);
        }

        // Sayfa yüklendiğinde animasyonu başlatma
        document.addEventListener('DOMContentLoaded', startAnimation);

        // Miktarı biçimlendirmek için fonksiyon
        function formatAmount(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.');
        }
    </script>
</body>

</html>