<!DOCTYPE html>
<html lang="en">
<head>  
    <title>My Laravel App v2</title>
</head>
<body>
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            @foreach ($links as $link)
                <a href="{{ $link->url }}">{{ $link->title }}</a>
            @endforeach
        </div>
    </div>
</body>
</html>