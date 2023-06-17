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

                <h1 class="text-center">Add post</h1>

                <form action="{{ url('create_post') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label>Post title</label>
                        <input class="form-control text-dark" type="text"  placeholder="Post Title..." name="title"  required>
                    </div>

                    <div class="mb-3">
                        <label>Post Details</label>
                        <textarea class="form-control text-dark" id="#" rows="20" cols="30"  placeholder="Post Details..." name="details"  required></textarea>
                    </div>


                    <div class="mb-3">
                        <label>Post Author</label>
                        <input class="form-control text-dark" type="text" placeholder="Post Author..." name="author" required>
                    </div>

                    <div class="mb-3">
                        <label>Post Tag</label>
                        <input class="form-control text-dark" type="text" placeholder="Post Tag..." name="tag" required>
                    </div>

                    <div class="mb-3">
                        <label>Post Image: </label>
                        <input type="file" name="image" required>
                    </div>


                    <button type="submit" class="btn btn-primary mb-3 btn-lg btn-block text-dark">Add Post</button>



                </form>
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

<!-- Ckeditor -->


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),
            {
                ckfinder:
                    {
                        uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
                    }
            }
        )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>

</html>


