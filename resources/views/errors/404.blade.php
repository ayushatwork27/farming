<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digi Entry</title>

<style>

body{
    background-image: url(images/pattern.png); 
    background-size:cover; font-family: 'Lato', sans-serif;  
}
.wrap{ 
    width: 90%;margin: 0px auto;
    max-width: 1280px;min-width: 300px;
    padding: 0% 2%;
}
.logo{ 
    float: left;
}
.oopsIcn{ 
    margin:0 auto; display:block; 
    padding-top:60px;
}
h1{
    font-size: 78px;
    line-height: 85px;
    font-weight: bold;
    color: #1e688c;
    text-align: center;
    margin: 0px;
    margin-bottom: 18px;
}
	
h2{ 
    font-size: 25px;
    line-height: 38px;
    color: #333;
    text-align: center;
    margin: 0px;
    margin-bottom: 12px;
    letter-spacing: .5px;
    font-weight: 100;
}
p{ 
    font-size:20px; 
    line-height:25px; 
    text-align:center;
}
.clear{ 
    clear:both;
}
</style>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
    <body>
        <div class="wrap">
            <a href="http://digientry.com/" class="logo">
                <img src="{{asset('images/logo.png')}}"/>
            </a>
            <div class="clear"></div>

            <img src="{{asset('images/icon1.png')}}" class="oopsIcn">
            <h1>Oops!</h1>
            <h2>We can't seem to find the page you're looking for.</h2>
        </div>
    </body>
</html>
