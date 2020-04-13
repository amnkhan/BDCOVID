//new case daily,new death and con case

var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,46,48,48,48,49,51,54,61,70,88,123];
var new_cases=[]
for(let i = 0; i< confirmed_cases.length; i++) {
  new_cases.push(Math.abs(confirmed_cases[i+1] - confirmed_cases[i]));
}

console.log(new_cases)  

var death=[0,0,0,0,0,0,0,0,0,1,1,1,2,2,3,4,5,5,5,5,5,5,5,6,6,8,9,12]

var new_death=[]

for(let i = 0; i< death.length; i++) {
  new_death.push(Math.abs(death[i+1] - death[i]));
}



console.log(new_death)

var date = ['2020-03-08','2020-03-09','2020-03-10','2020-03-11','2020-03-12','2020-03-13','2020-03-14','2020-03-15','2020-03-16','2020-03-17','2020-03-18','2020-03-19','2020-03-20','2020-03-21','2020-03-22','2020-03-23','2020-03-24','2020-03-25','2020-03-26','2020-03-27','2020-03-28','2020-03-29','2020-03-30','2020-03-31','2020-04-01','2020-04-02','2020-04-03','2020-4-04','2020-04-05','2020-04-06']

var trace1 = {
  x: date,
  y:new_cases,
  type: 'bar',
  name: 'new cases',
  marker: {
    color: 'orange',
    opacity: 0.7,
  }
};

var trace2 = {
  x: date,
  y:new_death,
  name: 'new death',
  type: 'bar',
  
  marker: {
    color: 'red',
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



var data = [trace1,trace2,trace3];

var layout = {
 
  xaxis: {
    tickangle: -45
  },
  barmode: 'group'
};
var config = {responsive: true}

Plotly.newPlot('chart1', data, layout,config);

// case mortality recover growth rate
var date = ['2020-03-08','2020-03-09','2020-03-10','2020-03-11','2020-03-12','2020-03-13','2020-03-14','2020-03-15','2020-03-16','2020-03-17','2020-03-18','2020-03-19','2020-03-20','2020-03-21','2020-03-22','2020-03-23','2020-03-24','2020-03-25','2020-03-26','2020-03-27','2020-03-28','2020-03-29','2020-03-30','2020-03-31','2020-04-01','2020-04-02','2020-04-03','2020-4-04','2020-04-05','2020-04-06']
var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,39,44,48,48,48,49,51,54,61,61,70,88,123];


var death=[0,0,0,0,0,0,0,0,0,1,1,1,2,2,3,4,5,5,5,5,5,5,5,6,6,6,8,9,12]
var recovery=[0,0,0,0,0,0,0,2,3,3,3,3,3,3,3,5,7,11,15,15,19,25,25,3,3,3,3,3]

console.log(death.length) 
// var treatment=[]
var cgra=[]
var tgra=[]



var cgra=confirmed_cases.map(function (value, index, elements) {
  
  var last = elements[index+1];
  var second_last=elements[index];
   var x = last/second_last;
 int_part = Math.trunc(x); // 
 float_part = Number((x-int_part).toFixed(2))*100; 
 return float_part
  
  
  cgra.push(float_part)
  
});
//  console.log(cgra)

var dgra = death.map(function(n, i) { return ((n / confirmed_cases[i])*100).toFixed(2)});

var dgra = dgra.map(num => Number(num));

// console.log(dgra)

// cg=confirmed_cases.map(function(value,index,elements) { return elements[index+1]});

// console.log(cg)

var rgra=recovery.map(function(n, i) { return ((n / confirmed_cases[i])*100).toFixed(2)});
var rgra= rgra.map(num => Number(num));



var trace1 = {
  x: date,
  y: cgra,
  mode: 'lines+markers',
  name: ' Case Growth Rate',
  // text: ['United States', 'Canada'],
  marker: {
    color: 'rgb(255,116,53)',
    size: 6,
    line: {
      color: 'white',
      width: 0.5
    }
  },
  type: 'scatter'
};

var trace2 = {
  x: date,
  y: rgra,
  mode: 'lines+markers',
  name: 'Recovery Rate',
  // text: ['Germany', 'Britain', 'France', 'Spain', 'Italy', 'Czech Rep.', 'Greece', 'Poland'],
  marker: {
    color: 'rgb(38,183,178)',
    size: 6
  },
  type: 'scatter'
};

var trace3 = {
  x: date,
  y: dgra,
  mode: 'lines+markers',
  name: 'Mortality Rate',
  // text: ['Australia', 'Japan', 'South Korea', 'Malaysia', 'China', 'Indonesia', 'Philippines', 'India'],
  marker: {
    color: 'rgb(39,147,182)',
    size: 6
  },
  type: 'scatter'
};



var data = [trace1,trace2, trace3];

var layout = {
  title: 'Covid-19 Bangladesh Daily Growth Rates',
  xaxis: {
    title: 'date',
    showgrid: false,
    zeroline: false
  },
  yaxis: {
    title: 'Percent %',
    showline: false,
     
  }
};
var config = {responsive: true}
Plotly.newPlot('chart2', data, layout,config);


//cases over time overlayed
var date = ['2020-03-08','2020-03-09','2020-03-10','2020-03-11','2020-03-12','2020-03-13','2020-03-14','2020-03-15','2020-03-16','2020-03-17','2020-03-18','2020-03-19','2020-03-20','2020-03-21','2020-03-22','2020-03-23','2020-03-24','2020-03-25','2020-03-26','2020-03-27','2020-03-28','2020-03-29','2020-03-30','2020-03-31','2020-04-01','2020-04-02','2020-04-03','2020-4-04','2020-04-05','2020-04-06']
var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,39,44,48,48,48,49,51,54,61,61,70,88,123];


var death=[0,0,0,0,0,0,0,0,0,1,1,1,2,2,3,4,5,5,5,5,5,5,5,6,6,6,8,9,12]
var recovery=[0,0,0,0,0,0,0,2,3,3,3,3,3,3,3,5,7,11,15,15,19,25,25,3,3,3,3,3]

var active = {
  type: "scatter",
  mode: "lines",
  x: date,
  y: confirmed_cases,
  line: {color: 'cyan'},
  name: 'confirmed',
  fill: 'tozeroy'
}


var death = {
  type: "scatter",
  mode: "lines",
  x: date,
  y: death,
  line: {color: 'red'},
  
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

var data = [active,death,recovered];

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
  title: {
    text:'Cases over time',
    font: {
      family: 'Courier New, monospace',
      size: 22,
      color:'#c8c8c8'
    },
  },
    color:'#c8c8c8',
    xaxis:{
      
      range: ['2020-03-08', '2020-04-30'],
       type:'date',
      color:'#c8c8c8'
    
    
  },
    yaxis: {
    autorange: true,
    range: [0,100],
    type: 'linear',
    color:'#fff'
  },
    plot_bgcolor:"black",
     paper_bgcolor:"black",
     xaxis: {
    title: {
      text: 'date',
      font: {
        family: 'Courier New, monospace',
        size: 18,
        color: '#fff'
      },
      color:'#fff'
    },
        color:'#fff'
       
  },
  yaxis: {
    title: {
      text: 'count',
      font: {
        family: 'Courier New, monospace',
        size: 18,
        color: '#fff'
      },
      color:'#fff'
     
    },
    color:'#fff'
  },
     legend: {
      font: {
        
        size: 12,
        color: '#fff',
      },
    },
    
};

var config = {responsive: true}
Plotly.newPlot('chart3', data,layout,config);
