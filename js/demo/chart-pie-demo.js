// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Lato', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["100 %", "+ 50%", "- 50%", "0%" ],
    datasets: [{
      data: arrayDataPendientes,
      backgroundColor: ['rgb(24, 188, 156)', 'rgb(52, 152, 219)', 'rgb(243, 156, 18)', 'rgb(231, 76, 60)'],
      hoverBackgroundColor: ['rgb(54, 188, 156)', 'rgb(72, 152, 219)', 'rgb(243, 156, 38)', 'rgb(251, 76, 60)'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
