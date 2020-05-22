a<?php
session_start();
if(!isset($_GET['anime'])){
    header("Location: index.php");
}
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
    <script type="text/javascript" src="//cdn.embed.ly/player-0.0.11.min.js"></script>
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
            width:260px;
            height:140px;
             }
        .ImageSizeAttr:hover{
            opacity: .3;
        }

        select {
        width: 100px;
    height: 31px;
    line-height: 31px;
    font-size: 13px;
    color: #666;
    background: #fff;
    border: none;
    border-radius: 3px;
    float: right;
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
            WATCH ANIME
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="animes">
                <button class="btn btn-outline-warning" id="btn_1">Player 1</button>
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">

                <?php

                $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $basename = basename($url);
                $url2 = str_replace($basename.'/',"",$url); //get http://localhost/orangeanime/watch.php?anime=kakushigoto/
                $basename2 = basename($url2);
                $url3 = str_replace('watch.php?anime=','',$basename2); //get kakushigoto
                $curep = str_replace($url2,"",$url);
                $curep2 = str_replace($url3.'-episodio-',"",$curep);
                $ch = curl_init();
 
                $animeURL = 'http://localhost:3000/animeinfo/' . $url3;
                var_dump($animeURL);
                curl_setopt($ch, CURLOPT_URL, $animeURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $string1 = curl_exec($ch);
                curl_close ($ch);
                $json_anime_file = json_decode($string1, true);
                $lastep = $json_anime_file[0]["lastep"];

                $epurl = str_replace($url2.'/',"",$url); //get akame-ga-kill-episodio-24-online/
                $epurl2 = str_replace($lastep.'-online/',"",$epurl); //akame-ga-kill-episodio


                for($i=1; $i <= $lastep; $i++) {
                    $epurl3 = $epurl2 . $i . '-online/'; //get url 
                 
                 if($curep2 == $i) {
                     ?>
               <option selected="selected" value=<?php echo $epurl3;?>><?php echo $i; ?></option>
                     <?php
                 } else {
                ?>
               <option value=<?php echo $epurl3;?>><?php echo $i; ?></option>
                <?php
                 }
                }
                 ?>
                 </select>
                <iframe style="border: none;" id="to_watch_1" class="embedly-embed" width="1100" height="720" allowfullscreen  webkitallowfullscreen  mozallowfullscreen>
                </iframe>   
                </div>
            </div>
        </div>
    </div>
        <script>

        let anime_to_watch = "<?= $_GET['anime'];?>";
        let url = "http://localhost:3000/video/" + anime_to_watch;
        $.ajax({
            url: url,
            method: 'get',
            success: (res) => {
                let player_url = res[0].player1;
                let player2_url = res[0].player2;
                console.log(player_url);
                console.log(player2_url);

                if (player_url == null) {
                document.getElementById('to_watch_1').src = player2_url;
                } else if (player2_url == null) {
                document.getElementById('to_watch_1').src = player_url;
                } else {
                document.getElementById('to_watch_1').src = player_url;
        }

        let btn_1 = document.getElementById('btn_1');
        let btn_2 = document.getElementById('btn_2');
        let embed1 = document.getElementById('to_watch_1');

        btn_1.addEventListener('click', () => {
            if (player_url == null) {
                document.getElementById('to_watch_1').src = player2_url;
                } else if (player2_url == null) {
                document.getElementById('to_watch_1').src = player_url;
                } else {
                document.getElementById('to_watch_1').src = player_url;
        }
        })

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
        <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
</body>

</html>
