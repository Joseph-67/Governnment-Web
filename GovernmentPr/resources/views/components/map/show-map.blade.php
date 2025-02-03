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

        function parseDMS(dmsString) {
            const regex = /(\d+)[º°](\d+)'(\d+(?:\.\d+)?)"?([NSEW])/;
            const [, degrees, minutes, seconds, direction] = dmsString.match(regex);
            return dmsToDecimal(
                parseFloat(degrees),
                parseFloat(minutes),
                parseFloat(seconds),
                direction
            );
        }
        const locations = resp.filter(
        (company) => company.latitude !== null && company.longitude !== null && company.latitude >= -90 && company.latitude <= 90 && company.longitude >= -180 && company.longitude <= 180) // Filter out invalid entries
        .map((company) => ({
            lat: company.latitude ?? 0,     // Use the value or default to 0
            lng: company.longitude ?? 0,   // Use the value or default to 0
            title: company.company_name || 'Unknown Company ', // Default title if name is missing
            address: company.state+company.address || 'No Address Provided', // Include address if available
            description: company.industry || 'No Description Available', // Include description if available
        }));

        console.log(locations);
        
        let location =[
            // { lat: 4.21494, lng: -46.40625, title: "Afdin Petroleum lpg" },
            { lat: 11.994609, lng: 8.58308, title: "Petrogas" },
            // { lat: 6.5244, lng: 3.3792, title: "Lagos" },
            // { lat: 7.3775, lng: 3.9470, title: "Ibadan" },
            // { lat: 11.1247, lng: 7.7254, title: "Zaria" },
            // { lat: 9.1099, lng: 7.4042, title: "Gwarinpa" },
            // { lat: 9.0228, lng: 7.5702, title: "Nyanya" },
        ];

        // Add markers to the map
        location.forEach((location) => {
            L.marker([location.lat, location.lng])
                .addTo(map)
                .bindPopup(
                    `
                        <b>${location.title}</b><br>
                        <i>Address:</i> ${location.address}<br>
                        <i>Description:</i> ${location.description}
                    `
                )
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