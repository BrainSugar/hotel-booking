<pre><?php print_r($roomTypes); ?></pre>
<?php var_dump($reservations); ?>
<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="font-weight-light my-5"><?php echo esc_html( "Dashboard" ); ?></h3>                               
                        </div>
                </div>             
                <div class="bshb-dashboard">                        
                        <div id="dashboard-reservations"></div>
                </div>           
        </div>
</div>

<script type="text/html" id="tmpl-dashboard-calendar">
        <div class="row reservations">
                <div class="col-sm-2">
                        <div class="row  reservation-days">
                                <div class="month-year col-sm-12 px-0 py-3 text-center"> 
                                        <i class = "clndr-previous-button" title="Previous 5 days" ><</i>
                                               <h4 class="font-weight-light my-2">{{ data.intervalStart.format('MMMM') }}</h4>
                                        <h5 class="font-weight-light my-1">{{ data.intervalStart.format('YYYY') }}  </h5>
                                         <i class = "clndr-next-button" title="Next 5 Days">></i>
                                        </div>
                             <# _.each(data.days, function (day) {    #>
                                        <div class="reservation-date col-sm-12 text-center {{ day.classes }}"> 
                                                <h4 class="font-weight-light">{{ day.day }} </h4>
                                                <p class="mb-2"> {{ day.date.format('dddd') }}</p>
                                        </div>
                                <# });  #>
                        </div>
                </div>                       
                <div class="col-sm-5">
                        <h4 class="font-weight-light mb-5"><?php echo esc_html( "Check-Ins" ); ?></h4>
                        <div class="row" id="abc">
                                <# _.each(data.eventsThisInterval, function (events) { #>
                                        <# if(moment(events.check_in).isSame( data.extras.selectedDate , 'date' ) ) {#>                                                
                                         <div class="col-sm-10 my-2 check-outs">
                                                <h5 class="font-weight-light mb-2">Shreyas</h5>
                                                <p>Reservation Number - #{{events.reservation_id}}</p>
                                                <hr>
                                                <div class="row">
                                                        <div class="col-sm-6">                                                        
                                                                <span class="duration">                                                        
                                                                        <i class="fad fa-calendar-day icon-dark" title="Check In"></i>                                                                 
                                                                        <p class="mb-0">{{events.check_in}}</p>
                                                                </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <span class="duration">                                                        
                                                                        <i class="fad fa-calendar-day icon-dark" title="Check Out"></i>                                                                 
                                                                        <p class="mb-0">{{events.check_out}}</p>
                                                                </span>
                                                        </div>
                                                </div>
                                                
                                        </div>
                                        <# } #>
                                <# }); #>
                        </div>
                </div>
                <div class="col-sm-5">
                        <h4 class="font-weight-light mb-5"><?php echo esc_html( "Check-Outs" ); ?></h4>
                          <div class="row">
                               <# _.each(data.eventsThisInterval, function (events) { #>
                                        <# if(moment(events.check_out).isSame( data.extras.selectedDate , 'date' ) ) {#>
                                         <div class="col-sm-10 my-2 check-outs">
                                                 
                                                <h5 class="font-weight-light mb-2">Shreyas</h5>
                                                <p>Reservation Number - #{{events.reservation_id}}</p>
                                                <hr>
                                                <span class="duration">
                                                        <p>{{events.check_in}} to {{events.check_out}}</p>
                                                </span>
                                        </div>
                                        <# } #>
                                <# }); #>
                        </div>
                </div>                
        </div>
</script>