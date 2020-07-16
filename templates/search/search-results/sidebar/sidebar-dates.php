<div class="row text-center">
       <?php if(isset($data->check_in)){ ?>
        <div class="col-sm-6">
                  <h1 class="font-weight-light display-4"><?php echo $data->check_in['day']; ?></h1>
                                  <p><?php echo $data->check_in['month']; ?></p>
                <p><?php echo $data->check_in['year']; ?></p>
        </div>
       <?php } else { ?>
        <div class="col-sm-6">
                <h1 class="font-weight-light">data not set</h1>
        </div>
       <?php } ?>

              <?php if(isset($data->check_out)){ ?>
        <div class="col-sm-6">
                <h1 class="font-weight-light"><?php echo $data->check_out['day']; ?></h1>
                <p><?php echo $data->check_out['month']; ?></p>
                <p><?php echo $data->check_out['year']; ?></p>
        </div>
       <?php } else { ?>
        <div class="col-sm-6">
                <h1 class="font-weight-light">Check out</h1>
        </div>
       <?php } ?>
        <!-- <div class="col-sm-6">
                 <h1 class="font-weight-light">Check Out</h1>
        </div> -->
</div>