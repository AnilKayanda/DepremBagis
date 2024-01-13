<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/haberler.css">
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
                <?php
                session_start();
                if (!isset($_SESSION['Eposta'])) {
                    echo '<li><a href="login.html">Giriş Yap</a></li>';
                    echo '<li><a href="signup.html">Kayıt Ol</a></li>';
                }
                ?>

            </ul>
        </nav>
        <a class="cta" href="contact.html"><button id="cta">Bize Ulaşın</button></a>
        <?php
        if (isset($_SESSION['Eposta'])) {
            echo '<a id="logout" href="../index.html"><button id="logout"  onclick="logout()">Çıkış Yap</button></a>';
        } ?>
        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>




    <section>
        <a target="_blank" href="news/three.php">
            <div class="news">
                <div class="img"><img src="img/news3.jpg" alt=""></div>
                <p>Deprem Güvenli Binalar: İnşaatlarda Kalite Önemli!</p>
            </div>
        </a>
        <a target="_blank" href="news/one.php">
            <div class="news">
                <div class="img"><img src="img/news7.jpg" alt=""></div>
                <p>Yardım Paketleriyle Hatay'a Destek: Birlikte Güçlüyüz!</p>

            </div>

        </a>

        <a target="_blank" href="news/two.php">
            <div class="news">
                <div class="img"><img src="img/news1.jpg" alt=""></div>
                <p>Hatayda Deprem! <br>Hatayda 6.4 Büyüklüğünde Deprem. Birçok şehirde yıkımlar ve can kayıpları var...
                </p>
            </div>
        </a>

        <a target="_blank" href="news/four.php">
            <div class="news">
                <div class="img"><img src="img/news4.jpg" alt=""></div>
                <p>Deprem Araştırmaları ve Teknoloji: Geleceği Tahmin Edebilme Çabası!</p>
            </div>
        </a>
        <a target="_blank" href="news/five.php">
            <div class="news">
                <div class="img"><img src="img/news5.jpg" alt=""></div>
                <p>Deprem Bilincini Artırma: Afet Öncesi Hazırlık Önemli!</p>
            </div>
        </a>
        <a target="_blank" href="news/six.php">
            <div class="news">
                <div class="img"><img src="img/news6.jpg" alt=""></div>
                <p>Çocuklar ve Deprem: Eğitimle Güvende Kalın!</p>
            </div>
        </a>




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
    </script>
</body>

</html>