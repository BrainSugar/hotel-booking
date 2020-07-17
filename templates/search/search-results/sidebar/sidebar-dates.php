<div class="row">
       <?php if(isset($data->check_in) && isset($data->check_out)){ ?>
        <div class="col-sm-6">
                <p class="date-heading">Check - in</p>
                <div class="stay-dates">
                        <div class="day">
                                 <span class="display-4"><?php echo $data->check_in['day']; ?></span>
                        </div>
                        <div class="month-year">
                                <div class="month">
                                        <span><?php echo $data->check_in['month']; ?></span>
                                </div>
                                <div class="year">
                                        <span><?php echo $data->check_in['year']; ?></span>
                                </div>
                        </div>
                </div>
       </div>
        <div class="col-sm-6">
              <p class="date-heading">Check - Out</p>
                <div class="stay-dates">
                        <div class="day">
                                 <span class="display-4"><?php echo $data->check_out['day']; ?></span>
                        </div>
                        <div class="month-year">
                                <div class="month">
                                        <span><?php echo $data->check_out['month']; ?></span>
                                </div>
                                <div class="year">
                                        <span><?php echo $data->check_out['year']; ?></span>
                                </div>
                        </div>
                </div>
        </div>        
       <?php } else { ?>
        <div class="col-sm-12">
                <h1 class="font-weight-light text-center">Enter your stay dates.</h1>
        </div>
       <?php } ?>
</div>