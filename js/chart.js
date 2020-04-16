
//cases over time plot 1

var date = ['2020-03-08','2020-03-09','2020-03-10','2020-03-11','2020-03-12','2020-03-13','2020-03-14','2020-03-15','2020-03-16','2020-03-17','2020-03-18','2020-03-19','2020-03-20','2020-03-21','2020-03-22','2020-03-23','2020-03-24','2020-03-25','2020-03-26','2020-03-27','2020-03-28','2020-03-29','2020-03-30','2020-03-31','2020-04-01','2020-04-02','2020-04-03','2020-4-04','2020-04-05','2020-04-06','2020-04-07','2020-04-08','2020-04-09','2020-04-10','2020-04-11','2020-04-12','2020-04-13','2020-04-14','2020-04-15','2020-04-16']
var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,39,44,48,48,48,49,51,54,56,61,70,88,123,164,218,330,424,482,621,803,1011,1231,1572];


var death=[0,0,0,0,0,0,0,0,0,0,1,1,1,3,2,3,4,4,5,5,5,5,5,5,5,6,6,8,9,12,12,20,21,27,30,34,39,46,50,60]
var recovery=[0,0,0,0,0,0,0,0,2,3,3,3,3,3,5,5,5,7,11,11,15,19,25,25,25,26,33,33,33,33,33,33,33,33,36,39,42,42,49,49]

var ac=[]


var active = {
  type: "scatter",
  mode: "lines",
  x: date,
  y: confirmed_cases,
  line: {color: '#7f5fce'},
  name: 'confirmed',
  fill: 'tozeroy'
}


var death = {
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


//case,mortality,recov growth rate plot 2


var date = ['2020-03-08','2020-03-09','2020-03-10','2020-03-11','2020-03-12','2020-03-13','2020-03-14','2020-03-15','2020-03-16','2020-03-17','2020-03-18','2020-03-19','2020-03-20','2020-03-21','2020-03-22','2020-03-23','2020-03-24','2020-03-25','2020-03-26','2020-03-27','2020-03-28','2020-03-29','2020-03-30','2020-03-31','2020-04-01','2020-04-02','2020-04-03','2020-4-04','2020-04-05','2020-04-06','2020-04-07','2020-04-08','2020-04-09','2020-04-10','2020-04-11','2020-04-12','2020-04-13','2020-04-14','2020-04-15','2020-04-16']
var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,39,44,48,48,48,49,51,54,56,61,70,88,123,164,218,330,424,482,621,803,1011,1231,1572];


var death=[0,0,0,0,0,0,0,0,0,0,1,1,1,3,2,3,4,4,5,5,5,5,5,5,5,6,6,8,9,12,12,20,21,27,30,34,39,46,50,60]
var recovery=[0,0,0,0,0,0,0,0,2,3,3,3,3,3,5,5,5,7,11,11,15,19,25,25,25,26,33,33,33,33,33,33,33,33,36,39,42,42,49,49]

console.log(death.length,recovery.length,confirmed_cases.length,date.length)  
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
    color: '#e1ab0a',
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
    color: '#0abf54',
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
    color: '#f11771',
    size: 6
  },
  type: 'scatter'
};



var data = [trace1,trace2, trace3];

var layout = {
  title: '',
  font: {
    family: 'Roboto',
    size: 12,
    color: '#7f7f7f'
  },
  xaxis: {
    title: 'date',
    showgrid: false,
    zeroline: false,
  },
  yaxis: {
    title: 'Percent %',
    showline: false,
     
  }
};
var config = {responsive: true}
Plotly.newPlot('chart2', data, layout,config);

//daily cases daily date plot 3





var date = ['2020-03-08','2020-03-09','2020-03-10','2020-03-11','2020-03-12','2020-03-13','2020-03-14','2020-03-15','2020-03-16','2020-03-17','2020-03-18','2020-03-19','2020-03-20','2020-03-21','2020-03-22','2020-03-23','2020-03-24','2020-03-25','2020-03-26','2020-03-27','2020-03-28','2020-03-29','2020-03-30','2020-03-31','2020-04-01','2020-04-02','2020-04-03','2020-4-04','2020-04-05','2020-04-06','2020-04-07','2020-04-08','2020-04-09','2020-04-10','2020-04-11','2020-04-12','2020-04-13','2020-04-14','2020-04-15','2020-04-16']
var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,39,44,48,48,48,49,51,54,56,61,70,88,123,164,218,330,424,482,621,803,1011,1231,1572];


var death=[0,0,0,0,0,0,0,0,0,0,1,1,1,3,2,3,4,4,5,5,5,5,5,5,5,6,6,8,9,12,12,20,21,27,30,34,39,46,50,60]
var recovery=[0,0,0,0,0,0,0,0,2,3,3,3,3,3,5,5,5,7,11,11,15,19,25,25,25,26,33,33,33,33,33,33,33,33,36,39,42,42,49,49]

console.log(death.length,recovery.length,confirmed_cases.length,date.length)  
var new_cases=[]
for(let i = 0; i< confirmed_cases.length; i++) {
  new_cases.push(Math.abs(confirmed_cases[i+1] - confirmed_cases[i]));
}

console.log(new_cases)  

var new_death=[]


for(let i = 0; i< death.length; i++) {
  new_death.push(Math.abs(death[i+1] - death[i]));
}



console.log(new_death)


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
