<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Privacy Dashboard</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</head>
<body>
<div class="container">

    <h1>{{$data->server}}</h1>
    <h2>Websites:</h2>
    <ol> @foreach($data->websites as $website)
        <li>{{$website}}</li>
        @endforeach



</div>


</body>

</html>
