<?php get_header();?>
        <div class="middle container">
           <div class="col-md-8">
           
           <?php if (have_posts()) { ?>
          <?php while (have_posts()) { the_post(); ?> 
           
            <div class="news block">
               <div class="posts-img"> <div class="bg">
                   <a href="<?php the_permalink(); ?>"> <div class="bg_a"></div></a>
                   <ul class="post-meta">
	<li><i class="glyphicon glyphicon-time"></i> Февраль 22, 2015</li>
	<li><i class="glyphicon glyphicon-pencil"></i> <a href="blog/" rel="category tag">Блог</a>, <a href="blog/internet/" rel="category tag">Интернет</a></li>
	<li><i class="glyphicon glyphicon-comment"></i> <a href="<?php the_permalink(); ?>/#respond" title="Комментарии на Название статьи" id="countvk"><?php comments_popup_link('Нет коммент.','1  коммент.','%  коммент.');?>
	
	
	</a></li>
	<li><i class="glyphicon glyphicon-eye-open"></i> 1081 просмотр.</li></ul>
                   
               </div><img src="/wp-content/themes/GamerTheme/img/p1.jpg" alt=""></div>
               <div class="p-info">
                <div class="p_tittle"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></div>
                <hr>
                <div class="p_text"><?php the_content(); ?></div>
                <hr>
                <div class="post_sim">
                 <p>Прочти, тебе понравится:</p>  
                    <div class="col-md-6 posts_sm"><div class="menu-l-list-img"><img src="img/p1.jpg" alt=""></div> <div class="menu-l-list-info"> <div class="menu-l-list-tittle"><a href="">НАЗВАНИЕ СТАТЬИ</a></div><div class="menu-l-list-desc">0 коммент. | 1738 просмотр.</div></div> <div style="clear:both;"></div></div>
         <div class="col-md-6  posts_sm"><div class="menu-l-list-img"><img src="img/p1.jpg" alt=""></div> <div class="menu-l-list-info"> <div class="menu-l-list-tittle"><a href="">НАЗВАНИЕ СТАТЬИ</a></div><div class="menu-l-list-desc">0 коммент. | 1738 просмотр.</div></div> <div style="clear:both;"></div></div>
                   <div class="col-md-6  posts_sm"><div class="menu-l-list-img"><img src="img/p1.jpg" alt=""></div> <div class="menu-l-list-info"> <div class="menu-l-list-tittle"><a href="">НАЗВАНИЕ СТАТЬИ</a></div><div class="menu-l-list-desc">0 коммент. | 1738 просмотр.</div></div> <div style="clear:both;"></div></div>
                       <div class="col-md-6  posts_sm"><div class="menu-l-list-img"><img src="img/p1.jpg" alt=""></div> <div class="menu-l-list-info"> <div class="menu-l-list-tittle"><a href="">НАЗВАНИЕ СТАТЬИ</a></div><div class="menu-l-list-desc">0 коммент. | 1738 просмотр.</div></div> <div style="clear:both;"></div></div>
               <div style="clear:both;"></div>
                </div>
                
                <hr>
                <a href="post.html" class="post_but">Добавить в закладки</a>
                <div class="post-love-share">
		
		<div class="post-repost">
			<a  class="post-repost-link repost" id="zoomarts-repost-744" title="Вам уже нравится эта запись!"><span class="repost-count">41</span> <i class="glyphicon glyphicon-bullhorn"></i></a>		</div>
		<div class="post-love">
			<a href="#" class="post-love-link loved" id="zoomarts-love-744" title="Вам уже нравится эта запись!"><span class="love-count">41</span> <i class="glyphicon glyphicon-heart"></i></a>		</div>
		<script>
            VK.Api.call('widgets.getComments', 
	     {widget_api_id: "4405180", url: "<?php the_permalink(); ?>"}, 
	function(obj) {
		 document.write("<?php $counter="+obj.response.count+" ?>");
});
     </script>
				
		
				
	</div>
               <div style="clear:both;"></div>
               <hr>

                <?php } ?>
               <div id="vk_comments"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 20, attach: "*"});
</script>

                </div>
<?php } else { ?>
<h2>Ничего не найдено</h2>
<?php } ?> 
            </div>
           </div>    
    
       <?php $id=the_ID(); mysql_query("UPDATE wp_posts SET opis='$opis' WHERE id='$id'",$connection);?>
             <?php get_sidebar();?> 
        </div>
          <?php get_footer();?>