<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>List Users</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script>
            $(document).on("click", ".btn", function(event) {
                const url=window.location.href+'?sort='+event.target.id;
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token:'{{ csrf_token() }}'
                    },
                    dataType: 'text',
                    cache: false,
                    success: function(dataResult) {
                        console.log('print dataResult');
                        console.log(dataResult);
                    }
                })
            })
        </script>
    </head>
    <body>
    <div class=container>
        <h1>Users</h1>
        <table
            cellspacing=0
            class="table table-bordered table-hover table-inverse table-striped"
            id=example
            width=100%
        >
            <thead>
            <tr>
                <th>First Name <button id="firstName:asc" class="btn btn-outline-dark">&#9650;</button> <button id="firstName:desc" class="btn btn-outline-dark">&#9660;</button></th>
                <th>Last Name <button id="lastName:asc" class="btn btn-outline-dark">&#9650;</button> <button id="lastName:desc" class="btn btn-outline-dark">&#9660;</button></th>
                <th>First Login Date Time <button id="firstLoginDate:asc" class="btn btn-outline-dark">&#9650;</button> <button id="firstLoginDate:desc" class="btn btn-outline-dark">&#9660;</button></th>
                <th>Last Login Date Time <button  id="lastLoginDate:asc" class="btn btn-outline-dark">&#9650;</button> <button id="lastLoginDate:desc" class="btn btn-outline-dark">&#9660;</button></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->getFirstName() }}</td>
                        <td>{{ $user->getLastName() }}</td>
                        <td>{{ $user->getFirstLoginDate()->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $user->getLastLoginDate()->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </body>
</html>
