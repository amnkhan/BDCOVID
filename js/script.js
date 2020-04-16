jQuery(document).ready(function($) {
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });


    // Daily percentage calculation
    var confirmed_cases=[3,3,3,3,3,3,3,5,8,10,14,17,20,25,27,33,39,39,44,48,48,48,49,51,54,56,61,70,88,123,164,218,330,424,482,621,803,1011,1231,1572];

   

    var double_time = []; 

    function dbt (cases) {
    
    
    var last = cases[cases.length-1];
    var second_last=cases[cases.length-2];
    var x= last/second_last
    if(x==1){
        double_time.push(0)
        
    }
    else{
    int_part = Math.trunc(x); // 

    float_part = (x-int_part).toFixed(3)*100;  
        
    doub_time= Number(parseFloat((72/ float_part)).toFixed(2))
    
                                                    
    double_time.push(doub_time)
    
    }
    }
    dbt(confirmed_cases)
    console.log(double_time);

    var week_growth=[]
    function weekgr(cases){
    var last = cases[cases.length-1];
    var second_last=cases[cases.length-7];
    var x= last/second_last
    


    if (x<2){
            int_part = Math.trunc(x); // 
        float_part = Number(parseFloat((x-int_part)).toFixed(2))*100; 
        float_part=Math.floor(float_part)
        week_growth.push(float_part)
        
    }
    else if(x==0){
        week_growth.push(0)
    }
    else if(x==1){
        daily_growth_in.push(0)
    }
    else {
        
        int_part = (x)*100 // 
    int_part=Math.floor(int_part)
        week_growth.push(int_part)
    }
    
    }

    weekgr(confirmed_cases)
    
    console.log(week_growth)

    var daily_growth_in=[]
    function dailygri(cases){
    var last = cases[cases.length-1];
    var second_last=cases[cases.length-2];
    var x= last/second_last
    


    if (x<2){
            int_part = Math.trunc(x); // 
        float_part = Number((x-int_part).toFixed(2))*100; 
        float_part=Math.floor(float_part)
        daily_growth_in.push(float_part)
        
    }
    else if(x==0){
        daily_growth_in.push(0)
    }
    else if(x==1){
        daily_growth_in.push(0)
    }
    else {
        
        int_part = (x)*100 // 
        int_part=Math.floor(int_part)
        daily_growth_in.push(int_part)
    }
    
    }

    dailygri(confirmed_cases)
    
    console.log(daily_growth_in);

    // update the UI
    var doubling_time = document.querySelector('.doubling-time');
    var weekly_gr = document.querySelector('.weekly-gr');
    var daily_gr = document.querySelector('.daily-gr');
    var case_per_ml = document.querySelector('.case-per-ml');
    function updateUi () {
        doubling_time.innerHTML = `${double_time[0]} <span>দিন</span>`;
        weekly_gr.innerHTML = `<span>+</span>${week_growth[0]}<span>%</span>`;
        daily_gr.innerHTML = `<span>+</span>${daily_growth_in[0]}<span>%</span>`;
        case_per_ml.innerHTML = `${(confirmed_cases[confirmed_cases.length - 1] / 180).toFixed(2)} <span>জন</span>`
    }

    updateUi();
    console.log( double_time[0].toString())
});