<?php
require("connect.php");

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

$nazwa = clean_text($_POST["nazwa"]);
$sciezka = clean_text($_POST["sciezka"]);
if($nazwa != "" && $sciezka !=""){
  $sql2 = "UPDATE sprzet SET nazwa ='" . $nazwa . "';";
  $sql = "UPDATE sprzet SET sciezka ='" . $sciezka . "';";
  $result2 = $conn ->query($sql2);
  $result1 = $conn ->query($sql);
}else if($sciezka != ""){
  $sql = "UPDATE sprzet SET sciezka ='" . $sciezka . "';";
  $result1 = $conn ->query($sql);
}else if($nazwa !=""){
  $sql2 = "UPDATE sprzet SET nazwa ='" . $nazwa . "';";
  $result2 = $conn ->query($sql2);
}else{

};


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  </head>
  <body id="body">
    <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-book' ></i>
        <div class="logo_name">KSIĘGA GOŚCI</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
      <ul class="nav-list">
    <li>
      <a class="change">
        <i class='bx bxs-sun'></i>
        <span class="links_name">Dark-Mode</span>
      </a>
      <span class="tooltip">Dark-Mode</span>
    </li>
    <li onclick="openFullscreen(); closeFullscreen()">
      <a>
      <i class='bx bx-fullscreen' ></i>
      <span class="links_name">Fullscreen</span>
    </a>
      <span class="tooltip">Fullscreen</span>
    </li>
    <li class="profile">
             <a href="index.html" id="config"><i class='bx bx-exit' ></i></a>
         </li>
        </ul>
      </div>
  <section class="home-section">
    <?php
    if($sciezka == ""){
      $sciezka = "Nie zmieniono";
    }
    if($nazwa == ""){
      $nazwa = "Nie zmieniono";
    }
    echo '<center><h1>Pomyślnie zmieniono</h2></center><br>'.
    "<center>
    <h3>Nazwa: $nazwa</h3>
    <h3>Scieżka: $sciezka</h3>
    </center>";
    header('Refresh: 5; URL=http://localhost/ksiegaGosci/index.html');
    ?>
    </section>

    <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      menuBtnChange();//calling the function(optional)
    });


    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
     if(sidebar.classList.contains("open")){
       closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
     }else {
       closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
     }
    }

    var elem = document.getElementById("body");
    var icon = document.getElementById("body");
    function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
    }
    function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }
    }

    $( ".change" ).on("click", function() {
              if( $( ".home-section" ).hasClass( "dark" )) {
                  $( ".home-section" ).removeClass( "dark" );
              } else {
                  $( ".home-section" ).addClass( "dark" );
              }
          });
    </script>
  </body>
</html>

</body>
</html>
