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
        section ul li {
            width: 100%;
            height: 100%;
            padding: 1%;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            background-color: #F5F7F8;
        }

        section p {
            padding: 9% 9% 0 9%;
        }

        .name2 {
            padding: 0;
        }
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
            <img src="../img/news5.jpg">
        </div>
        <p id="name">
            Deprem bilincini artırmak ve toplumu afetlere karşı hazırlıklı hale getirmek, hayati bir öneme sahiptir. Bu kapsamda, afet öncesi hazırlık çalışmalarına dikkat çekmek ve toplumda bilinç oluşturmak amacıyla yapılan çeşitli etkinliklerle ilgili haberimiz aşağıdaki gibidir:
            <br><br>
            Son yıllarda ülkemizde sıkça yaşanan depremler, afetlere karşı bilinçli bir hazırlık yapmanın önemini bir kez daha ortaya koymaktadır. Bu nedenle, sivil toplum kuruluşları, yerel yönetimler ve afet birimleri, deprem bilincini artırmak adına çeşitli etkinlikler düzenlemektedir.
            <br><br>
            İlk yardım eğitimleri, deprem tatbikatları ve afet konferansları gibi etkinlikler, toplumun deprem ve diğer afetlere karşı bilinçlenmesine katkı sağlamaktadır. Bu etkinliklerde, acil durum planları oluşturmak, acil iletişim yöntemlerini öğrenmek ve toplanma alanlarını belirlemek gibi konular ele alınarak katılımcılara pratik bilgiler verilmektedir.
            <br><br>
            Ayrıca, okullarda ve işyerlerinde düzenlenen afet tatbikatları, deprem anında doğru davranış biçimlerini öğretmek ve paniklemeden güvenli bölgelere ulaşma alışkanlığı kazandırmak amacıyla büyük önem taşımaktadır. Bu tatbikatlar, afet durumlarında insanların bilinçli ve hızlı bir şekilde hareket etmelerini sağlamak için düzenli aralıklarla gerçekleştirilmelidir.
            <br><br>
            Afet öncesi hazırlık, toplumun dayanıklılığını artırarak olası can ve mal kayıplarını en aza indirme noktasında kritik bir rol oynamaktadır. Her bireyin ve kurumun, afetlere karşı hazırlıklı olması, toplumumuzu güvenli bir geleceğe taşımanın temel adımıdır.

            Depremlerle yaşayan bir coğrafyada yaşamak, afetlere karşı bilinçli bir hazırlık yapmayı zorunlu kılıyor. Bu kapsamda, afet öncesi hazırlık ve deprem çantası konusunda toplumda farkındalık oluşturmak adına yapılan çalışmalar hakkında haberimiz aşağıdaki gibidir:
            <br><br>
            <strong>Afet Öncesi Hazırlık:</strong> Sivil toplum kuruluşları, yerel yönetimler ve afet birimleri, toplumu afetlere karşı hazırlıklı hale getirmek amacıyla çeşitli etkinlikler düzenlemektedir. İlk yardım eğitimleri, deprem tatbikatları ve afet konferansları gibi etkinlikler, toplumun bilinçlenmesine katkı sağlamaktadır. Afet öncesi hazırlık kapsamında acil durum planları oluşturmak, iletişim yöntemlerini öğrenmek ve toplanma alanlarını belirlemek gibi konular ele alınmaktadır.
            <br><br>
            <strong>Deprem Çantası:</strong> Deprem anında hayati önem taşıyan deprem çantaları, aşağıdaki temel malzemeleri içermelidir:
            <br><br>
        <ul>
            <li>Su ve gıda (özellikle dayanıklı ve uzun süre bozulmayan türleri)</li>
            <li>İlk yardım kiti (bandajlar, antiseptik solüsyon, ağrı kesici, vs.)</li>
            <li>El feneri ve ekstra pil</li>
            <li>Battaniye veya uyku tulumu</li>
            <li>Giyim malzemeleri (çorap, eldiven, şapka)</li>
            <li>Hijyen malzemeleri (tuvalet kağıdı, sabun, diş fırçası, vs.)</li>
            <li>Kritik belgeler (kimlik kartları, pasaportlar, sigorta poliçeleri)</li>
            <li>İletişim araçları (cep telefonu, taşınabilir şarj cihazı)</li>
            <li>Para ve küçük bozuk paralar</li>
            <li>Harita ve önemli adreslerin bulunduğu bir liste</li>
        </ul>
        <br>
        <p class="name2">
            Bu çantalar genellikle evde bulundurulmalı ve kolayca taşınabilir olmalıdır. Her aile bireyi için özel olarak hazırlanan deprem çantaları, afet anında güvenliğinizi sağlamak adına kritik bir rol oynamaktadır.
            <br><br>
            Afet öncesi hazırlık ve deprem çantası kullanımı, deprem bilincini artırmanın yanı sıra toplumun dayanıklılığını artırarak can ve mal kayıplarını en aza indirme noktasında büyük bir öneme sahiptir. Her bireyin ve kurumun bu konuda bilinçli ve hazırlıklı olması, afetlerle baş etme sürecinde daha etkili bir toplum yaratılmasına katkı sağlar.
        </p>
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