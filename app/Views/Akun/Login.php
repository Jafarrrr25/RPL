<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .container p {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .container label {
            flex: 0 0 100px;
            /* Adjust the width as needed */
            margin-right: 1px;
            /* Adjust the spacing between label and input */
        }
    </style>
</body>
<article>
    <div class="container mt-2">
        <h1>Login Cok</h1>
        <form action="/home" method="post">
            <? csrf_field() ?>

            <div class="form-group">
                <label for="usr"><b>Username : </b></label>
                <input type="text" class="form-control" name="usr" id="usr" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="pwd"><b>Password : </b></label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
            </div>
            <input type="submit" name="" value="Simpan" class="btn btn-primary mt-2" />
        </form>
    </div>
</article>

</html>