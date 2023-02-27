<html>

<head>
    <script src="jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#x").click(function() {
                $("#x").animate({
                    left: '200px'
                }, 1000);
                $("#x").animate({
                    top: '200px'
                }, 1000);
                $("#x").animate({
                    left: '400px'
                }, 1000);
                $("#x").animate({
                    top: '0px'
                }, 1000);
                $("#x").animate({
                    left: '600px'
                }, 1000);
                $("#x").animate({
                    top: '200px'
                }, 1000);
                $("#x").animate({
                    left: '300px'
                }, 1000);
                $("#x").animate({
                    top: '400px'
                }, 1000);
                $("#x").animate({
                    left: '800px'
                }, 1000);
            });
        });
        $(document).ready(function() {
            $("#y").click(function() {
                $(this).hide();
            });
        });
        $(document).ready(function() {
            $("#z").mouseenter(function() {
                alert("You entered 3rd!");
            });
            $("#z").mouseleave(function() {
                alert("Bye! You now leave 3rd!");
            });
        });
        $(document).ready(function() {
            $('#b').hover(
                function() {
                    $(this).animate({
                        'zoom': 1.2
                    }, 400);
                },
                function() {
        $(this).animate({ 'zoom': 1 }, 400);
                });
        });
        $(document).ready(function() {
            $("#a").click(function(){
        $(this).width(200)
            });
        });
    </script>
    <style>
        .dabba {
            position: fixed;

            height: 100px;
            width: 100px;
            /* content: "hello"; */
            color: grey;
            background-color: orange;
            background-image: url("vehicle.png");
            background-size: 100px 100px;
            border: 2px solid black;
        }

        #x {
            top: 0px;
            left: 0px;
        }

        #y {
            top: 100px;
            left: 0px;
        }

        #z {
            top: 200px;
            left: 0px;
        }

        #a {
            top: 300px;
            left: 0px;
        }

        #b {
            top: 400px;
            left: 0px;
        }
    </style>
</head>

<body>

    <div id="x" class="dabba">hum 1st</div>
    <div id="y" class="dabba">hum 2nd</div>
    <div id="z" class="dabba">hum 3rd</div>
    <div id="a" class="dabba">hum 4td</div>
    <div id="b" class="dabba">hum 5td</div>
</body>

</html>