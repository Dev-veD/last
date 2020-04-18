<?php require_once APPROOT . '/views/includes/header.php'; 
 $statsData = $data["StatsTable"];?>

<style>

.ring-container {
    position: relative;
}

.circle {
    width: 15px;
    height: 15px;
    background-color: #ff0000;
    border-radius: 50%;
    position: absolute;
    top: 25px;
    left: 25px;
}

.ringring {
    border: 3px solid #ff0000;
    -webkit-border-radius: 30px;
    height: 35px;
    width: 35px;
    position: absolute;
    left: 15px;
    top: 15px;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.0
}
@-webkit-keyframes pulsate {
    0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
    50% {opacity: 1.0;}
    100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
}

</style>
 
<div class="page-wrapper">
   
        
    
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7 text-center">
    <div class="container">

  <div class="row h-100 ml-1">
    <div class="col-sm-12 col-md-6 col-lg-6 my-auto" >
            <?php include 'map.php';?>
    </div>

      <div class="col-sm-12 col-md-6 text-center col-lg-6 my-auto">
      <div id="map" style="width:100%; height:450px;">
    </div>
            </div>
    </div>
  </div>

   
  

               <?php include "tableM.html"; ?>


               <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v1.9.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.9.0/mapbox-gl.css" rel="stylesheet" />
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

<script>
   var myVar;
    mapboxgl.accessToken = 'pk.eyJ1IjoibmlraGlsYmhhdHQiLCJhIjoiY2s4bDllM2ZxMDFoNjNmcW8xaTc2aDlkYyJ9.tXFt2KSNEvK38YNSfZ92MQ';
    var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/outdoors-v10',
                        center: [79.37760,30.00000],
                        zoom: 7,
                        interactive:false
                        });
    map.scrollZoom.disable();
    var hotspotlist=[]
    fetch("<?php echo URLROOT;?>public/hotspotdata.json")
        .then(response=>response.json())
        .then(rsp=>{
        
        rsp.forEach(element=>{
                    var district=element.district;
                    var city=element.city;
                    var date=element.date;
                    var active=element.active;
                    var recovered=element.recovered;
                    var death=element.deceased;
                    var hq=element.homequarantine;
                    var fq=element.facilityquarantine;
                    var long=element.longitude;
                    var lat=element.latitude;
                    hotspotlist.push([long,lat,district,city,active,recovered,death,hq,fq,date]);
        });
        });  

    function loadHotspot()
    {
        console.log(hotspotlist)
        var i;
        for(i=0;i<hotspotlist.length;i++)
        {
            var el=document.createElement('div');
            var el1=document.createElement('div');
            var el2=document.createElement('div');
            el.className='ring-container';
            el1.className='ringring';
            el2.className='circle';
            el.appendChild(el1);
            el.appendChild(el2);
            new mapboxgl.Marker(el).setLngLat([hotspotlist[i][0],hotspotlist[i][1]])
                                .setPopup(new mapboxgl.Popup({})
                                .setHTML('<h5>' +hotspotlist[i][3]+', '+hotspotlist[i][2] + '</h5><p style="color:black;"> Active='+hotspotlist[i][4]+'</p><p style="color:black;"> Recovered='+hotspotlist[i][5]+'</p><p style="color:black;"> Death='+hotspotlist[i][6]+'</p><p style="color:black;">Home Quarantine='+hotspotlist[i][7]+'</p><p style="color:black;">Fascility Quarantine=' + hotspotlist[i][8] + '</p>'))
                                .addTo(map);
        }
    }
    function loadFunction()
        {
            if(Array.isArray(hotspotlist)&& hotspotlist.length)
            {
                clearInterval(myVar);
                setTimeout(loadHotspot,1000);
            }
            else
            {
                myVar=setInterval(loadFunction,5000);
            }
        }

    setTimeout(loadFunction, 1500); 
</script>
 <?php require_once APPROOT . '/views/includes/footer.php'; ?>
