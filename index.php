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
    <input type="text" id="name" name="ziyaretci_adi" placeholder="Yeniref Harew" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="ziyaretci_email" placeholder="energyspor21@gmail.com" required>
  </div>
  <div class="elem-group">
    <label for="phone">Telefon</label>
    <input type="tel" id="telefon" name="ziyaretci_telefon" placeholder="5516555204" required>
  </div>
  <hr>
  <div class="elem-group inlined">
    <label for="yetiskin">Yetişkin</label>
    <input type="number" id="yetiskin" name="toplam_yetiskin" placeholder="2" min="1" value="1" required>
  </div>
  <div class="elem-group inlined">
    <label for="cocuk">Çocuk</label>
    <input type="number" id="cocuk" name="toplam_cocuk" placeholder="2" min="0" value="0" required>
  </div>
  <div class="elem-group inlined">
    <label for="giris_tarih">Giriş Tarihi</label>
    <input type="date" id="giris_tarih" name="giris_tarih" required>
  </div>
  <div class="elem-group inlined">
    <label for="cikis_tarih">Çıkış Tarihi</label>
    <input type="date" id="cikis_tarih" name="cikis_tarih" required>
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
    <label for="mesaj">Notunuz?</label>
    <textarea id="mesaj" name="ziyaretci_mesaj" placeholder="Lütfen listede olmayan bir mesajınız varsa belirtin." ></textarea>
  </div>
  <button type="submit">Oda Ayırt</button>
</form>

<script>
var currentDateTime = new Date();
var year = currentDateTime.getFullYear();
var month = (currentDateTime.getMonth() + 1);
var date = (currentDateTime.getDate() + 1);

if(date < 10) {
  date = '0' + date;
}
if(month < 10) {
  month = '0' + month;
}

var dateTomorrow = year + "-" + month + "-" + date;
var checkinElem = document.querySelector("#giris_tarih");
var checkoutElem = document.querySelector("#cikis_tarih");

checkinElem.setAttribute("min", dateTomorrow);

checkinElem.onchange = function () {
    checkoutElem.setAttribute("min", this.value);
}
</script>
