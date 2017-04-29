var caloriesChart = document.getElementById("calories").getContext("2d");

//legend(document.getElementById('placeholder'), caloriesData);

//Create the chart
var caloriesChartz = new Chart(caloriesChart).Line(caloriesData,caloriesOptions);
document.getElementById('calories-legend').innerHTML = caloriesChartz.generateLegend();