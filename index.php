<?php
session_start();

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OrangeAnime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://i.ya-webdesign.com/images/transparent-haikyuu-3.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Roboto%20Condensed:700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
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
            border: 1px solid #ff5c08;
            color: #ff5c08;
            transition: 0.5s;
            display: inline-block;
        }
        .btn-search:hover{
            color: black;
            background-color: #ff5c08;
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
        
        a:hover{
            color:white;
        }
        .ImageSizeAttr {
            border-radius:6px;
            width:200px;
            height:275px;
             }
        .ImageSizeAttr:hover{
            opacity: .3;
        }
    </style>
</head>

<body id="body">
    <div class="navbar">
        <a href="index.php" class="logo">
            &nbsp;&nbsp;<span class="primary">ORANGE</span>ANI<img src="https://i.ya-webdesign.com/images/transparent-haikyuu-3.png" style="width:25px;height:25px;">ME
        </a>
        <a href="animes.php">
            <span class="menu"><i class="fas fa-globe-europe"></i> ANIMES</span>
        </a>
        <a href="schedule.php">
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
            RECENT ANIME
        </h1>
        <div class="contain er">
            <div class="row">
                <div class="col-md-12" id="animes">
                </div>
            </div>
        </div>
    </div>
        <script>
            $.ajax({
                url: 'http://localhost:3000/last',
                method: 'GET',
                success: (data) => {
                    let animes = document.getElementById('animes');

                    data.forEach((element) => {
                        let url = "http://localhost:3000/video/";
                        let final_url = url + element.url;
                        console.log(element);
                        let div_anime = document.createElement('div');
                        let red_anime = document.createElement('a');
                        let img_anime = document.createElement('img');
                        let title_anime = document.createElement('div');
                        let p = document.createElement('p');
                        div_anime.classList.add("col-md-3");
                        div_anime.style.display = "inline-block";
                        red_anime.href = "watch.php?anime=" + element.url; //pegar esse atributo 
                        img_anime.src = `${element.image}`;
                        title_anime.classList.add("col-md-12");
                        img_anime.classList.add('ImageSizeAttr');
                        p.innerHTML = element.title;
                        title_anime.appendChild(p);
                        div_anime.appendChild(red_anime);
                        red_anime.appendChild(img_anime);
                        red_anime.appendChild(title_anime);
                        animes.appendChild(div_anime);
                    });
                }
            });


            function transform(arr) {
                return arr.reduce((memo, item) => {
                    if (typeof item !== "undefined") {
                        if (Array.isArray(item)) item = transform(item);
                        memo.push(item);
                    }
                    return memo;
                }, []);
            }


            let search_anime = document.getElementById('search-anime');
            search_anime.addEventListener('keyup', () => {
                let found_anime_div = document.getElementById('found-anime');
                found_anime_div.style.display = 'block';
                let url = "https://kitsu.io/api/edge/anime?filter[text]=";
                let founds = [];
                $.ajax({
                    url: url + search_anime.value,
                    success: (res) => {
                        let text = "";
                        let found_animes = res.data.forEach((content) => {
                            
                            founds.push(content.attributes.titles.en);
                        });
                        transform(founds).forEach((title) => {
                            text += title;
                            text += "<br>";
                        })
                        document.getElementById('found-anime-title').innerHTML = text;
                
                    }
                });
            });
            search_anime.addEventListener('focusout', () => {
                let found_anime_div = document.getElementById('found-anime');
                found_anime_div.style.display = 'none';
            });
        </script>
</body>

</html>
