<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/news.css">
    <style>

    </style>
</head>

<body>


    <header>
        <i class="fa-solid fa-hand-holding-heart"></i>
        <i class="fa-solid fa-bars" id="menuIcon"></i>

        <nav>
            <ul class=" nav_links">
                <li><a href="../index.html">Anasayfa</a></li>
                <li><a href="../bagis.php">Bağış Yap</a></li>
                <li><a href="../haberler.php">Haberler</a></li>
                <?php
                session_start();
                if (!isset($_SESSION['Eposta'])) {
                    echo '<li><a href="../login.html">Giriş Yap</a></li>';
                    echo '<li><a href="../signup.html">Kayıt Ol</a></li>';
                }
                ?>

            </ul>
        </nav>
        <a class="cta" href="../contact.html"><button id="cta">Bize Ulaşın</button></a>
        <?php
        if (isset($_SESSION['Eposta'])) {
            echo '<a id="logout" href="../index.html"><button id="logout"  onclick="logout()">Çıkış Yap</button></a>';
        } ?>
        <a id="settings" href="../settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>



    <section>
        <div class="img">
            <img src="../img/news9.jpg">
        </div>
        <p id="name">
            Deprem, çocukların yaşamlarını önemli ölçüde etkileyebilen doğal afetlerden biridir. Bu nedenle, çocuklara deprem bilinci aşılamak ve onları bu tür acil durumlara hazırlamak, toplumun geleceği açısından kritik bir öneme sahiptir. İşte çocuklar ve deprem konusunda yapılan eğitim çalışmaları ve alınan önlemler:
            <br><br>
            Sivil toplum kuruluşları, okullar ve yerel yönetimler, çocuklara depremle baş etme becerileri kazandırmak ve acil durum durumlarında güvende kalmalarını sağlamak adına çeşitli eğitim programları düzenlemektedir. Bu programlar, çocuklara depremin ne olduğu, nasıl bir tehlike oluşturduğu ve deprem anında nasıl hareket etmeleri gerektiği konularında bilgi vermektedir.
            <br><br>
            Çocuklara yönelik deprem eğitimleri, oyunlar, interaktif aktiviteler ve tatbikatlarla desteklenerek daha etkili hale getirilmektedir. Deprem anında güvende kalma alışkanlığı kazanmak için düzenlenen tatbikatlar, çocukların paniklemeden doğru davranış biçimlerini öğrenmelerine yardımcı olmaktadır.
            <br><br>
            Ayrıca, deprem çantası hazırlığı da çocuklara öğretilen önemli bir konudur. Çocuklar, aileleriyle birlikte bu çantaları hazırlayarak deprem anında ihtiyaç duyabilecekleri temel malzemeleri öğrenirler. Bu sayede, deprem anında kendilerini daha güvende hissederler.
            <br><br>
            Eğitim, çocukların deprem konusundaki korkularını azaltmada ve onları daha güvenli bir hale getirmede önemli bir araçtır. Toplumun geleceğini oluşturan çocuklar, doğru eğitimle deprem ve benzeri acil durumlar karşısında bilinçli ve hazırlıklı bireyler olarak yetişirler.
            <br><br>
            Çocuklar ve deprem konusundaki eğitim çalışmaları, toplumun genel afet bilincini artırmanın yanı sıra, gelecek nesilleri de daha güvenli bir şekilde yetiştirmeyi hedeflemektedir.
        </p>

    </section>



    <!--  FOOTER  -->
    <footer>
        <div class=" footer-content">
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
            fetch('../php/logout.php')
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
    </script>
</body>

</html>