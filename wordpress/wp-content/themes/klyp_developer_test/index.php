<?php

// our OMDb API Key for reference
$api_key = '96f7696f';

// create & initialize our curl session for each colour
$curl_red = curl_init();
$curl_green = curl_init();
$curl_blue = curl_init();
$curl_yellow = curl_init();

// set our urls with curl_setopt() for each
curl_setopt($curl_red, CURLOPT_URL, "http://www.omdbapi.com?apikey=96f7696f&s=red&type=movie");
curl_setopt($curl_green, CURLOPT_URL, "http://www.omdbapi.com?apikey=96f7696f&s=green&type=movie");
curl_setopt($curl_blue, CURLOPT_URL, "http://www.omdbapi.com?apikey=96f7696f&s=blue&type=movie");
curl_setopt($curl_yellow, CURLOPT_URL, "http://www.omdbapi.com?apikey=96f7696f&s=yellow&type=movie");

// return the transfer as a string, also with setopt() for each
curl_setopt($curl_red, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_green, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_blue, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_yellow, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes our curl sessions
// $output_x contains the output strings for each colour
$output_red = curl_exec($curl_red);
$output_green = curl_exec($curl_green);
$output_blue = curl_exec($curl_blue);
$output_yellow = curl_exec($curl_yellow);

// close our curl resources to free up system resources
// (deletes the variables made by our curl_init)
curl_close($curl_red);
curl_close($curl_green);
curl_close($curl_blue);
curl_close($curl_yellow);

// decode our results into an array
$result_array_red = json_decode($output_red, true);
$result_array_green = json_decode($output_green, true);
$result_array_blue = json_decode($output_blue, true);
$result_array_yellow = json_decode($output_yellow, true);

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script src="script.js"></script>
    </head>
    <body>

        <header class="bg-dark">
            <div class="container">
                <div class="d-flex justify-content-between py-3">
                    <p class="text-light mb-0">Ben Fowler</p>
                    <a href="tel:0414794660" class="text-light">Call me</a>
                </div>
            </div>
        </header>

        <section class="py-3 py-lg-5">
            <div class="container">
                <h1>Klyp Developer Test</h1>
                <h2 class="mb-4">
                    Searching OMDb API for Movie Titles containing:
                </h2>
                <div class="row">

                    <div class="col-6 col-lg-3 text-center mb-2 mb-lg-0">
                        <div class="py-2 border-red cursor-pointer tab--color red active" 
                        onclick="makeActive('.tab--color', this); filterClass('.section-color', '.section-color.red');">
                            <h3 class="mb-0">Red</h3>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 text-center mb-2 mb-lg-0">
                        <div class="py-2 border-green cursor-pointer tab--color green"
                        onclick="makeActive('.tab--color', this); filterClass('.section-color', '.section-color.green');">
                            <h3 class="mb-0">Green</h3>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 text-center ">
                        <div class="py-2 border-blue cursor-pointer tab--color blue"
                        onclick="makeActive('.tab--color', this); filterClass('.section-color', '.section-color.blue');">
                            <h3 class="mb-0">Blue</h3>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 text-center ">
                        <div class="py-2 border-yellow cursor-pointer tab--color yellow"
                        onclick="makeActive('.tab--color', this); filterClass('.section-color', '.section-color.yellow');">
                            <h3 class="mb-0">Yellow</h3>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Our Red Section -->
        <section class="bg-light py-3 py-lg-5 section-color red">
            <div class="container">
                <div class="row">

                    <?php  

                        // Loop through our array for each movie
                        foreach($result_array_red["Search"] as $movie) {
                        
                            // For each movie:
                            
                            // Format the movie title (Wrap each instance of red with  a color red <span> tag)
                            $formatted_title = preg_replace("/(red)/i", "<span class=\"bg-red\">$1</span>", $movie["Title"]);
                    ?>

                    <!-- Output a column -->
                    <div class="col-12 col-md-6 col-lg-4 mb-md-3">
                        <div class="d-flex flex-md-column p-3 border shadow h-100">
                            <div class="mr-2 mr-md-0 mb-md-2">

                                <!-- Output the movie poster -->
                                <img src="<?php echo $movie["Poster"]; ?>" alt="<?php echo $movie["Title"]; ?>" class="image-crop max-y-400 w-100">
                            </div>

                            <!-- Output the formatted movie title -->
                            <h5 class="mt-auto"><?php echo $formatted_title; ?></h5>

                            <!-- Output the movie year -->
                            <em><?php echo $movie["Year"]; ?></em>
                        </div>
                    </div>

                    <?php 
                        // end for loop
                        }                    
                    ?>

                </div>
            </div>
        </section>

        <!-- Our Green Section -->
        <section class="bg-light py-3 py-lg-5 section-color green d-none">
            <div class="container">
                <div class="row">

                    <?php  

                        // Loop through our array for each movie
                        foreach($result_array_green["Search"] as $movie) {
                        
                            // For each movie:
                            
                            // Format the movie title (Wrap each instance of green with  a color green <span> tag)
                            $formatted_title = preg_replace("/(green)/i", "<span class=\"bg-green\">$1</span>", $movie["Title"]);
                    ?>

                    <!-- Output a column -->
                    <div class="col-12 col-md-6 col-lg-4 mb-md-3">
                        <div class="d-flex flex-md-column p-3 border shadow h-100">
                            <div class="mr-2 mr-md-0 mb-md-2">

                                <!-- Output the movie poster -->
                                <img src="<?php echo $movie["Poster"]; ?>" alt="<?php echo $movie["Title"]; ?>" class="image-crop max-y-400 w-100">
                            </div>

                            <!-- Output the formatted movie title -->
                            <h5 class="mt-auto"><?php echo $formatted_title; ?></h5>

                            <!-- Output the movie year -->
                            <em><?php echo $movie["Year"]; ?></em>
                        </div>
                    </div>

                    <?php 
                        // end for loop
                        }                    
                    ?>

                </div>
            </div>
        </section>

        <!-- Our Blue Section -->
        <section class="bg-light py-3 py-lg-5 section-color blue d-none">
            <div class="container">
                <div class="row">

                    <?php  

                        // Loop through our array for each movie
                        foreach($result_array_blue["Search"] as $movie) {
                        
                            // For each movie:
                            
                            // Format the movie title (Wrap each instance of blue with  a color blue <span> tag)
                            $formatted_title = preg_replace("/(blue)/i", "<span class=\"bg-blue\">$1</span>", $movie["Title"]);
                    ?>

                    <!-- Output a column -->
                    <div class="col-12 col-md-6 col-lg-4 mb-md-3">
                        <div class="d-flex flex-md-column p-3 border shadow h-100">
                            <div class="mr-2 mr-md-0 mb-md-2">

                                <!-- Output the movie poster -->
                                <img src="<?php echo $movie["Poster"]; ?>" alt="<?php echo $movie["Title"]; ?>" class="image-crop max-y-400 w-100">
                            </div>

                            <!-- Output the formatted movie title -->
                            <h5 class="mt-auto"><?php echo $formatted_title; ?></h5>

                            <!-- Output the movie year -->
                            <em><?php echo $movie["Year"]; ?></em>
                        </div>
                    </div>

                    <?php 
                        // end for loop
                        }                    
                    ?>

                </div>
            </div>
        </section>

         <!-- Our Yellow Section -->
         <section class="bg-light py-3 py-lg-5 section-color yellow d-none">
            <div class="container">
                <div class="row">

                    <?php  

                        // Loop through our array for each movie
                        foreach($result_array_yellow["Search"] as $movie) {
                        
                            // For each movie:
                            
                            // Format the movie title (Wrap each instance of yellow with  a color yellow <span> tag)
                            $formatted_title = preg_replace("/(yellow)/i", "<span class=\"bg-yellow\">$1</span>", $movie["Title"]);
                    ?>

                    <!-- Output a column -->
                    <div class="col-12 col-md-6 col-lg-4 mb-md-3">
                        <div class="d-flex flex-md-column p-3 border shadow h-100">
                            <div class="mr-2 mr-md-0 mb-md-2">

                                <!-- Output the movie poster -->
                                <img src="<?php echo $movie["Poster"]; ?>" alt="<?php echo $movie["Title"]; ?>" class="image-crop max-y-400 w-100">
                            </div>

                            <!-- Output the formatted movie title -->
                            <h5 class="mt-auto"><?php echo $formatted_title; ?></h5>

                            <!-- Output the movie year -->
                            <em><?php echo $movie["Year"]; ?></em>
                        </div>
                    </div>

                    <?php 
                        // end for loop
                        }                    
                    ?>

                </div>
            </div>
        </section>


    </body>
</html>