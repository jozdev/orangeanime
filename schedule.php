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

        .font {
            font-family: Roboto Condensed, Roboto, Helvetica, sans-serif;
            border-bottom: 3px solid #ff5c08;
    
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
            <span class="menu"><i class="fas fa-globe-europe"></i> ANIMES</span>
        </a>
        <a href="schedule.php">
            <span class="menu" style="color:white;"><i class="far fa-clock"></i> SCHEDULE</span>
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
            SCHEDULE
        </h1>
        <div class="container">
            <div class="row">
                <h3 class="font">Monday</h3>
                <div class="col-md-12" id="animes">
                </div>
                </div>
                <div class="row">
                <h3 class="font">Tuesday</h3>
                <div class="col-md-12" id="animes2">
                </div>
            </div>
            <div class="row">
                <h3 class="font">Wednesday</h3>
                <div class="col-md-12" id="animes3">
                </div>
            </div>
            <div class="row">
                <h3 class="font">Thursday</h3>
                <div class="col-md-12" id="animes4">
                </div>
            </div>
            <div class="row">
                <h3 class="font">Friday</h3>
                <div class="col-md-12" id="animes5">
                </div>
            </div>
            <div class="row">
                <h3 class="font">Saturday</h3>
                <div class="col-md-12" id="animes6">
                </div>
            </div>
            <div class="row">
                <h3 class="font">Sunday</h3>
                <div class="col-md-12" id="animes7">
                </div>
            </div>

        </div>
    </div>
    <script>
            /* MONDAY SCHEDULE */
            $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 1 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                img_anime.classList.add('ImageSizeAttr');
                p.innerHTML = data.schedule[i].title;
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });
                    /* TUESDAY SCHEDULE */
                    $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 2 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes2');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                img_anime.classList.add('ImageSizeAttr');
                p.innerHTML = data.schedule[i].title;
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });
           /* WEDNESDAY SCHEDULE */
           $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 3 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes3');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                p.innerHTML = data.schedule[i].title;
                img_anime.classList.add('ImageSizeAttr');
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });
                   /* THURSDAY SCHEDULE */
                   $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 4 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes4');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                img_anime.classList.add('ImageSizeAttr');
                p.innerHTML = data.schedule[i].title;
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });
        /* FRIDAY SCHEDULE */
        $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 5 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes5');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                img_anime.classList.add('ImageSizeAttr');
                p.innerHTML = data.schedule[i].title;
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });
         /* SATURDAY SCHEDULE */
         $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 6 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes6');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                img_anime.classList.add('ImageSizeAttr');
                p.innerHTML = data.schedule[i].title;
                title_anime.appendChild(p);
                div_anime.appendChild(img_anime);
                div_anime.appendChild(title_anime);
                animes.appendChild(div_anime);  
                }
            }
        });
         /* SUNDAY SCHEDULE */
         $.ajax({
            url: 'https://jkanime.chrismichael.now.sh/api/v1/schedule/' + 7 + '/',
            method: 'GET',
            success: (data) => {
                var i;
                let animes = document.getElementById('animes7');

                for (i = 0; i < data.schedule.length; i++) {
                let div_anime = document.createElement('div');
                let img_anime = document.createElement('img');
                let title_anime = document.createElement('div');
                let p = document.createElement('p');
                div_anime.classList.add("col-md-3");
                div_anime.style.display = "inline-block";
                img_anime.src = `${data.schedule[i].poster}`;
                title_anime.classList.add("col-md-12");
                title_anime.classList.add("text-center");
                img_anime.classList.add('ImageSizeAttr');
                p.innerHTML = data.schedule[i].title;
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