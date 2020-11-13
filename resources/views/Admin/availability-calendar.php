<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="font-weight-light my-5"><?php echo esc_html( "Availability Calendar" ); ?></h3>                             
                        </div>
                </div>
                <div class="bshb-calendar">
                        <div class="row">
                                <div class="col-sm-12">
                                        <!-- Displays the wp template -->
                                        <div id="availability-calendar" class="p-3"></div>
                                </div>                        
                        </div>
                </div>
        </div>
</div>

<!-- Wp template for the availability Calendar -->
<script type="text/html" id="tmpl-availability-calendar">
<!-- Calendar Table -->
        <table class="availability-calendar-table">
                <!-- Row to display dates. Calendar Header -->
                <thead>
                        <tr class="header-row">
                                <td class="month-year">
                                        <i class = "clndr-previous-button" title="Last Week" ><</i>
                                        <h2 class="font-weight-light my-2">{{ data.intervalStart.format('MMMM') }}</h2>
                                        <h5 class="font-weight-light my-1">{{ data.intervalStart.format('YYYY') }}  </h5>
                                        <i class = "clndr-next-button" title="Next Week">></i>
                                </td>
                                <# _.each(data.days, function (day) {    #>
                                        <td class="py-2 px-3 text-center {{ day.classes }}"> 
                                                <h1 class="font-weight-light">{{ day.day }} </h1>
                                                <p class="mb-2"> {{ day.date.format('dddd') }}</p>
                                        </td>
                                <# });  #>
                        </tr>
                </thead>
                <!-- Room Calendars  -->
                <!-- Loop through each Room -->
                <tbody>
                <# _.each(roomData, function (room) {    #>
                <!-- Room Data -->
                        <tr class="room-row">                        
                                <td class="room-info-container">
                                        <a href="<?php echo esc_url(Brainsugar()->getPageUrl('room_calendar')); ?>&room_id={{room.id}}">
                                                 <div class="room-thumbnail">
                                                        <img src = "{{room.room_thumbnail_url}}">
                                                 </div>
                                                 <div class="room-info">
                                                        <p class="mb-0">{{room.name}}</p>
                                                        <small>{{room.room_type_name}}</small>
                                                 </div>  
                                        </a>                                              
                                </td>
                        <!-- Loop through days and events -->
                                <# _.each(data.days, function (day) {    #>   
                                        <td class="p-0">
                                                <div class="room-days  {{day.classes}}">
                                                <# _.each(day.events, function (events) {    #>
                                                        <# if(events.room_id == room.id) { #>
                                                                <!-- Check if its the start of an event or end of an event and output relevent class -->
                                                                <span class="bookings {{events.reservation_status}}
                                                                <# if(moment(events.start_date).isSame( day.date , 'date') ) { #>
                                                                start-day
                                                                <# } if(moment(events.end_date).isSame( day.date , 'date')) { #>
                                                                end-day
                                                                 <# } #>" data-booking-id = "{{events.reservation_id}}">                                                                                                                                                                                                                                                       
                                                                                <p class="mb-0">Reservation</p>                                                                           
                                                                                <p class="mb-0"># {{events.reservation_id}}</p>
                                                                </span>
                                                        <# } #>
                                                <# }); #>
                                                <span class="room-date">
                                                        <p class="font-weight-light">{{ day.day }} </p>
                                                </span>       
                                                </div>                                                 
                                        </td>
                                <# });  #>
                        <!-- End of loop day and events -->
                        </tr>
                <# });  #>
                        <!-- End of looping through Each room -->
                </tbody>
        </table>
</script>
<!-- End of wp Template -->


<!-- Modal for booking event Click -->

<div class="bshb">
        <div id="show-reservation-modal" class="modal  mt-5 fade" tabindex="-1" role="dialog">       
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                </div>
                                <div class="modal-body">
                                        <div class="col-sm-12 my-2">
                                                <h4 class="guest-name"></h4>
                                                <h4 class="arrival"></h4>
                                                <h4 class="checkout"></h4>

                                        </div>
                                </div>
                                <?php  echo Brainsugar()->view('Admin.Settings'); ?>
                                <div class="modal-footer">
                                        <button id="add-modal-button" type="submit" class="btn btn-primary">Edit Reservation</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>

<!-- End of Modal -->


