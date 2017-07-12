var weburl = "//www.da-abroad.org/da-abroad-team";

var map = AmCharts.makeChart( "chartdiv", {
  "type": "map",
  "areasSettings": {
    "outlineThickness": 0.8,
    "unlistedAreasColor": "#68c8ed",
    "unlistedAreasAlpha": 0.7
  },
  "imagesSettings": {
    "color": "#ffd000",
    "rollOverColor": "#ffd000",
    "selectedColor": "#ffd000"
  },
  "linesSettings": {
    "arc": -0.8, // this makes lines curved. Use value from -1 to 1
    "arrow": "middle",
    "color": "#ffd000",
    "alpha": 1,
    "arrowAlpha": 1,
    "arrowSize": 9,
    "thickness": 2
  },
  "zoomControl": {
    "gridHeight": 100,
    "draggerAlpha": 1,
    "gridAlpha": 0.2,
    "top": 225
  },
  "backgroundZoomsToTop": true,
  "linesAboveImages": true,  
  "dataProvider": {
    "map": "worldLow",
    zoomLevel: 1.1,
    zoomLongitude: 22.9255702,
    zoomLatitude: 37.6632204,
    images: [ {
      title: "DA, South Africa",
      latitude: -33.9658835,
      longitude: 18.0680207,
      url: "https://www.da.org.za/",
      urlTarget: "_blank",
      scale: 1
    }, {
      title: "Accra, Ghana",
      latitude: 5.5911921,
      longitude: -0.3198162,
      url: weburl + "/ghana/",
      scale: 0.5
    }, {
      title: "Nairobi, Kenya",
      latitude: -1.3044564,
      longitude: 36.7069661,
      url: weburl + "/kenya/",
      scale: 0.5
    }, {
      title: "Mali",
      latitude: 12.6128895,
      longitude: -8.1359437,
      url: weburl + "/mali/",
      scale: 0.5
    }, {
      title: "Israel",
      latitude: 32.0880162,
      longitude: 34.7270339,
      url: weburl + "/israel/",
      scale: 0.5
    }, {
      title: "New York, USA",
      latitude: 40.7058299,
      longitude: -74.2588788,
      url: weburl + "/usa/",
      scale: 0.5
    }, {
      title: "Canada",
      latitude: 45.2502958,
      longitude: -76.0811295,
      url: weburl + "/canada/",
      scale: 0.5
    }, {
      title: "Hong Kong, China",
      latitude: 22.3595965,
      longitude: 114.0004384,
      url: weburl + "/china/",
      scale: 0.5
    }, {
      title: "Shanghai, China",
      latitude: 31.2366325,
      longitude: 121.2122259,
      url: weburl + "/china/",
      scale: 0.5
    }, {
      title: "Taipei, Taiwan",
      latitude: 25.0175849,
      longitude: 121.2254957,
      url: weburl + "/china/",
      scale: 0.5
    }, {
      title: "Bangkok, Thailand",
      latitude: 13.7248944,
      longitude: 100.4926801,
      url: weburl + "/thailand/",
      scale: 0.5
    }, {
      title: "Seoul, South Korea",
      latitude: 37.5652894,
      longitude: 126.8494657,
      url: weburl + "/south-korea/",
      scale: 0.5
    }, {
      title: "Sri-Lanka",
      latitude: 7.8766821,
      longitude: 78.4500974,
      url: weburl + "/sri-lanka/",
      scale: 0.5
    }, {
      title: "Sydney, Australia",
      latitude: -33.8474011,
      longitude: 150.6510881,
      url: weburl + "/australia/",
      scale: 0.5
    }, {
      title: "Perth, Australia",
      latitude: -32.0376607,
      longitude: 115.3997071,
      url: weburl + "/australia/",
      scale: 0.5
    }, {
      title: "Melbourne, Australia",
      latitude: -37.8274134,
      longitude: 144.9351608,
      url: weburl + "/australia/",
      scale: 0.5
    }, {
      title: "Auckland, New Zealand",
      latitude: -36.8621432,
      longitude: 174.5845961,
      url: weburl + "/new-zealand/",
      scale: 0.5
    }, {
      title: "Wellington, New Zealand",
      latitude: -41.2440266,
      longitude: 174.6214274,
      url: weburl + "/new-zealand/",
      scale: 0.5
    }, {
      title: "Christchurch, New Zealand",
      latitude: -43.5128018,
      longitude: 172.4586504,
      url: weburl + "/new-zealand/",
      scale: 0.5
    }, {
      title: "London, UK",
      latitude: 51.5287718,
      longitude: -0.2416813,
      url: weburl + "/united-kingdom/",
      scale: 0.5
    }, {
      title: "Edinburgh, UK",
      latitude: 55.9411417,
      longitude: -3.2755948,
      url: weburl + "/united-kingdom/",
      scale: 0.5
    }, {
      title: "Newcastle, UK",
      latitude: 55.0026008,
      longitude: -1.692134,
      url: weburl + "/united-kingdom/",
      scale: 0.5
    }, {
      title: "Paris, France",
      latitude: 48.8589506,
      longitude: 2.2773453,
      url: weburl + "/france/",
      scale: 0.5
    }, {
      title: "Frankfurt, Germany",
      latitude: 50.1213475,
      longitude: 8.4961368,
      url: weburl + "/germany/",
      scale: 0.5
    }, {
      title: "Dublin, Ireland",
      latitude: 53.3244427,
      longitude: -6.3861307,
      url: weburl + "/ireland/",
      scale: 0.5
    }, {
      title: "St Paul's Bay, Malta",
      latitude: 35.9357129,
      longitude: 14.3641634,
      url: weburl + "/malta/",
      scale: 0.5
    } ],
    /*lines: [ {
      latitudes: [ -33.9658835, 5.5911921 ],
      longitudes: [ 18.0680207, -0.3198162 ]
    }, {
      latitudes: [ -33.9658835, -1.3044564 ],
      longitudes: [ 18.0680207, 36.7069661 ]
    }, {
      latitudes: [ -33.9658835, 12.6128895 ],
      longitudes: [ 18.0680207, -8.1359437 ]
    }, {
      latitudes: [ -33.9658835, 32.0880162 ],
      longitudes: [ 18.0680207, 34.7270339 ]
    }, {
      latitudes: [ -33.9658835, 40.7058299 ],
      longitudes: [ 18.0680207, -74.2588788 ]
    }, {
      latitudes: [ -33.9658835, 45.2502958 ],
      longitudes: [ 18.0680207, -76.0811295 ]
    }, {
      latitudes: [ -33.9658835, 22.3595965 ],
      longitudes: [ 18.0680207, 114.0004384 ]
    }, {
      latitudes: [ -33.9658835, 31.2366325 ],
      longitudes: [ 18.0680207, 121.2122259 ]
    }, {
      latitudes: [ -33.9658835, 25.0175849 ],
      longitudes: [ 18.0680207, 121.2254957 ]
    }, {
      latitudes: [ -33.9658835, 13.7248944 ],
      longitudes: [ 18.0680207, 100.4926801 ]
    }, {
      latitudes: [ -33.9658835, 51.5287718 ],
      longitudes: [ 18.0680207, -0.2416813 ]
    }, {
      latitudes: [ -33.9658835, 48.8589506 ],
      longitudes: [ 18.0680207, 2.2773453 ]
    }, {
      latitudes: [ -33.9658835, 50.1213475 ],
      longitudes: [ 18.0680207, 8.4961368 ]
    }, {
      latitudes: [ -33.9658835, 37.5652894 ],
      longitudes: [ 18.0680207, 126.8494657 ]
    }, {
      latitudes: [ -33.9658835, 7.8766821 ],
      longitudes: [ 18.0680207, 78.4500974 ]
    }, {
      latitudes: [ -33.9658835, -33.8474011 ],
      longitudes: [ 18.0680207, 150.6510881 ]
    }, {
      latitudes: [ -33.9658835, -32.0376607 ],
      longitudes: [ 18.0680207, 115.3997071 ]
    }, {
      latitudes: [ -33.9658835, -37.8274134 ],
      longitudes: [ 18.0680207, 144.9351608 ]
    }, {
      latitudes: [ -33.9658835, -36.8621432 ],
      longitudes: [ 18.0680207, 174.5845961 ]
    }, {
      latitudes: [ -33.9658835, -41.2440266 ],
      longitudes: [ 18.0680207, 174.6214274 ]
    }, {
      latitudes: [ -33.9658835, -43.5128018 ],
      longitudes: [ 18.0680207, 172.4586504 ]
    }, {
      latitudes: [ -33.9658835, 53.3244427 ],
      longitudes: [ 18.0680207, -6.3861307 ]
    }, {
      latitudes: [ -33.9658835, 35.9357129 ],
      longitudes: [ 18.0680207, 14.3641634 ]
    }, {
      latitudes: [ -33.9658835, 55.9411417 ],
      longitudes: [ 18.0680207, -3.2755948 ]
    }, {
      latitudes: [ -33.9658835, 55.0026008 ],
      longitudes: [ 18.0680207, -1.692134 ]
    } ],*/
  }
});

// add events to recalculate map position when the map is moved or zoomed
	map.addListener("positionChanged", updateCustomMarkers);

	// this function will take current images on the map and create HTML elements for them
	function updateCustomMarkers(event) {
	  // get map object
	  var map = event.chart;

	  // go through all of the images
	  for (var x in map.dataProvider.images) {
	    // get MapImage object
	    var image = map.dataProvider.images[x];

	    // check if it has corresponding HTML element
	    if ('undefined' == typeof image.externalElement)
	      image.externalElement = createCustomMarker(image);

	    // reposition the element accoridng to coordinates
	    var xy = map.coordinatesToStageXY(image.longitude, image.latitude);
	    image.externalElement.style.top = xy.y + 'px';
	    image.externalElement.style.left = xy.x + 'px';
	  }
	}

	// this function creates and returns a new marker element
	function createCustomMarker(image) {
	  // create holder
	  var holder = document.createElement('div');
	  holder.className = 'map-marker';
	  holder.title = image.title;
	  holder.style.position = 'absolute';

	  // maybe add a link to it?
	  if (undefined != image.url) {
	    holder.onclick = function() {
	      window.location.href = image.url;
	    };
	    holder.className += ' map-clickable';
	  }

	  // create dot
	  var dot = document.createElement('div');
	  dot.className = 'dot';
	  holder.appendChild(dot);

	  // create pulse
	  var pulse = document.createElement('div');
	  pulse.className = 'pulse';
	  holder.appendChild(pulse);

	  // append the marker to the map container
	  image.chart.chartDiv.appendChild(holder);
	  return holder;
	}