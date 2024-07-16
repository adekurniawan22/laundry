$(function() {
	"use strict";


// chart 1
var options = {
	series: [{
		name: "Total Orders",
		data: [240, 160, 671, 414, 555, 257]
	}],
	chart: {
		type: "line",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3461ff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#3461ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#fff"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();



// chart 2
var options = {
	series: [{
		name: "Total Views",
		data: [571, 414, 555, 257, 640, 460]
	}],
	chart: {
		type: "line",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3461ff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#3461ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#fff"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();



// chart 3
var options = {
	series: [{
		name: "Revenue",
		data: [240, 160, 555, 257, 671, 414]
	}],
	chart: {
		type: "line",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3461ff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#3461ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#fff"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();




// chart 4
var options = {
	series: [{
		name: "Customers",
		data: [414, 555, 257, 640, 160, 671]
	}],
	chart: {
		type: "line",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3461ff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#3461ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#fff"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();



    
// chart 5

var options = {
	series: [{
		name: "iPad",
		data: [240, 160, 471, 214, 355, 57, 250]
	},{
		name: "Mobiles",
		data: [440, 360, 671, 414, 555, 257, 450]
	},{
		name: "Laptops",
		data: [640, 560, 871, 614, 755, 457, 650]
	}],
	chart: {
		type: "area",
		//width: 100%,
		height: 320,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#32bfff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#32bfff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2,
		curve: "smooth"
	},
	fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#3361ff", "#8ea8fd", "#c1cfff"],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          //stops: [0, 50, 100],
          //colorStops: []
        }
    },
	colors: ["#3361ff", "#8ea8fd", "#c1cfff"],
	xaxis: {
		categories: ["1", "2", "3", "4", "5", "6", "7"]
	},
	tooltip: {
		enabled: !1,
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart5"), options);
  chart.render();






// chart 6
new Chart(document.getElementById("chart6"), {
	type: 'doughnut',
	data: {
		labels: ["Mobile", "Desktop", "Tablet"],
		datasets: [{
			label: "Device Users",
			backgroundColor: ["#8ea8fd", "#3461ff", "#c1cfff"],
			data: [2478, 5267, 1834]
		}]
	},
	options: {
		maintainAspectRatio: false,
		cutoutPercentage: 77,
		legend: {
		  position: 'bottom',
		  display: false,
		  labels: {
			boxWidth:8
		  }
		},
		tooltips: {
		  displayColors:false,
		}
	}
});




 
// chart 7

var options = {
	series: [{
		name: "Referral",
		data: [640, 560, 871, 614, 755, 457, 650]
	},{
		name: "Search",
		data: [440, 360, 671, 414, 555, 257, 450]
	}],
	chart: {
		type: "bar",
		//stacked: true,
		//width: 100%,
		height: 380,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#32bfff"
		},
		sparkline: {
			enabled: !1
		}
	},
	markers: {
		size: 0,
		colors: ["#32bfff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "45%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 0,
		curve: "smooth"
	},
	grid:{
		show: true,
		borderColor: 'rgba(66, 59, 116, 0.15)',
	},
	fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#3361ff", "#c1cfff"],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          //stops: [0, 50, 100],
          //colorStops: []
        }
    },
	colors: ["#3361ff", "#c1cfff"],
	xaxis: {
		categories: ["1", "2", "3", "4", "5", "6", "7"]
	},
	legend: {
		show: false
	  },
	tooltip: {
		enabled: !0,
		theme: "dark",
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart7"), options);
  chart.render();








// chart 8

var options = {
    series: [{
        name: "Orders",
        data: [15, 400, 340, 750, 371, 814, 1055]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "area",
        //width: 130,
        height: 280,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 15,
            blur: 4,
            opacity: .22,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 3,
        curve: "straight"
    },
    colors: ["#3461ff"],
    xaxis: {
        categories: ["1", "2", "3", "4", "5", "6", "7"]
    },
	grid:{
		show: true,
		borderColor: 'rgba(66, 59, 116, 0.15)',
	},
    tooltip: {
        theme: "dark",
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart8"), options);
  chart.render();








// chart 9
var options = {
	series: [{
		name: "Sales",
		data: [300, 555, 257, 901, 613, 727, 314]
	}],
	chart: {
		type: "area",
		//width: 130,
		height: 160,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3361ff"
		},
		sparkline: {
			enabled: !1
		}
	},
	markers: {
		size: 0,
		colors: ["#3361ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "straight"
	},
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
		axisBorder: {
			show: false
		}
	},
	grid: {
		show: !1
	},
	fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#3461ff'],
		  inverseColors: false,
		  opacityFrom: 0.5,
		  opacityTo: 0.0,
		  //stops: [0, 100]
		}
	  },
	colors: ["#3461ff"],
	yaxis: {
		show: false
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart9"), options);
  chart.render();




// chart 10
var options = {
	series: [{
		name: "Total Clicks",
		data: [0, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 0]
	}],
	chart: {
		type: "area",
		//width: 130,
		height: 80,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3361ff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#3361ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "straight"
	},
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'horizontal',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#3461ff'],
		  inverseColors: false,
		  opacityFrom: 1,
		  opacityTo: 1,
		  stops: [0, 100]
		}
	  },
	colors: ["#3461ff"],
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart10"), options);
  chart.render();



// chart 11
var options = {
	series: [{
		name: "Sessions",
		data: [300, 450, 671, 414, 555, 457, 901, 613, 727, 414, 555, 290]
	}],
	chart: {
		type: "bar",
		//width: 130,
		height: 80,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#3361ff"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#3361ff"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'horizontal',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#3461ff'],
		  inverseColors: false,
		  opacityFrom: 1,
		  opacityTo: 1,
		  stops: [0, 100]
		}
	  },
	colors: ["#3461ff"],
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart11"), options);
  chart.render();




// chart 12
var options = {
    series: [{
        name: "Returning Visitors",
        data: [340, 278, 857, 414, 555, 567, 901, 555, 257, 560, 671, 414]
    },{
        name: "Old Visitors",
        data: [240, 660, 171, 257, 160, 671, 340, 594, 555, 632, 901, 555]
    }],
    chart: {
        type: "bar",
       // width: 130,
	    //stacked: true,
        height: 260,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "45%",
            endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 1.5,
		colors: ["#fff"],
        curve: "smooth"
    },
    colors: ["#3461ff", "#c1cfff"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
	grid:{
		show: true,
		borderColor: 'rgba(66, 59, 116, 0.15)',
	},
	responsive: [
		{
		  breakpoint: 1000,
		  options: {
			chart: {
				type: "bar",
			   // width: 130,
				stacked: true,
			}
		  }
		}
	  ],
	legend: {
		show: false
	  },
    tooltip: {
        theme: "dark"        
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart12"), options);
  chart.render();
















    
   // chart 13

   var options = {
	chart: {
	  height: 240,
	  type: 'radialBar',
	  toolbar: {
		show: false
	  }
	},
	plotOptions: {
	  radialBar: {
		//startAngle: -135,
		//endAngle: 225,
		 hollow: {
		  margin: 0,
		  size: '80%',
		  background: 'transparent',
		  image: undefined,
		  imageOffsetX: 0,
		  imageOffsetY: 0,
		  position: 'front',
		  dropShadow: {
			enabled: false,
			top: 3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},
		track: {
		  background: '#eee',
		  strokeWidth: '67%',
		  margin: 0, // margin is in pixels
		  dropShadow: {
			enabled: false,
			top: -3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},

		dataLabels: { 
		  showOn: 'always',
		  name: {
			offsetY: -20,
			show: true,
			color: '#212529',
			fontSize: '14px'
		  },
		  value: {
			formatter: function (val) {
					  return val + "%";
				  },
			color: '#212529',
			fontSize: '35px',
			show: true,
			offsetY: 10,
		  }
		}
	  }
	},
	fill: {
	  type: 'gradient',
	  gradient: {
		shade: 'light',
		type: 'horizontal',
		shadeIntensity: 0.5,
		gradientToColors: ['#3461ff'],
		inverseColors: false,
		opacityFrom: 1,
		opacityTo: 1,
		stops: [0, 100]
	  }
	},
	colors: ["#3461ff"],
	series: [55],
	stroke: {
	  lineCap: 'round',
	  //dashArray: 4
	},
	labels: ['Server Load'],
	responsive: [
		{
		  breakpoint: 1281,
		  options: {
			chart: {
				height: 220,
			}
		  }
		}
	  ],

  }
  var chart = new ApexCharts(
	document.querySelector("#chart13"),
	options
  );

  chart.render();



  
   // chart 14
   var options = {
	chart: {
	  height: 240,
	  type: 'radialBar',
	  toolbar: {
		show: false
	  }
	},
	plotOptions: {
	  radialBar: {
		//startAngle: -135,
		//endAngle: 225,
		 hollow: {
		  margin: 0,
		  size: '80%',
		  background: 'transparent',
		  image: undefined,
		  imageOffsetX: 0,
		  imageOffsetY: 0,
		  position: 'front',
		  dropShadow: {
			enabled: false,
			top: 3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},
		track: {
		  background: '#eee',
		  strokeWidth: '67%',
		  margin: 0, // margin is in pixels
		  dropShadow: {
			enabled: false,
			top: -3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},

		dataLabels: { 
		  showOn: 'always',
		  name: {
			offsetY: -20,
			show: true,
			color: '#212529',
			fontSize: '14px'
		  },
		  value: {
			formatter: function (val) {
					  return val + "%";
				  },
			color: '#212529',
			fontSize: '35px',
			show: true,
			offsetY: 10,
		  }
		}
	  }
	},
	fill: {
	  type: 'gradient',
	  gradient: {
		shade: 'light',
		type: 'horizontal',
		shadeIntensity: 0.5,
		gradientToColors: ['#3461ff'],
		inverseColors: false,
		opacityFrom: 1,
		opacityTo: 1,
		stops: [0, 100]
	  }
	},
	colors: ["#3461ff"],
	series: [64],
	stroke: {
	  lineCap: 'round',
	  //dashArray: 4
	},
	labels: ['Bandwidth'],
	responsive: [
		{
		  breakpoint: 1281,
		  options: {
			chart: {
				height: 220,
			}
		  }
		}
	  ],

  }

  var chart = new ApexCharts(
	document.querySelector("#chart14"),
	options
  );

  chart.render();



  
   // chart 15
   var options = {
	chart: {
	  height: 240,
	  type: 'radialBar',
	  toolbar: {
		show: false
	  }
	},
	plotOptions: {
	  radialBar: {
		//startAngle: -135,
		//endAngle: 225,
		 hollow: {
		  margin: 0,
		  size: '80%',
		  background: 'transparent',
		  image: undefined,
		  imageOffsetX: 0,
		  imageOffsetY: 0,
		  position: 'front',
		  dropShadow: {
			enabled: false,
			top: 3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},
		track: {
		  background: '#eee',
		  strokeWidth: '67%',
		  margin: 0, // margin is in pixels
		  dropShadow: {
			enabled: false,
			top: -3,
			left: 0,
			blur: 4,
			color: 'rgba(0, 169, 255, 0.85)',
			opacity: 0.65
		  }
		},

		dataLabels: { 
		  showOn: 'always',
		  name: {
			offsetY: -20,
			show: true,
			color: '#212529',
			fontSize: '14px'
		  },
		  value: {
			formatter: function (val) {
					  return val + "%";
				  },
			color: '#212529',
			fontSize: '35px',
			show: true,
			offsetY: 10,
		  }
		}
	  }
	},
	fill: {
	  type: 'gradient',
	  gradient: {
		shade: 'light',
		type: 'horizontal',
		shadeIntensity: 0.5,
		gradientToColors: ['#3461ff'],
		inverseColors: false,
		opacityFrom: 1,
		opacityTo: 1,
		stops: [0, 100]
	  }
	},
	colors: ["#3461ff"],
	series: [78],
	stroke: {
	  lineCap: 'round',
	  //dashArray: 4
	},
	labels: ['Disksapce'],
	responsive: [
		{
		  breakpoint: 1281,
		  options: {
			chart: {
				height: 220,
			}
		  }
		}
	  ],

  }

  var chart = new ApexCharts(
	document.querySelector("#chart15"),
	options
  );

  chart.render();










    
});