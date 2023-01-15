<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дестинации</title>
    <link href="dest.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script async defer src="../profile/javascript/logout.js"></script>
</head>
<body>
    <header>
    <div class="containerH">
      <div class="nav_bar">
        <div class="logo">
          <img src="../../img/logo.webp" class="logo" alt="logo">
        </div>
	<h1><b>Дестинации</b></h1>
          <div class="menu_list">
           <button id="logout" class="lg_btn">Изход</button>
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
		    
	    	<form action="" method="GET">
            		<div class="card shadow mt-3">
                		<div class="card-header">
                        		<h5>Филтър
                                		<button type="submit" class="btn btn-primary btn-sm float-end">Търси</button>
                            		</h5>
                        	</div>
				<div class="card-body">
					<h6>Цена</h6>
					<hr>
                        		<div class="">
						<div class="col-md-4 prInput">
							<label for="">От:</label>
							<input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])) { echo $_GET['start_price']; } ?>" class="form-control">
						</div>
						<div class="col-md-4 prInput">
							<label for="">До:</label>
							<input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])) { echo $_GET['end_price']; } ?>" class="form-control">
						</div>
                            		</div>                    
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
                                                    <div class="boxx">
							<div><img src="<?php echo $destnames['img']; ?>" alt="img" height=240 width=300/></div>
                                                        <h4><?= $destnames['name_dest']; ?></h4>
							<div>Цена: <?= $destnames['price']; ?> лв.</div>
							<div>Дата: <?= $destnames['departure']; ?></div>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            }
                            else if(isset($_GET['start_price']) && isset($_GET['end_price']))
			    {
				$startprice = $_GET['start_price'];
				$endprice = $_GET['end_price'];

				$price_query = "SELECT * FROM destinations WHERE price BETWEEN $startprice AND $endprice";
							
				$price_query_run = mysqli_query($con, $price_query);

				if($price_query_run)	
				{
				    foreach($price_query_run as $offers)
				    {
				    ?>
					<div class="col-md-4 off">
						<div class="boxx">
							<div><img src="<?= $offers['img']; ?>" alt="img" height=240 width=300/></div>
							<h4> <?= $offers['name_dest']; ?></h4>
							<div>Цена: <?= $offers['price']; ?> лв.</div>
							<div>Дата: <?= $offers['departure']; ?></div>
						</div>
					</div>
				    <?php
				    }
			        }
			    }
			    else
                            {
				$dests = "SELECT * FROM destinations";
                                $dests_run = mysqli_query($con, $dests);
                                if($dests_run)
                                {
                                    foreach($dests_run as $destnames) :
                                        ?>
                                            <div class="col-md-4 off">
                                                <div class="boxx">
						    <div><img src="<?php echo $destnames['img']; ?>" alt="img" height=240 width=300/></div>
                                                    <h4><?= $destnames['name_dest']; ?></h4>
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

    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>
