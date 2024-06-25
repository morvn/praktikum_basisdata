<?php
include 'koneksi.php';

// Function to count rows based on ticket type
function countRows($id_jenistiket, $conn)
{
    $query = "SELECT COUNT(*) as count FROM tb_pembeli WHERE id_jenistiket='$id_jenistiket'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

// Get counts for each ticket type
$konserCount = countRows(1, $conn);
$seminarCount = countRows(2, $conn);
$waterboomCount = countRows(3, $conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Belajar Chart.js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <style type="text/css">
        .box {
            margin: auto;
            width: 400px;
            height: 400px;
        }
    </style>

    <div class="box">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ['Konser Musik', 'Seminar Nasional', 'Waterboom'],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $konserCount ?>, <?= $seminarCount ?>, <?= $waterboomCount ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 85, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 85, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>