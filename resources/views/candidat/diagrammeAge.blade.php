@include('navbar.app')
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<div class="row bg-sucess p-3 mt-5">
    <h3 style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ; text-align:center;">GRAPHE PRESENTANT LES TRANCHES D'AGES</h3>
</div> <br>

<body>
  <canvas id="ageDiagramChart"></canvas>
  <script>
    var ctx = document.getElementById('ageDiagramChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["15-19", "20-24", "25-29", "30-34", "35"],
            datasets: [{
                data: [<?php echo $age_15_19 ; echo ","; echo $age_20_24; echo ","; echo $age_25_29;
                echo "," ; echo $age_30_34; echo ","; echo $age_35?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
  </script>
</body>
</html>



