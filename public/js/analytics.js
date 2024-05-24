document.addEventListener('DOMContentLoaded', function () {
    // Use the global variable defined in the Blade template
    var mostSoldItemsData = window.mostSoldItemsData;

    // Extract product names and total sold for the chart
    var productNames = mostSoldItemsData.map(item => item.product_name);
    var totalSold = mostSoldItemsData.map(item => item.total_sold);

    // Create a bar chart using Chart.js
    var ctx = document.getElementById('mostSoldItemsChart').getContext('2d');
    var mostSoldItemsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Total Sold',
                data: totalSold,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});