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
                            class="text-danger">title=example</span></span> -> Get
                    post where <span class="text-danger">'title' <span class="text-success">LIKE</span> 'example'</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">content=example</span></span> -> Get
                    post where <span class="text-danger">'content' <span
                            class="text-success">LIKE</span> 'example'</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">owner_id=1</span></span> -> Get
                    post where <span class="text-danger">'owner' <span
                            class="text-success">have</span> 'id' = 1</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?<span
                            class="text-danger">category=example</span></span> -> Get
                    post where <span class="text-danger">'category' <span
                            class="text-success">have</span> 'name' </span><span
                        class="text-success">LIKE </span><span
                        class="text-danger">'example'</span> ;
                </li>
            </ul>
        </li>
    </ul>
    <h2>Categories:</h2>
    <ul class="fs-3">
        <li>
            GET
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/categories</span> -> Get ALL
                    categories
                    (order by desc <span class="text-danger">'id'</span>);
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/categories?<span
                            class="text-danger">name=example</span></span> -> Get
                    category where <span class="text-danger">'name' <span
                            class="text-success">LIKE</span> 'example'</span>;
                </li>
            </ul>
        </li>
    </ul>
    <h2>Comments:</h2>
    <ul class="fs-3">
        <li>
            GET
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/comments</span> -> Get ALL
                    comments
                    (order by desc <span class="text-danger">'id'</span>);
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/comments?<span
                            class="text-danger">content=example</span></span> -> Get
                    comment where <span class="text-danger">'content' <span
                            class="text-success">LIKE</span> 'example'</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/comments?<span
                            class="text-danger">owner_id=1</span></span> -> Get
                    comment where <span class="text-danger">'owner' <span
                            class="text-success">have</span> 'id' = 1</span>;
                </li>
                <li><span class="text-primary">Route:</span> <span class="text-success">/comments?<span
                            class="text-danger">post_id=1</span></span> -> Get
                    comment where <span class="text-danger">'post' <span
                            class="text-success">have</span> 'id' = 1</span>;
                </li>
            </ul>
        </li>
    </ul>
    <h2>User:</h2>
    <ul class="fs-3">
        <li>
            POST
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/register</span>:
                    <ul>
                        <li><span class="text-danger">name:</span><span
                                class="text-success"> Nullable, String, Max:255</span></li>
                        <li><span class="text-danger">email:</span><span class="text-success"> Required, Email, Min:3, Max:255</span>
                        </li>
                        <li><span class="text-danger">password:</span><span class="text-success"> Required, String, Confirmed, Min:8</span>
                        </li>
                        <li><span class="text-danger">password_confirmation:</span><span
                                class="text-success"> Required</span></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            POST
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/login</span>:
                    <ul>
                        <li><span class="text-danger">email:</span><span class="text-success"> Required, Email, Exists:users</span>
                        </li>
                        <li><span class="text-danger">password:</span><span class="text-success"> Required, String, Min:8</span>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <hr>
    <h2>General sorting rules:</h2>
    <ul class="fs-3">
        <li>
            Sorting by <span class="text-danger">'id'</span>
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?</span><span
                        class="text-danger">order_by=id</span> -> Get ALL posts
                    (order by desc <span class="text-danger">'id'</span>);
                </li>
            </ul>
        </li>
        <li>
            Sorting by <span class="text-danger">'date'</span>
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts?</span><span
                        class="text-danger">order_by=date</span> -> Get ALL posts
                    (order by desc <span class="text-danger">'date'</span>);
                </li>
            </ul>
        </li>
        <li>
            Selection by <span class="text-danger">'id'</span>
            <ul>
                <li><span class="text-primary">Route:</span> <span class="text-success">/posts/<span
                            class="text-danger">1</span></span> -> Get
                    post where <span class="text-danger">'id' = 1</span>;
                </li>
            </ul>
        </li>
    </ul>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
