<?php

$carousel = $pdo->query("select * from carousel")->fetchAll();?>
<br/>
    <div class="row">
        <div class="col-md-12 carousel-reviews broun-block">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    foreach($carousel as $c){
                        ?>
                        <div class="item <?php if($c['car_img']==1){echo "active";} ?>">
                            <img src="images/carousel/<?= $c['car_img']?>.jpg" alt="<?= $c['car_title']?>" style="width: 100%">
                            <div class="carousel-caption">
                                <h3><?= $c['car_title']?></h3>
                                <p><?= $c['car_desc']?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
