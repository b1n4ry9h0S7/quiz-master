<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>clr</title>
    <link rel="stylesheet" href="includes/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1>Hello World</h1>
</div>
</body>
</html>

<style>
/* @import url('https://fonts.googleapis.com/css?family=Raleway'); */
    body {
        margin: 0;
        padding: 0;
        font-family: "Times New Roman", Times, serif;

    }

    .container {
        width: 100%;
        padding: 10px;
        margin: 10%;
        background: linear-gradient(to right,#232526, #414345);
        padding-left: 10px;
        border-radius: 10px;
    }
    h1 {
        margin: 0;
        padding: 0;
        text-align: center;
        color: transparent;
        text-transform: uppercase;
        background-image: linear-gradient(to right,#f00,#ff0,#0ff,#0f0,#00f);
        -webkit-background-clip: text;
        /* -webkit-background-clip:text; */
        animation: animate 15s linear infinite;
        background-size: 1000%;
    }
    @keyframes animate
    {
        0%
        {
            background-position: 0% 100%;
        }
        50%
        {
            background-position: 100% 0%;
        }
        100%
        {
            background-position: 0% 100%;
        }
    }
</style>