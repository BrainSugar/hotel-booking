<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="font-weight-light my-5"><?php echo esc_html( "Room Pricing" ); ?></h3>                                                                                                                                  
                        </div>
                </div>
                <div class="bshb-calendar">
                        <div class="row">
                                <div class="col-sm-12">
                              
                                        <!-- Displays the wp template -->
                                        <div id="room-pricing-calendar" class="p-3"></div>
                                </div>                        
                        </div>
                </div>
        </div>
</div>

<!-- Wp template for the room Calendar -->
<script type="text/html" id="tmpl-room-pricing">
<div class="row room-calendar-header">
<div class="col-sm-4 d-flex">
        <div class="room-thumbnail">
                <img src = "{{roomData.room.room_thumbnail_url}}">
        </div>
        <div class="room-info align-self-center">
                <h4 class="font-weight-light">{{roomData.room.post_title}}</h4>                
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

        <table class="room-pricing-table">
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
                                                <td>
                                                        <div class="room-days text-center {{data.days[d].classes}}"data-room-id = "{{roomData.room.ID}}" data-room-date="{{data.days[d].date}}">
                                                                <# _.each(data.days[d].events, function (events) {    #>
                                                                        <# if(events.room_type == roomData.room.ID) { #>
                                                                                <!-- Check if its the start of an event or end of an event and output relevent class -->
                                                                                        <span class="new-price"> 
                                                                                                <h5 class="mb-0">{{events.price}}</h5>
                                                                                        </span>
                                                                        <# } #>
                                                                <# }); #>
                                                        <i class="add-icon fad fa-plus fa-2x  icon-dark" title="Change room Price"></i>                                              
                                                          <span class="room-date">                                                        
                                                                <h6 class="room-price" title="Rack rate">{{roomData.room.room_price}}</h6>
                                                                <p class="font-weight-light">{{ data.days[d].day }} </p>
                                                        </span>        
                                                        </div>
                                                </td>
                                        <# } #>
                                </tr>
                        <#}#>
                </tbody>
                             
        </table>
</script>



<!-- Modal for Pricing event Click -->

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
