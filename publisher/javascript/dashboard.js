/* globals Chart:false, feather:false */

(() => {
    'use strict'

    feather.replace({'aria-hidden': 'true'})

    // Graphs
    const ctx = document.getElementById('myChart')

    // graphs values
    const numOfPublished = document.getElementsByClassName('chart-value')
    const labels = [];
    const data = []
    for (let i=0;i<numOfPublished.length;i++) {
        const json = JSON.parse(numOfPublished[i].innerHTML)
        labels.push(json['published_date'])
        data.push(json['count'])
    }

    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    })
})()
