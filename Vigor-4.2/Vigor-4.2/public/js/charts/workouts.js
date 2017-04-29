
var workoutChart = document.getElementById("workouts").getContext("2d");

//legend(document.getElementById('placeholder'), caloriesData);

//Create the chart
 var workoutChart = new Chart(workoutChart).Bar(workoutsData,workoutOptions);