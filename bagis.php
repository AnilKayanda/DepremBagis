<?php
session_start();
if (!isset($_SESSION['Eposta'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir
    header("Location:http://localhost/Projects/DepremBagis/login.html");
    exit();
}

?>
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
    <link rel="stylesheet" href="css/bagis.css">
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
        <a class="logout" href="index.html"><button id="logout" onclick="logout()">Çıkış Yap</button></a>';
        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>


    <section class="section">
        <form action="php/bagisEkle.php" id="firstform" method="POST">
            <h4>Yapmak İstediğiniz Bağış Miktarını Seçiniz.</h4>
            <div class="donation-form">
                <!-- Hazır Miktar Seçenekleri -->
                <div class="amount-options">
                    <div class="amount-option">
                        <input type="radio" id="option1" name="donationAmount" value="50">
                        <label for="option1">50 TL</label>
                    </div>

                    <div class="amount-option">
                        <input type="radio" id="option2" name="donationAmount" value="75">
                        <label for="option2">75 TL</label>
                    </div>

                    <div class="amount-option">
                        <input type="radio" id="option3" name="donationAmount" value="100">
                        <label for="option3">100 TL</label>
                    </div>
                    <div class="amount-option">
                        <input type="radio" id="option4" name="donationAmount" value="150">
                        <label for="option4">150 TL</label>
                    </div>
                    <div class="amount-option">
                        <input type="radio" id="option5" name="donationAmount" value="200">
                        <label for="option5">200 TL</label>
                    </div>
                    <div class="amount-option">
                        <input type="radio" id="option6" name="donationAmount" value="250">
                        <label for="option6">250 TL</label>
                    </div>
                    <div class="amount-option">
                        <input type="radio" id="option7" name="donationAmount" value="500">
                        <label for="option7">500 TL</label>
                    </div>
                    <div class="amount-option" id="customAmountOption">
                        <input type="radio" id="showCustomAmount" name="donationAmount" value="Diger">
                        <label for="showCustomAmount">Diğer</label>

                    </div>
                </div>
                <div id="customAmountContainer">
                    <label for="customAmountInput" id="customAmountLabel">Miktar:</label>
                    <input type="text" id="customAmountInput" name="customAmount" placeholder="0.00">
                    <div id="confirmationLabel"></div>
                    <button id="confirmButton">Onayla</button>
                </div>
            </div>
        </form>

    </section>




    <div class="card">
        <form id="secondform" autocomplete="off">
            <div class="inputbox">
                <i class="fa-solid fa-user"></i>
                <label>Ad Soyad</label>
                <input class="input" type="text" required>
                <i class="fa-solid fa-credit-card"></i> <label>Kart Numarası</label>

                <input class="input" oninput="formatCreditCardNumber(this)" maxlength="19" minlength="19" required type="text" id="idCardNumber">

                <script>
                    function formatCreditCardNumber(input) {
                        // Girişten sadece rakam al
                        let val = input.value.replace(/\D/g, '');

                        // 16 haneye kadar olan kısmı al
                        val = val.substring(0, 16);

                        // Her dört karakteri bir boşluk bırakacak şekilde formatla
                        val = val.replace(/(\d{4})/g, '$1 ');

                        // Giriş alanını güncelle
                        input.value = val;
                    }
                </script>

                <i class="fa-solid fa-calendar-days"></i><label>Son Kullanma Tarihi</label>
                <i class="fa-solid fa-key" style="margin-left: 30px;"></i>
                <label style="margin-left: 4px;">CVV</label>

                <div class="cvv">
                    <input class="input" style="width: 20%;" id="e-date" maxlength="5" minlength="5" required type=" number">

                    <input class="input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" minlength="3" required style="width: 20%;" type="number" id="cvv">
                </div>
                <div class="check">
                    <input id="checkbox" type="checkbox" required>
                    <label id="p">Yaptığım Bağış Miktarını Onaylıyorum.</label>
                </div>

                <button id="crd-btn" onclick="submitFirstForm()">Ödemeyi Tamamla</button>
            </div>
        </form>

    </div>


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


        document.getElementById('showCustomAmount').addEventListener('change', function() {
            var customAmountContainer = document.getElementById('customAmountContainer');
            customAmountContainer.style.display = this.checked ? 'block' : 'none';
        });

        var showCustomAmount = document.getElementById('showCustomAmount');
        var customAmountContainer = document.getElementById('customAmountContainer');

        showCustomAmount.addEventListener('change', function() {
            customAmountContainer.style.display = this.checked ? 'block' : 'none';
        });

        var donationAmountRadios = document.querySelectorAll('input[name="donationAmount"]:not(#showCustomAmount)');

        donationAmountRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                customAmountContainer.style.display = 'none';
            });
        });



        function submitCustomAmount() {
            // Diğer seçeneği seçildiyse, input alanındaki değeri düzenle
            var customAmountInput = document.getElementById('customAmountInput');
            customAmountInput.value = formatAmount(customAmountInput.value);

            // Formu gönder
            document.forms[0].submit();
        }

        function formatAmount(input) {
            // Virgülleri temizle ve sadece rakamları al
            var cleanValue = input.replace(/[^\d,]/g, '');

            // Virgül ile ayrılmış sayıları birleştir
            var parts = cleanValue.split(',');

            // Nokta eklemek için kullanılan regex
            var regex = /\B(?=(\d{3})+(?!\d))/g;

            // Sayının tam kısmını al ve virgül ile birleştir
            var integerPart = parts[0].replace(/\D/g, '').replace(regex, ".");
            var formattedAmount = integerPart;

            // Virgül ile ayrılmış kısmı al, varsa onu da ekleyerek birleştir
            if (parts.length > 1) {
                var decimalPart = parts[1].replace(/\D/g, '');
                formattedAmount += "." + decimalPart;
            }

            return formattedAmount;
        }






        document.getElementById('customAmountInput').addEventListener('input', function() {
            // Input değiştiğinde format fonksiyonunu kullanarak miktarı düzenle
            this.value = formatAmount(this.value);
        });


        document.getElementById('confirmButton').addEventListener('click', function(event) {
            event.preventDefault(); // Formun submit olmasını engelle

            var confirmationLabel = document.getElementById('confirmationLabel');
            var customAmountInput = document.getElementById('customAmountInput');

            // customAmountInput alanının içeriğini kontrol et
            if (customAmountInput.value.trim() === '') {
                confirmationLabel.textContent = '✖';
                return; // Miktar girilmemişse devam etme
            }

            // Miktar girilmişse tik simgesini göster
            confirmationLabel.textContent = '✔';

            // customAmountInput alanının kapanmamasını sağla
            customAmountInput.focus();
        });




        let eDate = document.getElementById("e-date");
        eDate.addEventListener("keyup", function(e) {
            let newInput = eDate.value;

            if (e.which !== 8) {
                var numChars = e.target.value.length;
                if (numChars == 2) {
                    var thisVal = e.target.value;
                    thisVal += "/";
                    e.target.value = thisVal;
                    console.log(thisVal.length);
                }
            }


        });



        function submitFirstForm() {
            // Get values from the first form
            var donationAmount = document.querySelector('input[name="donationAmount"]:checked').value;
            var customAmount = document.getElementById('customAmountInput').value;

            // Create FormData object for the first form
            var formData = new FormData();
            formData.append('donationAmount', donationAmount);
            formData.append('customAmount', customAmount);

            // Create XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open('POST', 'php/bagisEkle.php', true);

            // Define the callback function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    // Check if the request was successful (status code 200)
                    if (xhr.status == 200) {
                        // Redirect to thanks.php after successful form submission
                        window.location.href = 'thanks.php';
                    } else {
                        // Handle errors or unexpected statuses here
                        console.error('Request failed with status:', xhr.status);
                    }
                }
            };

            // Send the form data
            xhr.send(formData);
        }
    </script>
</body>

</html>