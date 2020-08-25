$(document).ready(function(){
	$.ajax({
		url: "http://localhost/fashion/bar.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];

			for(var i in data) {
				player.push("year " + data[i].Crop_Year);
				score.push(data[i].Production);
			}

			var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'Rice',
						backgroundColor: ['rgb(0, 0, 0)','rgb(10, 0, 0)','rgb(25, 0, 0)','rgb(40, 0, 0)','rgb(55, 0, 0)','rgb(70, 0, 0)','rgb(85, 0, 0)','rgb(100, 0, 0)','rgb(115, 0, 0)','rgb(130, 0, 0)','rgb(145, 0, 0)','rgb(160, 0, 0)','rgb(175, 0, 0)','rgb(195, 0, 0)','rgb(210, 0, 0)','rgb(225, 0, 0)','rgb(255, 0, 0)','rgb(255, 0, 0)'],
						borderColor: 'rgba(200, 0, 0, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});