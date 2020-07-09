<div class="bshb-search-results">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                        <?php $data1= (object) ['filter' => 'filter variable']; ?>
                                <?php bshb_get_template_part('search/search-results/filters' , null , $data1); ?>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-8">
                                <div id="bshb-search-content">
                                        <?php $data= (object) ['landing' => 'Landing variable']; ?>
                                        <?php bshb_get_template_part('search/search-results/landing' , null , $data); ?>
                                </div>                                 
                        </div>
                        <div class="col-sm-4">
                                <div id="bshb-cart">
                                        <?php bshb_get_template_part('search/search-results/cart'); ?>
                                </div>
                        </div>
                </div>
        </div>
</div>