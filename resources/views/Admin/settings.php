<div class="bshb">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="font-weight-light my-5"><?php echo esc_html( "Settings" ); ?></h3>
                        </div>                        
                </div>                
                <div class="bshb-settings">
                               <div class="row">
                                       <div class="col-sm-2">
                                               <div class="bshb-nav nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="general-settings-tab" data-toggle="pill" href="#general-settings" role="tab" aria-controls="general-settings" aria-selected="true">General</a>
                                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Room</a>
                                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                                                </div>
                                       </div>
                                       <div class="col-sm-10">



        <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="general-settings" role="tabpanel" aria-labelledby="general-settings-tab">
                        <?php echo Brainsugar()->view( 'Admin.Settings.general-settings' ) ?>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <?php echo Brainsugar()->view( 'Admin.Settings.room-settings' ) ?>
                </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">popopopop</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">poopuu</div>
        </div>



                                       
                                          
                                       </div>
                               </div>
                </div>                
        </div>
</div>