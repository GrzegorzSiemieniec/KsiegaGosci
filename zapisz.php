<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zapisano w Księdze</title>
  </head>
  <body>
    <?php
    require("connect.php");

    $sql2 = "SELECT nazwa, sciezka FROM sprzet";
    $result2 = $conn ->query($sql2);
    $row = $result2->fetch_assoc();

    function clean_text($string)
    {
     $string = trim($string);
     $string = stripslashes($string);
     $string = htmlspecialchars($string);
     return $string;
    }


      $imie = clean_text($_POST["firstName"]);
      $nazwisko = clean_text($_POST["lastName"]);
      $firma = clean_text($_POST["firma"]);
      $cel = clean_text($_POST["cel2"]);
      $data = clean_text($_POST["date"]);
      $kontakt = clean_text($_POST["kontakt"]);

      $file_open = fopen($row['sciezka']."/".$row['nazwa'].".csv", "a");

      $form_data = array(
       'Imię'  => $imie,
       'Nazwisko'  => $nazwisko,
       'Firma' => $firma,
       'Cel' => $cel,
       'Data' => $data,
       'Kontakt' => $kontakt
      );
      $delimiter = ";";
      fputcsv($file_open, $form_data, $delimiter);

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
        <center>
        <?php
        $imie = clean_text($_POST["firstName"]);
        $nazwisko = clean_text($_POST["lastName"]);
        $firma = clean_text($_POST["firma"]);
        $cel = clean_text($_POST["cel2"]);
        $data = clean_text($_POST["date"]);
        $kontakt = clean_text($_POST["kontakt"]);

        echo '<h1 style="text-align:center;">Dziękujemy za wizytę, dane przesłane:</h2><br>'.
        "<center>
        <h3>Imię: $imie</h3>
        <h3>Nazwisko: $nazwisko</h3>
        <h3>Firma: $firma</h3>
        <h3>Cel wizyty: $cel</h3>
        <h3>Data: $data</h3>
        <h3>Kontakt: $kontakt</h3>
        </center>";
        header('Refresh: 5; URL=http://localhost/ksiegaGosci/index.html');
        ?>
        </center>
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
