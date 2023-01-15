<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                               <div><img src="<?php echo $destnames['img']; ?>" alt="img" height=240px width=300px/></div>
                              <h3><?= $destnames['name_dest']; ?></h3>
                              <p>Цени от: <?= $destnames['price']; ?> лв.</p>
                              <p>Дати на заминаване: <?= $destnames['departure']; ?></p>
                              </div>
                              </section>
                              <?php
                              endforeach;
                           }
                           else {
                           echo "Няма намерени резултати..."; }
                  }            
              ?>

     <div class="title">
        <h1>Посетете най-страхотните места по <span>света</span></h1>
      </div>
      
      <section class="services">

      <div class="services_boxes">

        <div class="box">
          <div><img src="./img/dubai.webp" alt="img" height=240px width=300px /></div>
          <h3>Дубай</h3>
          <p>Цени от: 500 лв.</p>
          <p>Дати на заминаване: <br>2023-01-26; 2023-02-18</p>
        </div>
        

        <div class="box">
          <div><img src="./img/malta.jpg" alt="img" height=240px width=300px /></div>
          <h3>Малта</h3>
          <p>Цени от: 750 лв.</p>
          <p>Дати на заминаване: <br>2023-04-10; 2023-05-16</p>
        </div>
       

        <div class="box">
          <div><img src="./img/venezia.jpg" alt="img" height=240px width=300px /></div>
          <h3>Венеция</h3>
          <p>Цени от: 320 лв.</p>
          <p>Дати на заминаване: <br>2023-02-21; 2023-03-11</p>
        </div>

        </div>
      </section>
  </div>
</body>
</html>
