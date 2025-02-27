<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Single Post View -->
    <div class="container">
        <h1>{{$post->title}}</h1>
        <img src="{{asset('uploads/post/'.$post->image)}}" class="post-image" alt="Post Image" loading="lazy">
        <p class="post-content">{{$post->content}}</p>
        <p class="post-date"><strong>Posted on:</strong> {{ $post->created_at->format('M d, Y') }}</p>
        <a href="{{route('admin.dashboard')}}" class="btn btn-secondary">Back to dashboard</a>
    </div>
</body>
</html>