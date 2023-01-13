<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <link href="dest.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
    <div class="containerH">
      <div class="nav_bar">
        <div class="logo">
          <img src="../../img/logo.webp" class="logo" alt="logo">
        </div>

          <div class="menu_list">
            <a href="#">Контакти</a>

           <a href="./front-end/login/login.html"> <button class="lg_btn">Вход</button></a>
          </div>
      </div>
    </div>
    </header>
    <div class="mainC">
        <div class="row rm">
	    <!-- Destinations List  -->
            <div class="col-md-3 flt">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Филтър
                                <button type="submit" class="btn btn-primary btn-sm float-end">Търси</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Дестинации</h6>
                            <hr>
                            <?php
                                $con = mysqli_connect("localhost","root","","tour");

                                $dest_query = "SELECT * FROM dests";
                                $dest_query_run  = mysqli_query($con, $dest_query);

                                if(mysqli_num_rows($dest_query_run) > 0)
                                {
                                    foreach($dest_query_run as $destlist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['dest']))
                                        {
                                            $checked = $_GET['dest'];
										}
                                        ?>
                                            <div>
                                                <input type="checkbox" name="dest[]" value="<?= $destlist['id']; ?>" 
                                                    <?php if(in_array($destlist['id'], $checked)){ echo "checked"; } ?>
                                                 />
                                                <?= $destlist['name']; ?>
                                            </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "Няма намерени дестинации";
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Offers -->
            <div class="col-md-9 mt-3">
                <div class="card offs">
                    <div class="card-body row">
                        <?php
			  if(isset($_GET['dest']))
                            {
                                $destschecked = [];
                                $destschecked = $_GET['dest'];
                                foreach($destschecked as $rowdest)
                                {
                                    $dests = "SELECT * FROM destinations WHERE dest_id IN ($rowdest)";
                                    $dests_run = mysqli_query($con, $dests);
                                    if(mysqli_num_rows($dests_run) > 0)
                                    {
                                        foreach($dests_run as $destnames) :
                                            ?>
                                                <div class="col-md-4 off">
                                                    <div class="border p-2 boxx">
							<div><img src="<?php echo $destnames['img']; ?>" alt="img" height=240 width=300/></div>
                                                        <h5><?= $destnames['name_dest']; ?></h5>
							<div>Цена: <?= $destnames['price']; ?> лв.</div>
							<div>Дата: <?= $destnames['departure']; ?></div>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            }
                            else
                            {
				$dests = "SELECT * FROM destinations";
                                $dests_run = mysqli_query($con, $dests);
                                if(mysqli_num_rows($dests_run) > 0)
                                {
                                    foreach($dests_run as $destnames) :
                                        ?>
                                            <div class="col-md-4 off">
                                                <div class="border p-2 boxx">
						    <div><img src="<?php echo $destnames['img']; ?>" alt="img" height=240 width=300/></div>
                                                    <h5><?= $destnames['name_dest']; ?></h5>
						    <div>Цена: <?= $destnames['price']; ?> лв.</div>
						    <div>Дата: <?= $destnames['departure']; ?></div>
                                                </div>
                                            </div>
                                        <?php
                                    endforeach;
                                }
                                else
                                {
                                    echo "Няма намерени резултати";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
