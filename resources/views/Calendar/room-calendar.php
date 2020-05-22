<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <h1 class="font-weight-light my-3">Room Calendar</h1>                                                                                                                                  
                        </div>
                </div>
                <div class="bshb-calendar">
                        <div class="row">
                                <div class="col-sm-12">
                              
                                        <!-- Displays the wp template -->
                                        <div id="room-calendar" class="p-3"></div>
                                </div>                        
                        </div>
                </div>
        </div>
</div>

<!-- Wp template for the room Calendar -->
<script type="text/html" id="tmpl-room-calendar">
<div class="row room-calendar-header">
<div class="col-sm-4 d-flex">
        <div class="room-thumbnail">
                <img src = "{{roomData.room_thumbnail_url}}">
        </div>
        <div class="room-info align-self-center">
                <h4 class="font-weight-light">{{roomData.name}}</h4>
                <p>{{"Type : " + roomData.room_type_name}}</p>
        </div>

</div>
<div class="col-sm-4 month-year">
        <i class = "clndr-previous-button" title="Previous Month" ><</i>
        <h2 class="font-weight-light my-2">{{data.month}}</h2>
        <h5 class="font-weight-light my-1">{{data.year}}</h5>
        <i class = "clndr-next-button" title="Next Month">></i>
</div>
<div class="col-sm-4"></div>
</div>

        <table class="room-calendar-table">
                <thead>
                        <tr>
                        <# for(var i = 0; i < 7; i++) {   #>
                                <td class="py-2 px-3 text-center "> 
                                        <h6 class="font-weight-light">{{data.days[i].date.format('dddd')}} </h6>
                                        <p class="mb-2"> </p>
                                </td>
                        <# }#>
                        </tr>
                </thead>
      
                <tbody>
                        <# for(var i = 0; i< data.numberOfRows; i++) {#>
                                <tr>
                                        <# for(var j=0; j < 7; j++) { #>
                                                <# var d = j + i * 7; #>
                                                <td class="day-cell">
                                                        <div class="room-days {{data.days[d].classes}}">
                                                                <# _.each(data.days[d].events, function (events) {    #>
                                                                <span class="bookings {{events.status}}
                                                                <# if(moment(events.startDate).isSame( data.days[d].date , 'date') ) { #>
                                                                start-day
                                                                <# } if(moment(events.endDate).isSame( data.days[d].date , 'date')) { #>
                                                                end-day
                                                                 <# } #>" data-booking-id = "{{events.bookingId}}"> 
                                                                                <p class="mb-0">Reservation</p>                                                                           
                                                                                <p class="mb-0"># {{events.bookingId}}</p>
                                                                </span>
                                                                <# });#>   
                                              
                                                         <span class="room-date">
                                                                <p class="font-weight-light"> {{data.days[d].day}} </p>
                                                        </span>
                                                        </div>
                                                </td>
                                        <# } #>
                                </tr>
                        <#}#>
                </tbody>
                             
        </table>
</script>
