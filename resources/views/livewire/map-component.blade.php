<div>
    <div id="mapid"></div>

    <div class="mt-4">
        <label for="address">Dirección:</label>
        <input type="text" id="address" wire:model="address">
    </div>

    <div class="mt-4">
        <button wire:click="addAddress">Continuar</button>
    </div>
</div>

@push('scripts')


    <script>
       

            window.addEventListener('initMap', event => {
    const map = L.map('map').setView([event.detail.lat, event.detail.lng], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);

    const marker = L.marker([event.detail.lat, event.detail.lng], {
        draggable: true,
    }).addTo(map);

    marker.on('dragend', function(event) {
        Livewire.emit('markerDragged', {
            'lat': event.target.getLatLng().lat,
            'lng': event.target.getLatLng().lng,
        });
    });
});


           /* L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latlng = L.latLng(position.coords.latitude, position.coords.longitude);
                    mymap.setView(latlng, 15);
                    L.marker(latlng).addTo(mymap);
                    window.livewire.emit('positionChanged', position.coords.latitude, position.coords.longitude);
                });
            }

            mymap.on('click', function (event) {
                L.marker(event.latlng).addTo(mymap);
                window.livewire.emit('positionChanged', event.latlng.lat, event.latlng.lng);
            });

            window.livewire.on('setLocation', function (latitude, longitude) {
                var latlng = L.latLng(latitude, longitude);
                mymap.setView(latlng, 15);
                L.marker(latlng).addTo(mymap);
            });
        });*/
    </script>
@endpush
