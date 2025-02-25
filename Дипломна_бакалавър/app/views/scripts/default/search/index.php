        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $this->translate('Flight Search Results')?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="/"><?php echo $this->translate('Home')?></a></li>
                    <li class="active"><?php echo $this->translate('Flight Search Results')?></li>
                </ul>
            </div>
        </div>
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i class="soap-icon-search"></i><b><?php echo count($this->items)?></b> <?php echo $this->translate('results found.')?></h4>
                            <div class="toggle-container filters-container">
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#price-filter" class="collapsed"><?php echo $this->translate('Price')?></a>
                                    </h4>
                                    <div id="price-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="price-range"></div>
                                            <br />
                                            <span class="min-price-label pull-left"></span>
                                            <span class="max-price-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#flight-times-filter" class="collapsed"><?php echo $this->translate('Flight Duration')?></a>
                                    </h4>
                                    <div id="flight-times-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="flight-times" class="slider-color-yellow"></div>
                                            <br />
                                            <span class="start-time-label pull-left"></span>
                                            <span class="end-time-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#flight-stops-filter" class="collapsed"><?php echo $this->translate('Flight Stops')?></a>
                                    </h4>
                                    <div id="flight-stops-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                            	<?php foreach($this->filters['stops'] as $stop):
                                            	   $li = in_array($stop, $this->prefs['stops'])?'<li class="active">':'<li>'; 
                                            	   echo $li . '<a data-key="stops" data-id="' . $stop . '" class="filter-toggle" href="javascript:void(0)">';
                                                   echo $stop . ' ' . $this->translate('Stop') . '</a></li>';
                                            	   endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#airlines-filter" class="collapsed"><?php echo $this->translate('Airlines')?></a>
                                    </h4>
                                    <div id="airlines-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                            	<?php foreach($this->filters['airlines'] as $aId => $name):
                                            	   $li = array_key_exists($aId, $this->prefs['airlines'])?'<li class="active">':'<li>';
                                            	   echo $li . '<a data-key="airlines" data-id="' . $aId . '" class="filter-toggle" href="javascript:void(0)">';
                                            	   echo $name . '</a></li>'; 
                                            	endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#flight-type-filter" class="collapsed"><?php echo $this->translate('Flight Type')?></a>
                                    </h4>
                                    <div id="flight-type-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                            	<?php foreach($this->filters['types'] as $name):
                                            	   $li = in_array($name, $this->prefs['types'])?'<li class="active">':'<li>';
                                            	   echo $li . '<a data-key="types" data-id="' . $name . '" class="filter-toggle" href="javascript:void(0)">';
                                            	   echo $name . '</a></li>'; 
                                            	endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#inflight-experience-filter" class="collapsed"><?php echo $this->translate('Inflight Experience')?></a>
                                    </h4>
                                    <div id="inflight-experience-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <?php foreach($this->filters['features'] as $aId => $name):
                                            	   $li = array_key_exists($aId, $this->prefs['features'])?'<li class="active">':'<li>';
                                            	   echo $li . '<a data-key="features" data-id="' . $aId . '" class="filter-toggle" href="javascript:void(0)">';
                                            	   echo $name . '</a></li>'; 
                                            	endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#modify-search-panel" class="collapsed"><?php echo $this->translate('Modify Search')?></a>
                                    </h4>
                                    <div id="modify-search-panel" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <form action="/search" method="post">
                                                <div class="form-group">
                                                    <label><?php echo $this->translate('Leaving from')?></label>
                                                   	<?php echo $this->formText('search[from]', $this->search['from'], array(
                                                   	    'class' => 'autocomplete input-text full-width',
                                                   	    'placeholder' => $this->translate('city, district, or specific airpot')
                                                   	))?>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo $this->translate('Going To')?></label>
                                                    <?php echo $this->formText('search[to]', $this->search['to'], array(
                                                   	    'class' => 'autocomplete input-text full-width',
                                                   	    'placeholder' => $this->translate('city, district, or specific airpot')
                                                   	))?>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo $this->translate('Departure on')?></label>
                                                    <div class="datepicker-wrap">
                                                        <?php echo $this->formText('search[departure]', $this->search['departure'], array(
                                                       	    'class' => 'input-text full-width',
                                                       	    'placeholder' => 'mm/dd/yy'
                                                   	    ))?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo $this->translate('Arriving On')?></label>
                                                    <div class="datepicker-wrap">
                                                        <?php echo $this->formText('search[arrival]', $this->search['arrival'], array(
                                                       	    'class' => 'input-text full-width',
                                                       	    'placeholder' => 'mm/dd/yy'
                                                   	    ))?>
                                                    </div>
                                                </div>
                                                <br />
                                                <button class="btn-medium icon-check uppercase full-width"><?php echo $this->translate('search again')?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                            <div class="sort-by-section clearfix box">
                                <h4 class="sort-by-title block-sm"><?php echo $this->translate('Sort results by')?>:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                	<?php foreach($this->filters['sort'] as $sort):
                                    	$li = array_key_exists($sort, $this->prefs['sort'])?'<li class="active">':'<li>';
                                    	echo $li . '<a data-sort="' . $sort . '" class="sort-by-container" href="javascript:void(0)"><span>';
                                    	echo $sort . '</span></a></li>';
                                	endforeach;?>
                                </ul>
                                
                                <ul class="swap-tiles clearfix block-sm">
                                    <li class="swap-list<?php echo $this->prefs['view']=='list'?' active':''?>">
                                        <a class="filter-view" data-id="list" href="javascript:void(0)"><i class="soap-icon-list"></i></a>
                                    </li>
                                    <li class="swap-grid<?php echo $this->prefs['view']=='grid'?' active':''?>">
                                        <a class="filter-view" data-id="grid" href="javascript:void(0)"><i class="soap-icon-grid"></i></a>
                                    </li>
                                    <li class="swap-block<?php echo $this->prefs['view']=='block'?' active':''?>">
                                        <a class="filter-view" data-id="block" href="javascript:void(0)"><i class="soap-icon-block"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div id="flights-container"><?php echo $this->action('list', 'flights')?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php $this->inlineScript()->appendScript('
    var priceMax,priceMin;
    var timeMax,timeMin;
    var filterId;
    function doFilter(data){
        filterId = 0;
        tjq.post("/search/set-prefs",data,function(response){
            tjq("#flights-container").html(response);
        });
    }
	tjq(document).ready(function() {
        tjq("#price-range").slider({
            range: true,
            min: '.intval($this->filters['price-min']).',
            max: '.intval($this->filters['price-max']).',
            values: [ '.intval($this->prefs['price-min']).', '.intval($this->prefs['price-max']).' ],
            slide: function( event, ui ) {
                if(filterId)window.clearTimeout(filterId);
                priceMax = ui.values[1];
                priceMin = ui.values[0];
                filterId = window.setTimeout(function(){doFilter({filter:{"price-max":priceMax,"price-min":priceMin}})}, 500);
                tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                tjq(".max-price-label").html( "$" + ui.values[ 1 ]);
            }
        });
        tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
        tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));

        function convertTimeToHHMM(t) {
            var minutes = t % 60;
            var hour = (t - minutes) / 60;
            var timeStr = (hour + "").lpad("0", 2) + ":" + (minutes + "").lpad("0", 2);
//             var date = new Date("2014/01/01 " + timeStr + ":00");
//             var hhmm = date.toLocaleTimeString(navigator.language, {hour: \'2-digit\', minute:\'2-digit\'});
//             return hhmm;
            return timeStr;
        }
        tjq("#flight-times").slider({
            range: true,
            min: '.intval($this->filters['time-min']).',
            max: '.intval($this->filters['time-max']).',
            step: 5,
            values: [ '.intval($this->prefs['time-min']).', '.intval($this->prefs['time-max']).' ],
            slide: function( event, ui ) {
                if(filterId)window.clearTimeout(filterId);
                timeMax = ui.values[1];
                timeMin = ui.values[0];
                filterId = window.setTimeout(function(){doFilter({filter:{"time-max":timeMax,"time-min":timeMin}})}, 500);
                tjq(".start-time-label").html( convertTimeToHHMM(ui.values[0]) );
                tjq(".end-time-label").html( convertTimeToHHMM(ui.values[1]) );
            }
        });
        tjq(".start-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 0 )) );
        tjq(".end-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 1 )) );
        tjq( ".autocomplete" ).autocomplete({
            source: "/ajax/get-city",
            minLength: 2
        });
        tjq(".filter-toggle").click(function(evnt){
            filter = {}
            filter[tjq(this).data("key")]=tjq(this).data("id");
            doFilter({toggle:filter});
        })
        tjq(".sort-by-container").click(function(){
           tjq(this).parent().toggleClass("active");
           doFilter({toggle:{sort:tjq(this).data("sort")}});
        });
        tjq(".filter-view").click(function(){
           tjq(".swap-tiles > li").removeClass("active");
           tjq(this).parent().addClass("active");
           doFilter({filter:{view:tjq(this).data("id")}});
        });
    });');?>
