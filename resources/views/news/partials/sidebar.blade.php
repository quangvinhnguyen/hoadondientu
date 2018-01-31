<aside id="sidebar" class="four column pull-right">
	<ul class="no-bullet">
		<li class="widget tabs-widget clearfix">
    		<ul class="tab-links no-bullet clearfix">
    			<li class="active"><a href="#popular-tab">Nổi Bật</a></li>
    			<li><a href="#recent-tab">Gần Đây</a></li>
    			<li><a href="#view-tab">Top View</a></li>
    		</ul>

    		<div id="popular-tab" class="shine">
    			<ul>
    				<?php $post_hot = $posts->where('hot',1)->take(4); ?>
    				@foreach($post_hot as $post)
    				<li class="shine-o">
    					@if($post->feture)
							<?php $image = $post->feture; ?>
						@else 
							<?php $image = 'http://placehold.it/60x60'; ?>
						@endif
    					<a href="post/{{ $post->slug }}.html"><img alt="" src="{{$image}}"></a>
    					<h3><a href="post/{{ $post->slug }}.html">{{ $post->title }}</a></h3>
    					<div class="post-date">{{date('G:i d-m-Y', strtotime($post->created_at)) }}</div>
    				</li>
    				@endforeach
    			</ul>
    		</div>

    		<div id="recent-tab" class="shine">
    			<ul>
    				<?php $post_recent = $posts->where('post_type','text')->take(4); ?>
    				@foreach($post_recent as $post)
    				<li class="shine-o">
    					@if($post->feture) 
							<?php $image = $post->feture ?>
						@else 
							<?php $image = 'http://placehold.it/60x60'; ?>
						@endif
    					<a href="post/{{ $post->slug }}.html"><img alt="" src="{{$image}}"></a>
    					<h3><a href="post/{{ $post->slug }}.html">{{ $post->title }}</a></h3>
    					<div class="post-date">{{date('G:i d-m-Y', strtotime($post->created_at)) }}</div>
    				</li>
    				@endforeach
    			</ul>
    		</div>

   			<div id="view-tab" class="shine">
   				<ul>
   					<?php $post_recent = $posts->sortByDesc('view')->take(4); ?>
    				@foreach($post_recent as $post)
    				<li class="shine-o">
    					@if($post->feture) 
							<?php $image = $post->feture; ?>
						@else 
							<?php $image = 'http://placehold.it/60x60'; ?>
						@endif
    					<a href="post/{{ $post->slug }}.html"><img alt="" src="{{$image}}"></a>
    					<h3><a href="post/{{ $post->slug }}.html">{{ $post->title }}</a></h3>
    					<div class="post-view">{{$post->view}} views</div>
    				</li>
    				@endforeach
    			</ul>
    		</div>
		</li>
		<li class="widget subscribe-widget clearfix">
			<!-- <form>
				<input type="text" data-value="Enter your email address" value="Enter your email address">
				<input type="submit" value="Submit">
			</form> -->
			<form action="{{route('search')}}" method="get">
			<input name="key" type="text" data-value="search" value="">
			<input type="submit" value="Tìm kiếm">
		</form>
		</li>
		<li class="widget widget_ads_big clearfix">
			<div class="clearfix">
				<a href=""><img alt="" src="images/tongdai.png"></a>
			</div>
		</li>
		<li class="widget widget_facebook_box clearfix">
			<h3 class="widget-title">Fanpage Facebook </h3>
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Hóa-đơn-điện-tử-Visnam-323344591505075	&amp;width=285&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=300" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
		</li>
		<li class="widget widget_tag_cloud clearfix">
			<h3 class="widget-title">Tags</h3>
			<div class="tagcloud">
				@foreach($tags as $tag)
					<a href="tag/{{ $tag->slug }}" title="3 topics" style="font-size: 22pt;">{{ $tag->name }}</a>
				@endforeach
			</div>
		</li>
	</ul>
</aside>