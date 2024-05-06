<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <input id="latitude" class="text-black" placeholder="latitude"/>
                    <input id="longitude"  class="text-black" placeholder="longitude"/>
                    <input id="receptor" type="hidden" value="{{auth()->user()->id===1?2:1}}"/>
                    <button type="button" onclick="sender()">SEND</button>

                    <div id="map" style="width: 100%; height: 500px;"></div>
                    <span id="trace"></span>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        function sender(){
                const lat=document.getElementById('latitude').value;
                const lng=document.getElementById('longitude').value;
                const receptor=document.getElementById('receptor').value;
                window.Echo.connector.pusher.send_event('tracking', JSON.stringify({ lat,lng,receptor,"emitter":{{auth()->user()->id}} }), 'trackingView.'+receptor);
        }

      window.onload = function() {
       var map = L.map('map').setView([-2.092893, -79.693279], 20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        var marker = L.marker([-2.092893,-79.693279]).addTo(map);
        marker.bindPopup("position now");

          window.Echo.private('trackingView.{{auth()->user()->id}}')
          .subscribed(function(){
              console.log('subscribed To Channel')
          })
          .listen('.tracking', (e) => {
                const newLatLng = [e.position.lat, e.position.lng];
                marker.setLatLng(newLatLng);
                marker.bindPopup("position "+e.emitter.name);
                map.setView(newLatLng);
                document.getElementById('trace').innerHTML='<b>LAT:</b>'+e.position.lat+'&nbsp;<b>LNG:</b>'+e.position.lng+'&nbsp;<b>Device:</b>'+e.emitter.name+'<br/>';
          });
      };
    </script>
</x-app-layout>
