<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('home.css')
</head>
<body>

@include('home.navbar')
<!-- END nav -->

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/image_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Read our blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
               <h1 class="h1">{{ $post->title }}</h1>
                <p>{{ $post->details }}</p>



                <div class="pt-5 mt-5">
                    <h1 class="h2">Leave A Comment</h1>
                    <form action="{{ url('add_comment', $post->id) }}" method="post">
                        @csrf
                        <textarea name="comment" placeholder="join the conversation..." style="height: 150px; width: 700px; padding: 5px; border: 1px solid #33a6ec; border-radius: 5px"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary mt-2" value="Comment">
                    </form>

                    <div>
                        <h2 class="h2">All Comments</h2>
                        @foreach($comment as $comment)
                            @if($post->id==$comment->post_id)
                        <div>
                            <b style="color: black">{{ $comment->name }}</b>
                            <p>{{ $comment->comment }}</p>
                            <a href="javascript:void(0);" onclick="reply(this)"  data-CommentId="{{ $comment->id }}" style="color: #0a58ca" class="btn btn-primary">Reply</a>
                        </div>
                            @endif

                                @foreach($reply as $rep)
                                    @if($post->id==$comment->post_id)
                                        @if($rep->comment_id==$comment->id)
                                            <div style="padding-left: 3%; padding-bottom: 10px; padding-top: 10px">
                                                <b style="color: black">{{ $rep->name }}</b>
                                                <p style="color: grey">Replying to: {{ $comment->name }}</p>
                                                <p>{{ $rep->reply }}</p>
                                                <a href="javascript:void(0);" onclick="reply(this)" data-CommentId="{{ $comment->id }}" style="color: #0a58ca">Reply</a>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach

                        @endforeach
                    </div>


                    <div style="display: none" class="replyDiv">
                        <form action="{{ url('reply_comment') }}" method="post">
                            @csrf
                        <input type="text" name="commentId" id="commentId" hidden="">
                        <textarea name="reply" style="height: 100px; width: 500px; border: 1px solid #33a6ec; border-radius: 5px" placeholder="join the conversation"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Reply">

                        <a href="javascript:void(0);" class="btn btn-warning" onclick="reply_close(this)">Close</a>
                        </form>
                    </div>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate">

                <div class="sidebar-box ftco-animate">
                    <h3>Recent Blog</h3>
                    @foreach($posts as $post)
                        @if($post->tag == 'Published')
                    <div class="block-21 mb-4 d-flex">
                        <img src="/media/{{ $post->image }}" height="100" width="100">
                        <div class="text ml-2">
                            <h3 class="heading"><a href="{{url('blog_details', $post->id)}}">{{ Str::limit($post->title, 40) }}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span>{{ $post->created_at }}</a></div>
                                <div><a href="#"><span class="icon-person"></span> {{ $post->author }}</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section> <!-- .section -->

@include('home.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script type="text/javascript">
    function reply(caller)
    {
        document.getElementById('commentId').value = $(caller).attr('data-CommentId');

        $('.replyDiv').insertAfter($(caller));

        $('.replyDiv').show();
    }

    function reply_close(caller)
    {
        $('.replyDiv').hide();
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

@include('home.js')


</body>
</html>