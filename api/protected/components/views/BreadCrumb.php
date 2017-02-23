<div id="breadCrumb">
    <?php
	$lastCrumb = array_pop($this->crumbs);
    $i=0;
    echo CHtml::link("Inicio", Yii::app()->baseUrl,array('style'=>'border-radius:5px; padding:2px 5px; color:#fff; background-color:#f49401;'));
    echo $this->delimiter;
    foreach($this->crumbs as $crumb) {
        $i++;
        if(isset($crumb['url'])) {        	
        	if(($i)==count($this->crumbs )){
        		//$crumb["url"][0]=str_replace("/demos/demoNuevo/index.php?r=","",$crumb["url"][0]);
        		$crumb["url"][0]="/".str_replace(Yii::app()->baseUrl."/index.php?r=","",$crumb["url"][0]);
        		echo CHtml::link("Regresar", $crumb['url'],array('style'=>'border:1px solid #bcbcbc; border-radius:5px; padding:2px 5px; color:#6e6e6e'));
        	}            
        } else {
           // echo $crumb['name'];
        }

        //echo $this->delimiter;

    }
    //echo $lastCrumb['name'];
    ?>
</div>