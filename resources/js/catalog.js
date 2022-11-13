const modeGelap3 = document.getElementById("modegelap3");

modeGelap3.addEventListener("click",
    function(){
        document.body.classList.toggle("dark-mode");
    }
)

$('.explore-accs').click(function () {
  window.location.href = './accessories.php';
})

$('.explore-games').click(function () {
  window.location.href = './games.php';
})