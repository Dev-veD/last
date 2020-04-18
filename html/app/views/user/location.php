<?php require_once APPROOT.'/views/includes/header.php';
$cnt=0;?>
<style>

.redmarker {
  background-image: url('<?php echo URLROOT;?>public/images/redmarker.png');
  background-size: cover;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}
.greenmarker {
  background-image: url('<?php echo URLROOT;?>public/images/greenmarker.png');
  background-size: cover;
  width: 25px;
  height: 25px;
  border-radius: 100%;
}
.yellowmarker {
  background-image: url('<?php echo URLROOT;?>public/images/yellowmarker.png');
  background-size: cover;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}
.bluemarker {
  background-image: url('<?php echo URLROOT;?>public/images/bluemarker.png');
  background-size: cover;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}
.userlocation{
    background-image: url('<?php echo URLROOT;?>public/images/profile.svg');
  background-size: cover;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}
</style>

<div class="card">
    <div class="card-header">
        <h4>Data Set Of Patients</h4>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link"  href="<?php echo URLROOT;?>CovidNearYou">Patients</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo URLROOT;?>CovidNearYou/location/">Location</a>
            </li>

        <li class="nav-item ml-auto justify-content-end " >
                <button class="btn btn-danger" type="button" onclick="loadSafeZoneInformation();">
                    Are you in Safe Zone<i class="las la-question" style="color:white;"></i></button>
         </li>
        </ul>
    </div>
    <div id="map" style="width:100%; height:550px;">
    </div>

    <div class="mt-2">
        <h4>Notation</h4>
    </div>
    <div class="mt-2">
        <div class="media">
                <span class="media-left">
                    <img style="heigh:20px;width:20px;"src=" <?php echo URLROOT;?>public/images/profile.svg"alt="Your location">
                </span>
                <div class="media-body">
                <p> Your Location <span style="font-size:10px;">* Click over safe zone info to see your location</span></p> 
            </div>
        </div>
    <div>
    <div class="media">
                <span class="media-left">
                    <img style="heigh:20px;width:20px;"src=" <?php echo URLROOT;?>public/images/yellowmarker.png"alt="Yellow Dot">
                </span>
                <div class="media-body">
                <p> Active case</p> 
            </div>
        </div>
        
    <div class="media">
        <span class="media-left">
            <img style="heigh:20px;width:20px;"src=" <?php echo URLROOT;?>public/images/greenmarker.png"alt="Green Dot">
        </span>
        <div class="media-body">
            <p> Recovered case</p> 
        </div>
    </div>
    <div>
        <div class="media">
            <span class="media-left">
                <img style="heigh:20px;width:20px;"src=" <?php echo URLROOT;?>public/images/redmarker.png"alt="Red Dot">
            </span>
            <div class="media-body">
                <p> Deceive case</p> 
            </div>
        </div>
    </div>
    <div>
    <div class="media">
        <span class="media-left">
            <img style="heigh:20px;width:20px;"src=" <?php echo URLROOT;?>public/images/bluemarker.png"alt="Blue Dot">
        </span>
        <div class="media-body">
            <p> Total Suspected <span style="font-size:10px;">* It contains whole district Quarantine Data</span></p> 
        </div>
    </div>
</div>
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
                        style: 'mapbox://styles/mapbox/dark-v10',
                        center: [79.0193,30.0668],
                        zoom: 8
                        });

    map.addControl(
    new mapboxgl.GeolocateControl({
    positionOptions: {
    enableHighAccuracy: true
    },
    trackUserLocation: true
    })
    );
                
    var list=[],districtlist=[];
    fetch("<?php echo URLROOT;?>public/uttarakhanddata.json")
        .then(response=>response.json())
        .then(rsp=>{
        
        rsp.forEach(element=>{
                    var district=element.district;
                    var city=element.city;
                    var status=element.currentstatus;
                    var date=element.dateannounced;
                    var typeoftransmission=element.transmissiontype;
                    var patientnumber=element.patientnumber;
                    var long=element.longitude;
                    var lat=element.latitude;
                    if(status=='Confirmed'||status=='Recovered'||status=='Deceased'||status=='Active')
                    {      
                        list.push([long,lat,district,status,date,typeoftransmission,city,patientnumber]);
                    }
        });
        });  

        fetch("<?php echo URLROOT;?>public/districtdata.json")
        .then(response=>response.json())
        .then(rsp=>{
        
        rsp.forEach(element=>{
                    var district=element.district;
                    var hq=element.quarantined_home;
                    var gq=element.quarantined_government;
                    mapboxClient.geocoding
                        .forwardGeocode({
                        query:district.concat(',uttarakhand'),
                        autocomplete: true,
                        limit: 1
                        })
                        .send()
                        .then(function(response) {
                        if (
                        response &&
                        response.body &&
                        response.body.features &&
                        response.body.features.length
                        ) {
                        var feature = response.body.features[0];
                        long=feature.center[0];
                        lat=feature.center[1];
                        districtlist.push([long,lat,district,hq,gq]);
                        }   
                        });
        });
        }); 


        function loaddistrict(){

            var y,longi,lati;
            console.log(districtlist);
            for(y=0;y<districtlist.length;y++)
            {
                var el=document.createElement('div');
                el.className='bluemarker';
                new mapboxgl.Marker(el).setLngLat([districtlist[y][0],districtlist[y][1]])
                                .setPopup(new mapboxgl.Popup({})
                                .setHTML('<h5>' + districtlist[y][2] + '</h5><p style="color:black;">Home Quarantine='+districtlist[y][3]+'</p><p style="color:black;">Fascility Quarantine=' + districtlist[y][4] + '</p>'))
                                .addTo(map);
            }
        }

        setTimeout(loaddistrict,1000);

        function loadMarker()
        {
            var y,longi,lati;
            console.log(list);
            for (y=0;y<list.length;y++)
            {
                var el=document.createElement('div');
                if(list[y][3]=='Recovered'||list[y][3]=='recovered')
                {
                     el.className='greenmarker'; 
                }
                else
                if(list[y][3]=='Deceased'||list[y][3]=='deceased'){
                    el.className='redmarker'; 
                }
                else
                {
                    el.className='yellowmarker'; 
                }
                longi=list[y][0];
                lati=list[y][1];
                
                if(list[y][6]=='')
                {
                    list[y][6]='Unknown';
                }
                if(list[y][5]=='')
                {
                    list[y][5]='Not known';
                }

                new mapboxgl.Marker(el).setLngLat([longi,lati])
                                .setPopup(new mapboxgl.Popup({})
                                .setHTML('<h5 style="color:blue;">' + list[y][2] + '</h5><br><p style="color:black;">Patient no='+list[y][7]+'</p><p style="color:black;">current status=' + list[y][3] + '</p><p style="color:black;">detected city='+list[y][6]+'</p><p style="color:black;"> date anounced= '+list[y][4]+ '</p><p style="color:black;">Transmission Type='+list[y][5]+'</p>'))
                                .addTo(map);
                }
            }

        function loadFunction()
        {
            if(Array.isArray(list)&& list.length)
            {
                clearInterval(myVar);
                setTimeout(loadMarker,1000);
            }
            else
            {
                myVar=setInterval(loadFunction,5000);
            }
        }

        setTimeout(loadFunction, 1500); 
        
        function distance(lon1, lat1, lon2, lat2) {

            var R = 6371; // Radius of the earth in km
            var dLat = (lat2 - lat1).toRad(); // Javascript functions in radians
            var dLon = (lon2 - lon1).toRad();
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c; // Distance in km
            return d;
        }

        /** Converts numeric degrees to radians */
        if (typeof(Number.prototype.toRad) === "undefined") {
            Number.prototype.toRad = function() {
                return this * Math.PI / 180;
            }
        }
        function loadSafeZoneInformation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);

            } else {
                alert("Geolocation is not supported by this browser.");
            }
            
            var el=document.createElement('div');
            el.className='userlocation';

            function showPosition(position) {
                var user = [];
                user[0] = position.coords.latitude;
                user[1] = position.coords.longitude;
                var count = 0;
                new mapboxgl.Marker(el).setLngLat([user[1],user[0]])
                                .setPopup(new mapboxgl.Popup({})
                                .setHTML('<h5>  Your Location </h5><p style="color:black;">Latitude='+user[0]+'</p><p style="color:black;">Longitude=' + user[1] + '</p>'))
                                .addTo(map);


                for (var i = 0; i < list.length; i++) {
                    if(list[i][3]!='Recovered'&&list[i][3]!='recovered'){
                    var dist = distance(parseFloat(list[i][0]), parseFloat(list[i][1]), user[1], user[0]);
                    if (dist <= 2.0) {
                        count++;
                    }
                    }

                }
                if (count == 0) {
                    swal("You are in safe zone", "There is no Covid19 Patient near you within 2Km or range. Stay Home Stay Safe", "success");
                } else {
                    swal("Stay Home!", "There are " + count + " Covid19 Patient in your 2Km range Stay Home Stay safe", "warning");
                }


            }

        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php require_once APPROOT . '/views/includes/footer.php'; ?>
