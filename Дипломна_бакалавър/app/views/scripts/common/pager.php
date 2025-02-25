<!-- PAGINATOR -->
<?php
    if($this->totalItemCount>0){
        $resultHtml = "Резултати {$this->firstItemNumber} - {$this->lastItemNumber} от {$this->totalItemCount}";
    }
    else{
        $resultHtml = 'Няма намерени резултати';
    }
?>
<form method="post" action="/">
<div class="pager">
    <?php if (isset($this->previous)): ?>
        <a href="<?php echo $this->url(array('page' => $this->first)); ?>">Първа</a>
    <?php else:?>
        <span>Първа</span>
    <?php endif?>
    <?php if (isset($this->previous)): ?>
        <a href="<?php echo $this->url(array('page' => $this->previous)); ?>" class="pagerLink">Предходна</a>
    <?php else: ?>
        <span>Предходна</span>
    <?php endif; ?>

    <?=$this->formText('page', $this->current, array('size' => 1))?>

    <?php if (isset($this->next)): ?>
        <a href="<?php echo $this->url(array('page' => $this->next)); ?>" class="pagerLink">Следваща</a>
    <?php else: ?>
        <span>Следваща</span>
    <?php endif; ?>

    <?php if (isset($this->next)): ?>
        <a href="<?php echo $this->url(array('page' => $this->last)); ?>" class="pagerLink">Последна</a>
    <?php else: ?>
        <span>Последна</span>
    <?php endif; ?>
</div>

<p class="pager-results"><?=$resultHtml?></p>
</form>