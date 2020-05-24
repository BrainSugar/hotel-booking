<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <h2 class="font-weight-light my-5"><?php echo esc_html( "Pricing" ); ?></h2>                                
                        </div>
                </div>
                <div class="bshb-calendar">
                        <div class="row">
                                <div class="col-sm-12">
                              
                                        <!-- Displays the wp template -->
                                        <div id="pricing-calendar" class="p-3"></div>
                                </div>                        
                        </div>
                </div>
        </div>
</div>

<script type="text/html" id="tmpl-pricing-calendar">
<!-- Calendar Controls -->
<!-- <div class="row">
        <div class="col-sm-8 d-flex">
        <# for(i=0; i<=12 ; i++) { #>
        <div class="col months" data-month = "{{moment()}}">
                <p>{{ i }}</p>
        </div>
        <# } #>
        </>
        <div class="col-sm-4"></div>
</div> -->
        <table class="pricing-calendar-table">
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
                  <!-- Loop through each Room -->
                <tbody>
                <# _.each(roomData.room, function (room) {    #>
                <!-- Room Data -->
                        <tr class="room-row">                        
                                <td class="room-info-container">
                                        <a href="<?php echo $plugin->getPageUrl('room_pricing'); ?>&room_type={{room.ID}}">
                                                 <div class="room-thumbnail">
                                                        <img src = "{{room.room_thumbnail_url}}">
                                                 </div>
                                                 <div class="room-info">
                                                        <p class="mb-0">{{room.post_title}}</p>
                                                        <small></small>
                                                 </div>  
                                        </a>                                              
                                </td>
                        <!-- Loop through days and events -->
                                <# _.each(data.days, function (day) {    #>   
                                        <td class="p-0">
                                                <div class="room-days text-center {{day.classes}}" data-room-id = "{{room.ID}}" data-room-date="{{day.date}}">
                                                        <!-- <h5 class="font-weight-light mt-1">$400</h5> -->
                                                        <# _.each(day.events, function (events) {    #>
                                                                <# if(events.room_type == room.ID) { #>
                                                                        <!-- Check if its the start of an event or end of an event and output relevent class -->
                                                                                <span class="new-price"> 
                                                                                        <h5 class="mb-0">{{events.price}}</h5>
                                                                                </span>
                                                                <# } #>
                                                        <# }); #>
                                                        <i class="add-icon fad fa-plus fa-2x  icon-dark" title="Change room Price"></i>     
                                                        <!-- <h4 class="new-price">$23</h4> -->
                                                        <span class="room-date">                                                        
                                                                <h6 class="room-price" title="Rack rate">{{room.room_price}}</h6>
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


<!-- Modal for booking event Click -->

<div class="bshb">
        <div id="show-pricing-modal" class="modal  mt-5 fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header pb-0">
                                        <h5 class="modal-title"></h5>
                                </div>

                                <div class="modal-body pt-0">
                                        <div class="container-fluid">
                                                <div class="row">
                                                        <div class="col-sm-6">
                                                                <div class="room-type-info">
                                                                        <div class="room-thumbnail">
                                                                                <img class="room-image">
                                                                        </div>                                                                                                                                                       
                                                                        <h6 class="room-type font-weight-light"></h6>                                                                       
                                                                </div>                                                                
                                                        </div>
                                                        <div class="col-sm-6 text-center">                                                                
                                                                <ul class="timeline">
                                                                <li class="event">
                                                                                <p class="left">Start</p>
                                                                                <h6 class = "right range-start font-weight-light"></h6>
                                                                </li>    
                                                                <li class="event">
                                                                                <p class="left">End</p>
                                                                                <h6 class = "right range-end font-weight-light"></h6>
                                                                </li>    
                                                                </ul>                                                                                                            
                                                        </div>                                                        
                                                </div>
                                                <hr>
                                                <div class="row">                                                        
                                                        <div class="col-sm-6 d-flex justify-content-center">
                                                                <div class="current-price">
                                                                        <span>Rack Rate</span>
                                                                        <h3 class="price"></h3>                                                                
                                                                </div>                                                                                                                     
                                                        </div>
                                                        
                                                        <div class="col-sm-6 m-auto">
                                                                <div class="input-group">
                                                                        <input id="new-price" class="form-control" type = "number" placeholder="New price" required="true"> 
                                                                </div>                                                              
                                                        </div>
                                                        
                                                </div>
                                        </div>
                                </div>

                                <div class="modal-footer">
                                <span class="restore-price">
                                        <i class="fad fa-history fa-1x icon-dark"></i>
                                        <a id="delete-price">Restore rack rate</a>
                                </span>
                                         
                                        <button id="update-price-modal-button" type="submit" class="btn btn-primary">Update Pricing</button>
                                        <button id="update-price-cancel-button" type="button" class="btn btn-secondary">Cancel</button>
                                </div>
                        </div>
                </div>
        </div>

<!-- End of Modal -->
<!-- 
<h5 class="modal-title"></h5>
                                </div>
                                <div class="modal-body">
                                <div class="row">
                                <div class="col-sm-6">
                                        <p class="range-start"></p>
                                </div>
                                <div class="col-sm-6"></div>
                                        <p class="range-end"></p>
                                </div>
                        </div>
                                        <div class="col-sm-12 my-2">
                                                <h4 class="range-start"></h4>
                                                <h4 class="range-end"></h4>
                                                <h4 class="checkout"></h4>
                                                  <td class="room-info-container">
                                        <a href="<?php echo $plugin->getPageUrl('room_calendar'); ?>&room_id={{room.id}}">
                                                 <div class="room-thumbnail">
                                                        <img src = "{{room.room_thumbnail_url}}">
                                                 </div>
                                                 <div class="room-info">
                                                        <p class="mb-0 room-name">{{room.name}}</p>
                                                        <small class="room-type">{{room.room_type_name}}</small>
                                                 </div>  
                                        </a>                                              
                                </td>
                                        </div> -->