<?php var_dump($data);

if(isset($data->check_in)){
         $checkin = $data->check_in;
}
if(isset($data->check_out)){
         $checkout = $data->check_out;
}
       
     

?>
<div class="row text-center">
       <?php if(isset($data->check_in)){ ?>
        <div class="col-sm-6">
                <h1 class="font-weight-light"><?php echo $checkin; ?></h1>
        </div>
       <?php } else { ?>
        <div class="col-sm-6">
                <h1 class="font-weight-light">Check In</h1>
        </div>
       <?php } ?>

              <?php if(isset($data->check_out)){ ?>
        <div class="col-sm-6">
                <h1 class="font-weight-light"><?php echo $checkout; ?></h1>
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