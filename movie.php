<?php

function get_movie_list($search) {

    $search = str_replace(' ', '%20', "$search");

    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?query={$search}&include_adult=false&language=en-US&page=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyOWVmOGUzMDZhNmZhYzcwOTI4MzE5MmRmN2Y1YmJkMSIsIm5iZiI6MTcyNTQ2MDQwMi4wNjgxMTIsInN1YiI6IjY2ZDg2ZDgzNzc5ZTFmZjE5MmJmNTIyMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ptEwEoRlEeratWptI_p9GZRo3r9vDVKabsOZthQI2oE",
        "accept: application/json"
    ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
        
        $response = json_decode($response);
        $movie_list = array();

        foreach ($response->results as $result) {
            $movie_info = array("id" => "$result->id", "title" => "$result->title", "poster_path" => "$result->poster_path", "overview" => "$result->overview");
            array_push($movie_list, $movie_info);
        }
        
        return $movie_list;
    }

}
?>

