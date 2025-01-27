<x-layouts.admin-app>
@section('PageTitle', 'Company Map')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map{
            height: 500px;
            width: 100%;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
let getMap = async () => {
    const url = new URL("{{ route('admin.get-all-companies') }}");
    console.log(url.toString());

    try {
        const response = await fetch(url.toString());
        if (!response.ok) throw new Error("Failed to fetch data");
        const resp = await response.json();
        console.log(resp);

        // Initialize the map
        const map = L.map("map").setView([9.0820, 8.6753], 6);

        // Add OpenStreetMap tile layer
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap contributors",
        }).addTo(map);

        // Extract locations from the response
        const locations = resp.map((company) => ({
            lat: company.latitude,
            lng: company.longitude,
            title: company.company_name,
        }));

        console.log(locations);
        
        // let locations =[
        //     { lat: 9.8965, lng: 8.8583, title: "Jos" },
        //     { lat: 10.5036, lng: 7.4337, title: "Kaduna" },
        //     { lat: 6.5244, lng: 3.3792, title: "Lagos" },
        //     { lat: 7.3775, lng: 3.9470, title: "Ibadan" },
        //     { lat: 11.1247, lng: 7.7254, title: "Zaria" },
        //     { lat: 9.1099, lng: 7.4042, title: "Gwarinpa" },
        //     { lat: 9.0228, lng: 7.5702, title: "Nyanya" },
        // ];

        // Add markers to the map
        locations.forEach((location) => {
            L.marker([location.lat, location.lng])
                .addTo(map)
                .bindPopup(location.title)
                .openPopup();
        });
    } catch (error) {
        console.error("Error loading map data:", error);
    }
};

// Call the function
getMap();
    </script>
@endsection
    <div class="container-xxl">
        <div class="" id="map"></div>
    </div>
</x-layouts.admin-app>