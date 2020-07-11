<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    </head>
    <body>
        <div class="container h-100 pt-4">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card col-md-8"  >
                    <div class="card-body">
                        <h5 class="card-title">Send Post </h5>
                        <h6 class="card-subtitle mb-2 text-muted"><code>https://atomic.incfile.com/fakepost</code></h6>
                        <form class="form-inline">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                            <input class="form-control form-control-sm col-6" type="text"  value="https://atomic.incfile.com/fakepost" readonly>
                            <button type="button" class="btn btn-link btnSubmit">
                                Send Post</button>
                        </form>
                        <div  >
                            <ul class="list-group list-group-flush responsed pt-4">
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .list-group-item {
            position: relative;
            display: block;
            padding: -0rem 1.25rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,.125);
        }
    </style>
</html>
