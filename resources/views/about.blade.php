 @extends('layouts.page')

 @section('title', 'EBook | Про сайт')

 @section('content')
 <!-- Content -->
 <div class="col-md-9">
 	<div class="panel panel-default">
 		<div class="panel-body">
 			<a class="logo-brand" href="{{ url('/') }}" style="font-size: 36px;"><span class="glyphicon glyphicon-book"></span> EBook</a>
 			<p style="font-size: 14px;">EBook - це бібліотека ....................!!!!!!!!!!!!11</p>
 		</div>
 	</div>

 	<!-- Comment -->
 	<div class="panel panel-default">
 		<div class="panel-body">
 			<!-- Disqus -->
 			<div id="disqus_thread"></div>
 			<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://ebook-3.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<!-- /Disqus -->

</div>
</div>
<!-- /Comment -->
</div>
<!-- /Content -->
@endsection