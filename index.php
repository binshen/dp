<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>中国室内环境安监大数据系统指挥中心</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">

  <?php
    $k = @$_GET['k'];
    $loc_names = ['北京市蓝星汽车修理厂(39.837595,116.438341)', '辽宁丹东永兴机械厂(40.201055,124.285136)', '厦门鼓浪屿(24.452266,118.073486)', '西藏山南地区幼儿园(29.242729,91.775864)'];
    $lvl_spans = ['<span class="tag tag_l5">重度污染</span>', '<span class="tag tag_l4">中度污染</span>', '<span class="tag tag_l1">优</span>', '<span class="tag tag_l1">优</span>'];
    $locations = ['bj', 'ln', 'xm', 'xz'];
    $loc_codes = ['101010100', '101070601', '101230201', '101140301'];
    $yyht_rates = [6, 6, 0, 0];
    $pm25_datas = [220, 182, 15, 30];
    $pm25_rates = [7, 7, 4, 2];

    $loc = $locations[$k];
    $loc_name = $loc_names[$k];
    $lvl_span = $lvl_spans[$k];
    $loc_code = $loc_codes[$k];
    $yyht_rate = $yyht_rates[$k];
    $pm25_data = $pm25_datas[$k];
    $pm25_rate = $pm25_rates[$k];
  ?>

  <style>
      body{margin:0;background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%;font-family:"Segoe UI","Lucida Grande",Helvetica,Arial,"Microsoft YaHei",FreeSans,Arimo,"Droid Sans","wenquanyi micro hei","Hiragino Sans GB","Hiragino Sans GB W3",FontAwesome,sans-serif;font-weight:400;color:#333;font-size:1.6rem;
          animation:mybgimg 20s infinite;-webkit-animation:mybgimg 20s infinite;}
      @keyframes mybgimg{
          0%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:130% 130%}
          3%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%}
          20%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%}
          40%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg2.jpg) center center  no-repeat;background-size:100% 100%}
          60%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg2.jpg) center center  no-repeat;background-size:100% 100%}
          80%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg3.jpg) center center  no-repeat;background-size:100% 100%}
          100%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%}
      }
      @-webkit-keyframes mybgimg{
          0%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:130% 130%}
          3%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%}
          20%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%}
          40%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg2.jpg) center center  no-repeat;background-size:100% 100%}
          60%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg2.jpg) center center  no-repeat;background-size:100% 100%}
          80%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg3.jpg) center center  no-repeat;background-size:100% 100%}
          100%{background:#071346 url(assets/images/<?php echo $loc; ?>/bg1.jpg) center center no-repeat;background-size:100% 100%}
      }
  </style>
  <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
     <span class="logo"><img src="assets/images/logo.png"></span><strong>七星博士</strong> <span class="small_t"><?php echo $loc_name; ?> - <strong>工业级</strong></span>
  </div>
</header>
  <div class="admin-content">
      <ul class="am-avg-sm-1 am-padding am-avg-md-8 am-text-center">
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico01.png"></span><br/>PM2.5
<?php echo $lvl_span; ?>
        </br><span id="pm25Temp">0</span>(ug/m³)</a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico02.png"></span><br/>甲醛<br/><span id="jiaquanTemp">0</span>(mg/m³)</a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico03.png"></span><br/>温度<br/><span id="wenduTemp">27</span></a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico04.png"></span><br/>氧气<br/><span id="yangqiTemp">0</span>(%)</a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico05.png"></span><br/>二氧化硫<br/><span id="eyhlTemp">0</span>(ppm)</a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico06.png"></span><br/>一氧化碳<br/><span id="yyhtTemp">0</span>(ppm)</a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico07.png"></span><br/>湿度<br/><span id="shifuTemp">41</span>(%RH)</a></li>
        <li class="ico_info"><a class="am-text-success"><span class="am-icon-btn am-icon-file-text"><img src="assets/images/ico08.png"></span><br/>氯气<br/><span id="lvqiTemp">0</span>(ppm)</a></li>
      </ul>
      <ul class="am-avg-sm-1 am-avg-md-2 am-text-center content_box">
        <li id="pm25" class="chart_box"></li>
        <li id="jiaquan" class="chart_box"></li>
      </ul>
      <ul class="am-avg-sm-1 am-avg-md-2 am-text-center content_box">
        <li id="eyhl" class="chart_box"></li>
        <li id="yyht" class="chart_box"></li>
      </ul>
    <footer class="admin-content-footer">
      <p class="am-padding-left">© 2016 七星博士 版权所有</p>
    </footer>
  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/highcharts.js"></script>

<script>
window.index = 0;
window.jiaquan = [0,0.01,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0.012,0,0,0,0,0,0,0,0.015,0,0,0,0,0,0,0,0];
$(function () {                                                                     
    $(document).ready(function() {                                                  
        Highcharts.setOptions({                                                     
            global: {                                                               
                useUTC: false                                                       
            }                                                                       
        });
        var chart;
        $('#pm25').highcharts({
            chart: {
                type: 'spline',                                                     
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {                                              
                        // set up the updating of the chart each second             
                        var series = this.series[0];                                
                        setInterval(function() {                                    
                            var x = (new Date()).getTime(), // current time         
                                y = <?php echo $pm25_data; ?> + Math.random() * <?php echo $pm25_rate; ?>;
                            $("#pm25Temp").html(y.toFixed())
                            $("#yangqiTemp").html(((20.5 + Math.random()).toFixed(1)))
                            $("#pm25Temp").html(y.toFixed())
                            $("#pm25Temp").html(y.toFixed())               
                            series.addPoint([x, y], true, true);                    
                        }, 6000);                                                   
                    }                                                               
                }
            },
            plotOptions: {
                spline: {
                    marker: {
                        enabled:true,
                        symbol: 'circle',//曲线点类型："circle", "square", "diamond", "triangle","triangle-down"，默认是"circle"
                        radius:3,//曲线点半径，默认是4
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            title: {                                                                
                text: 'PM2.5'                                            
            },                                                                      
            xAxis: {                                                                
                type: 'datetime',                                                   
                tickPixelInterval:100
            },
            yAxis: {                                                                
                title: {                                                            
                    text: 'ug/m³'
                },
                min:0,
                tickPixelInterval:30,
                // plotLines:[{
                //     color:'red',           //线的颜色，定义为红色
                //     dashStyle:'solid',     //默认值，这里定义为实线
                //     value:75,               //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                //     width:1                //标示线的宽度，2px
                // }]
            },
            series: [{                                                              
                name: 'PM2.5',                                                
                data: (function() {                                                 
                    // generate an array of random data                             
                    var data = [],                                                  
                        time = (new Date()).getTime(),                              
                        i;                                                          
                                                                                    
                    for (i = -30; i <= 0; i++) {
                        y = <?php echo $pm25_data; ?> + Math.random() * <?php echo $pm25_rate; ?>;
                        data.push({                                                 
                            x: time + i * 1000 * 6,                                     
                            y: y                      
                        });       
                        if(i == 0){
                          $("#pm25Temp").html(y.toFixed())
                        }                                                  
                    }
                    $("#yangqiTemp").html(((20.3 + Math.random()).toFixed(1)));
                    return data;                                                    
                })()                                                                
            }]                                                                      
        });
      $('#jiaquan').highcharts({                                                
        chart: {                                                                
            type: 'spline',                                                     
            animation: Highcharts.svg, // don't animate in old IE               
            marginRight: 10,                                                    
            events: {                                                           
                load: function() {
                    // set up the updating of the chart each second
                    var series = this.series[0];
                    <?php if($k<2) { ?>
                        setInterval(function() {
                            var x = (new Date()).getTime(), // current time
                                y = 0.05 + Math.random()/10;
                            $("#jiaquanTemp").html(y.toFixed(2));
                            series.addPoint([x, y], true, true);
                        }, 6000);
                    <?php } else if($k<4) { ?>
                        setInterval(function() {
                            window.index++;
                            if(window.index > 30){
                                window.index = 0;
                            }
                            var x = (new Date()).getTime(), // current time
                                y = window.jiaquan[window.index];
                            $("#jiaquanTemp").html(y.toFixed(2));
                            series.addPoint([x, y], true, true);
                        }, 6000);
                <?php } ?>
                }                                                               
            }                                                                   
        },
        plotOptions: {
              spline: {
                  marker: {
                      enabled:true,
                      symbol: 'circle',//曲线点类型："circle", "square", "diamond", "triangle","triangle-down"，默认是"circle"
                      radius:3,//曲线点半径，默认是4
                      states: {
                          hover: {
                              enabled: true
                          }
                      }
                  }
              }
        },
		colors: ['#de7cec'],                                                                      
        title: {                                                                
            text: '甲醛'                                            
        },                                                                      
        xAxis: {                                                                
            type: 'datetime',                                                   
            tickPixelInterval: 100
        },                                                                      
        yAxis: {                                                                
            title: {                                                            
                text: 'mg/m³'                                                   
            },
            tickPixelInterval:20,
            min:0,
            // plotLines:[{
            //     color:'red',           //线的颜色，定义为红色
            //     dashStyle:'solid',     //默认值，这里定义为实线
            //     value:.1,               //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
            //     width:1                //标示线的宽度，2px
            // }]
        },
        series: [{                                                              
            name: '甲醛',                                                
            data: (function() {                                                 
                // generate an array of random data                             
                var data = [],                                                  
                    time = (new Date()).getTime(),                              
                    i;
                for (i = -30; i <= 0; i++) {   
                    y = <?php if($k < 2) { ?>0.05 + Math.random()/10;<?php } else { ?>0<?php } ?>;
                    data.push({                                                 
                        x: time + i * 1000 * 6,                                     
                        y: y     
                    });  
                    if(i == 0){
                      $("#jiaquanTemp").html(y.toFixed(2))
                    }                                                         
                }
                return data;                                                    
            })()                                                                
        }]                                                                      
    });
    $('#eyhl').highcharts({                                                
        chart: {                                                                
            type: 'spline',                                                     
            animation: Highcharts.svg, // don't animate in old IE               
            marginRight: 10,                                                    
            events: {                                                           
                load: function() {
                    // set up the updating of the chart each second             
                    var series = this.series[0];
                    setInterval(function() {
                        var x = (new Date()).getTime(), // current time
                            y = 0.1 + Math.random()/100;
                        $("#eyhlTemp").html(y.toFixed(3));
                        series.addPoint([x, y], true, true);                    
                    }, 6000);
                }
            }
        },
        plotOptions: {
            spline: {
                marker: {
                    enabled:true,
                    symbol: 'circle',//曲线点类型："circle", "square", "diamond", "triangle","triangle-down"，默认是"circle"
                    radius:3,//曲线点半径，默认是4
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
		colors:[ '#ff8a68'],                                                            
        title: {                                                                
            text: '二氧化硫'                                            
        },                                                                      
        xAxis: {                                                                
            type: 'datetime',                                                   
            tickPixelInterval: 100
        },                                                                      
        yAxis: {                                                                
            title: {                                                            
                text: 'ppm'                                                   
            },
            min: 0,
            tickPixelInterval:30,
            plotLines: [{                                                       
                value: 0,                                                       
                width: 1,                                                       
                color: '#ff8a68'                                                
            }]                                                                  
        },                                                                     
                                                               
        series: [{                                                              
            name: '二氧化硫',                                                
            data: (function() {                                                 
                // generate an array of random data                             
                var data = [],                                                  
                    time = (new Date()).getTime(),                              
                    i;
                for (i = -30; i <= 0; i++) {    
                    y = 0.1 + Math.random()/100;
                    data.push({                                                 
                        x: time + i * 1000 * 6,                                     
                        y: y        
                    });  
                    if(i == 0){
                      $("#eyhlTemp").html(y.toFixed(3))
                    }                                                         
                }
                return data;                                                    
            })()                                                                
        }]
    });
    $('#yyht').highcharts({
        chart: {
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function() {
                    // set up the updating of the chart each second
                    var series = this.series[0];
                    setInterval(function() {
                        var x = (new Date()).getTime(), // current time
                            y = <?php echo $yyht_rate; ?> + Math.random() * 1;
                        $("#yyhtTemp").html(y.toFixed(2));
                        series.addPoint([x, y], true, true);                    
                    }, 6000);                                                   
                }                                                               
            }                                                                   
        },
        plotOptions: {
            spline: {
                marker: {
                    enabled:true,
                    symbol: 'circle',//曲线点类型："circle", "square", "diamond", "triangle","triangle-down"，默认是"circle"
                    radius:3,//曲线点半径，默认是4
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
		colors:[ '#8ecd76'],
        title: {                                                                
            text: '一氧化碳'                                            
        },                                                                      
        xAxis: {                                                                
            type: 'datetime',                                                   
            tickPixelInterval: 100
        },                                                                      
        yAxis: {                                                                
            title: {                                                            
                text: 'ppm'                                                   
            },
            min:0,
            tickPixelInterval:30,
            plotLines: [{                                                       
                value: 0,
                width: 1,                                                       
                color: '#8ecd76'                                                
            }]                                                                  
        },
        series: [{                                                              
            name: '一氧化碳',                                                
            data: (function() {                                                 
                // generate an array of random data                             
                var data = [],                                                  
                    time = (new Date()).getTime(),                              
                    i;
                for (i = -30; i <= 0; i++) {  
                    y = <?php echo $yyht_rate; ?> + Math.random() * 1;
                    data.push({                                                 
                        x: time + i * 1000 * 6,                                     
                        y: y                        
                    });   
                    if(i == 0){
                      $("#yyhtTemp").html(y.toFixed(2));
                    }                                                       
                }
                return data;                                                    
            })()                                                                
        }]                                                                      
    });
    });
});  

//获取温度
    $.getJSON('http://121.40.92.176:3000/device/code/<?php echo $loc_code; ?>/get_weather',function(data){
      data = eval("(" + data + ")");
      $("#wenduTemp").html(data.weatherinfo.temp);
      console.log(data.weatherinfo.temp);
    }) 
setInterval(function(){
    $.getJSON('http://121.40.92.176:3000/device/code/<?php echo $loc_code; ?>/get_weather',function(data){
      data = eval("(" + data + ")");
      $("#wenduTemp").html(data.weatherinfo.temp);
      console.log(data.weatherinfo.temp);
    }) 
}, 60000);
</script>
</body>
</html>
