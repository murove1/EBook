   @extends('layouts.page')

   @section('title', 'Книга | '.$book->title.' ')

   @section('content')
   <!-- Content -->
   <div class="col-md-9">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3">
            <div class="book-box">
             <img class="img-thumbnail" src="/upload/books/img/{{ $book->book_img }}" alt="{{ $book->title }}">
             <div class="col-md-12">
               <a href="/upload/books/file/{{ $book->book_file }}"><button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Читати</button></a>
               
               <button id="{{ $book->id }}" onclick="like(this.id)" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>
             </div>
           </div>
         </div>
         <div class="col-md-9">
           <div class="book-caption">
             <h4> {{ $book->title }} </h4>
             <div class="book-ratings">
              <p class="pull-right"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{ $book->views }}</p>
              <p class="pull-right"> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <span id="likecount"> {{ $book->likes->count() }}</span></p> 
            </div>
            <p><strong>Жанр:</strong> {{ $book->category->name }} </p>
            <p><strong>Автор:</strong> {{ $book->author }} </p>
            <p><strong>Сторінок:</strong> {{ $book->page }}.ст </p>
            <p><strong>Рік видання:</strong> {{ $book->year }} </p>
            <p>{{ $book->body }} </p>
          </div>
          <div id="share">
            <div class="like">Сподобалась книга? Поділись з друзями!</div>
            <div class="social" data-url="{{ url()->current() }}" data-title="{{ $book->title }}">
              <a class="push facebook" data-id="fb"><i class="fa fa-facebook"></i> Facebook</a>
              <a class="push twitter" data-id="tw"><i class="fa fa-twitter"></i> Twitter</a>
              <a class="push vkontakte" data-id="vk"><i class="fa fa-vk"></i> Вконтакте</a>
              <a class="push google" data-id="gp"><i class="fa fa-google-plus"></i> Google+</a>
              <a class="push ok" data-id="ok"><i class="fa fa-odnoklassniki"></i> OK</a>
            </div>
          </div>
        </div>
      </div>
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
<script>
  function like(value){
    $.get('/like/' + value, function(data){
     $.get('/likecount/' + value, function onAjaxSuccess(data) {$("#likecount").html(data)});
   });

  };
</script>
@endsection