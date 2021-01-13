<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Welcome to Social</h1>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Shop: </label>
                        <input class="form-control" id="shop">
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input class="form-control" id="email">
                        <input type="hidden" value="{{ $token }}" id="token">
                    </div>
                    <div class="form-group mt-3">
                        <a href="http://onshop.test/go-to-x2" class="btn btn-primary">Go to X2</a>

                        <a href="http://onshop.test/logout-shop?token={{$token}}" class="btn btn-danger">Logout</a>
                    </div>
                    <div class="form-group">

                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(function() {
            let token = $("#token").val();
            $.ajax({
                url: 'http://onshop.test/api/v1/verify-token',
                type: 'POST',
                data: {
                    token: token,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (results) {
                   console.log(results)
                    if(results.code == 200){
                        $('#email').val(results.user_info.email);
                        $("#shop").val(results.user_info.shop_name);
                    }
                }
            });
        });
    </script>
</html>
