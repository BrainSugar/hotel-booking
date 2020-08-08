<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-6">
                                <h3 class="font-weight-light my-5"><?php echo esc_html( "Settings" ); ?></h3>
                        </div>
                        <div class="col-sm-6">
                                <?php if ( isset( $feedback ) ) : ?>
                                        <div id="message" class="updated notice is-dismissible mt-5">
                                                <p><?php echo esc_html($feedback); ?></p>
                                        </div>
	                        <?php endif; ?>
                        </div>
                </div>                  
                <div class="bshb-settings">
                               <div class="row">
                                       <div class="col-sm-2">
                                               <div class="bshb-nav nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="general-settings-tab" data-toggle="pill" href="#general-settings" role="tab" aria-controls="general-settings" aria-selected="true">General</a>
                                                        <a class="nav-link" id="room-settings-tab" data-toggle="pill" href="#room-settings" role="tab" aria-controls="room-settings" aria-selected="false">Room</a>
                                                        <a class="nav-link" id="reservation-settings-tab" data-toggle="pill" href="#reservation-settings" role="tab" aria-controls="reservation-settings" aria-selected="false">Reservation</a>
                                                        <a class="nav-link" id="page-settings-tab" data-toggle="pill" href="#page-settings" role="tab" aria-controls="page-settings" aria-selected="false">Pages</a>
                                                        <a class="nav-link" id="ui-settings-tab" data-toggle="pill" href="#ui-settings" role="tab" aria-controls="ui-settings" aria-selected="false">User Interface</a>
                                                </div>
                                       </div>
                                       <div class="col-sm-10">
<form id="bshb_settings" method="post" enctype="multipart/form-data" encoding="multipart/form-data">
        <?php wp_nonce_field( 'bshb-settings' ); ?>
        <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="general-settings" role="tabpanel" aria-labelledby="general-settings-tab">
                        <?php echo Brainsugar()->view( 'Admin.Settings.general-settings' )->with('countries', $countries)->with('currencies', $currencies)->with('currencyDisplay', $currencyDisplay); ?>
                </div>
                <div class="tab-pane fade" id="room-settings" role="tabpanel" aria-labelledby="room-settings-tab">
                        <?php echo Brainsugar()->view( 'Admin.Settings.room-settings' ); ?>
                </div>
                <div class="tab-pane fade" id="reservation-settings" role="tabpanel" aria-labelledby="reservation-settings-tab">
                         <?php echo Brainsugar()->view( 'Admin.Settings.reservation-settings' ); ?>
                </div>
               <div class="tab-pane fade" id="page-settings" role="tabpanel" aria-labelledby="page-settings-tab">
                        <?php echo Brainsugar()->view( 'Admin.Settings.page-settings' )->with('pages' , $pages); ?>
                </div>
                <div class="tab-pane fade" id="ui-settings" role="tabpanel" aria-labelledby="ui-settings-tab">
                        <?php echo Brainsugar()->view( 'Admin.Settings.ui-settings' ); ?>
                </div>
        </div>
        <div class="d-flex">
                <button class="btn btn-primary mr-4 ml-auto mb-4">Save changes</button>
        </div>
</form>


                                       
                                          
                                       </div>
                               </div>
                </div>                
        </div>
</div>