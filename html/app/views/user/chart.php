
<script 
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"> 
</script> 


  

<script type="text/javascript"> 
  
var ctx = document.getElementById("xChart"); 


<?php 

echo '
var data = {
    labels: ["'.$x[0]->district.'","'.$x[1]->district.'","'.$x[2]->district.'","'.$x[3]->district.'","'.$x[4]->district.'","'.$x[5]->district.'","'.$x[6]->district.'","'.$x[7]->district.'","'.$x[8]->district.'","'.$x[9]->district.'","'.$x[10]->district.'","'.$x[11]->district.'","'.$x[12]->district.'","'.$x[13]->district.'"],
    datasets: [
        {
            label: "Active",
            backgroundColor: "rgba(122, 132, 148, 0.3)",
            data: ['.$x[0]->confirmed.','.$x[1]->confirmed.','.$x[2]->confirmed.','.$x[3]->confirmed.','.$x[4]->confirmed.','.$x[5]->confirmed.','.$x[6]->confirmed.','.$x[7]->confirmed.','.$x[8]->confirmed.','.$x[9]->confirmed.','.$x[10]->confirmed.','.$x[11]->confirmed.','.$x[12]->confirmed.']
        },
        {
            label: "Recovered",
            backgroundColor: "green",
            data: ['.$x[0]->recovered.','.$x[1]->recovered.','.$x[2]->recovered.','.$x[3]->recovered.','.$x[4]->recovered.','.$x[5]->recovered.','.$x[6]->recovered.','.$x[7]->recovered.','.$x[8]->recovered.','.$x[9]->recovered.','.$x[10]->recovered.','.$x[11]->recovered.','.$x[12]->recovered.']
        },
        {
            label: "Dead",
            backgroundColor: "red",
            data: ['.$x[0]->deceased.','.$x[1]->deceased.','.$x[2]->deceased.','.$x[3]->deceased.','.$x[4]->deceased.','.$x[5]->deceased.','.$x[6]->deceased.','.$x[7]->deceased.','.$x[8]->deceased.','.$x[9]->deceased.','.$x[10]->deceased.','.$x[11]->deceased.','.$x[12]->deceased.']
        }
    ]
};
';
?>

var myBarChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: data,
    options: {
        barValueSpacing: 20,
        scales: {
            yAxes: [{
                stacked :true,
                ticks: {
                    min: 0,
                }
            }]
        }
    }
});  
    </script> 

<script type="text/javascript"> 
  
var ctx = document.getElementById("yChart"); 


<?php 

echo '
var data = {
    labels: ["'.$x[0]->district.'","'.$x[1]->district.'","'.$x[2]->district.'","'.$x[3]->district.'","'.$x[4]->district.'","'.$x[5]->district.'","'.$x[6]->district.'","'.$x[7]->district.'","'.$x[8]->district.'","'.$x[9]->district.'","'.$x[10]->district.'","'.$x[11]->district.'","'.$x[12]->district.'","'.$x[13]->district.'"],
    datasets: [
        {
            label: "Home Qurantine",
            backgroundColor: "rgba(122, 132, 148, 0.3)",
            data: ['.$x[0]->quarantined_home.','.$x[1]->quarantined_home.','.$x[2]->quarantined_home.','.$x[3]->quarantined_home.','.$x[4]->quarantined_home.','.$x[5]->quarantined_home.','.$x[6]->quarantined_home.','.$x[7]->quarantined_home.','.$x[8]->quarantined_home.','.$x[9]->quarantined_home.','.$x[10]->quarantined_home.','.$x[11]->quarantined_home.','.$x[12]->quarantined_home.']
        },
        {
            label: "Institutional Qurantine",
            backgroundColor: "green",
            data: ['.$x[0]->quarantined_government.','.$x[1]->quarantined_government.','.$x[2]->quarantined_government.','.$x[3]->quarantined_government.','.$x[4]->quarantined_government.','.$x[5]->quarantined_government.','.$x[6]->quarantined_government.','.$x[7]->quarantined_government.','.$x[8]->quarantined_government.','.$x[9]->quarantined_government.','.$x[10]->quarantined_government.','.$x[11]->quarantined_government.','.$x[12]->quarantined_government.']
        },
       
    ]
};
';
?>

var myBarChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: data,
    options: {
        barValueSpacing: 20,
        scales: {
            yAxes: [{
                stacked :true,
                ticks: {
                    min: 0,
                }
            }]
        }
    }
});  
    </script> 

