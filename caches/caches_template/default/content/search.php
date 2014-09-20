<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<style>
<!--
.linkage-menu{height:200px; overflow-y:auto; padding:0 4px}
.linkage-menu h6{ border-bottom:1px solid #e2ecee; padding:2px 0 3px; margin-bottom:5px}
.linkage-menu h6 a.rt{ font-weight:normal; font-family:'宋体';color:#377abe}
.linkage-menu div.menu a{width:74px; line-height:22px;text-decoration: none; padding-left:4px; overflow:hidden; height:22px}
.linkage-menu div.menu a:hover{ background:#d9e4ed; color:#377abe}
div#areaid{border:1px solid #A7A6AA;height:18px;margin:0 5px 0 0;padding:2px 5px 2px;border: 1px solid #d0d0d0;}
-->
</style>
<!--main-->
<div class="main cat-search">
        
        <div class="col-auto">
        <div class="crumbs"><a href="<?php echo APP_PATH;?>">首页</a><span> > </span><?php echo catpos($catid);?>搜索</div>
        <form name="myform" method="get" action="">
        <ul class="search-form">
<?php $n=1; if(is_array($forminfos)) foreach($forminfos AS $field => $info) { ?>
<?php if($info[formtype]=='box') { ?><li class="bk"></li><?php } ?>
<li><label><?php echo $info['name'];?></label><?php echo $info['form'];?><?php if($info[formtype]=='datetime') { ?>之后<?php } ?></li>
<?php if($info[formtype]=='box') { ?><li class="bk"></li><?php } ?>
<?php $n++;}unset($n); ?>

<li><label>排序方式</label><select name="orderby" id="orderby"  size="1">
<option value="a.id DESC" >发布时间 降序</option>
<option value="a.id ASC" >发布时间 升序</option>
</select></li>
<li><div class="btn"><input type="submit" value="搜索" /></div></li>
  <input type="hidden" name="m" value="content"> 
  <input type="hidden" name="c" value="search"> 
  <input type="hidden" name="a" value="init"> 
  <input type="hidden" name="catid" value="<?php echo $catid;?>"> 
  <input type="hidden" name="dosubmit" value="1">

        </ul></form>
        <div class="search-point">共找到符合条件的结果 <strong class="red"><?php echo $total;?></strong> 条</div>
          <ul class="search-list">
			<?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
           	<li style="margin:0">
                <?php if($r[thumb]) { ?><a href="<?php echo $r['url'];?>" target="_blank"><img height="60" width="60" src="<?php echo $r['thumb'];?>"></a><?php } ?>
                <h5><a href="<?php echo $r['url'];?>" target="_blank" class="blue fn"><?php echo $r['title'];?></a> - <a href="<?php if(strpos($CATEGORYS[$r[catid]][url],'http://')===false) { ?><?php echo $siteurl;?><?php echo $CATEGORYS[$r['catid']]['url'];?><?php } else { ?><?php echo $CATEGORYS[$r['catid']]['url'];?><?php } ?>" class="blue f12 fn"><?php echo $CATEGORYS[$r['catid']]['catname'];?></a> - <span class="green f12 fn">发布时间：<?php echo date('Y-m-d H:i',$r[updatetime]);?></span></h5>
                <p><?php echo $r['description'];?></p>
			</li>
			<?php $n++;}unset($n); ?>
        </ul>
        <div id="pages" class="text-c"><?php echo $pages;?></div>
  </div>
</div>
<?php include template("content","footer"); ?>