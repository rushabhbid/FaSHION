$(document).ready(function(){
	$.ajax({
		url: "http://localhost/fashion/pie.php",
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
						backgroundColor: ['rgb(255, 245, 204)','rgb(0, 255, 255)','rgb(0, 255, 204)','rgb(255, 153, 255)','rgb(255, 255, 204)','rgb(153, 204, 255)',
						'rgb(255, 245, 204)','rgb(0, 255, 255)','rgb(0, 255, 204)','rgb(255, 153, 255)','rgb(255, 255, 204)','rgb(153, 204, 255)','rgb(255, 245, 204)',
						'rgb(0, 255, 255)','rgb(0, 255, 204)','rgb(255, 153, 255)','rgb(255, 255, 204)','rgb(153, 204, 255)'],
						borderColor: 'rgba(200, 0, 0, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas1");

			var barGraph = new Chart(ctx, {
				type: 'pie',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});