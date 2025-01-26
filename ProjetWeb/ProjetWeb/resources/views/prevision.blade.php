@extends('default')

@section('registerTitle')
<title>Températures</title>
@endsection

@section('temperature')
<div class="container mt-5">
    <div class="text-center mb-4">
        <p class="btn btn-success p-3">Bienvenue sur Sag Météo</p>
        <h1 class="display-4">Températures</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Température Minimale (°C)</th>
                    <th>Température Moyenne (°C)</th>
                    <th>Température Maximale (°C)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $min =100;
            $max = array();
              foreach($temperatures as $temp){
                    if($temp->temperature <= $min){
                        $min = $temp->temperature;
                    }
                    array_push($max,$temp->temperature);
                }
                array_sum($max)

            ?> 
                    <tr>
                        <td><?php echo $min?> °C</td>
                        <td><?php echo array_sum($max)/ count($max)?> °C</td>
                        <td><?php echo max($max)?>  °C</td>
                    </tr>
            </tbody>
        </table>
    </div>

     <div class="container">
    <h1>Températures sur une période</h1>
    <div class="graph-container">
      <canvas id="temperatureChart" width="800" height="400"></canvas>
    </div>
  </div>

<script>
    const temperatureData = @json($temperatures);

    // Extraire les jours et températures
    const labels = temperatureData.map(data => data.date);
    const temperatures = temperatureData.map(data => data.temperature);

    // Fonction pour créer le graphique
    function createTemperatureChart(labels, temperatures) {
      const ctx = document.getElementById('temperatureChart').getContext('2d');
      const temperatureChart = new Chart(ctx, {
        type: 'line', // Type de graphique (courbe)
        data: {
          labels: labels, // Les étiquettes (dates)
          datasets: [{
            label: 'Température (°C)', // Légende
            data: temperatures, // Données de température
            borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la courbe
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de l'arrière-plan
            fill: true, // Remplir sous la courbe
            tension: 0.4 // Pour rendre la courbe plus fluide
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: false, // La ligne Y ne commence pas à zéro
              title: {
                display: true,
                text: 'Température (°C)'
              }
            },
            x: {
              title: {
                display: true,
                text: 'Date'
              }
            }
          }
        }
      });
    }

    // Créer le graphique avec les données
    createTemperatureChart(labels, temperatures);
  </script> 
</div>
@endsection
