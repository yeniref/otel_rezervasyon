<style>
    body {
  width: 500px;
  margin: 0 auto;
  padding: 50px;
}

div.elem-group {
  margin: 20px 0;
}

div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: left;
  margin-left: 1%;
}

label {
  display: block;
  font-family: 'Nanum Gothic';
  padding-bottom: 10px;
  font-size: 1.25em;
}

input, select, textarea {
  border-radius: 2px;
  border: 2px solid #777;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  width: 100%;
  padding: 10px;
}

div.elem-group.inlined input {
  width: 95%;
  display: inline-block;
}

textarea {
  height: 250px;
}

hr {
  border: 1px dotted #ccc;
}

button {
  height: 50px;
  background: orange;
  border: none;
  color: white;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  border: 2px solid black;
}
</style>

<form action="rezervasyon.php" method="post">
  <div class="elem-group">
    <label for="name">Adınız</label>
    <input type="text" id="name" name="ziyaretci_adi" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="ziyaretci_email" placeholder="john.doe@email.com" required>
  </div>
  <div class="elem-group">
    <label for="phone">Telefon</label>
    <input type="tel" id="telefon" name="ziyaretci_phone" placeholder="498-348-3872" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
  </div>
  <hr>
  <div class="elem-group inlined">
    <label for="yetiskin">Yetişkin</label>
    <input type="number" id="yetiskin" name="toplam_yetiskin" placeholder="2" min="1" required>
  </div>
  <div class="elem-group inlined">
    <label for="cocuk">Çocuk</label>
    <input type="number" id="cocuk" name="toplam_cocuk" placeholder="2" min="0" required>
  </div>
  <div class="elem-group inlined">
    <label for="giris_tarih">Giriş Tarihi</label>
    <input type="tarih" id="giris_tarih" name="giris_tarih" required>
  </div>
  <div class="elem-group inlined">
    <label for="cikis_tarih">Çıkış Tarihi</label>
    <input type="tarih" id="cikis_tarih" name="cikis_tarih" required>
  </div>
  <div class="elem-group">
    <label for="oda_sec">Oda Tercihini Seçin</label>
    <select id="oda_sec" name="oda_secenekler" required>
        <option value="">Listeden Bir Oda Seçin</option>
        <option value="secenek_bir">Seçenek 1</option>
        <option value="secenek_iki">Seçenek 2</option>
        <option value="secenek_uc">Seçenek 3</option>
    </select>
  </div>
  <hr>
  <div class="elem-group">
    <label for="mesaj">Anything Else?</label>
    <textarea id="mesaj" name="ziyaretci_message" placeholder="Lütfen listede olmayan bir mesajınız varsa belirtin." ></textarea>
  </div>
  <button type="submit">Oda Ayırt</button>
</form>

<script>
var simdikizaman = new Date();
var yil = simdikizaman.getFullYear();
var ay = (simdikizaman.getMonth() + 1);
var tarih = (simdikizaman.getDate() + 1);

if(tarih < 10) {
  tarih = '0' + tarih;
}
if(ay < 10) {
  ay = '0' + ay;
}

var tarih_artir = yil + "-" + ay + "-" + tarih;
var giris_kontrol = document.querySelector("#giris_tarih");
var cikis_kontrol = document.querySelector("#cikis_tarih");

giris_kontrol.setAttribute("min", tarih_artir);

giris_kontrol.onchange = function () {
    cikis_kontrol.setAttribute("min", this.value);
}
</script>