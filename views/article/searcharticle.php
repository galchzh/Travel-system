<?php
use app\models\Usermodel;
?>
<div class="top-brands">
    <div class="">
        <h3>Search result for: <?php echo $term?></h3>
        <?php if($articles):?>
        <div class="agile_top_brands_grids row">
            <?php foreach($articles as $article):?>
                <?php $user = Usermodel::find()
                ->where(['>=', 'id', $article['posted_by']])
            ->all();
                 ?>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="<?php echo Yii::$app->homeUrl?>article/view?id=<?php echo base64_encode($article['id'])?>"></a>        
                                        <p><?php echo $article['title'];?></p>
                                        <h4>
                                            <div class="postby">
                                                <span><span class="fa fa-user"></span> <?php echo $user[0]['first_name'].' '.$user[0]['last_name']?></span>
                                            </div>
                                        </h4>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        
                                    <a href="<?php echo Yii::$app->homeUrl?>article/view?id=<?php echo base64_encode($article['id'])?>" class="view-more">View</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <div class="clearfix"> </div>
        </div>
        <?php else:?>
        <p>No article found...</p>
    <?php endif;?>
    </div>
</div>