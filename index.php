<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="shortcut icon" href="#"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mathsolver</title>
    <style>
        * {
            font-family: 'Poppins',
                sans-serif;
        }

        body {
            background-image: url("favicon/pattern.svg");
            /* background-color: #fffc85; */
        }

        .input {
            background-color: white;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0px -1px 10px 2px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0px -1px 10px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px -1px 10px 2px rgba(0, 0, 0, 0.2);
        }

        .text-center {
            margin-bottom: 0px;
        }

        @media (min-width: 376px) {
            .input {
                width: 90%;
            }
        }

        @media (min-width: 576px) {
            .input {
                width: 90%;
            }
        }

        @media (min-width: 768px) {
            .input {
                width: 90%;
            }
        }

        @media (min-width: 992px) {
            .input {
                width: 100%;
            }
        }

        @media (min-width: 1200px) {
            .input {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="input container mt-5 mb-5" id="input">
        <h3 class="fw-bold" style="color: #48a1ff;">Math Solver</h3>
        <h6 class="mb-3" style="color: #48a1ff;">
            Math solver with expert-level answers are computed using Wolfram's breakthrough algorithms, knowledgebase, and AI technology.
        </h6>
        <div class="input-group mb-3">
            <input style="background-color: white; border-color: #48a1ff;" type="text" id="query" class="form-control" placeholder="Enter what you want to solve" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off" autofocus>
            <button style="background-color: #48a1ff; border-color: #48a1ff" class="btn btn-primary" id="solve" type="button" id="button-addon2">Solve</button>
        </div>
        <div class="content" id="content">

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const solve = document.querySelector("#solve")
        const input = document.getElementById("query")
        const content = document.querySelector("#content")
        solve.addEventListener("click", function() {
            content.innerHTML = '<span class="ms-3">Solving...</span><img class="ms-2" width="50px" src="favicon/Pulse-1s-200px.gif">'
            const ajax = new XMLHttpRequest()
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    if (!input.value == "") {
                        content.innerHTML = `<h6>Result for : ${input.value}</h6>
                        <hr>`
                        content.innerHTML += ajax.response
                    } else {
                        content.innerHTML = ajax.response
                    }
                }
            }
            ajax.open("get", `get.php?input=${encodeURIComponent(input.value)}`)
            ajax.send()
        })
        input.onkeydown = function(e) {
            if (e.keyCode == 13) {
                content.innerHTML = `<span class="ms-3">Solving...</span><img class="ms-2" width="50px" src="favicon/Pulse-1s-200px.gif">`
                const ajax = new XMLHttpRequest()
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        if (!input.value == "") {
                            content.innerHTML = `<h6>Result for : ${input.value}</h6>
                        <hr>`
                            content.innerHTML += ajax.response
                        } else {
                            content.innerHTML = ajax.response
                        }
                    }
                }
                ajax.open("get", `get.php?input=${encodeURIComponent(input.value)}`)
                ajax.send()

            }
        };
    </script>
</body>

</html>