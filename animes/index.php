<?php
session_start();

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OceanAnime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://pbs.twimg.com/media/C9LrOxYUQAAO5FX.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Roboto%20Condensed:700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/app.css">
    <meta name="theme-color" content="#171717">
    <script src='https://kit.fontawesome.com/3cc432bb58.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px #171717;
            background-color: #171717;
        }

        ::-webkit-scrollbar-thumb {
            background: #2e2d2d;
        }

        .col-md-12 {
            border: 5px solid transparent;
            font-size: 12px;
        }
        .btn-search{
            background-color: transparent;
            border: 1px solid #34d5eb;
            color: #34d5eb;
            transition: 0.5s;
            display: inline-block;
        }
        .btn-search:hover{
            color: black;
            background-color: #34d5eb;
            transition: 0.5s;
        }
        .input-search{
            background-color: #171717;
            height: 40px;
            border: none;
            display: inline-block;
            width: 300px;
        }
        #found-anime{
            background-color: black;
            width: 15.8%;
            height: 100px;
            z-index: -1;
            position: absolute;
            left: 82.8%;
            margin-top: 3%;
            overflow-y: auto;
            display: none;
        }
        a {
            text-decoration:none !important;

        }

        .homeicon:hover {
            
        }

        .font {
            font-family: Roboto Condensed, Roboto, Helvetica, sans-serif;
            border-bottom: 3px solid cyan;
    
        }
        .ImageSizeAttr {
            width: 225px;
            height: 310px;
            border-radius:6px;       
             }
             .ImageSizeAttr:hover{
            opacity: .3;
        }

        h3 {
            font-family: Roboto Condensed, Roboto, Helvetica, sans-serif;

        }
    </style>
</head>

<body id="body">
    <div class="navbar">
        <a href="../index.php" class="logo">
            &nbsp;&nbsp;<span class="primary">OCEAN</span><span class="homeicon" style="color:white;">ANI</span><svg height="6px" width="6px" viewBox="0 0 24 24"
                class="circle">
                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path>
            </svg><span class="homeicon" style="color:white;">ME</span>
        </a>
        <a href="../animes.php">
            <span class="menu"><i class="fas fa-globe-europe"></i> ANIMES</span>
        </a>
        <a href="../schedule.php">
            <span class="menu"><i class="far fa-clock"></i> SCHEDULE</span>
        </a>
        <div class="form-inline">
            <input class="input-search mr-sm-2" id="search-anime" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div id="found-anime">
            <center>
            <br>
                <p id="found-anime-title"></p>
            </center>
        </div>
    </div>

    <div class="notice">
        <h1 class="underline">
            Anime Information
        </h1>
      <center>
                <h3 ></h3>
                <div class="col-md-12" id="animes">
                </div>
                </div>
               
        </div>
    </div>
    <script>
/* API RESULT */
$.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/search/haikyuu/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes');

                for (i = 0; i < data.animes.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.classList.add('ImageSizeAttr');
                img_anime.src = `${data.animes[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                p.innerHTML = data.animes[i].title;
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });

        </script>
</body>

</html>