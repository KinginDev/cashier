<article class="post-card card card-hover">
	{{-- Image --}}
	<a href="/{{$post->slug}}" class="img-container" style="background-image:url({{$post->images}}) ">
		
	</a>
	{{-- Content --}}
<div class="card-content">
	{{-- Title --}}
	<h2><a href="/{{$post->slug}}">{{$post->title}}</a></h2>
		{{-- Byeline --}}
	<div class="byeline">{{$post->author->name}}</div>
		{{-- excert --}}
		<p>{{$post->getExcerpt()}}</p>

		{{-- Free or Premium? --}}
		<span class="price {{$post->premium ? 'price-premium' : 'price-free' }}">
							{{ $post->premium ? 'Premium': 'Free'}}
		</span>
</div>
		
</article>	