<!--TODO: Ao clicar no botao modificar a url do ajax (talvez com uma funcao resulte)-->
<!doctype html>
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

        .homeicon:hover {
            
        }

        button {
            border: 1px solid #2e2d2d;
            padding:10px;
            border-radius:6px;
            background: #2e2d2d;
            color:white;
            
        }

        .button:hover {
            background-color:#ff5c08;
        }

        .ImageSizeAttr {
            width: 225px;
            height: 310px;  
            border-radius:6px;            
             }
             .ImageSizeAttr:hover{
            opacity: .3;
        }

    </style>
</head>

<body id="body">
    <div class="navbar">
        <a href="index.php" class="logo" style="color:grey">
        &nbsp;&nbsp;<span class="primary">ORANGE</span>ANI<img src="https://i.ya-webdesign.com/images/transparent-haikyuu-3.png" style="width:25px;height:25px;">ME
        </a>
        <a href="animes.php">
            <span class="menu" style="color:white;"><i class="fas fa-globe-europe"></i> ANIMES</span>
        </a>
        <a href="schedule.php">
            <span class="menu" ><i class="far fa-clock"></i> SCHEDULE</span>
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
            ANIMES
        </h1>
        <div class="container">
            <div style="margin-left:2%">
            <form action="" method="POST">
            <button id="prev" class="button" style="border-radius:0px !important;">Prev</button>
            <button id="a" class="button">A</button>
            <button id="b" class="button">B</button>
            <button id="c" class="button">C</button>
            <button id="d" class="button">D</button>
            <button id="e" class="button">E</button>
            <button id="f" class="button">F</button>
            <button id="g" class="button">G</button>
            <button id="h" class="button">H</button>
            <button id="i" class="button">I</button>
            <button id="j" class="button">J</button>
            <button id="k" class="button">K</button>
            <button id="l" class="button">L</button>
            <button id="m" class="button">M</button>
            <button id="n" class="button">N</button>
            <button id="o" class="button">O</button>
            <button id="p" class="button">P</button>
            <button id="q" class="button">Q</button>
            <button id="r" class="button">R</button>
            <button id="s" class="button">S</button>
            <button id="t" class="button">T</button>
            <button id="u" class="button">U</button>
            <button id="v" class="button">V</button>
            <button id="w" class="button">W</button>
            <button id="x" class="button">X</button>
            <button id="y" class="button">Y</button>
            <button id="z" class="button">Z</button>
           <button id="next" class="button" style="border-radius:0px !important;">Next</button></form>
        </div>
<br>
            <div class="row">
                <div class="col-md-12" id="animes">
                </div>
            </div>
        </div>
    </div>
    <script>
        
            var k = 'a'; /* Anime Letter */
            var d = 1; /* Anime Pagination */

            $("#prev").click(function(e) {
            e.preventDefault();
             d = d - 1;
             console.log(d);
            });
            $("#next").click(function(e) {
            e.preventDefault();
             d += 1;
             console.log(d);

            });
            $("#a").click(function(e) {
            e.preventDefault();
             console.log('a');
             k = 'a';
            });
            $("#b").click(function(e) {
             e.preventDefault();
             console.log('b');
             k = 'b';
             
         });
            /* API RESULT */
            $.ajax({
            url: 'http://localhost:3000/anime/' ,
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes');
                console.log(data);
                for (i = 0; i < data.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.classList.add('ImageSizeAttr');
                img_anime.src = `${data[i].image}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                p.innerHTML = data[i].title;
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