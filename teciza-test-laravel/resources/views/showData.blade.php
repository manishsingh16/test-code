<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Data</title>
    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <section>
        <div class="container">
            <div class="card m-4 bg-secondary">
                <div class="card-header ">
                    <h4 class="display-6 text-dark text-center">{{$state_name}}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-unstyled">
                        <li class="text-center list-group-item">State Latitude : <span class="text-success fw-bold"> {{$state_latitude}}</span></li>
                        <li class="text-center list-group-item">State Logitude: <span class="text-success fw-bold"> {{$state_logitude}}</span></li>
                        <li class="text-center list-group-item">State Code: <span class="text-success fw-bold"> {{$state_code}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Table Section -->
    <table class="w-75 m-auto text-center">
        <tr class="bg-dark p-3 text-white">
            <th>City Name</th>
            <th>City Code</th>
            <th>State Id</th>
            <th>Latitude</th>
            <th>Logitude</th>
        </tr>
        @foreach($cities as $city)
        <tr class="bg-light p-2">
            <th>{{$city['city_name']}}</th>
            <th>{{$city['city_code']}}</th>
            <th>{{$city['state_id']}}</th>
            <th>{{$city['city_latitude']}}</th>
            <th>{{$city['city_logitude']}}</th>
        </tr>
        @endforeach
    </table>
</body>

</html>