<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Instruction</title>
</head>
<body>
<div class="container">
    <h1 class="text-center text-primary m-3">Instruction for posts API</h1>
    <hr>
    <h2>Posts:</h2>
    <ul class="fs-3">
        <li>
            GET
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts</span> -> Get ALL posts
                    (order by desc <span class="text-danger">'id'</span>);
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">id=1</span></span> -> Get
                    post where <span class="text-danger">'id' = 1</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">title=example</span></span> -> Get
                    post where <span class="text-danger">'title' <span class="text-success">like</span> 'example'</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">content=example</span></span> -> Get
                    post where <span class="text-danger">'content' <span
                            class="text-success">like</span> 'example'</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">order_by=id</span></span> -> Get ALL posts
                    order by desc <span class="text-danger">'id'</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">order_by=date</span></span> -> Get ALL posts
                    order by desc <span class="text-danger">'date'</span>;
                </li>
                <hr>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?</span>&<span
                        class="text-danger">title=Title Example</span>&<span
                        class="text-danger">content=Content Example</span>&<span
                        class="text-danger">order_by=date</span> -> Get
                    post where <span class="text-danger">'title' <span class="text-success">like</span> 'Title Example'</span>
                    and <span class="text-danger">'content' <span
                            class="text-success">like</span> 'Content Example'</span> order by desc <span
                        class="text-danger">'date'</span>;
                </li>
                <hr>
            </ul>
        </li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
