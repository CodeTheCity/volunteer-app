//from http://github.com/zuk/jquery.inview/
(function(d){var p={},e,a,h=document,i=window,f=h.documentElement,j=d.expando;d.event.special.inview={add:function(a){p[a.guid+"-"+this[j]]={data:a,$element:d(this)}},remove:function(a){try{delete p[a.guid+"-"+this[j]]}catch(d){}}};d(i).bind("scroll resize",function(){e=a=null});!f.addEventListener&&f.attachEvent&&f.attachEvent("onfocusin",function(){a=null});setInterval(function(){var k=d(),j,n=0;d.each(p,function(a,b){var c=b.data.selector,d=b.$element;k=k.add(c?d.find(c):d)});if(j=k.length){var b;
if(!(b=e)){var g={height:i.innerHeight,width:i.innerWidth};if(!g.height&&((b=h.compatMode)||!d.support.boxModel))b="CSS1Compat"===b?f:h.body,g={height:b.clientHeight,width:b.clientWidth};b=g}e=b;for(a=a||{top:i.pageYOffset||f.scrollTop||h.body.scrollTop,left:i.pageXOffset||f.scrollLeft||h.body.scrollLeft};n<j;n++)if(d.contains(f,k[n])){b=d(k[n]);var l=b.height(),m=b.width(),c=b.offset(),g=b.data("inview");if(!a||!e)break;c.top+l>a.top&&c.top<a.top+e.height&&c.left+m>a.left&&c.left<a.left+e.width?
(m=a.left>c.left?"right":a.left+e.width<c.left+m?"left":"both",l=a.top>c.top?"bottom":a.top+e.height<c.top+l?"top":"both",c=m+"-"+l,(!g||g!==c)&&b.data("inview",c).trigger("inview",[!0,m,l])):g&&b.data("inview",!1).trigger("inview",[!1])}}},250)})(jQuery);
//Prettify

(function(b){function a(d,l,k,n,g,e,i,j){var c="<div class='ie-l-t-c'></div><div class='ie-t'></div><div class='ie-r-t-c'></div><div class='ie-l'></div><div class='ie-c'><span class='ie-span'>"+k+"</span><p class='ie-p'>"+n+"</span><div class='ie-u'><div class='ie-u-l'></div><a href='"+e+"' target='_blank'><div class='ie-u-c'><span class='ie-u-s'>"+g+"</span></div></a><div class='ie-u-r'></div></div></div><div class='ie-r'></div><div class='ie-l-b-c'></div><div class='ie-b'></div><div class='ie-r-b-c'></div>";var h=b("<div id='ie-alert-overlay'></div>");var m=b("<div id='ie-alert-panel'>"+c+"</div>");var o=b(document).height();h.css("height",o);function f(){d.prepend(m);d.prepend(h);var q=b(".ie-c").css("height");b(".ie-l").css("height",q);b(".ie-r").css("height",q);var s=b(".ie-u-c").width();b(".ie-u").css("margin-left",-(s/2+14));var r=b("#ie-alert-panel");var p=b("#ie-alert-overlay");var t=b(".ie-r-t-c");if(j===false){t.css("background-position","-145px -58px");t.click(function(u){u.preventDefault();});}else{t.click(function(){r.fadeOut(100);p.fadeOut("slow");});}if(i===true){p.click(function(){r.fadeOut(100);b(this).fadeOut("slow");});}if(b.browser.msie&&parseInt(b.browser.version,10)===6){m.addClass("ie6-style");h.css("background","#d6d6d6");d.css("margin","0");}}if(l==="ie9"){if(b.browser.msie&&parseInt(b.browser.version,10)<10){f();}}else{if(l==="ie8"){if(b.browser.msie&&parseInt(b.browser.version,10)<9){f();}}else{if(l==="ie7"){if(b.browser.msie&&parseInt(b.browser.version,10)<8){f();}}else{if(l==="ie6"){if(b.browser.msie&&parseInt(b.browser.version,10)<7){f();}}}}}}b.fn.iealert=function(c){var e={support:"ie8",title:"Did you know that your Internet Explorer is out of date?",text:"To get the best possible experience using our site we recommend that you upgrade to a modern web browser. To download a newer web browser click on the Upgrade button.",upgradeTitle:"Upgrade",upgradeLink:"http://browsehappy.com/",overlayClose:false,closeBtn:true};var d=b.extend(e,c);return this.each(function(){if(b.browser.msie){var f=b(this);a(f,d.support,d.title,d.text,d.upgradeTitle,d.upgradeLink,d.overlayClose,d.closeBtn);}});};})(jQuery);

(function($, window, undefined) {
    'use strict';

    var $doc = $(document),
        Modernizr = window.Modernizr,
        lt_ie9 = false;
        

    $(document).ready(function() {

        $.fn.foundationMediaQueryViewer ? $doc.foundationMediaQueryViewer() : null;
        $.fn.foundationTabs ? $doc.foundationTabs() : null;

        //ul list example
     
        var desktop = new Maplace({
            map_div: '#gmap-2',
            controls_title: 'Controls',
            locations: LocsA,
        });


        $('#markers').one('inview', function(event, isInView) {
            if (isInView) {
                desktop.Load();
            }
        });

    }); //ready

})(jQuery, this);



(function($, window, google, undefined) {
    'use strict';


    var html_dropdown,
        html_ullist,
        Maplace;


    //dropdown menu type
    html_dropdown = {
        activateCurrent: function(index) {
            this.html_element.find('select').val(index);
        },

    
        getHtml: function () {
            var self = this,
                html = '',
                title,
                a;

            if (this.ln > 1) {
                html += '<select class="dropdown controls ' + this.o.controls_cssclass + '">';

                if (this.ShowOnMenu(this.view_all_key)) {
                    html += '<option value="' + this.view_all_key + '">' + this.o.view_all_text + '</option>';
                }

                for (a = 0; a < this.ln; a += 1) {
                    if (this.ShowOnMenu(a)) {
                        html += '<option value="' + (a + 1) + '">' + (this.o.locations[a].title || ('#' + (a + 1))) + '</option>';
                    }
                }
                html += '</select>';

                html = $(html).bind('change', function () {
                    self.ViewOnMap(this.value);
                });
            }

            title = this.o.controls_title;
            if (this.o.controls_title) {
                title = $('<div class="controls_title"></div>').css(this.o.controls_applycss ? {
                    fontWeight: 'bold',
                    fontSize: this.o.controls_on_map ? '12px' : 'inherit',
                    padding: '3px 10px 5px 0'
                } : {}).append(this.o.controls_title);
            }

            this.html_element = $('<div class="wrap_controls"></div>').append(title).append(html);

            return this.html_element;
        }
    };



    //ul list menu type
    html_ullist = {
        html_a: function (i, hash, ttl) {
            var self = this,
                index = hash || (i + 1),
                title = ttl || this.o.locations[i].title,
                el_a = $('<a data-load="' + index + '" id="ullist_a_' + index + '" href="#' + index + '" title="' + title + '"><span>' + (title || ('#' + (i + 1))) + '</span></a>');
            
            el_a.css(this.o.controls_applycss ? {
                color: '#666',
                display: 'block',
                padding: '5px',
                fontSize: this.o.controls_on_map ? '12px' : 'inherit',
                textDecoration: 'none'
            } : {});

            el_a.on('click', function (e) {
                e.preventDefault();
                var i = $(this).attr('data-load');
                self.ViewOnMap(i);
            });

            return el_a;
        },

        activateCurrent: function (index) {
            this.html_element.find('li').removeClass('active');
            this.html_element.find('#ullist_a_' + index).parent().addClass('active');
        },

        getHtml: function () {
            var html = $("<ul class='ullist controls " + this.o.controls_cssclass + "'></ul>").css(this.o.controls_applycss ? {
                margin: 0,
                padding: 0,
                listStyleType: 'none'
            } : {}),
                title, a;

            if (this.ShowOnMenu(this.view_all_key)) {
                html.append($('<li></li>').append(html_ullist.html_a.call(this, false, this.view_all_key, this.o.view_all_text)));
            }

            for (a = 0; a < this.ln; a++) {
                if (this.ShowOnMenu(a)) {
                    html.append($('<li></li>').append(html_ullist.html_a.call(this, a)));
                }
            }

            title = this.o.controls_title;
            if (this.o.controls_title) {
                title = $('<div class="controls_title"></div>').css(this.o.controls_applycss ? {
                    fontWeight: 'bold',
                    padding: '3px 10px 5px 0',
                    fontSize: this.o.controls_on_map ? '12px' : 'inherit'
                } : {}).append(this.o.controls_title);
            }

            this.html_element = $('<div class="wrap_controls"></div>').append(title).append(html);

            return this.html_element;
        }
    };



    Maplace = (function() {

        /**
         * Create a new instance
         * @class Maplace
         * @constructor
         */

        function Maplace(args) {
            this.errors = [];
            this.loaded = false;
            this.dev = true;
            this.markers = [];
            this.oMap = false;
            this.view_all_key = 'all';
            this.infowindow = null;
            this.ln = 0;
            this.oMap = false;
            this.oBounds = null;
            this.map_div = null;
            this.canvas_map = null;
            this.controls_wrapper = null;
            this.current_control = null;
            this.current_index = null;
            this.Polyline = null;
            this.Polygon = null;
            this.Fusion = null;
            this.directionsService = null;
            this.directionsDisplay = null;

            //default options
            this.o = {
                map_div: '#gmap',
                controls_div: '#controls',
                generate_controls: true,
                controls_type: 'dropdown',
                controls_cssclass: 'controls_css',
                controls_title: '',
                controls_on_map: false,
                controls_applycss: true,
                controls_position: google.maps.ControlPosition.RIGHT_TOP,
                type: 'marker',
                view_all: true,
                view_all_text: 'View All',
                start: 0,
                locations: [],
                commons: {},
                map_options: {
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true,
                    streetViewControl: true,
                    minZoom: 2,
                    zoomControl: true,
                    noClear: true,
                    zoom: 1
                },
                visualRefresh: true,
                stroke_options: {
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#0000FF',
                    fillOpacity: 0.4
                },
                styles: {},
                fusion_options: {},
                directions_panel: null,
                draggable: false,
                show_infowindows: true,
                show_markers: true,
                infowindow_type: 'bubble',
                listeners: {
                    click: function(event) {}
                },

                //events
                beforeViewAll: function() {},
                afterViewAll: function() {},
                beforeShow: function(index, location, marker) {},
                afterShow: function(index, location, marker) {},
                afterCreateMarker: function(index, location, marker) {},
                beforeCloseInfowindow: function(index, location) {},
                afterCloseInfowindow: function(index, location) {},
                beforeOpenInfowindow: function(index, location, marker) {},
                afterOpenInfowindow: function(index, location, marker) {},
                afterRoute: function(distance, status, result) {},
                onPolylineClick: function(obj) {}
            };

            //default menu types
            this.AddControl('dropdown', html_dropdown);
            this.AddControl('list', html_ullist);

            //init
            $.extend(true, this.o, args);
        }

        //where to store the menu types
        Maplace.prototype.controls = {};

        //initialize google map object
        Maplace.prototype.create_objMap = function() {
            var self = this,
                count = 0,
                i;

            //if styled
            for (i in this.o.styles) {
                if (this.o.styles.hasOwnProperty(i)) {
                    if (count === 0) {
                        this.o.map_options.mapTypeControlOptions = {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
                        };
                    }
                    count++;
                    this.o.map_options.mapTypeControlOptions.mapTypeIds.push('map_style_' + count);
                }
            }

            //if init
            if (!this.loaded) {
                try {
                    this.map_div.css({
                        position: 'relative',
                        overflow: 'hidden'
                    });

                    //create the container div into map_div
                    this.canvas_map = $('<div>').addClass('canvas_map').css({
                        width: '100%',
                        height: '100%'
                    }).appendTo(this.map_div);

                    this.oMap = new google.maps.Map(this.canvas_map.get(0), this.o.map_options);
                } catch (err) {
                    this.errors.push(err.toString());
                }
            } else { //else loads the new options
                self.oMap.setOptions(this.o.map_options);
            }

            //if styled
            count = 0;
            for (i in this.o.styles) {
                if (this.o.styles.hasOwnProperty(i)) {
                    count++;
                    this.oMap.mapTypes.set('map_style_' + count, new google.maps.StyledMapType(this.o.styles[i], {
                        name: i
                    }));
                    this.oMap.setMapTypeId('map_style_' + count);
                }
            }

            this.debug('01');
        };

        //adds markers to the map
        Maplace.prototype.add_markers_to_objMap = function () {
            var a,
                type = this.o.type || 'marker';

            //switch how to display the locations
            switch (type) {
                case 'marker':
                    for (a = 0; a < this.ln; a++) {
                        this.create.marker.call(this, a);
                    }
                    break;
                default:
                    this.create[type].apply(this);
                    break;
            }
        };

       
        //wrapper for the map types
        Maplace.prototype.create = {

            //single marker
            marker: function (index) {
                var self = this,
                    point = this.o.locations[index],
                    html = point.html || '',
                    marker, a,
                    point_infow,
                    image_w,
                    image_h,
                    latlng = new google.maps.LatLng(point.lat, point.lon),
                    orig_visible = point.visible === false ? false : true;

                $.extend(point, {
                    position: latlng,
                    map: this.oMap,
                    zIndex: 10000,
                    //temp visible property
                    visible: (this.o.show_markers === false ? false : orig_visible)
                });

                if (point.image) {
                    image_w = point.image_w || 32;
                    image_h = point.image_h || 32;
                    $.extend(point, {
                        icon: new google.maps.MarkerImage(point.image, new google.maps.Size(image_w, image_h), new google.maps.Point(0, 0), new google.maps.Point(image_w / 2, image_h / 2))
                    });
                }

                //create the marker and add click event
                marker = new google.maps.Marker(point);
                a = google.maps.event.addListener(marker, 'click', function () {

                    self.o.beforeShow(index, point, marker);

                    //show infowindow?
                    point_infow = point.show_infowindows === false ? false : true;
                    if (self.o.show_infowindows && point_infow) {
                        self.open_infowindow(index, marker);
                    }

                    //pan and zoom the map
                    self.oMap.panTo(latlng);
                    point.zoom && self.oMap.setZoom(point.zoom);

                    //activate related menu link
                    if (self.current_control && self.o.generate_controls && self.current_control.activateCurrent) {
                        self.current_control.activateCurrent.call(self, index + 1);
                    }

                    //update current location index
                    self.current_index = index;

                    self.o.afterShow(index, point, marker);
                });
                
                //extends bounds with this location
                this.oBounds.extend(latlng);

                //store the new marker
                this.markers.push(marker);

                this.o.afterCreateMarker(index, point, marker);

                //restore the visible property
                point.visible = orig_visible;

                return marker;
            }
        };


       //wrapper for the infowindow types
        Maplace.prototype.type_to_open = {
            //google default infowindow
            bubble: function (location) {
                this.infowindow = new google.maps.InfoWindow({
                    content: location.html || ''
                });
            }
        };


        //open the infowindow
        Maplace.prototype.open_infowindow = function (index, marker) {
            //close if any open
            this.CloseInfoWindow();
            var point = this.o.locations[index],
                type = point.type || this.o.infowindow_type;

            //show if content and valid infowindow type provided
            if (point.html && this.type_to_open[type]) {
                this.o.beforeOpenInfowindow(index, point, marker);
                this.type_to_open[type].call(this, point);
                this.infowindow.open(this.oMap, marker);
                this.o.afterOpenInfowindow(index, point, marker);
            }
        };


        //gets the html for the menu
        Maplace.prototype.get_html_controls = function() {
            if (this.controls[this.o.controls_type] && this.controls[this.o.controls_type].getHtml) {
                this.current_control = this.controls[this.o.controls_type];

                return this.current_control.getHtml.apply(this);
            }
            return '';
        };

       //creates the controls menu
        Maplace.prototype.generate_controls = function () {
            //append menu on the div container
            if (!this.o.controls_on_map) {
                this.controls_wrapper.empty();
                this.controls_wrapper.append(this.get_html_controls());
                return;
            }

            //else 
            //controls in map
            var cntr = $('<div class="on_gmap ' + this.o.controls_type + ' gmap_controls"></div>').css(this.o.controls_applycss ? {
                margin: '5px'
            } : {}),
                inner = $(this.get_html_controls()).css(this.o.controls_applycss ? {
                    background: '#fff',
                    padding: '5px',
                    border: '1px solid rgb(113,123,135)',
                    boxShadow: 'rgba(0, 0, 0, 0.4) 0px 2px 4px',
                    maxHeight: this.map_div.find('.canvas_map').outerHeight() - 80,
                    minWidth: 150,
                    overflowY: 'hidden',
                    overflowX: 'hidden'
                } : {});

            cntr.append(inner);

            //attach controls
            this.oMap.controls[this.o.controls_position].push(cntr.get(0));
        };
        //resets obj map, markers, bounds, listeners, controllers
        Maplace.prototype.init_map = function() {
            var self = this,
                i = 0;


            if (this.markers) {
                for (i in this.markers) {
                    if (this.markers[i]) {
                        try { this.markers[i].setMap(null); } catch (err) { self.errors.push(err); }
                    }
                }
                this.markers.length = 0;
                this.markers = [];
            }

            if (this.o.controls_on_map && this.oMap.controls) {
                this.oMap.controls[this.o.controls_position].forEach(function (element, index) {
                    try { self.oMap.controls[this.o.controls_position].removeAt(index); } catch (err) { self.errors.push(err); }
                });
            }

            this.oBounds = new google.maps.LatLngBounds();

            this.debug('02');
        };

        //perform the first view of the map

        /*
            MAPCENTER - To choose the map marker that is centered on page load change the value of:

            this.oMap.setCenter(this.markers[7].getPosition());

            To the correct value. Easiest way to get a list of the Location array is to console.log(LocsA); on lv_footer
        */
        //perform the first view of the map
       Maplace.prototype.perform_load = function () {
            //one location
            if (this.ln === 1) {
                this.oMap.setCenter(this.markers[0].getPosition());
                this.ViewOnMap(1);
            } else { //n locations
                this.oMap.setCenter(this.markers[0].getPosition());
                //check the start option
                if (typeof (this.o.start - 0) === 'number' && this.o.start > 0 && this.o.start <= this.ln) {
                    this.ViewOnMap(this.o.start);
                } else {
                    this.oMap.setCenter(this.markers[0].getPosition());
                }
            }
        };

        Maplace.prototype.debug = function(msg) {
            if (this.dev && this.errors.length) {
                //console.log(msg + ': ', this.errors);
            }
        };

        //adds a custom menu to the class
        Maplace.prototype.AddControl = function(name, func) {
            if (!name || !func) {
                return false;
            }
            this.controls[name] = func;
            return true;
        };

        //close the infowindow
        Maplace.prototype.CloseInfoWindow = function() {
            if (this.infowindow && (this.current_index || this.current_index === 0)) {
                this.o.beforeCloseInfowindow(this.current_index, this.o.locations[this.current_index]);
                this.infowindow.close();
                this.infowindow = null;
                this.o.afterCloseInfowindow(this.current_index, this.o.locations[this.current_index]);
            }
        };

        //checks if a location has to be in menu
        Maplace.prototype.ShowOnMenu = function(index) {
            if (index === this.view_all_key && this.o.view_all && this.ln > 1) {
                return true;
            }

            index = parseInt(index, 10);
            if (typeof(index - 0) === 'number' && index >= 0 && index < this.ln) {
                var visible = this.o.locations[index].visible === false ? false : true,
                    on_menu = this.o.locations[index].on_menu === false ? false : true;
                if (visible && on_menu) {
                    return true;
                }
            }
            return false;
        };

       //triggers to show a location in map
        Maplace.prototype.ViewOnMap = function (index) {
            //view all
            if (index === this.view_all_key) {
                this.o.beforeViewAll();
                this.current_index = index;
                if (this.o.locations.length > 0 && this.o.generate_controls && this.current_control && this.current_control.activateCurrent) {
                    this.current_control.activateCurrent.apply(this, [index]);
                }
                this.oMap.fitBounds(this.oBounds);
                this.CloseInfoWindow();
                this.o.afterViewAll();
            } else { //specific location
                index = parseInt(index, 10);
                if (typeof (index - 0) === 'number' && index > 0 && index <= this.ln) {
                    try {
                        google.maps.event.trigger(this.markers[index - 1], 'click');
                    } catch (err) {
                        this.errors.push(err.toString());
                    }
                }
            }
            this.debug('03');
        };

        //replace current locations
        Maplace.prototype.SetLocations = function(locs, reload) {
            this.o.locations = locs;
            reload && this.Load();
        };

        //adds one or more locations to the end of the array
        Maplace.prototype.AddLocations = function(locs, reload) {
            var self = this;

            if ($.isArray(locs)) {
                $.each(locs, function(index, value) {
                    self.o.locations.push(value);
                });
            }
            if ($.isPlainObject(locs)) {
                this.o.locations.push(locs);
            }

            reload && this.Load();
        };

        //adds a location at the specific index
        Maplace.prototype.AddLocation = function(location, index, reload) {
            var self = this;

            if ($.isPlainObject(location)) {
                this.o.locations.splice(index, 0, location);
            }

            reload && this.Load();
        };

        //remove one or more locations
        Maplace.prototype.RemoveLocations = function(locs, reload) {
            var self = this,
                k = 0;

            if ($.isArray(locs)) {
                $.each(locs, function(index, value) {
                    if ((value - k) < self.ln) {
                        self.o.locations.splice(value - k, 1);
                    }
                    k++;
                });
            } else {
                if (locs < this.ln) {
                    this.o.locations.splice(locs, 1);
                }
            }

            reload && this.Load();
        };

        //check if already initialized with a Load()
        Maplace.prototype.Loaded = function() {
            return this.loaded;
        };

        //loads the options
        Maplace.prototype._init = function() {
            //store the locations length
            this.ln = this.o.locations.length;

            //update all locations with commons
            for (var i = 0; i < this.ln; i++) {
                $.extend(this.o.locations[i], this.o.commons);
                if (this.o.locations[i].html) {
                    this.o.locations[i].html = this.o.locations[i].html.replace('%index', i + 1);
                    this.o.locations[i].html = this.o.locations[i].html.replace('%title', (this.o.locations[i].title || ''));
                }
            }

            //store dom references
            this.map_div = $(this.o.map_div);
            this.controls_wrapper = $(this.o.controls_div);
        };

        //creates the map and menu
        Maplace.prototype.Load = function(args) {
            $.extend(true, this.o, args);
            args && args.locations && (this.o.locations = args.locations);
            this._init();

            //reset/init google map objects
            this.o.visualRefresh === false ? (google.maps.visualRefresh = false) : (google.maps.visualRefresh = true);
            this.init_map();
            this.create_objMap();

            //add markers
            this.add_markers_to_objMap();

            //generate controls
            if ((this.ln > 1 && this.o.generate_controls) || this.o.force_generate_controls) {
                this.o.generate_controls = true;
                this.generate_controls();
            } else {
                this.o.generate_controls = false;
            }

            var self = this;

            //first call
            if (!this.loaded) {
                google.maps.event.addListenerOnce(this.oMap, 'idle', function() {
                    self.perform_load();
                });

                //adapt the div size on resize
                google.maps.event.addListener(this.oMap, 'resize', function() {
                    self.canvas_map.css({
                        width: self.map_div.width(),
                        height: self.map_div.height()
                    });
                });

                //add custom listeners
                var i;
                for (i in this.o.listeners) {
                    var map = this.oMap,
                        myListener = this.o.listeners[i];
                    if (this.o.listeners.hasOwnProperty(i)) {
                        google.maps.event.addListener(this.oMap, i, function(event) {
                            myListener(map, event);
                        });
                    }
                }
            }
            //any other calls
            else {
                this.perform_load();
            }
            this.loaded = true;
        };
        return Maplace;
    })();


    if (typeof define == 'function' && define.amd) {
        define(function() {
            return Maplace;
        });
    } else {
        window.Maplace = Maplace;
    }

})(jQuery, this, google);