const tombolBeli = document.getElementById('buynow');
const tombolKeranjang = document.getElementById('addCart');
const modeGelap = document.getElementById("modegelap");

tombolBeli.addEventListener("click",
    function(){
        alert("Mohon maaf, tombol Beli Sekarang belum dapat digunakan. Situs sedang dalam masa pengembangan.");
    },
)
tombolKeranjang.addEventListener("click",
    function(){
        alert("Mohon maaf, tombol Add to Cart belum dapat digunakan. Situs sedang dalam masa pengembangan.");
    },
)
const imgFileNames = document.getElementsByClassName("social-links");
imgFileNames.item(0);
for (let i = 0; i < imgFileNames.length; i++){

}
modeGelap.addEventListener("click",
    function(){
        document.body.classList.toggle("dark-mode");
    }
)
