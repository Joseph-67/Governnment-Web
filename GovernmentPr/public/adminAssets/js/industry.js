let industries = {
    "Agriculture" : [
        "Crop Production (e.g., cassava, maize, rice)",
        "Livestock Farming",
        "Fisheries and Aquaculture",
        "Forestry",
    ],
    "Mining and Quarrying" : [
        "Oil and Gas",
        "Coal Mining",
        "Limestone and Cement Production",
        "Gold and Precious Minerals"
    ],
    "Energy and Power Generation" : [
        "Hydroelectric Power",
        "Renewable Energy (e.g., solar, wind)",
    ],
    "Manufacturing" : [
        "Food and Beverage Processing",
        "Textile and Garment Production",
        "Plastics and Packaging",
        "Chemicals and Fertilizers",
        "Building Materials"
    ],
    "Construction" : [
        "Real Estate Development",
        "Infrastructure Projects (e.g., roads, bridges)",        
    ],
    "Petrochemicals" : [
        "Refining Crude Oil",
        "Lubricants and Petrochemical Products",
    ],
    "Banking and Finance" : [
        "Commercial and Microfinance Banks",
        "Fintech and Mobile Payments",
        "Insurance",
    ],
    "Telecommunications" : [
        "Mobile Network Providers",
        "Internet Service Providers",
    ],
    "Information Technology" : [
        "Software Development",
        "IT Infrastructure and Cloud Services"
    ],
    "Transport and Logistics" : [
        "Freight and Haulage",
        "Shipping and Maritime Services",
        "Aviation"
    ],
    "Retail and Wholesale Trade" : [
        "E-commerce Platforms",
        "Consumer Goods Distribution",
    ],
    "Media and Entertainment" : [
        "Consumer Goods Distribution",
        "Music Industry",
        "Sports and Events Management"
    ],
    "Healthcare" : [
        "Pharmaceutical Production",
        "Hospitals and Clinics",
        "Medical Equipment",
    ],
    "Hospitality and Tourism" : [
        "Hotels and Resorts",
        "Ecotourism"
    ],
    "Education" : [
        "Universities and Private Schools",
        "EdTech"
    ],
    "Professional Services" : [
        "Legal Services",
        "Accounting and Consulting"
    ],
    "Nonprofit and NGOs" : [
        "Development and Aid Organizations",
    ],
    "Emerging Industries" : [
        "Renewable Energy",
        "Agribusiness Technology",
        "Creative Arts and Design"
    ]
}

for (let key in industries) {
    console.log(industries[key]);
    let industry = document.querySelector('#industry');
    industry.innerHTML += `<optgroup label="${key}"></optgroup>`
    let optGroup = document.querySelector('optgroup[label="'+key+'"]');
    industries[key].forEach(value => {
        optGroup.innerHTML += `<option value="${value}">${value}</option>`
    });
}