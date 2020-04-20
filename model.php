
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163606663-1"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163606663-1');
	</script>
	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://bdcovid.com/model.html">
	<meta property="og:title" content="বিডি কোভিড - বাংলাদেশে করোনা সংক্রমনের SEIR মডেল ভিজ্যুয়ালাইজেশন">
	<meta property="og:description" content="বাংলাদেশে করোনা সংক্রমনের আপডেট এবং আক্রান্ত রোগীদের অবস্থান। বাংলাদেশের SEIR মডেল।">
	<meta property="og:image" content="https://bdcovid.com/images/model.png">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://bdcovid.com/model.html">
	<meta property="twitter:title" content="বিডি কোভিড - বাংলাদেশে করোনা সংক্রমনের SEIR মডেল ভিজ্যুয়ালাইজেশন">
	<meta property="twitter:description" content="বাংলাদেশে করোনা সংক্রমনের আপডেট এবং আক্রান্ত রোগীদের অবস্থান। বাংলাদেশের SEIR মডেল।">
	<meta property="twitter:image" content="https://bdcovid.com/images/model.png">
	<meta http-equiv="Content-Language" content="bn">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- SEIR MODEL JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.4"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.5/chartjs-plugin-annotation.js'></script>

	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

	<script src="js/plot_data.js"></script>
	<link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/model.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/f08dc14b37.js" crossorigin="anonymous"></script>

	<title>BD Covid - SEIR Model of Bangladesh</title>
	<meta name="description" content="SEIR Model for Bangladesh Covid19"/>
	<meta name="keywords" content="COVID19, Coronavirus, Bangladesh, seir model, seir model bangladesh, bangldesh seir model, coronavirus seir model bangladesh">
</head>

<body>

<!-- Navigation Section -->
<header  class="header-section">
	<!-- navbar section starts -->
	<nav class="navbar navbar-expand-md navbar-light">
		<div class="container">
			<!-- Brand/logo -->
			<a class="navbar-brand" href="index.html">বিডি কোভিড</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Links -->
				<ul class="navbar-nav ml-auto">
					<div class="navbar-nav">
						<a class="nav-item nav-link" href="index.php"><i class="fas fa-home"></i> হোম <span class="sr-only">(current)</span></a>
						<a class="nav-item nav-link active" href="model.php"><i class="fas fa-chart-line"></i> SEIR মডেল</a>
						<a class="nav-item nav-link" href="flatenthecurve.php"><i class="fas fa-virus"></i> ভাইরাস নিয়ন্ত্রন</a>
						<a class="nav-item nav-link" href="contact.php"><i class="fas fa-medkit"></i> জরুরী সহায়তা</a>
					</div>
				</ul>
			</div>
		</div>
	</nav>
	<!-- navbar section ends -->
</header>
<!-- Navigation Section ends -->


<!-- SEIR Model Section -->
<section class="seir-model-section">
	<div class="container">
		<div class="row seir-model-wrapper">
			<div class="col-md-12">
				<h2>বাংলাদেশের করোনা ভাইরাস মহামারীর সিমুলেশন</h2>
				<p><b>Disclaimer:</b> এই সিমুল্যাশনটি শুধুমাত্র গবেষণা , শিক্ষামুলক ও গনসচেতনতার উদ্দেশ্যে তৈরি করা , এটা কখনো decision-making (নীতি -নির্ধারণ) করার টুল না। Covid-19 এর সংক্রমণ ও ট্রান্সমিশন নিয়ে অনেক অনিশ্চয়তা রয়েছে , এই সাধারণ মডেলটির ও সীমাবদ্ধতা রয়েছে। লেখক এই মডেলের নির্ভুলতা , ব্যবহারযোগ্যতা, বণিকযোগ্যতা, যেকোন বিশ্লেষণ, ও উপস্থাপনার ওয়্যারেন্টি দিতে অস্বীকার করেছেন।</p>
				<p class="d-xs-block d-md-none"><b>বিঃদ্রঃ মডেলটি পূর্ণাঙ্গ ভাবে দেখতে কম্পিউটার থেকে ভিসিট করার অনুরোধ করা হচ্ছে। মোবাইলে মডেলের সব ফিচার কাজ নাও করতে পারে।</b></p>
			</div>

			<!-- chart-controls -->
			<div class="col-md-3 mt-5">

				<!-- chart controls -->
				<h3>Chart controls</h3>
				<div class="control">
					<input type="checkbox" id="check_log_y" onchange="setLogYAxis(this.checked)">Log-scale y-axis</input>
				</div>

				<div class="control">
					<button type="button" class="small" id="reset_zoom" onclick="resetZoom()">Zoom to fit data</button>
				</div>


				<hr style="margin-top:10px;">


				<h3>Simulation controls</h3>
				<div class="control full">
					<input class="control" type="range" id="slider_finalT" onmousemove="updateParameters()" min=5 max=50 step=1></input>
					<br><div class="small">Predict for <span id="slider_finalT_value"></span> days</div>
				</div>

				<div class="control full">
					<input class="control" type="range" id="slider_b1" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
					<br><div class="small">Transmission rate \(\beta_1\) =
						<span id="slider_b1_value"></span>
						<span class="tiny tooltiptext">সংক্রমণ  mildly infected থেকে susceptible (সংবেদনশীল) ব্যক্তিদের </span>
					</div>
				</div>

				<div class="control full">
					<input class="control" type="range" id="slider_b2" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
					<br><div class="small">Transmission rate \(\beta_2\) =
						<span id="slider_b2_value"></span>
						<span class="tiny tooltiptext">সংক্রমণ মারাত্মকভাবে সংক্রমিত থেকে susceptible (সংবেদনশীল) ব্যক্তিদের  </span>
					</div>
				</div>

				<div class="control full">
					<input class="control" type="range" id="slider_b3" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
					<br><div class="small">Transmission rate \(\beta_3\) =
						<span id="slider_b3_value"></span>
						<span class="tiny tooltiptext">সংক্রমণ সংকটপূর্ণভাবে সংক্রমিত  থেকে susceptible (সংবেদনশীল) ব্যক্তিদের </span>
					</div>
				</div>

				<div class="control full">
					<input class="control" type="range" id="slider_c" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
					<br><div class="small">Reported fraction \(c\) =
						<span id="slider_c_value"></span>
						<span class="tiny tooltiptext"> যতগুলো mildy infected cases রিপোর্ট করা হয়েছে এর ভগ্নাংশ</span>
					</div>
				</div>

				<!-- <div class="control">
					<br>
					<button type="button" class="small" id="btn_optimize" onclick="optimizeParameters()">Optimize parameters to data</button>
				</div> -->

			</div>
			<!-- chart-controls ends -->

			<!-- model -->
			<div class="col-md-9 mt-5">
				<div id="canvas_container">
					<canvas class="full" id="chart_canvas"></canvas>
					<div class="teeny" id="legend" style="width:23em;">
						<center><b></b></center>
						<div class="clearfix">
							<div class="legend_column" style="width:50%; padding-right:5px;">
								<b><div id="legend_date" style="padding-bottom:5px"></div></b>
								<div class="exposed">Exposed</div>
								<div class="asymptomatic"> Asymptomatic</div>
								<div class="mild_hidden"> Mild - unreported</div>
								<div class="recovered_hidden">Recovered- unreported</div>
								<hr>
								<div class="recovered">Recovered</div>
								<div class="infected">Infected diagnosed</div>
								<div class="mild" style="text-indent:1em;">- Mild</div>
								<div class="severe" style="text-indent:1em;">- Severe</div>
								<div class="critical" style="text-indent:1em;">- Critical</div>
								<div>Fatal</div>
								<hr>
								<div>Total cases</div>
							</div>
							<div class="legend_column" style="width:25%; padding-right:5px;">
								<b><div class="legend_value" style="padding-bottom:5px">Predicted</div></b>
								<div class="legend_value exposed" id="legend_pred1">0</div>
								<div class="legend_value asymptomatic" id="legend_pred2">0</div>
								<div class="legend_value mild_hidden" id="legend_pred3">0</div>
								<div class="legend_value recovered_hidden" id="legend_pred4">0</div>
								<hr>
								<div class="legend_value recovered" id="legend_pred5">0</div>
								<div class="legend_value infected" id="legend_pred_infected">0</div>
								<div class="legend_value mild" id="legend_pred6">0</div>
								<div class="legend_value severe" id="legend_pred7">0</div>
								<div class="legend_value critical" id="legend_pred8">0</div>
								<div class="legend_value" id="legend_pred9">0</div>
								<hr>
								<div class="legend_value" id="legend_pred_total">0</div>
							</div>
							<div class="legend_column" style="width:25%;">
								<b><div class="legend_value" style="padding-bottom:5px">Actual</div></b>
								<div class="legend_value exposed">-</div>
								<div class="legend_value asymptomatic">-</div>
								<div class="legend_value mild_hidden">-</div>
								<div class="legend_value recovered_hidden">-</div>
								<hr>
								<div class="legend_value recovered" id="legend_true_recovered">0</div>
								<div class="legend_value infected" id="legend_true_infected">0</div>
								<div class="legend_value mild">-</div>
								<div class="legend_value severe">-</div>
								<div class="legend_value critical">-</div>
								<div class="legend_value" id="legend_true_fatal">0</div>
								<hr>
								<div class="legend_value" id="legend_true_total">0</div>
							</div>
						</div>
					</div>
				</div>

				<canvas class="full" id="control_chart_canvas"></canvas>

				<div class="control full">
					<div class="control full">
						<center>
                                <span id="container_interv0">
                                <input class="control intervention" type="range" id="slider_interv0_T" onmousemove="updateParameters(true)" min=1 max=30 step=1></input>
                                <span><input type="checkbox" id="check_interv0" onchange="updateInterventions(0)" checked></input></span>
                                <span class="small">Add intervention on day</span>
                                <span class="small" id="slider_interv0_T_value"></span>
                                <span class="small"> to change \(\beta_1\) to </span>
                                <span id="slider_interv0_b1_value"></span>
                                <input class="block" type="range" id="slider_interv0_b1" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
                                </span>
						</center>
					</div>

					<div class="control full" style="margin-top:20px;">
						<center>
                                <span id="container_interv1" style="color:grey">
                                <input class="control intervention" type="range" id="slider_interv1_T" onmousemove="updateParameters(true)" min=1 max=30 step=1 disabled=true></input>
                                <span><input type="checkbox" id="check_interv1" onchange="updateInterventions(1)"></input></span>
                                <span class="small">Add intervention on day</span>
                                <span class="small" id="slider_interv1_T_value"></span>
                                <span class="small"> to change \(\beta_1\) to </span>
                                <span id="slider_interv1_b1_value"></span>
                                <input class="block" type="range" id="slider_interv1_b1" onmousemove="updateParameters()" min=0 max=1 step=0.01 disabled=true></input>
                                </span>
						</center>
					</div>
					<!-- lockdown percentafe -->
					<div>
						<p id="intervention">Intervention এর পর  লেখক  ধরে নিয়েছেন সংক্রমণের হার \(\beta_1\) Baseline 0.85  থেকে  ৬৫% কমে 0.30 হবে। Baseline সংক্রমণের হার ( \(\beta_1\) ) 0.85  থেকে সংক্রমণের হার \(\beta_1\) ৫০% ,৪০% ,৩০% ,২৫% ,২০% কমলে \(\beta_1\) এর মান হবে যথাক্রমে 0.42 , 0.51 ,0.59 , 0.63 ,0.68। কঠোরভাবে Intervention করা হলে \(\beta_1\) (সংক্রমনের হার) ৮৫% কমে 0.13 হবে।</p>
					</div>
				</div>
			</div>

			<!-- article -->
			<div class="col-md-12 mt-5">
				<p>কোভিড-১৯ মহামারী পুরো বাংলাদেশের জীবন-যাপন কে ব্যহত করেছে । এই লেখাটি লিখার সময় পুরো দেশ লক-ডাউন হয়ে আছে । এখন পর্যন্ত ,সরকারী হস্তক্ষেপের(Intervention) ফলে রোগটির বিস্তারের হার মনে হচ্ছে স্থির হয়ে আসছে। যাইহোক , এখনো আমরা বলতে পারছি না ভবিষতে আমাদের জন্য কি অপেক্ষা করছে , যখন Intervention(ছোঁয়াচে রোগের বিস্তার রোধে যেইসব পদক্ষেপ নেয়া হয়েছিলো যেমন লক-ডাউন, কারফিউ ) পরিবর্তন হয়ে যাবে। ক্লাসিকাল SEIR(Susceptible → Exposed → Infected → Removed (যেমন সুস্থ ও মৃত্যু) মডেল ব্যবহার করে এই Interactive টুলের মাধ্যমে আমরা বাংলাদেশের কোভিড-১৯ রোগটির বিস্তারের মডেল বুঝার চেষ্টা করেছি । আমরা বাংলাদেশের জন্য এই মডেলের প্যারামিটার গুলো পরিবর্তন করেছি।</p>
				<p>SEIR মডেল একটি জনপ্রিয় epidemiological compartmental মডেল, compartmental মডেল বলার কারণ হলো এই মডেল টি পুরো জনসংখ্যা কে কিছু নির্দিষ্ট compartments এ ভাগ করে থাকে, এই মডেলটি মডেল করার চেষ্টা করে কিভাবে একটি রোগ একটি নির্দিষ্ট জনসংখ্যাতে ছড়াতে পারে । যখন কোন একটি ভাইরাল রোগ(মহামারী) একটি নির্দিষ্ট জনসংখ্যায় পরিচিত হয় তখন পুরো জনসংখ্যাকে আমরা ৪ ভাগে ভাগ করতে পারি , Susceptible (অর্থাৎ এই রোগ হতে আক্রান্ত হতে পারে , প্রথমে পুরো জনসংখ্যা Susceptible অবস্থায় থাকে ) , Exposed (রোগটি কোন ব্যক্তি কে আক্রমণ করেছে , কিন্তু তার লক্ষণ দেখা দিচ্ছে না কারণ রোগটি তার Incubation অবস্থায় আছে) , Infected (ব্যক্তি পুরোপুরি ভাবে আক্রান্ত) , Removed (আক্রান্ত ব্যক্তি সুস্থ হয়েছেন অথবা মারা গেছেন)। SEIR মডেল কোন রোগের বিস্তার(spread) সিমুল্যাট করার জন্য একটি আদর্শায়িত মডেল যা এখন ফ্রন্টলাইন গবেষণাতে ব্যবহার হচ্ছে [<a href="https://www.thelancet.com/journals/lancet/article/PIIS0140-6736(20)30260-9/fulltext" id="wu" target="_blank">Wu, et. al</a>, <a href="https://cmmid.github.io/topics/covid19/current-patterns-transmission/wuhan-early-dynamics.html" id="k" target="_blank"> Kucharski et. al</a>].</p>
			</div>

			<div class="col-md-6 mt-5">
				<h2>মডেল এর বিস্তারিত</h2>
				<p>আমাদের মডেল এ পুরো জনসংখ্যা কে নিচের clases (শ্রেণী) গুলোতে বিভক্ত করা হয়েছে</p>
				<ul>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="10" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D446 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>S</mi></math></mjx-assistive-mml></mjx-container> - Susceptible individuals (সংবেদনশীল ব্যক্তিগণ )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="11" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> - Exposed individuals before they become infectious (আক্রান্ত হওয়ার পূর্বে যারা exposed হয়েছে )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="12" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> - Exposed individuals after they are infectious (আক্রান্ত হওয়ার পরে যারা  exposed হয়েছে)</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="13" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> - Asymptomatic individuals (যাদের কোন লক্ষণ দেখা দেয়নি )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="14" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals with mild symptoms (হালকা লক্ষণ নিয়ে আক্রান্ত ব্যক্তি )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="15" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-texatom size="s" texclass="ORD"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi></mjx-texatom></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mrow><mn>1</mn><mi>Q</mi></mrow></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals with mild symptoms who were directly quarantined upon entry (হালকা লক্ষণ নিয়ে আক্রান্ত ব্যক্তি যাদের কে কোয়ারিন্টেনে রাখা হয়েছে দেশে প্রবেশের পর )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="16" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>2</mn></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals with severe symptoms (require hospitalization) (তীব্র লক্ষণ নিয়ে আক্রান্ত ব্যক্তি যাদের কে হাসপাতালে ভর্তি করা প্রয়োজন )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="17" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c33"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>3</mn></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals at critical stage (require ICU admission)(আক্রান্ত ব্যক্তি যাদের অবস্থা সংকটপূর্ণ (ICU তে ভর্তি হওয়া প্রয়োজন ))</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="18" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D43B TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>H</mi></msub></math></mjx-assistive-mml></mjx-container> - Recovered individuals that have not been tested (সুস্থ ব্যক্তিগন যাদের টেস্ট করা হয়নি )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="19" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D437 TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>D</mi></msub></math></mjx-assistive-mml></mjx-container> - Recovered individuals that were diagnosed positive ( আক্রান্ত হওয়ার পরে যারা সুস্থ হয়েছেন )</li>
					<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="20" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D437 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>D</mi></math></mjx-assistive-mml></mjx-container> - Fatalities (মৃত্যু )</li>
				</ul>
			</div>
			<div class="col-md-6 mt-5 text-center">
				<img src="images/model_schematic.png" style="width:100%">
				<figcaption class="tiny" style="margin-top:10px;">Schematic of model classes and rate parameters</figcaption>
			</div>
			<div class="col-md-12 mt-5">
				<p>
					<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="21" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>1</mn></msub><mo>,</mo><msub><mi>I</mi><mn>0</mn></msub><mo>,</mo><msub><mi>I</mi><mn>1</mn></msub><mo>,</mo><msub><mi>I</mi><mn>2</mn></msub><mo>,</mo></math></mjx-assistive-mml></mjx-container> ও<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="22" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c33"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>3</mn></msub></math></mjx-assistive-mml></mjx-container> classes (শ্রেণী)  এর আক্রান্ত ব্যক্তিদের  হতে  রোগটি Susceptible individuals (সংবেদনশীল ব্যক্তিদের) সংস্পর্শে আসে  । তারপর তারা Exposed শ্রেণী <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="23" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> তে চলে যায় Incubation period এর পর (যা প্রায় ~ ৩  দিন )  , তারা আক্রান্ত হয়  <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="24" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> শ্রেণীতে । E1 শ্রেণী হতে তারা হয় ৩০% সম্ভব্যতা নিয়ে asymptomatic class (আক্রান্ত কিন্তু কোনো লক্ষণ দেখা দিচ্ছে না  ) <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="25" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> তে যাবে , অথবা ৭০% সম্ভব্যতা নিয়ে mild symptomatic class ( হালকা লক্ষণ  ) <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="26" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> এ যাবে ।
				</p>
				<p>
					বিভিন্ন গবেষণা অনুসারে(<a href="https://docs.google.com/spreadsheets/d/1uJHvBubps9Z2Iw_-a_xeEbr3-gci6c475t1_bBVkarc/edit#gid=0" target="_blank" id="lit">লিটারেচার </a>) , প্রায় ৮১% symptomatic ব্যক্তি ,  mild symptoms  নিয়ে ( প্রায় ৬ দিন ) পর সুস্থ হয়ে উঠেন ফলে Recovered class (<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="27" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>R</mi></math></mjx-assistive-mml></mjx-container>) এ চলে যান। <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="28" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container>  হতে বাকি ১৯% severe symtoms (তীব্র লক্ষণ) তৈরি করে <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="29" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>2</mn></msub></math></mjx-assistive-mml></mjx-container> class e চলে যায়। ওইসব severe cases এর জন্য hospitalization এর প্রয়োজন হয় । <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="30" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>2</mn></msub></math></mjx-assistive-mml></mjx-container> হতে তিন-চতুর্থাংশ  (৭৫% ) ব্যক্তি hospitalization (প্রায় ৪ দিন) পর সুস্থ হয়ে উঠেন । আর বাকি এক-চতুর্থাংশ (২৫% ) ব্যক্তির অবস্থা খুব ক্রিটিকাল হয় তাদের জন্য ICU Treatment প্রয়োজন হয় । এই critical-cases গুলোর ৪০% হলো fatal বা মারাত্মক( তারা মারা যেতে পারেন ) বাকিরা ICU ট্রিটমেন্ট এর পরে সুস্থ হয়ে উঠেন (প্রায় ১০ দিন পর) । এই সব পরিসংখ্যানগুলো চীনের covid-19 মহামারির উপর  পাবলিশেড গবেষণা হতে এসেছে আর এই নম্বরগুলো rate  parameters <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="31" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D44E TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D44E TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="2"><mjx-c class="mjx-c1D453 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c33"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D45D TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D45D TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>a</mi><mn>0</mn></msub><mo>,</mo><msub><mi>a</mi><mn>1</mn></msub><mo>,</mo><mi>f</mi><mo>,</mo><msub><mi>γ</mi><mn>0</mn></msub><mo>,</mo><msub><mi>γ</mi><mn>1</mn></msub><mo>,</mo><msub><mi>γ</mi><mn>2</mn></msub><mo>,</mo><msub><mi>γ</mi><mn>3</mn></msub><mo>,</mo><msub><mi>p</mi><mn>1</mn></msub><mo>,</mo><msub><mi>p</mi><mn>2</mn></msub><mo>,</mo></math></mjx-assistive-mml></mjx-container> and <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="32" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D707 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>μ</mi></math></mjx-assistive-mml></mjx-container> হিসেব করতে ব্যবহার করা হয়েছে  ।
				</p>
				<p>

					অনেকসময়  হালকা লক্ষণ দেখা দিলে হাসপাতালে ভর্তি হওয়ার প্রয়োজন হয় না , তুবুও  অনেকে  (সবাই না )  হালকা লক্ষণ (mild symtoms) নিয়ে হাসপাতালে ভর্তি হচ্ছে । ফলে আমরা একটি কঠোর ক্রাইটেরিয়া ধরে নিতে পারি যে সকল পটেনশিয়াল বা সম্ভাব্য <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="33" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> Clases Tested হচ্ছে না । অতএব <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="34" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D450 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>c</mi></math></mjx-assistive-mml></mjx-container> এর কিছু অংশ <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="35" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> হতে recovered-diagnosed class (<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="36" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D437 TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>D</mi></msub></math></mjx-assistive-mml></mjx-container>) তে চলে যান । undiagnosed অংশ  <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="37" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mo class="mjx-n"><mjx-c class="mjx-c28"></mjx-c></mjx-mo><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2212"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D450 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n"><mjx-c class="mjx-c29"></mjx-c></mjx-mo></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mo stretchy="false">(</mo><mn>1</mn><mo>−</mo><mi>c</mi><mo stretchy="false">)</mo></math></mjx-assistive-mml></mjx-container>  recovered-hidden class,<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="38" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D43B TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>H</mi></msub></math></mjx-assistive-mml></mjx-container> এ  যায় । এইসব hideen কেস গুলো কখনো রিপোর্ট হয় না কিন্তু এই class এর ব্যক্তিরা Infected Stage এ গিয়ে ভাইরাস টি ছড়ায় । এই মডেলে বাংলাদেশের জন্য Reported fraction ধরে নেয়া  হয়েছে ১৪%  আর  undocumented অথবা undiagnosed fraction ধরে নেয়া হয়েছে ৮৬ % ( <a href="https://science.sciencemag.org/content/early/2020/03/24/science.abb3221" target="_blank" id="quilty"> Li et al.</a>) গবেষণা অনুযায়ী
				</p>
				<p>

					তারপর আমাদের আর একটি গুরুত্বপূর্ণ অংশ হলো আক্রান্ত ব্যক্তিরা ( যারা দেশে এসে Tested positive হয়েছেন ) যাদেরকে কোঠোর ভাবে কোয়ারেন্টিনে রাখা হয়েছে যাতে করে তারা অন্যদের আক্রান্ত করতে না পারে । ওইসব quarantined index ব্যক্তিদের জন্য আমরা আলাদা একটি class তৈরি করেছি যা হলো <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="39" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-texatom size="s" texclass="ORD"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi></mjx-texatom></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mrow><mn>1</mn><mi>Q</mi></mrow></msub></math></mjx-assistive-mml></mjx-container> । আমারা ধরে নিয়েছি যে তারা mildly infected stage (<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="40" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-texatom size="s" texclass="ORD"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi></mjx-texatom></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mrow><mn>1</mn><mi>Q</mi></mrow></msub></math></mjx-assistive-mml></mjx-container>) অবস্থায় দেশে প্রবেশ করেছে , যদিও এটা সম্ভব যে তারা সম্পূর্ণ exposed অবস্থায় ( রোগটি ব্যক্তির সংস্পর্শে এসেছে ) । Quilty  et al.(<a href="https://www.ncbi.nlm.nih.gov/pubmed/32046816" target="_blank" id="quilty"> Quilty  et al.</a>)) হিসাব অনুযায়ী  ৪৬% ( 95% confidence interval: ৩৬ থেকে  ৫৮ ) কোভীড-১৯ এ আক্রান্ত ব্যক্তিরা এয়ারপোর্ট এ থার্মাল স্ক্রিনিং এ ডিটেক্ট হবে না ,যা নির্ভর করে Incubation Period ( লক্ষণ প্রকাশ পাওয়ার পর্যায়কাল), sensitivity of exit, entry screening ও proportion  of asymptomatic cases উপর ।  যখন আমরা মডেল রান করি , আমরা মোট  জনসংখ্যার সাথে তাদের সংখ্যা যোগ করে দিয়েছি যেইদিন তারা Tested পজিটিভ হয়েছেন ।
				</p>
			</div>
			<div class="col-md-12 mt-4">
				<h2>তথ্য সূত্র</h2>
				<p>
					<a href="https://www.iedcr.gov.bd/" target="_blank">Situation reports</a> - IEDCR,Bangladesh
					<br><br>
					<a href="https://alhill.shinyapps.io/COVID19seir/" target="_blank">COVID-10 modeling app by Allison Hill</a>
				</p>
			</div>
			<div class="col-md-12 mt-4">
				<h2>কৃতজ্ঞতা</h2>
				<p>
					Classical SEIR মডেলটি modified ভার্সনটি  তৈরি করেছেন দুশান ওয়াড্ডুয়েজ( হার্ভার্ড বিশ্ববিদ্যালয় ), সাবিত্রু জয়সিংহে (এমআইটি ), ও সুনেথ আগমপোদি ( ইয়েল বিশ্ববিদ্যালয়) । বাংলাদেশের জন্য মডেলটির paramters নির্ধারণ ও Modified SEIR মডেলটি ফিট করেছেন আল-ইকরাম ইলাহি হদয় ( চট্রগ্রাম বিশ্ববিদ্যালয়)। কোন এপিডেমোলজিস্ট  এক্সপার্ট লেখকের প্রতি এই মডেল নিয়ে  কোন পরামর্শ থাকলে  তাহলে অনুগ্রহপূর্বক লেখক কে মেইল করুন (aliqramalaheehridoy@gmail.com) এই ঠিকানায়।
					<br><br>

				</p>
			</div>
			<!-- article ends -->
		</div>
	</div>
</section>
<!-- SEIR Model Section Ends -->



<!-- footer section -->
<footer class="footer-section">
	<div class="container">
		<div class="r<!DOCTYPE html>
<html lang="en">
		<head>
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163606663-1"></script>
			<script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-163606663-1');
			</script>
			<!-- Open Graph / Facebook -->
			<meta property="og:type" content="website">
			<meta property="og:url" content="https://bdcovid.com/model.html">
			<meta property="og:title" content="বিডি কোভিড - বাংলাদেশে করোনা সংক্রমনের SEIR মডেল ভিজ্যুয়ালাইজেশন">
			<meta property="og:description" content="বাংলাদেশে করোনা সংক্রমনের আপডেট এবং আক্রান্ত রোগীদের অবস্থান। বাংলাদেশের SEIR মডেল।">
			<meta property="og:image" content="https://bdcovid.com/images/model.png">

			<!-- Twitter -->
			<meta property="twitter:card" content="summary_large_image">
			<meta property="twitter:url" content="https://bdcovid.com/model.html">
			<meta property="twitter:title" content="বিডি কোভিড - বাংলাদেশে করোনা সংক্রমনের SEIR মডেল ভিজ্যুয়ালাইজেশন">
			<meta property="twitter:description" content="বাংলাদেশে করোনা সংক্রমনের আপডেট এবং আক্রান্ত রোগীদের অবস্থান। বাংলাদেশের SEIR মডেল।">
			<meta property="twitter:image" content="https://bdcovid.com/images/model.png">
			<meta http-equiv="Content-Language" content="bn">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
			<link rel="icon" href="images/favicon.ico" type="image/x-icon">
			<!-- SEIR MODEL JS -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
			<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.4"></script>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.5/chartjs-plugin-annotation.js'></script>

			<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
			<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

			<script src="js/plot_data.js"></script>
			<link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<!-- Style CSS -->
			<link rel="stylesheet" href="css/model.css">
			<link rel="stylesheet" href="css/style.css">

			<!-- Font Awesome -->
			<script src="https://kit.fontawesome.com/f08dc14b37.js" crossorigin="anonymous"></script>

			<title>BD Covid - SEIR Model of Bangladesh</title>
			<meta name="description" content="SEIR Model for Bangladesh Covid19"/>
			<meta name="keywords" content="COVID19, Coronavirus, Bangladesh, seir model, seir model bangladesh, bangldesh seir model, coronavirus seir model bangladesh">
		</head>

		<body>

		<!-- Navigation Section -->
		<header  class="header-section">
			<!-- navbar section starts -->
			<nav class="navbar navbar-expand-md navbar-light">
				<div class="container">
					<!-- Brand/logo -->
					<a class="navbar-brand" href="index.html">বিডি কোভিড</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Links -->
						<ul class="navbar-nav ml-auto">
							<div class="navbar-nav">
								<a class="nav-item nav-link" href="index.html"><i class="fas fa-home"></i> হোম <span class="sr-only">(current)</span></a>
								<a class="nav-item nav-link active" href="model.html"><i class="fas fa-chart-line"></i> SEIR মডেল</a>
								<a class="nav-item nav-link" href="flatenthecurve.html"><i class="fas fa-virus"></i> ভাইরাস নিয়ন্ত্রন</a>
								<a class="nav-item nav-link" href="contact.html"><i class="fas fa-medkit"></i> জরুরী সহায়তা</a>
							</div>
						</ul>
					</div>
				</div>
			</nav>
			<!-- navbar section ends -->
		</header>
		<!-- Navigation Section ends -->


		<!-- SEIR Model Section -->
		<section class="seir-model-section">
			<div class="container">
				<div class="row seir-model-wrapper">
					<div class="col-md-12">
						<h2>বাংলাদেশের করোনা ভাইরাস মহামারীর সিমুলেশন</h2>
						<p><b>Disclaimer:</b> এই সিমুল্যাশনটি শুধুমাত্র গবেষণা , শিক্ষামুলক ও গনসচেতনতার উদ্দেশ্যে তৈরি করা , এটা কখনো decision-making (নীতি -নির্ধারণ) করার টুল না। Covid-19 এর সংক্রমণ ও ট্রান্সমিশন নিয়ে অনেক অনিশ্চয়তা রয়েছে , এই সাধারণ মডেলটির ও সীমাবদ্ধতা রয়েছে। লেখক এই মডেলের নির্ভুলতা , ব্যবহারযোগ্যতা, বণিকযোগ্যতা, যেকোন বিশ্লেষণ, ও উপস্থাপনার ওয়্যারেন্টি দিতে অস্বীকার করেছেন।</p>
						<p class="d-xs-block d-md-none"><b>বিঃদ্রঃ মডেলটি পূর্ণাঙ্গ ভাবে দেখতে কম্পিউটার থেকে ভিসিট করার অনুরোধ করা হচ্ছে। মোবাইলে মডেলের সব ফিচার কাজ নাও করতে পারে।</b></p>
					</div>

					<!-- chart-controls -->
					<div class="col-md-3 mt-5">

						<!-- chart controls -->
						<h3>Chart controls</h3>
						<div class="control">
							<input type="checkbox" id="check_log_y" onchange="setLogYAxis(this.checked)">Log-scale y-axis</input>
						</div>

						<div class="control">
							<button type="button" class="small" id="reset_zoom" onclick="resetZoom()">Zoom to fit data</button>
						</div>


						<hr style="margin-top:10px;">


						<h3>Simulation controls</h3>
						<div class="control full">
							<input class="control" type="range" id="slider_finalT" onmousemove="updateParameters()" min=5 max=50 step=1></input>
							<br><div class="small">Predict for <span id="slider_finalT_value"></span> days</div>
						</div>

						<div class="control full">
							<input class="control" type="range" id="slider_b1" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
							<br><div class="small">Transmission rate \(\beta_1\) =
								<span id="slider_b1_value"></span>
								<span class="tiny tooltiptext">সংক্রমণ  mildly infected থেকে susceptible (সংবেদনশীল) ব্যক্তিদের </span>
							</div>
						</div>

						<div class="control full">
							<input class="control" type="range" id="slider_b2" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
							<br><div class="small">Transmission rate \(\beta_2\) =
								<span id="slider_b2_value"></span>
								<span class="tiny tooltiptext">সংক্রমণ মারাত্মকভাবে সংক্রমিত থেকে susceptible (সংবেদনশীল) ব্যক্তিদের  </span>
							</div>
						</div>

						<div class="control full">
							<input class="control" type="range" id="slider_b3" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
							<br><div class="small">Transmission rate \(\beta_3\) =
								<span id="slider_b3_value"></span>
								<span class="tiny tooltiptext">সংক্রমণ সংকটপূর্ণভাবে সংক্রমিত  থেকে susceptible (সংবেদনশীল) ব্যক্তিদের </span>
							</div>
						</div>

						<div class="control full">
							<input class="control" type="range" id="slider_c" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
							<br><div class="small">Reported fraction \(c\) =
								<span id="slider_c_value"></span>
								<span class="tiny tooltiptext"> যতগুলো mildy infected cases রিপোর্ট করা হয়েছে এর ভগ্নাংশ</span>
							</div>
						</div>

						<!-- <div class="control">
							<br>
							<button type="button" class="small" id="btn_optimize" onclick="optimizeParameters()">Optimize parameters to data</button>
						</div> -->

					</div>
					<!-- chart-controls ends -->

					<!-- model -->
					<div class="col-md-9 mt-5">
						<div id="canvas_container">
							<canvas class="full" id="chart_canvas"></canvas>
							<div class="teeny" id="legend" style="width:23em;">
								<center><b></b></center>
								<div class="clearfix">
									<div class="legend_column" style="width:50%; padding-right:5px;">
										<b><div id="legend_date" style="padding-bottom:5px"></div></b>
										<div class="exposed">Exposed</div>
										<div class="asymptomatic"> Asymptomatic</div>
										<div class="mild_hidden"> Mild - unreported</div>
										<div class="recovered_hidden">Recovered- unreported</div>
										<hr>
										<div class="recovered">Recovered</div>
										<div class="infected">Infected diagnosed</div>
										<div class="mild" style="text-indent:1em;">- Mild</div>
										<div class="severe" style="text-indent:1em;">- Severe</div>
										<div class="critical" style="text-indent:1em;">- Critical</div>
										<div>Fatal</div>
										<hr>
										<div>Total cases</div>
									</div>
									<div class="legend_column" style="width:25%; padding-right:5px;">
										<b><div class="legend_value" style="padding-bottom:5px">Predicted</div></b>
										<div class="legend_value exposed" id="legend_pred1">0</div>
										<div class="legend_value asymptomatic" id="legend_pred2">0</div>
										<div class="legend_value mild_hidden" id="legend_pred3">0</div>
										<div class="legend_value recovered_hidden" id="legend_pred4">0</div>
										<hr>
										<div class="legend_value recovered" id="legend_pred5">0</div>
										<div class="legend_value infected" id="legend_pred_infected">0</div>
										<div class="legend_value mild" id="legend_pred6">0</div>
										<div class="legend_value severe" id="legend_pred7">0</div>
										<div class="legend_value critical" id="legend_pred8">0</div>
										<div class="legend_value" id="legend_pred9">0</div>
										<hr>
										<div class="legend_value" id="legend_pred_total">0</div>
									</div>
									<div class="legend_column" style="width:25%;">
										<b><div class="legend_value" style="padding-bottom:5px">Actual</div></b>
										<div class="legend_value exposed">-</div>
										<div class="legend_value asymptomatic">-</div>
										<div class="legend_value mild_hidden">-</div>
										<div class="legend_value recovered_hidden">-</div>
										<hr>
										<div class="legend_value recovered" id="legend_true_recovered">0</div>
										<div class="legend_value infected" id="legend_true_infected">0</div>
										<div class="legend_value mild">-</div>
										<div class="legend_value severe">-</div>
										<div class="legend_value critical">-</div>
										<div class="legend_value" id="legend_true_fatal">0</div>
										<hr>
										<div class="legend_value" id="legend_true_total">0</div>
									</div>
								</div>
							</div>
						</div>

						<canvas class="full" id="control_chart_canvas"></canvas>

						<div class="control full">
							<div class="control full">
								<center>
                                <span id="container_interv0">
                                <input class="control intervention" type="range" id="slider_interv0_T" onmousemove="updateParameters(true)" min=1 max=30 step=1></input>
                                <span><input type="checkbox" id="check_interv0" onchange="updateInterventions(0)" checked></input></span>
                                <span class="small">Add intervention on day</span>
                                <span class="small" id="slider_interv0_T_value"></span>
                                <span class="small"> to change \(\beta_1\) to </span>
                                <span id="slider_interv0_b1_value"></span>
                                <input class="block" type="range" id="slider_interv0_b1" onmousemove="updateParameters()" min=0 max=1 step=0.01></input>
                                </span>
								</center>
							</div>

							<div class="control full" style="margin-top:20px;">
								<center>
                                <span id="container_interv1" style="color:grey">
                                <input class="control intervention" type="range" id="slider_interv1_T" onmousemove="updateParameters(true)" min=1 max=30 step=1 disabled=true></input>
                                <span><input type="checkbox" id="check_interv1" onchange="updateInterventions(1)"></input></span>
                                <span class="small">Add intervention on day</span>
                                <span class="small" id="slider_interv1_T_value"></span>
                                <span class="small"> to change \(\beta_1\) to </span>
                                <span id="slider_interv1_b1_value"></span>
                                <input class="block" type="range" id="slider_interv1_b1" onmousemove="updateParameters()" min=0 max=1 step=0.01 disabled=true></input>
                                </span>
								</center>
							</div>
							<!-- lockdown percentafe -->
							<div>
								<p id="intervention">Intervention এর পর  লেখক  ধরে নিয়েছেন সংক্রমণের হার \(\beta_1\) Baseline 0.85  থেকে  ৬৫% কমে 0.30 হবে। Baseline সংক্রমণের হার ( \(\beta_1\) ) 0.85  থেকে সংক্রমণের হার \(\beta_1\) ৫০% ,৪০% ,৩০% ,২৫% ,২০% কমলে \(\beta_1\) এর মান হবে যথাক্রমে 0.42 , 0.51 ,0.59 , 0.63 ,0.68। কঠোরভাবে Intervention করা হলে \(\beta_1\) (সংক্রমনের হার) ৮৫% কমে 0.13 হবে।</p>
							</div>
						</div>
					</div>

					<!-- article -->
					<div class="col-md-12 mt-5">
						<p>কোভিড-১৯ মহামারী পুরো বাংলাদেশের জীবন-যাপন কে ব্যহত করেছে । এই লেখাটি লিখার সময় পুরো দেশ লক-ডাউন হয়ে আছে । এখন পর্যন্ত ,সরকারী হস্তক্ষেপের(Intervention) ফলে রোগটির বিস্তারের হার মনে হচ্ছে স্থির হয়ে আসছে। যাইহোক , এখনো আমরা বলতে পারছি না ভবিষতে আমাদের জন্য কি অপেক্ষা করছে , যখন Intervention(ছোঁয়াচে রোগের বিস্তার রোধে যেইসব পদক্ষেপ নেয়া হয়েছিলো যেমন লক-ডাউন, কারফিউ ) পরিবর্তন হয়ে যাবে। ক্লাসিকাল SEIR(Susceptible → Exposed → Infected → Removed (যেমন সুস্থ ও মৃত্যু) মডেল ব্যবহার করে এই Interactive টুলের মাধ্যমে আমরা বাংলাদেশের কোভিড-১৯ রোগটির বিস্তারের মডেল বুঝার চেষ্টা করেছি । আমরা বাংলাদেশের জন্য এই মডেলের প্যারামিটার গুলো পরিবর্তন করেছি।</p>
						<p>SEIR মডেল একটি জনপ্রিয় epidemiological compartmental মডেল, compartmental মডেল বলার কারণ হলো এই মডেল টি পুরো জনসংখ্যা কে কিছু নির্দিষ্ট compartments এ ভাগ করে থাকে, এই মডেলটি মডেল করার চেষ্টা করে কিভাবে একটি রোগ একটি নির্দিষ্ট জনসংখ্যাতে ছড়াতে পারে । যখন কোন একটি ভাইরাল রোগ(মহামারী) একটি নির্দিষ্ট জনসংখ্যায় পরিচিত হয় তখন পুরো জনসংখ্যাকে আমরা ৪ ভাগে ভাগ করতে পারি , Susceptible (অর্থাৎ এই রোগ হতে আক্রান্ত হতে পারে , প্রথমে পুরো জনসংখ্যা Susceptible অবস্থায় থাকে ) , Exposed (রোগটি কোন ব্যক্তি কে আক্রমণ করেছে , কিন্তু তার লক্ষণ দেখা দিচ্ছে না কারণ রোগটি তার Incubation অবস্থায় আছে) , Infected (ব্যক্তি পুরোপুরি ভাবে আক্রান্ত) , Removed (আক্রান্ত ব্যক্তি সুস্থ হয়েছেন অথবা মারা গেছেন)। SEIR মডেল কোন রোগের বিস্তার(spread) সিমুল্যাট করার জন্য একটি আদর্শায়িত মডেল যা এখন ফ্রন্টলাইন গবেষণাতে ব্যবহার হচ্ছে [<a href="https://www.thelancet.com/journals/lancet/article/PIIS0140-6736(20)30260-9/fulltext" id="wu" target="_blank">Wu, et. al</a>, <a href="https://cmmid.github.io/topics/covid19/current-patterns-transmission/wuhan-early-dynamics.html" id="k" target="_blank"> Kucharski et. al</a>].</p>
					</div>

					<div class="col-md-6 mt-5">
						<h2>মডেল এর বিস্তারিত</h2>
						<p>আমাদের মডেল এ পুরো জনসংখ্যা কে নিচের clases (শ্রেণী) গুলোতে বিভক্ত করা হয়েছে</p>
						<ul>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="10" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D446 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>S</mi></math></mjx-assistive-mml></mjx-container> - Susceptible individuals (সংবেদনশীল ব্যক্তিগণ )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="11" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> - Exposed individuals before they become infectious (আক্রান্ত হওয়ার পূর্বে যারা exposed হয়েছে )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="12" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> - Exposed individuals after they are infectious (আক্রান্ত হওয়ার পরে যারা  exposed হয়েছে)</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="13" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> - Asymptomatic individuals (যাদের কোন লক্ষণ দেখা দেয়নি )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="14" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals with mild symptoms (হালকা লক্ষণ নিয়ে আক্রান্ত ব্যক্তি )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="15" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-texatom size="s" texclass="ORD"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi></mjx-texatom></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mrow><mn>1</mn><mi>Q</mi></mrow></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals with mild symptoms who were directly quarantined upon entry (হালকা লক্ষণ নিয়ে আক্রান্ত ব্যক্তি যাদের কে কোয়ারিন্টেনে রাখা হয়েছে দেশে প্রবেশের পর )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="16" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>2</mn></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals with severe symptoms (require hospitalization) (তীব্র লক্ষণ নিয়ে আক্রান্ত ব্যক্তি যাদের কে হাসপাতালে ভর্তি করা প্রয়োজন )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="17" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c33"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>3</mn></msub></math></mjx-assistive-mml></mjx-container> - Infected individuals at critical stage (require ICU admission)(আক্রান্ত ব্যক্তি যাদের অবস্থা সংকটপূর্ণ (ICU তে ভর্তি হওয়া প্রয়োজন ))</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="18" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D43B TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>H</mi></msub></math></mjx-assistive-mml></mjx-container> - Recovered individuals that have not been tested (সুস্থ ব্যক্তিগন যাদের টেস্ট করা হয়নি )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="19" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D437 TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>D</mi></msub></math></mjx-assistive-mml></mjx-container> - Recovered individuals that were diagnosed positive ( আক্রান্ত হওয়ার পরে যারা সুস্থ হয়েছেন )</li>
							<li><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="20" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D437 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>D</mi></math></mjx-assistive-mml></mjx-container> - Fatalities (মৃত্যু )</li>
						</ul>
					</div>
					<div class="col-md-6 mt-5 text-center">
						<img src="images/model_schematic.png" style="width:100%">
						<figcaption class="tiny" style="margin-top:10px;">Schematic of model classes and rate parameters</figcaption>
					</div>
					<div class="col-md-12 mt-5">
						<p>
							<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="21" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>1</mn></msub><mo>,</mo><msub><mi>I</mi><mn>0</mn></msub><mo>,</mo><msub><mi>I</mi><mn>1</mn></msub><mo>,</mo><msub><mi>I</mi><mn>2</mn></msub><mo>,</mo></math></mjx-assistive-mml></mjx-container> ও<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="22" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c33"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>3</mn></msub></math></mjx-assistive-mml></mjx-container> classes (শ্রেণী)  এর আক্রান্ত ব্যক্তিদের  হতে  রোগটি Susceptible individuals (সংবেদনশীল ব্যক্তিদের) সংস্পর্শে আসে  । তারপর তারা Exposed শ্রেণী <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="23" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> তে চলে যায় Incubation period এর পর (যা প্রায় ~ ৩  দিন )  , তারা আক্রান্ত হয়  <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="24" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D438 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>E</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> শ্রেণীতে । E1 শ্রেণী হতে তারা হয় ৩০% সম্ভব্যতা নিয়ে asymptomatic class (আক্রান্ত কিন্তু কোনো লক্ষণ দেখা দিচ্ছে না  ) <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="25" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>0</mn></msub></math></mjx-assistive-mml></mjx-container> তে যাবে , অথবা ৭০% সম্ভব্যতা নিয়ে mild symptomatic class ( হালকা লক্ষণ  ) <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="26" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> এ যাবে ।
						</p>
						<p>
							বিভিন্ন গবেষণা অনুসারে(<a href="https://docs.google.com/spreadsheets/d/1uJHvBubps9Z2Iw_-a_xeEbr3-gci6c475t1_bBVkarc/edit#gid=0" target="_blank" id="lit">লিটারেচার </a>) , প্রায় ৮১% symptomatic ব্যক্তি ,  mild symptoms  নিয়ে ( প্রায় ৬ দিন ) পর সুস্থ হয়ে উঠেন ফলে Recovered class (<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="27" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>R</mi></math></mjx-assistive-mml></mjx-container>) এ চলে যান। <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="28" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container>  হতে বাকি ১৯% severe symtoms (তীব্র লক্ষণ) তৈরি করে <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="29" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>2</mn></msub></math></mjx-assistive-mml></mjx-container> class e চলে যায়। ওইসব severe cases এর জন্য hospitalization এর প্রয়োজন হয় । <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="30" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>2</mn></msub></math></mjx-assistive-mml></mjx-container> হতে তিন-চতুর্থাংশ  (৭৫% ) ব্যক্তি hospitalization (প্রায় ৪ দিন) পর সুস্থ হয়ে উঠেন । আর বাকি এক-চতুর্থাংশ (২৫% ) ব্যক্তির অবস্থা খুব ক্রিটিকাল হয় তাদের জন্য ICU Treatment প্রয়োজন হয় । এই critical-cases গুলোর ৪০% হলো fatal বা মারাত্মক( তারা মারা যেতে পারেন ) বাকিরা ICU ট্রিটমেন্ট এর পরে সুস্থ হয়ে উঠেন (প্রায় ১০ দিন পর) । এই সব পরিসংখ্যানগুলো চীনের covid-19 মহামারির উপর  পাবলিশেড গবেষণা হতে এসেছে আর এই নম্বরগুলো rate  parameters <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="31" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D44E TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D44E TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="2"><mjx-c class="mjx-c1D453 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c30"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D6FE TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c33"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D45D TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo><mjx-msub space="2"><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D45D TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c32"></mjx-c></mjx-mn></mjx-script></mjx-msub><mjx-mo class="mjx-n"><mjx-c class="mjx-c2C"></mjx-c></mjx-mo></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>a</mi><mn>0</mn></msub><mo>,</mo><msub><mi>a</mi><mn>1</mn></msub><mo>,</mo><mi>f</mi><mo>,</mo><msub><mi>γ</mi><mn>0</mn></msub><mo>,</mo><msub><mi>γ</mi><mn>1</mn></msub><mo>,</mo><msub><mi>γ</mi><mn>2</mn></msub><mo>,</mo><msub><mi>γ</mi><mn>3</mn></msub><mo>,</mo><msub><mi>p</mi><mn>1</mn></msub><mo>,</mo><msub><mi>p</mi><mn>2</mn></msub><mo>,</mo></math></mjx-assistive-mml></mjx-container> and <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="32" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D707 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>μ</mi></math></mjx-assistive-mml></mjx-container> হিসেব করতে ব্যবহার করা হয়েছে  ।
						</p>
						<p>

							অনেকসময়  হালকা লক্ষণ দেখা দিলে হাসপাতালে ভর্তি হওয়ার প্রয়োজন হয় না , তুবুও  অনেকে  (সবাই না )  হালকা লক্ষণ (mild symtoms) নিয়ে হাসপাতালে ভর্তি হচ্ছে । ফলে আমরা একটি কঠোর ক্রাইটেরিয়া ধরে নিতে পারি যে সকল পটেনশিয়াল বা সম্ভাব্য <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="33" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> Clases Tested হচ্ছে না । অতএব <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="34" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D450 TEX-I"></mjx-c></mjx-mi></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>c</mi></math></mjx-assistive-mml></mjx-container> এর কিছু অংশ <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="35" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mn class="mjx-n" size="s"><mjx-c class="mjx-c31"></mjx-c></mjx-mn></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mn>1</mn></msub></math></mjx-assistive-mml></mjx-container> হতে recovered-diagnosed class (<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="36" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D437 TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>D</mi></msub></math></mjx-assistive-mml></mjx-container>) তে চলে যান । undiagnosed অংশ  <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="37" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mo class="mjx-n"><mjx-c class="mjx-c28"></mjx-c></mjx-mo><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2212"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D450 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n"><mjx-c class="mjx-c29"></mjx-c></mjx-mo></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mo stretchy="false">(</mo><mn>1</mn><mo>−</mo><mi>c</mi><mo stretchy="false">)</mo></math></mjx-assistive-mml></mjx-container>  recovered-hidden class,<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="38" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D445 TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-mi class="mjx-i" size="s"><mjx-c class="mjx-c1D43B TEX-I"></mjx-c></mjx-mi></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>R</mi><mi>H</mi></msub></math></mjx-assistive-mml></mjx-container> এ  যায় । এইসব hideen কেস গুলো কখনো রিপোর্ট হয় না কিন্তু এই class এর ব্যক্তিরা Infected Stage এ গিয়ে ভাইরাস টি ছড়ায় । এই মডেলে বাংলাদেশের জন্য Reported fraction ধরে নেয়া  হয়েছে ১৪%  আর  undocumented অথবা undiagnosed fraction ধরে নেয়া হয়েছে ৮৬ % ( <a href="https://science.sciencemag.org/content/early/2020/03/24/science.abb3221" target="_blank" id="quilty"> Li et al.</a>) গবেষণা অনুযায়ী
						</p>
						<p>

							তারপর আমাদের আর একটি গুরুত্বপূর্ণ অংশ হলো আক্রান্ত ব্যক্তিরা ( যারা দেশে এসে Tested positive হয়েছেন ) যাদেরকে কোঠোর ভাবে কোয়ারেন্টিনে রাখা হয়েছে যাতে করে তারা অন্যদের আক্রান্ত করতে না পারে । ওইসব quarantined index ব্যক্তিদের জন্য আমরা আলাদা একটি class তৈরি করেছি যা হলো <mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="39" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-texatom size="s" texclass="ORD"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi></mjx-texatom></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mrow><mn>1</mn><mi>Q</mi></mrow></msub></math></mjx-assistive-mml></mjx-container> । আমারা ধরে নিয়েছি যে তারা mildly infected stage (<mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" role="presentation" tabindex="0" ctxtmenu_counter="40" style="font-size: 117.3%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-msub><mjx-mi class="mjx-i" noic="true"><mjx-c class="mjx-c1D43C TEX-I"></mjx-c></mjx-mi><mjx-script style="vertical-align: -0.15em;"><mjx-texatom size="s" texclass="ORD"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c></mjx-mn><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi></mjx-texatom></mjx-script></mjx-msub></mjx-math><mjx-assistive-mml role="presentation" unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi>I</mi><mrow><mn>1</mn><mi>Q</mi></mrow></msub></math></mjx-assistive-mml></mjx-container>) অবস্থায় দেশে প্রবেশ করেছে , যদিও এটা সম্ভব যে তারা সম্পূর্ণ exposed অবস্থায় ( রোগটি ব্যক্তির সংস্পর্শে এসেছে ) । Quilty  et al.(<a href="https://www.ncbi.nlm.nih.gov/pubmed/32046816" target="_blank" id="quilty"> Quilty  et al.</a>)) হিসাব অনুযায়ী  ৪৬% ( 95% confidence interval: ৩৬ থেকে  ৫৮ ) কোভীড-১৯ এ আক্রান্ত ব্যক্তিরা এয়ারপোর্ট এ থার্মাল স্ক্রিনিং এ ডিটেক্ট হবে না ,যা নির্ভর করে Incubation Period ( লক্ষণ প্রকাশ পাওয়ার পর্যায়কাল), sensitivity of exit, entry screening ও proportion  of asymptomatic cases উপর ।  যখন আমরা মডেল রান করি , আমরা মোট  জনসংখ্যার সাথে তাদের সংখ্যা যোগ করে দিয়েছি যেইদিন তারা Tested পজিটিভ হয়েছেন ।
						</p>
					</div>
					<div class="col-md-12 mt-4">
						<h2>তথ্য সূত্র</h2>
						<p>
							<a href="https://www.iedcr.gov.bd/" target="_blank">Situation reports</a> - IEDCR,Bangladesh
							<br><br>
							<a href="https://alhill.shinyapps.io/COVID19seir/" target="_blank">COVID-10 modeling app by Allison Hill</a>
						</p>
					</div>
					<div class="col-md-12 mt-4">
						<h2>কৃতজ্ঞতা</h2>
						<p>
							Classical SEIR মডেলটি modified ভার্সনটি  তৈরি করেছেন দুশান ওয়াড্ডুয়েজ( হার্ভার্ড বিশ্ববিদ্যালয় ), সাবিত্রু জয়সিংহে (এমআইটি ), ও সুনেথ আগমপোদি ( ইয়েল বিশ্ববিদ্যালয়) । বাংলাদেশের জন্য মডেলটির paramters নির্ধারণ ও Modified SEIR মডেলটি ফিট করেছেন আল-ইকরাম ইলাহি হদয় ( চট্রগ্রাম বিশ্ববিদ্যালয়)। কোন এপিডেমোলজিস্ট  এক্সপার্ট লেখকের প্রতি এই মডেল নিয়ে  কোন পরামর্শ থাকলে  তাহলে অনুগ্রহপূর্বক লেখক কে মেইল করুন (aliqramalaheehridoy@gmail.com) এই ঠিকানায়।
							<br><br>

						</p>
					</div>
					<!-- article ends -->
				</div>
			</div>
		</section>
		<!-- SEIR Model Section Ends -->



		<!-- footer section -->
		<footer class="footer-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center footer-text">
						<p>এই ওয়েবসাইটটি <span>❤</span> সাথে তৈরী করেছেন <a href="https://www.facebook.com/amnkhan.me">Al Amin Khan</a> & <a href="https://www.facebook.com/hridoy.all">Al-Iqram Elahee Hridoy</a></p>
						<p>ওয়েবসাইটটি স্পন্সর করেছে <span>❤</span> <a href="https://www.exonhost.com/">Exonhost</a></p>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer section ends -->

		<!-- jQuery JS -->
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>

		</body>ow">
			<div class="col-md-12 text-center footer-text">
				<p>এই ওয়েবসাইটটি <span>❤</span> সাথে তৈরী করেছেন <a href="https://www.facebook.com/amnkhan.me">Al Amin Khan</a> & <a href="https://www.facebook.com/hridoy.all">Al-Iqram Elahee Hridoy</a></p>
				<p>ওয়েবসাইটটি স্পন্সর করেছে <span>❤</span> <a href="https://www.exonhost.com/">Exonhost</a></p>
			</div>
		</div>
	</div>
</footer>
<!-- footer section ends -->

<!-- jQuery JS -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>

</body>