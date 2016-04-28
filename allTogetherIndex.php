<html>
<head>	
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<style>
	svg {
	    background: transparent;
	    margin-top: -2em;
	}
	.tooltip {
	  position: absolute;
	  width: 200px;
	  height: 28px;
	  pointer-events: none;
	}
	.axis path{
	    fill: none;
	    display: none;
	}
	.axis line {
	    fill: none;
	    stroke: #c1c1c1;
	    shape-rendering: crispEdges;
	}
	
	.tooltip {
	  position: absolute;
	  width: 200px;
	  height: 28px;
	  pointer-events: none;
	}
	
	/*graph styling time*/
	#lineGraph img {
	    opacity: 0.07;
	    position: absolute;
	    width: 1400px;
	    margin-top: 7em;
	}
	
	.tick text{
	    font-family: sans-serif;
	    font-size: 12px;
	    opacity: .8;
	}
	
	.y.axis text{
	    transform: translate(-1335px, 0px);
	}
	
	/*style the radio buttons adapted code from http://codepen.io/AngelaVelasquez/pen/Eypnq*/
	h2 {
	color: #A9A9A9;
	font-weight: normal;
	}
	
	.container svg{
	    margin-top: -3em;
	}
	
	.container ul{
	  list-style: none;
	  width: 100%;
	  margin: 0;
	  padding: 0;
	}
	
	
	.container ul li{
	  color: #A9A9A9;
	  display: block;
	  position: relative;
	  float: left;
	}
	
	.container ul li input[type=radio]{
	  position: absolute;
	  visibility: hidden;
	}
	
	.container ul li label{
	  display: block;
	  position: relative;
	  font-weight: 300;
	  font-size: 1.35em;
	  padding: 25px 25px 0px 60px;
	  margin: 10px auto;
	  height: 30px;
	  z-index: 9;
	  cursor: pointer;
	  -webkit-transition: all 0.25s linear;
	}
	
	.container ul li:hover label{
		color: #0075BF;
	}
	
	.container ul li .check{
	  display: block;
	  position: absolute;
	  border: 5px solid #A9A9A9;
	  border-radius: 100%;
	  height: 25px;
	  width: 25px;
	  top: 30px;
	  left: 20px;
		z-index: 5;
		transition: border .25s linear;
		-webkit-transition: border .25s linear;
	}
	
	.container ul li .checkBox{
	  display: block;
	  position: absolute;
	  border: 5px solid #A9A9A9;
	  border-radius: 10%;
	  height: 25px;
	  width: 25px;
	  top: 30px;
	  left: 20px;
		z-index: 5;
		transition: border .25s linear;
		-webkit-transition: border .25s linear;
	}
	
	.container ul li:hover .check {
	  border: 5px solid #0075BF;
	}
	.container ul li:hover .checkBox {
	  border: 5px solid #0075BF;
	}
	
	.container ul li .check::before {
	  display: block;
	  position: absolute;
		content: '';
	  border-radius: 100%;
	  height: 15px;
	  width: 15px;
	  top: 5px;
		left: 5px;
	  margin: auto;
		transition: background 0.25s linear;
		-webkit-transition: background 0.25s linear;
	}
	
	.container ul li .checkBox::before {
	    display: block;
	  position: absolute;
		content: '';
	  border-radius: 10%;
	  height: 15px;
	  width: 15px;
	  top: 5px;
		left: 5px;
	  margin: auto;
		transition: background 0.25s linear;
		-webkit-transition: background 0.25s linear;
	}
	
	/*when checked*/
	input[type=radio]:checked ~ .check {
	  border: 5px solid #009CFF;
	}
	
	input[type=radio]:checked ~ .check::before{
	  background: #009CFF;
	}
	
	input[type=radio]:checked ~ label{
	  color: #009CFF;
	}
	
	input[type=checkbox]:checked ~ .checkBox {
	  border: 5px solid #009CFF;
	}
	
	input[type=checkbox]:checked ~ .checkBox::before{
	  background: #009CFF;
	}
	
	input[type=checkbox]:checked ~ label{
	  color: #009CFF;
	}
</style>
<script type="text/javascript">
	var nbaColorsAbbreviated = {"ATL": {"first": "#01244C", "third": "#D21033"},
 "BOS": {"first": "#05854C", "second": "#EAEFE9",  "third": "#FFFFFF"},
 "CHA": {"first": "#F26532" , "second":  "#29588B" },
 "CHI": {"first": "#D4001F", "second": "#000000", "third":"#FFFFFF"},
"CLE":{"first":"#9F1425","second":"#003375", "third":"#B99D6A"},
 "DAL": {"first": "#006AB5", "second": "#F0F4F7"}, 
"DEN": {"first":  "#4393D1", "second": "#FBB529"},
"DET": {"first":"#ED174C", "second":"#006BB6"},
"GSW": {"first": "#FDB927", "second": "#006bb6", "third": "#FFC33C"},
"HOU": {"first":"#CC0000", "second":"#FFFFFF"},
"IND": {"first": "#002E62",  "second":"#FFC225"},
"LAC": {"first":"#EE2944", "second": "#146AA2", "third": "#FFFFFF" },
"LAL": {"first":"#4A2583", "second":"#F5AF1B"},
"MEM": {"first": "#001B41", "second":"#85A2C6", "third":"#FFFFFF"},
"MIA": {"first":  "#B62630", "second":"#1E3344","third": "#FF9F00"},
"MIL": {"first": "#00330A", "second": "#C82A39"},
"MIN": {"first": "#015287", "second": "#000000", "third": "#EFEFEF"},
"NJN": {"first":"#002258", "second":"#D32E4C", "third":"#EFEFF1"},
"NOH": {"first":  "#008FC5", "second": "#FDC221"},
"NOK": {"first":  "#008FC5", "second": "#FDC221"},
"NOP": {"first":  "#0095CA", "second": "#1D1060", "third": "#FEBB25"},
"NYK": {"first":"#2E66B2", "second":"#FF5C2B" },
"OKC": {"first": "#0075C1", "second":"#E7442A","third":"#002553"},
"ORL": {"first": "#077ABD","second":"#C5CED5","third":"#000000"},
"PHI": {"first": "#C5003D", "second": "#000000", "third": "#C7974D" },
"PHO": {"first": "#48286C", "second":"#FF7A31","third": "#FFBC1E" },
"POR": {"first": "#000000", "second": "#E1393E", "third": "#B4BDC3" },
"SAS": {"first": "#000000", "second": "#BEC8C9", "thrid": "#FFFFFF" },
"SAC": {"first": "#743389", "second":"#DCE2E4", "thrid": "#000000"},
"SEA": {"first":"#5831", "second":"#A71B28" },
"TOR": {"first":"#CD1041", "second":"#ECEBE9", "third":"#000000"},
"UTA": {"first":"#001D4D","second":"#448CCE",  "third":"#480975"},
"WAS": {"first":"#004874","third":"#BC9B6A" }}
</script>

</head>

<body>

<div class="container">
  <ul>
  <li>
    <input type="radio" id="f-option" name="threePoints" value="TPP" onclick="updateData(value)" checked>
    <label for="f-option">3P%</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="s-option" name="threePoints" value="TPA" onclick="updateData(value)">
    <label for="s-option">3PA</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  
  <li>
    <input type="checkbox" id="leagueAvg" onclick="addLeagueAverage()" hidden='true'>
    <label for="leagueAvg">League Average</label>
    <div class="slider"></div>
    <div class="checkBox"><div class="inside"></div></div>
  </li>
</ul>
</div>

<div id="lineGraph">
    <img src="https://jalendice13.files.wordpress.com/2015/08/cropped-121210092244-nba-logo-wordmark-275-wide-story-top.jpg">
</div>


<script type="text/javascript">
	var isPercent = true;
	var loadedAvgs = false;
	var lgHeight = 750;
	var lgWidth = 1400;
	var axesOffset = 100;
	var champYear = [];
	var champTeam = [];
	var threeAttempts = [];
	var threePercent = [];
	var avgThreeAttempts =[];
	var avgThreePercent = [];
	var avgAge = [];
	
	var svg = d3.select("#lineGraph").append("svg")
	.attr("width", lgWidth)
	.attr("height", lgHeight);
	
	var xScale = d3.scale.linear()
				.domain([1980,2015])
				.range([0,lgWidth - axesOffset]);
	// var yScale3pta = d3.scale.linear()
	// 				.domain()
	// 				.range([lgHeight,0]);
	
	var xAxis = d3.svg.axis()
	.scale(xScale)
	.ticks(30).tickFormat(d3.format(""))
	.orient("bottom");
	
	svg.append("g")
	.attr("class", "x axis")
	.attr("transform", "translate("+(axesOffset/2)+", " + (lgHeight - axesOffset/2)+ ")")
	.call(xAxis);
	
	
	// add the tooltip area to the webpage
	var tooltip = d3.select("body").append("div")
	    .attr("class", "tooltip")
	    .style("opacity", 0);
	    
	    
	var teams_data;
	var y3PercentScale;
	var y3AttemptScale;
	var y3PercentAxis;
	var y3AttemptAxis;
	var team_logos;
	d3.csv("p2sampledata.csv", function(error, data){
		teams_data = data;
		
		data.forEach(function(d){
			if(d.Year >= 1980){
				champYear.push(d.Year);
				champTeam.push(d.Team);
				threeAttempts.push(d.TPA);
				threePercent.push(d.TPP);
			}
		})
		
		y3PercentScale = d3.scale.linear()
			.domain([0, Math.max.apply(Math, threePercent)])
			.range([lgHeight - axesOffset, 0]);
		
		y3AttemptScale = d3.scale.linear()
			.domain([Math.min.apply(Math, threeAttempts), Math.max.apply(Math, threeAttempts)])
			.range([lgHeight -axesOffset, 0]);
		
		y3PercentAxis = d3.svg.axis()
		.scale(y3PercentScale)
		.ticks(10)
		.tickSize(lgWidth-axesOffset)
		.orient("right");
		
		y3AttemptAxis = d3.svg.axis()
		.scale(y3AttemptAxis)
		.ticks(10)
		.tickSize(lgWidth-axesOffset)
		.orient("right");
		
		svg.append("g")
		.attr("class", "y axis")
		.attr("transform", "translate("+axesOffset/2+", 50)")
		.call(y3PercentAxis);
		
		
		team_logos = svg.selectAll("team_logos").data(data)
		
		team_logos.enter().append("svg:image")
			.attr('x', function(d) { return xScale(d.Year) + axesOffset*2/5 })
			.attr('y', function(d) { return y3PercentScale(d.TPP) + axesOffset*2/5 })
			.attr("height", 34)
			.attr('width', 34)
			.attr('class', 'locale')
			.attr("xlink:href", function(d) { return "assets/img/" + d.Team + ".png" })
			.on("mouseover", function(d){
				tooltip.transition()
					.duration(200)
					.style("opacity", 0.9)
					.style("background",nbaColors[d.Team]["first"])
					.style("color", nbaColors[d.Team]["second"]);
				//Year, Team, 3p%, 3pa, team age in hover
				tooltip.html("Year: "+d.Year+"<br/>"+"Team: "+d.Team+"<br/>"+"3P%: "+d.TPP+"<br/>"+"3PA: "+d.TPA+"<br/>"+"AvgAge: "+d.avgage)
					.style("left", (d3.event.pageX) + "px")		
                	.style("top", (d3.event.pageY) + "px");
                })
            .on("mouseout", function(d) {
            	tooltip.transition()
            		.style("opacity",0);
            });	

			//});

	});
	
	var avg_points;
	function addLeagueAverage(){
		//If box is checked then add the league averages
		if(document.getElementById("leagueAvg").checked){

			
			d3.csv("average_3p_data.csv", function(error,data){
				// if(!loadedAvgs){
				// 	loadedAvgs = true;
				// 	data.forEach(function(d){
				// 		avgThreeAttempts.push(d.avgTPA);
				// 		avgThreePercent.push(d.avgTPP);
				// 		avgAge.push(d.Age);
				// 	});
				// }
			
				//Year, 3p%, 3pa, team age in hover
				//var avg_points = d3.selectAll(".avgs")[0];
				if(!loadedAvgs){
					loadedAvgs = true;
					avg_points = svg.selectAll("avgs").data(data);
				}

				if (document.getElementById("f-option").checked){
					//they're already on the screen
					if (svg.selectAll(".avgs")[0].length > 0) {
						avg_points.transition().duration(1500)
							.attr('cy', function(d) { return y3PercentScale(d.avgTPP) + axesOffset*1/2 });
					}
					else {
						//add em all new
						avg_points.enter().append("circle")
							.attr('cx', function(d) { return xScale(d.Year) + axesOffset*1/2 })
							.attr('cy', function(d) { return y3PercentScale(d.avgTPP) + axesOffset*1/2 })
							.attr("r", 5)
							.attr('class', 'avgs')
							.style("fill", "blue")
							.style("opacity", 0.7)
							.on("mouseover", function(d){
								tooltip.transition()
									.duration(200)
									.style("opacity", 0.9)
									.style("background","#009CFF")
									.style("color","#000")
								//Year, Team, 3p%, 3pa, team age in hover
								tooltip.html("Year: "+d.Year+"<br/>"+"Avg3P%: "+d.avgTPP+"<br/>"+"Avg3PA: "+d.avgTPA+"<br/>"+"AvgAge: "+d.Age)
									.style("left", (d3.event.pageX) + "px")		
				                	.style("top", (d3.event.pageY) + "px");
				                })
				            .on("mouseout", function(d) {
				            	tooltip.transition()
				            		.style("opacity",0);
				            });	
					}
				}
			
			//else do #3pa
				else {
					if (svg.selectAll(".avgs")[0].length > 0) {
						avg_points.transition().duration(1500)
							.attr('cy', function(d) { return y3AttemptScale(d.avgTPA) + axesOffset*1/2 });
					}
					else {
						avg_points.enter().append("circle")
							.attr('cx', function(d) { return xScale(d.Year) + axesOffset*1/2 })
							.attr('cy', function(d) { return y3AttemptScale(d.avgTPA) + axesOffset*1/2 })
							.attr("r", 5)
							.attr('class', 'avgs')
							.style("fill", "blue");
					}


				}
			});

		}
	//Box is unchecked
	else {
		svg.selectAll(".avgs").remove();
	}

}

	function updateData(category) {
		if(category == 'TPA'){
			isPercent = false;
		}
		else{
			isPercent = true;
		}
		//svg.selectAll(".locale").remove();
		d3.csv("p2sampledata.csv", function(error, data){
		
		 y3PercentScale = d3.scale.linear()
			.domain([0, Math.max.apply(Math, threePercent)])
			.range([lgHeight - axesOffset, 0]);
		
		 y3AttemptScale = d3.scale.linear()
			.domain([0, Math.max.apply(Math, threeAttempts)])
			.range([lgHeight -axesOffset, 0]);
		
		 y3PercentAxis = d3.svg.axis()
		.scale(y3PercentScale)
		.ticks(10).tickSize(lgWidth-axesOffset)
		.orient("right");
		 y3AttemptAxis = d3.svg.axis()
		.scale(y3AttemptScale)
		.ticks(10).tickSize(lgWidth-axesOffset)
		.orient("right");
		
		var threeData;
		var yScale;
		
		if(isPercent){
			svg.select(".y.axis").transition().duration(1500).call(y3PercentAxis);
			threeData = threePercent;
			yScale = y3PercentScale;
		}
		else{
			svg.select(".y.axis").transition().duration(1500).call(y3AttemptAxis);
			threeData = threeAttempts;
			yScale = y3AttemptScale;
		}
		
		d3.selectAll(".locale")[0].forEach(function(point,i) {
			d3.select(point).transition().duration(1500)
			.attr('y', yScale(threeData[i]) + axesOffset*2/5)
			});
		});
		
		if(document.getElementById("leagueAvg").checked){
			//svg.selectAll(".avgs").remove();
			addLeagueAverage();
		}
	}
</script>
<p>
	
</p>

<style>
    /*style the horseRace graph*/
    #horseRaceSVG {
	margin-top: .1em;
    }
    
    #top-level {
	text-align: center;
    }
    #top-level button {
	padding:5px;
	font-size: large;
	border-radius: 5px;
    }
    
</style>
<div id="horseRace">
    <div id="top-level">
	<select id="raceYear" onchange="createXAxis();lockoutSubmit()">
		
	</select>
	<button type="button" onClick="moveHorse();lockoutSubmit()" id="moveHorse">Play Next Year</button>
    </div>
</div>
<script type="text/javascript">
	var lotteryPicks;
	var yr;
	var shouldAddHorses = true;
	var canPlayHorses = false;
	var yrOffset = 0;
	var xScaleYears;
	//Creating SVG
	var svgHR = d3.select("#horseRace").append("svg").attr("id","horseRaceSVG")
	.attr("width", lgWidth)
	.attr("height", lgHeight);
	//Looping through the years and adding the years to run the race on.
	var raceyr = document.getElementById("raceYear");
	//Adding Select year option
	var topFiller = document.createElement("option")
	topFiller.text = "---Select Year---"
	raceyr.add(topFiller);
	for(i = 2014; i>=1985; i--){
		var option = document.createElement("option");
		option.text = i;
		raceyr.add(option);
	}
	//Adding the Y axis which doesn't change regardless of the year
	var yWins = d3.scale.linear()
		.domain([0, 83])
		.range([lgHeight - axesOffset, 0]);
	var yWinsAxis = d3.svg.axis()
	.scale(yWins)
	.ticks(20)
	.tickSize(lgWidth-axesOffset)
	.orient("right");
	svgHR.append("g")
	.attr("class", "y axis")
	.attr("transform", "translate("+axesOffset/2+", 50)")
	.call(yWinsAxis);
	function createXAxis(){
		lotteryPicks=[]
		svgHR.select(".x.axis").remove();
		svgHR.selectAll(".line").remove();
		canPlayHorses = false;
		yrOffset =0;
		 yr = document.getElementById("raceYear").value;
		if(!isNaN(yr)){
			//Need to move points back to origin 
			canPlayHorses = true;
			xScaleYears = d3.scale.linear()
			.domain([yr,2014])
			.range([0,lgWidth - axesOffset]);
			var xAxisYears = d3.svg.axis()
			.scale(xScaleYears)
			.ticks(2015-yr).tickFormat(d3.format(""))
			.orient("bottom");
			svgHR.append("g")
			.attr("class", "x axis")
			.attr("transform", "translate("+(axesOffset/2)+", " + (lgHeight - axesOffset/2)+ ")")
			.call(xAxisYears);
			d3.json("lottery_picks_stats_data.json", function(error,data){
				//2014-year = start index for first player
				var dataIndexStart = (2014-yr)*7;
				var dataIndexEnd = dataIndexStart+6;

				//var raceYearObject = data[dataIndex];
				lotteryPicks = data[yr];
				//var xax = "Player"
				//console.log(lotteryPicks[0][xax])
				if(shouldAddHorses){

				lotteryPicks.forEach(function(d){
					svgHR.append("circle")
					.attr('cx', xScaleYears(yr) + axesOffset*1/2)
					.attr('cy', yWins(0) + axesOffset*1/2)
					.attr("r", 4)
					.attr('class', 'horses')
					.style("fill", "black");
				});
				shouldAddHorses = false;
				}
				else{
					d3.selectAll(".horses")[0].forEach(function(point,i) {
						d3.select(point).transition().duration(1500)
						.attr('cx', xScaleYears(yr) + axesOffset*1/2)
						.attr('cy', yWins(0) + axesOffset*1/2);
						});
				}

				
			});
			// d3.json("lottery_picks_stats_data.json", function(error,data){

			// 	var line = d3.svg.line()
			//     //.interpolate("monotone")
			//     .x(function(d) { return xScaleYears(d["year"]+1) + axesOffset*1/2; })
			//     .y(function(d) { 
			//     	//make it look the same as the circles starting position
			//     	if (d["wins"] == 0) {
			//     		return yWins(d["wins"]) + axesOffset*1/2; 
			//     	}
			//     	else {
			//     		return yWins(d["wins"]) + axesOffset*2/5; 
			//     	}
			//     });

			// 	horseLines = svgHR.selectAll(".line")
			//     	.data(data[yr])

			//     horseLines.enter()
			//     	.append("path")
			//     	.attr("class","line")
			//     	.style("stroke","#000")
			//     	.style("fill","none")
			//     	.attr('d', function(d) {
			//     		//add a point at (0,0)
			//     		d["stats"].unshift({"year" : yr-1, "wins" : 0});
   //        				return line(d["stats"]);
   //      			});

			// });


		}
		else{
			svgHR.selectAll(".horses").remove();
			svgHR.selectAll(".line").remove();
			shouldAddHorses = true;
		}
	}
	function moveHorse(){
		if(canPlayHorses){
			d3.selectAll(".horses")[0].forEach(function(point,i) {
				var selected_point = d3.select(point);
				if((lotteryPicks[i]["stats"][yrOffset] !== undefined) && (lotteryPicks[i]["stats"][yrOffset]['year'] == yr)){
					//line transition idea from http://jaketrent.com/post/animating-d3-line/

					//Get team line color
					//gets the team
					var playersTeam = lotteryPicks[i]["stats"][yrOffset]["team"];
					//Go into the NBAteam.json and get their color
					console.log(playersTeam)
					var playerTeamColor = nbaColorsAbbreviated[playersTeam]["first"];
					svgHR.append('line')
					.attr('class','line')
					.attr('x1',selected_point.attr("cx"))
					.attr('y1',selected_point.attr("cy"))
					.attr('x2',selected_point.attr("cx"))
					.attr('y2',selected_point.attr("cy"))
					.transition()
					.duration(1500)
					.attr('x2',xScaleYears(yr) + axesOffset*1/2)
					.attr('y2',yWins(lotteryPicks[i]["stats"][yrOffset]['wins']) + axesOffset*2/5)
					.attr('stroke',playerTeamColor);

					selected_point.transition().duration(1500)
					.attr('cx', xScaleYears(yr) + axesOffset*1/2)
					.attr('cy', yWins(lotteryPicks[i]["stats"][yrOffset]['wins']) + axesOffset*2/5);
				}
			//
				else if(lotteryPicks[i]["stats"][yrOffset] !== undefined){
					for (j=yrOffset; j>=0; j--){
						if(lotteryPicks[i]["stats"][j]['year'] == yr){
							//line transition idea from http://jaketrent.com/post/animating-d3-line/
							svgHR.append('line')
							.attr('class','line')
							.attr('x1',selected_point.attr("cx"))
							.attr('y1',selected_point.attr("cy"))
							.attr('x2',selected_point.attr("cx"))
							.attr('y2',selected_point.attr("cy"))
							.transition()
							.duration(1500)
							.attr('x2',xScaleYears(yr) + axesOffset*1/2)
							.attr('y2',yWins(lotteryPicks[i]["stats"][j]['wins']) + axesOffset*2/5)
							.attr('stroke',"#000");

							d3.select(point).transition().duration(1500)
							.attr('cx', xScaleYears(yr) + axesOffset*1/2)
							.attr('cy', yWins(lotteryPicks[i]["stats"][j]['wins']) + axesOffset*2/5);
						}
					}
				}
			});
		
		}
		yrOffset++;
		yr++;		
	}

	//from http://stackoverflow.com/questions/15929453/d3-js-dont-start-new-transition-until-the-previous-one-has-finished
	function lockoutSubmit(button) {
		button = document.getElementById("moveHorse");

	    button.setAttribute('disabled', true);

	    setTimeout(function(){
	        button.removeAttribute('disabled');
	    }, 1500)
	}
</script>

<?php include "player-cards-v2.html"?>

</body>

</html>