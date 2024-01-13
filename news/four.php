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
            <img src="../img/news4.jpg">
        </div>
        <p id="name">
            Teknoloji devi Google, deprem uyarı sistemleri konusunda yaptığı son geliştirmelerle dikkat çekiyor. Saniyeler önce deprem uyarısı yapabilen bu sistem, kullanıcıları depremin etkileyeceği bölgelerde önceden bilgilendirme amacını taşıyor.
            <br><br>
            Google'ın bu teknolojisi, dünya genelinde depremleri saniyeler önce algılayarak, etkilenen bölgelerdeki kullanıcıları uyarabiliyor. Bu sayede, insanlar deprem anında daha güvenli bir konuma geçme şansına sahip oluyorlar.
            <br><br>
            Google'ın deprem uyarı sistemi, küresel olarak dağılmış sensör ağından gelen verileri hızla analiz ederek deprem sinyallerini algılıyor. Ardından, bu verileri kullanarak etkilenen bölgelerdeki kullanıcılara hızlı ve doğru bir şekilde uyarılar gönderiyor.
            <br><br>
            Bu teknoloji, depremlerin yol açtığı hasarı en aza indirmek ve insanların güvenliğini sağlamak adına önemli bir adım olarak değerlendiriliyor. Google'ın bu alandaki çalışmaları, deprem öncesi uyarı sistemlerinin geliştirilmesi konusunda dünya genelinde bir ilerleme sağlamayı amaçlamaktadır.
            <br><br>
            Gelecekte, bu tür teknolojilerin daha da gelişerek, depremlerin etkilerini önceden tahmin edebilme ve insanları daha etkili bir şekilde uyarabilme potansiyeli bulunmaktadır. Google'ın bu alandaki liderliği, deprem güvenliği konusunda küresel çapta önemli bir adımı temsil etmektedir.
            Google'ın deprem uyarı sistemini Android cihazınızda aktifleştirmek oldukça kolaydır. İşte adım adım yapmanız gerekenler:
            <br><br>
            <strong>Adım 1:</strong> Cihazınızın Ayarlar uygulamasını açın.
            <br>
            <strong>Adım 2:</strong> Ayarlar menüsünde "Konum ve Güvenlik" veya benzer bir seçeneği bulun.
            <br>
            <strong>Adım 3:</strong> "Deprem Uyarıları" veya "Acil Durum Uyarıları" gibi bir seçenek arayın.
            <br>
            <strong>Adım 4:</strong> Bu seçeneği bulduktan sonra, "Google Uyarıları" veya "Etkinleştir" gibi bir seçenek göreceksiniz.
            <br>
            <strong>Adım 5:</strong> "Google Uyarıları"nı etkinleştirin. Bu adımdan sonra, cihazınız deprem uyarıları alacak şekilde yapılandırılmış olacaktır.
            <br><br>
            Bu adımları takip ettiğinizde, Google'ın deprem uyarı sistemi, cihazınıza saniyeler önce deprem uyarıları göndermeye hazır hale gelecektir. Bu, depremlerin etkilediği bölgelerde yaşayan kullanıcılar için ek bir güvenlik önlemi sağlar.
            <br><br>
            Unutmayın ki, cihazınızın konum servisleri ve bildirim ayarlarını doğru şekilde yapılandırmak, uyarıların etkili bir şekilde alınmasını sağlar. Google'ın bu özellikleri geliştirmeye devam etmesiyle, deprem güvenliği konusunda daha fazla kullanıcı bilincinin artması hedefleniyor.
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