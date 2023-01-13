<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Travel system</title>
  <link href="css/home1_style.css" rel="stylesheet"> 
</head>
<body>
  <header>
    <div class="container">
      <div class="nav_bar">
        <div class="logo">
          <img src="img/logo.webp" class="logo" alt="logo">
        </div>

          <div class="menu_list">
            <a href="./index1.php">Начало</a>
            <a href="#">Дестинации</a>
            <a href="#">Конакти</a>

           <a href="./front-end/login/login.html"> <button class="lg_btn">Вход</button></a>
          </div>
      </div>
    </div>
  </header>

  <section class="home_section">
    <div class="overlay">
      <div class="container">
        <div class="home">
          <h1><span>Система</span> за <br>туристически <span>услуги</span></h1>
          <div class="home_buttons">
            <button class="btn1">Дестинации</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="services">
    <div class="container">

      <form method="post">
        <div class="wrap">
            <div class="search">
                  <input type="text" class="searchTerm" name="q1" placeholder="Търси дестинация">
                  <input type="submit" class="searchButton" name="submit" value="Търси">
            </div>
        </div>
      </form>
              
              <?php
                  if (isset($_POST['submit'])) {
                  $connection = new mysqli("localhost", "root", "", "tour");
                  $q = $_POST["q1"];
      
                      $dests = "SELECT * FROM `destinations` WHERE name_dest = '$q'";
                      $dest_query_run  = mysqli_query($connection, $dests);
                          if(mysqli_num_rows($dest_query_run) > 0)
                          {
                              foreach($dest_query_run as $destnames) :
                              ?>
                              <section class="services">
                              <div class="services_boxes">
                               <div class="box">
                               <i class="fa-solid fa-hotel"></i>
                              <h4><?= $destnames['name_dest']; ?></h4>
                              <p>Дати на заминаване: <?= $destnames['departure']; ?></p>
                              <p>Цени от: <?= $destnames['price']; ?></p>
                              </div>
                              </section>
                              <?php
                              endforeach;
                           }
                  }            
              ?>

     <div class="title">
        <h1>Посетете най-страхотните места по <span>света</span></h1>
      </div>

      <div class="services_boxes">
        <div class="box">
          <i class="fa-solid fa-hotel"></i>
          <h4>Дубай</h4>
          <p>Дати на заминаване: 2023-01-26; 2023-02-18</p>
          <p>Цени от: 500лв</p>
        </div>

        <div class="box br">
          <i class="fa-solid fa-plane"></i>
          <h4>Крит</h4>
          <p>Дати на заминаване: 2023-04-10; 2023-05-16</p>
          <p>Цени от: 750лв</p>
        </div>

        <div class="box">
          <i class="fa-solid fa-mountain-sun"></i>
          <h4>Венеция</h4>
          <p>Дати на заминаване: 2023-02-21; 2023-03-11</p>
          <p>Цени от: 320лв</p>
        </div>
      </div>
  </div>
  </section>

</body>
</html>
