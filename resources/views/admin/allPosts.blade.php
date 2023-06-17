<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    @include('admin.css')

    <style type="text/css">
        .ck-editor__editable_inline
        {
            height: 400px;
        }
    </style>

</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                        <button type="button" class="close" style="float: right; border: none" data-dismiss="alert" aria-hidden="true">X</button>
                    </div>
                @endif

                <h1 class="text-center">All Posts</h1>

                <table class="table-responsive table-bordered table-sm">
                    <tr class="bg-info">
                        <th class="text-dark">Title</th>
                        <th class="text-dark">Details</th>
                        <th class="text-dark">Author</th>
                        <th class="text-dark">Tag</th>
                        <th class="text-dark">image</th>
                        <th class="text-dark">Created at</th>
                        <th class="text-dark">Actions</th>
                    </tr>

                    @foreach($post as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->details }}</td>
                            <td>{{ $post->author }}</td>
                            <td>{{ $post->tag }}</td>
                            <td>
                                <img src="/media/{{ $post->image }}" height="50" width="50">
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ url('update_post',$post->id) }}" class="btn btn-primary mb-2">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this post?')" href="{{ url('delete_post',$post->id) }}" class="btn btn-danger">Delete</a>
                                @if($post->tag == 'unpublished')
                                <a onclick="return confirm('Are you sure you want to publish this post?')" href="{{url('publish_post', $post->id) }}" class="btn btn-info mt-2">Publish</a>
                                @else
                                    <a onclick="return confirm('Are you sure you want to unpublish this post?')" href="{{url('unpublish_post', $post->id) }}" class="btn btn-info mt-2">Unpublish</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('admin.js')

</body>

</html>


