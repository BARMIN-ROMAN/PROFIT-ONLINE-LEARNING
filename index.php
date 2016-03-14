<?php get_header();?>
        <div class="middle container">
           <div class="col-md-8">
           
           
          <?php if (have_posts()) { ?>
          <?php while (have_posts()) { the_post(); ?> 
           
            <div class="news block">
               <div class="posts-img"> <div class="bg">
                   <a href="<?php the_permalink(); ?>"> <div class="bg_a"></div></a>
                   <ul class="post-meta">
	<li><i class="glyphicon glyphicon-time"></i> <?php the_time('M'); echo' '; the_time('j');?> </li>
	<li><i class="glyphicon glyphicon-pencil"></i> <a href="blog/" rel="category tag">Блог</a>, <a href="blog/internet/" rel="category tag">Интернет</a></li>
	<li><i class="glyphicon glyphicon-comment"></i> <a href="<?php the_permalink(); ?>/#respond" title="Комментарии на <?php the_title(); ?>"><?php comments_popup_link('Нет коммент.','1  коммент.','%  коммент.');?></a></li>
	<li><i class="glyphicon glyphicon-eye-open"></i> 1081 просмотр.</li></ul>
                   
         
                   
               </div><img src="/wp-content/themes/GamerTheme/img/p1.jpg" alt=""></div>
               <div class="p-info">
                <div class="p_tittle"><a href="<?php the_permalink(); ?>"><?php the_title();  ?> </a></div>
                <hr>
                <div class="p_disc"><?php the_excerpt();  ?></div>
                <hr>
                <a href="<?php the_permalink(); ?>" class="post_but">ЧИТАТЬ ДАЛЬШЕ</a>
                <div class="post-love-share">
		
		<div class="post-love">
			<a href="#" class="post-love-link loved" id="zoomarts-love-744" title="Вам уже нравится эта запись!"><span class="love-count">41</span> <i class="glyphicon glyphicon-heart"></i></a>		</div>
		
				
		
				
	</div>
               <div style="clear:both;"></div>
                </div>
            </div>
            
            			<?php } ?>
<? wp_pagenavi();?>
<?php } else { ?>
<h2>Ничего не найдено</h2>
<?php } ?> 
            
           </div>    
<?php get_sidebar();?>
        </div>
        
<?php get_footer();?>
