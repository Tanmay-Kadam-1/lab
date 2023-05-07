var xValues = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December",
];
var yValues = [127, 175, 191, 149, 193, 149, 113, 63, 81, 94, 64, 50];

new Chart("myChart", {
	type: "bar",
	data: {
		labels: xValues,
		datasets: [
			{
				backgroundColor: "#21A5B7",
				data: yValues,
			},
		],
	},
	options: {
		legend: { display: false },
		title: {
			display: true,
			text: "Last month Bill",
		},
	},
});

// Price Calculation
function calculateBill() {
	const units = document.getElementById("units").value;
	const result = document.getElementById("result");
	result.style.display = "block";
	let bill = 0;

	if (units <= 50) {
		bill = units * 3.5;
	} else if (units > 50 && units <= 150) {
		bill = 50 * 3.5 + (units - 50) * 4;
	} else if (units > 150 && units <= 250) {
		bill = 50 * 3.5 + 100 * 4 + (units - 150) * 5.2;
	} else if (units > 250) {
		bill = 50 * 3.5 + 100 * 4 + 100 * 5.2 + (units - 250) * 6.5;
	}

	document.getElementById("result").innerHTML = `Rs. ${bill.toFixed(2)}`;
}
