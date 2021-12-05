<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>


<header class="page-header gradient">
    
      <div class="container pt-3"> </div>

    
    <div class="container-left-title">
        Company Name:  <span id="result"></span>
            <script>
                document.getElementById("result").innerHTML=localStorage.getItem("textvalue");
            </script>
    </div>   
    
    <div class="container-left" >
        Description :  <span id="description"></span>
            <script>
                document.getElementById("description").innerHTML=localStorage.getItem("description");
            </script>
    </div>

<script src="js/getDataComp.js"></script>
<script> 
  listsPosts(document.getElementById("result").innerHTML=localStorage.getItem("textvalue"), 'result');
  </script>

            <html>
            <link
                rel=
            "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
                type="text/css"
            />
            <script src=
            "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script
                src=
            "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
                type="text/javascript"
            ></script>
            <script src=
            "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            
            <script src=
            "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
            <style>
                .container {
                width: 70%;
                margin: 15px auto;
                }
                body {
                text-align: center;
                color: green;
                }
                h2 {
                text-align: center;
                font-family: "Verdana", sans-serif;
                font-size: 30px;
                }
            </style>
            <body>
                <div class="container">
                <h2>Stock Price Evolution</h2>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
                </div>
            </body>
            
            <script>
                var ctx = document.getElementById("myChart").getContext("2d");
                var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: [
                        localStorage.getItem("date1"),
                        localStorage.getItem("date2"),
                        localStorage.getItem("date3"),
                        localStorage.getItem("date4")
                    ],
                    datasets: [
                    {
                        label: "Stock Price",
                        data: [localStorage.getItem("price1"), localStorage.getItem("price2"), localStorage.getItem("price3"), localStorage.getItem("price4")],
                        backgroundColor: "rgba(178,34,34,0.6)",
                    },
                    {
                        label: "Date",
                        data: [localStorage.getItem("date1"), localStorage.getItem("date2"), localStorage.getItem("date3"), localStorage.getItem("date4")],
                        backgroundColor: "rgba(155,153,10,0.6)",
                    },
                    ],
                },
                });
            </script>
            </html>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
</header>


<?php include('components/icons.inc.php'); ?>
<?php require('components/footer.inc.php'); ?>

