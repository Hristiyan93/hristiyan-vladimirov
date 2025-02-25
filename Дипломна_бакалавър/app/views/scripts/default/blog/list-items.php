<div class="col-sm-6 col-md-3">
    <h2><?php echo $this->translate('Discover')?></h2>
    <ul class="travel-news">
    	<?php
    	$count = $this->items?$this->items->count()/2:0;
    	for($i=0;$i<$count;$i++):$item = $this->items[$i];?>
        <li>
            <div class="thumb">
                <a href="/blog/view/item/<?php echo $item->id?>">
                    <img src="<?php echo $item->hasImage(Models_Wrapper_Post::IMAGE_TYPE_THUMB)?$item->getImageUrl(Models_Wrapper_Post::IMAGE_TYPE_THUMB):'http://placehold.it/63x63'?>" alt="" width="63" height="63" />
                </a>
            </div>
            <div class="description">
                <h5 class="s-title"><a href="/blog/view/item/<?php echo $item->id?>"><?php echo $item->title?></a></h5>
                <p>Purus ac congue arcu cursus ut vitae pulvinar massaidp.</p>
                <span class="date"><?php echo date('d M, Y', strtotime($item->date))?></span>
            </div>
        </li>
        <?php endfor;?>
    </ul>
</div>
<div class="col-sm-6 col-md-3">
    <h2><?php echo $this->translate('Travel News')?></h2>
    <ul class="travel-news">
    	<?php for($i=$count;$i<$count * 2;$i++):$item=$this->items[$i];?>
        <li>
            <div class="thumb">
                <a href="/blog/view/item/<?php echo $item->id?>">
                    <img src="<?php echo $item->hasImage(Models_Wrapper_Post::IMAGE_TYPE_THUMB)?$item->getImageUrl(Models_Wrapper_Post::IMAGE_TYPE_THUMB):'http://placehold.it/63x63'?>" alt="" width="63" height="63" />
                </a>
            </div>
            <div class="description">
                <h5 class="s-title"><a href="/blog/view/item/<?php echo $item->id?>"><?php echo $item->title?></a></h5>
                <p>Purus ac congue arcu cursus ut vitae pulvinar massaidp.</p>
                <span class="date"><?php echo date('d M, Y', strtotime($item->date))?></span>
            </div>
        </li>
        <?php endfor;?>
    </ul>
</div>
