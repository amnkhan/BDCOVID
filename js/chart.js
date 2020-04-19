
//cases over time plot 1
var  covidData = window.covidData,
     date = covidData.date,
     confirmed_cases=covidData.confirmed_cases,
     death=covidData.death,
     recovery=covidData.recovery;

var ac=[];


var active = {
  type: "scatter",
  mode: "lines",
  x: date,
  y: confirmed_cases,
  line: {color: '#7f5fce'},
  name: 'confirmed',
  fill: 'tozeroy'
}


var chart = {
  type: "scatter",
  mode: "lines",
  x: date,
  y: death,
  line: {color: ' #f11771'},
  
  name: 'death',
  fill: 'tozeroy'
}

var recovered = {
  type: "scatter",
  mode: "lines",
  x: date,
  y: recovery,
  line: {color: 'orange'},
  
  name: 'recovered',
  color:'#fff',
  fill: 'tozeroy',
}

var data = [active,chart,recovered];

// var layout = {
//   title: 'Custom Range',
//   xaxis: {
//     range: ['2020-03-08', '2020-03-24'],
//     type: 'date'
//   },
//   yaxis: {
//     autorange: true,
    
//     type: 'linear'
//   }
// };
  var layout = {
    color:'#000',
    xaxis:{
      
      range: ['2020-03-08', '2020-04-30'],
       type:'date',
      color:'#000'
    
    
  },
    yaxis: {
    autorange: true,
    range: [0,100],
    type: 'linear',
    color:'#fff'
  },
    plot_bgcolor:"white",
     paper_bgcolor:"white",
     xaxis: {
    title: {
      text: '',
      font: {
        family:  'Roboto',
        size: 18,
        color: '#000'
      },
      color:'#000'
    },
        color:'#000'
       
  },
  yaxis: {
    title: {
      text: '',
      font: {
        family: 'Roboto',
        size: 18,
        color: '#000'
      },
      color:'#000'
     
    },
    color:'#000'
  },
     legend: {
      font: {
        
        size: 12,
        color: '#000',
      },
    },
    
};
var config = {responsive: true}


Plotly.newPlot('chart1', data,layout,config);







// console.log(death.length,recovery.length,confirmed_cases.length,date.length)  
var new_cases=[];
for(let i = 0; i< confirmed_cases.length; i++) {
  new_cases.push(Math.abs(confirmed_cases[i+1] - confirmed_cases[i]));
}

// console.log(new_cases)  

var new_death=[];


for(let i = 0; i< death.length; i++) {
  new_death.push(Math.abs(death[i+1] - death[i]));
}



// console.log(new_death)


var trace1 = {
  x: date,
  y:new_cases,
  type: 'bar',
  name: 'new cases',
  marker: {
    color: '#e1ab0a',
    opacity: 0.7,
  }
};

var trace2 = {
  x: date,
  y:new_death,
  name: 'new death',
  type: 'bar',
  
  marker: {
    color: '#f11771',
    opacity: 0.7,
  }
};

var trace3 = {
  x: date,
  y:confirmed_cases,
  name: 'Confirmed Cases',
  type: 'scatter',
  
  marker: {
    color: 'grey',
    opacity: 0.7,
  }
};



var data = [trace1,trace2,];

var layout = {
  title: '',
  font: {
    family: 'Roboto',
    size: 14,
    color: '#7f7f7f'
  },
  xaxis: {
    tickangle: -45
  },
  barmode: 'group'
};
var config = {responsive: true}

Plotly.newPlot('chart3', data, layout,config);
