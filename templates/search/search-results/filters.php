
<div class="row">                             
        <div class="col-sm-12">      
                <div class="search-filters">

                        <div id="filter-list" class="filter" title="List View">
                                <i class="fad fa-list-ul"></i>                                                                                       
                        </div>

                        <div id="filter-grid" class="filter"  title="Grid View">
                                <i class="fad  fa-th-large "></i>                                                        
                        </div>

                        <div class="price-sort">
                                <div class="filter" title="Price Sort" role="button" id="price-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fad fa-filter"></i>
                                <div class="dropdown-menu" aria-labelledby="price-sort">
                                                <a class="dropdown-item" title="Sort by highest price."><?php echo esc_html('Highest Price First' , 'bshb'); ?></a>
                                                <a class="dropdown-item"  title="Sort by lowest price." ><?php echo esc_html('Lowest Price First' , 'bshb'); ?></a>                                
                                        </div>
                                </div>
                        </div>

                        <div class="price-filter">
                                <div class="filter" title="Price Filters" role="button" id="price-filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fad fa-funnel-dollar"></i>
                                <div class="dropdown-menu" aria-labelledby="price-filter">
                                                <span id="price-total" class="dropdown-item" title="Total price for stay dates"><?php echo esc_html('Show Prices for duration of stay.' , 'bshb'); ?></span>
                                                <span id="price-night" class="dropdown-item"  title="Prices per night" ><?php echo esc_html('Show price for 1 night.' , 'bshb'); ?></span>                                
                                        </div>
                                </div>
                        </div>

                </div>
        </div>
</div>
