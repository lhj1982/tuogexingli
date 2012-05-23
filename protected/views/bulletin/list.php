<?php
$this->breadcrumbs=array(
	'Bulletin'=>array('/bulletin'),
	'List',
);
print_r(SessionUtil::getProperty(SessionUtil::USER));
?>

<div style="width:910px;float:left;clear:both;">
<div class="dashline"></div>
<ul class="items">
<?php
foreach ($model as $advertisement) {
	?>

	<li>
	<?php if($advertisement['status'] == "closed"){?>
		<div class="closedMark"></div>
	<?php }?>
		<div class="itemTime"><?php echo DateUtils::postDate($advertisement['created']);?></div>
		<div class="itemType">
		<div class="<?php if($advertisement['type'] == "lease") echo "itemKeTuo"; else echo "itemQiuTuo";?>"></div>
		</div>		
		<a class="itemLink" href="#">
		<div class="itemTitle">
			<h3 class="fromCity">
			<?php echo Advertisement::model()->findById($advertisement['id'])->fromCity['name_cn'];?> </h3>
			<div class=fromTime><?php if($advertisement['type'] == "lease"){  
			echo DateUtils::postDate($advertisement['departure_time']);}  ?></div>
			<div class="weight"><?php echo $advertisement['weight']?></div>
			<div class="fly"></div>
			<h3 class="toCity">
			<?php echo Advertisement::model()->findById($advertisement['id'])->toCity['name_cn']; ?>
			</h3>
			<div class=toTime><?php 
			if($advertisement['type'] == "lease"){  
			echo DateUtils::postDate($advertisement['arrival_time']);} 
			else {echo "<strong>最迟 </strong> ".DateUtils::postDate($advertisement['arrival_time']);}?></div>
		</div>
		</a>
		
		<a href="#">
		<?php 
		echo empty($advertisement['small_image']) ? $advertisement['username'] : "<img src=\"".$advertisement['small_image']."\" border=\"0\"/>"; 
		?>
		</a>
		
	</li>
	<div class="dotline"></div>
	<?php
	}
?>
</ul>
<div class="dashline"></div>
</div>
