<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark px-5">
        <h1 class="navbar-brand">Test</h1>
    </nav>
    <!-- Search State my id -->
    <!-- Creating cards for adding city and stats -->
    <section class="vh-100 bg-secondary position-relative">
        <div class="card p-1">
            <div class="card-header">
                <h5 class="display-5 text-center">Search State By Id</h5>
            </div>
            <div class="card-body text-center">
                <form action="/api/state" method="GET">
                    <div>
                        <label for="stateId">State Id: </label>
                        <input type="number" name="state_id" id="stateId">
                        <button class="btn btn-secondary" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row m-auto">
                <!-- states -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white text-center">
                                States
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addStateForm">Add</button>
                                <button class="btn btn-warning" data-bs-target="#updateStateForm" data-bs-toggle="offcanvas">Update</button>
                                <button class="btn btn-danger" data-bs-target="#deleteStateForm" data-bs-toggle="offcanvas">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- City -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-center text-white">
                                City
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addCityForm">Add</button>
                                <button class="btn btn-warning" data-bs-toggle="offcanvas" data-bs-target="#updateCityForm">Update</button>
                                <button class="btn btn-danger" data-bs-toggle="offcanvas" data-bs-target="#deleteCityForm">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Get state and city data -->

    </section>
    <!-- STATE OFFCANVAS -->
    <section>
        <!-- Add State Offcanvas -->
        <div class="offcanvas offcanvas-start" id="addStateForm">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Add State</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="state_name">State Name </label>
                        <input type="text" id="state_name">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="state_code">Code</label>
                        <input type="text" id="state_code">
                    </div>

                    <div class="my-2 d-flex justify-content-between">
                        <label for="state_latitude">Latitude</label>
                        <input type="number" id="state_latitude">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="state_logitude">Logitude </label>
                        <input type="number" id="state_logitude">
                    </div>
                    <button type="button" class="btn btn-primary" id="addState"> Add</button>
                </form>
            </div>
        </div>
        <!-- Update state -->
        <div class="offcanvas offcanvas-start" id="updateStateForm">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Update State</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateStateId">State Id </label>
                        <input type="text" id="updateStateId">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateStateName">State Name </label>
                        <input type="text" id="updateStateName">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateStateCode">Code</label>
                        <input type="text" id="updateStateCode">
                    </div>

                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateStateLatitude">Latitude</label>
                        <input type="text" id="updateStateLatitude">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateStateLogitude">Logitude </label>
                        <input type="text" id="updateStateLogitude">
                    </div>
                    <button type="button" class="btn btn-warning" id="updateState"> Update</button>
                </form>
            </div>
        </div>
        <!-- Delete State -->
        <div class="offcanvas offcanvas-start" id="deleteStateForm">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Update State</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="deleteStateId">State id </label>
                        <input type="text" id="deleteStateId">
                    </div>
                    <button type="button" class="btn btn-danger" id="deleteState"> delete</button>
                </form>
            </div>
        </div>

    </section>
    <!-- CITIES OFFCANVAS -->
    <section>
        <!-- Add City Offcanvas -->
        <div class="offcanvas offcanvas-end" id="addCityForm">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Add City</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="addCityName">City Name </label>
                        <input type="text" id="addCityName">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="addCityCode">Code</label>
                        <input type="text" id="addCityCode">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="addCityStateId">State Id </label>
                        <input type="text" id="addCityStateId">
                    </div>

                    <div class="my-2 d-flex justify-content-between">
                        <label for="addCityLatitude">Latitude</label>
                        <input type="text" id="addCityLatitude">
                    </div>

                    <div class="my-2 d-flex justify-content-between">
                        <label for="addCityLogitude">Logitude </label>
                        <input type="text" id="addCityLogitude">
                    </div>
                    <button type="button" class="btn btn-primary" id="addCity"> Add City</button>
                </form>
            </div>
        </div>
        <!-- Update City -->
        <div class="offcanvas offcanvas-end" id="updateCityForm">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Update City</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateCityId">City Id </label>
                        <input type="text" id="updateCityId">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateCityName">City Name </label>
                        <input type="text" id="updateCityName">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateCityCode">Code</label>
                        <input type="text" id="updateCityCode">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateCityStateId">State Id </label>
                        <input type="text" id="updateCityStateId">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateCityLatitude">Latitude</label>
                        <input type="text" id="updateCityLatitude">
                    </div>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="updateCityLogitude">Logitude </label>
                        <input type="text" id="updateCityLogitude">
                    </div>
                    <button type="button" class="btn btn-warning" id="updateCity"> Update</button>
                </form>
            </div>
        </div>
        <!-- Delete City -->
        <div class="offcanvas offcanvas-end" id="deleteCityForm">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title">Delete City</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                    <div class="my-2 d-flex justify-content-between">
                        <label for="deleteCityId">City id </label>
                        <input type="text" id="deleteCityId">
                    </div>
                    <button type="button" class="btn btn-danger" id="deleteCity"> delete</button>
                </form>
            </div>
        </div>

    </section>
    <!-- Toaster Message -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        /* Variable function to make post request */
        const http = async (url, method = "POST", data = [], prepareUrl = true) => {
            try {
                finalUrl = prepareUrl ? 'http://127.0.0.1:8000/api/' + url : url;
                const response = await fetch(finalUrl, {
                    method: method,
                    mode: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                let resData = await response.json();
                const error = resData.error ? true : false;
                resData = error ? resData.message : resData;
                return {
                    error: error,
                    data: resData
                };
            } catch (error) {
                return {
                    error: true,
                    data: error.message
                };
            }
        }
        /* Variable function to show toaster messsage */
        const toaster = (message, success = false) => {
            const bgcolor = success ? 'bg-success' : 'bg-danger';
            const toaster = $('<div style="z-index:10000;"></div>').addClass(`toaster position-absolute ${bgcolor} top-0 end-0 p-3 m-3 text-white`).text(message);
            $('html').append(toaster);
            setTimeout(() => {
                $('.toaster').fadeOut().empty();
            }, 3000);
        }
        /* ADD STATE API CALL */
        $("#addState").click(async () => {
            const stateName = $('#state_name').val();
            const stateCode = $('#state_code').val();
            const stateLong = $('#state_logitude').val();
            const stateLat = $('#state_latitude').val();
            const res = await http('state', 'POST', {
                state_name: stateName,
                state_code: stateCode,
                latitude: stateLat,
                logitude: stateLong
            });
            res.error ? toaster(res.data) : toaster(res.data.message, true);
        })
        /* UPDATE STATE API CALL */
        $("#updateState").click(async () => {
            const stateId = $('#updateStateId').val();
            const stateName = $('#updateStateName').val();
            const stateCode = $('#updateStateCode').val();
            const stateLong = $('#updateStateLogitude').val();
            const stateLat = $('#updateStateLatitude').val();
            const res = await http('state', 'PUT', {
                state_id: stateId,
                state_name: stateName,
                state_code: stateCode,
                latitude: stateLat,
                logitude: stateLong
            });
            res.error ? toaster(res.data) : toaster(res.data.message, true);
        })
        /* DELTE STATE API CALL */
        $("#deleteState").click(async () => {
            const stateId = $('#deleteStateId').val();
            const res = await http('state', 'DELETE', {
                state_id: stateId,
            });
            res.error ? toaster(res.data) : toaster(res.data.message, true);
        })


        /* ADD CITY API CALL */
        $("#addCity").click(async () => {
            const cityName = $('#addCityName').val();
            const cityCode = $('#addCityCode').val();
            const cityStateId = $('#addCityStateId').val();
            const cityLong = $('#addCityLogitude').val();
            const cityLat = $('#addCityLatitude').val();
            const res = await http('city', 'POST', {
                city_name: cityName,
                city_code: cityCode,
                state_id:cityStateId,
                latitude: cityLat,
                logitude: cityLong
            });
            res.error ? toaster(res.data) : toaster(res.data.message, true);
        })
        /* UPDATE CITY API CALL */
        $("#updateCity").click(async () => {
            const cityId = $('#updateCityId').val();
            const cityStateId = $('#updateCityStateId').val();
            const cityName = $('#updateCityName').val();
            const cityCode = $('#updateCityCode').val();
            const cityLong = $('#updateCityLogitude').val();
            const cityLat = $('#updateCityLatitude').val();
            const res = await http('city', 'PUT', {
                city_id: cityId,
                state_id: cityStateId,
                city_name: cityName,
                city_code: cityCode,
                latitude: cityLat,
                logitude: cityLong
            });
            res.error ? toaster(res.data) : toaster(res.data.message, true);
        })
        /* DELTE CITY API CALL */
        $("#deleteCity").click(async () => {
            const cityId = $('#deleteCityId').val();
            const res = await http('city', 'DELETE', {
                city_id: cityId,
            });
            res.error ? toaster(res.data) : toaster(res.data.message, true);
        })
    </script>
</body>

</html>