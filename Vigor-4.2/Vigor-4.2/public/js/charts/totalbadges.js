//Pie Chart//
var totalbadgesChart= document.getElementById("totalbadges").getContext("2d");
var badgesChartz = new Chart(totalbadgesChart).Pie(totalbadgesData, totalbadgesOptions);
document.getElementById('badges-legend').innerHTML = badgesChartz.generateLegend();