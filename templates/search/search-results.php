<div class="bshb-search-results">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <div class="search-filters" id="bshb-search-filters">                                        
                                        <?php bshb_get_template_part('search/search-results/filters'); ?>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-8">
                                <div class = "search-content" id="bshb-search-content">                                        
                                        <?php bshb_get_template_part('search/search-results/landing'); ?>
                                </div>                                 
                        </div>
                        <div class="col-sm-4">
                                <div class="search-sidebar" id="bshb-search-sidebar">
                                        <?php bshb_get_template_part('search/search-results/sidebar'); ?>
                                </div>
                        </div>
                </div>
        </div>
</div>