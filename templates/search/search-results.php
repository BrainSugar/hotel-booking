<div class="bshb-search-results">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <div class="search-filters" id="bshb-search-filters">
                                        <?php $data1= (object) ['filter' => 'filter variable']; ?>
                                        <?php bshb_get_template_part('search/search-results/filters' , null , $data1); ?>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-8">
                                <div class = "search-content" id="bshb-search-content">
                                        <?php $data= (object) ['landing' => 'Landing variable']; ?>
                                        <?php bshb_get_template_part('search/search-results/landing' , null , $data); ?>
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