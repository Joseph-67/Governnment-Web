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

// industrial process
let industrial_process = {
    "industrial_processes": {
      "chemical_industry": [
        "Distillation",
        "Electrolysis",
        "Catalysis",
        "Polymerization",
        "Fermentation",
        "Crystallization",
        "Neutralization",
        "Leaching"
      ],
      "manufacturing_and_materials_industry": [
        "Casting",
        "Forging",
        "Machining",
        "Additive Manufacturing (3D Printing)",
        "Welding",
        "Extrusion",
        "Rolling",
        "Annealing",
        "Powder Metallurgy"
      ],
      "energy_and_power_industry": [
        "Combustion",
        "Steam Turbines",
        "Gasification",
        "Hydroelectric Generation",
        "Nuclear Fission",
        "Solar Photovoltaics",
        "Electrochemical Cells"
      ],
      "food_and_beverage_industry": [
        "Pasteurization",
        "Homogenization",
        "Dehydration",
        "Freezing",
        "Fermentation",
        "Milling",
        "Canning",
        "Extrusion Cooking"
      ],
      "textile_and_apparel_industry": [
        "Weaving",
        "Knitting",
        "Dyeing",
        "Finishing",
        "Spinning",
        "Printing"
      ],
      "pharmaceutical_industry": [
        "Tableting",
        "Granulation",
        "Lyophilization (Freeze-Drying)",
        "Encapsulation",
        "Blending",
        "Filtration"
      ],
      "mining_and_metallurgy": [
        "Smelting",
        "Flotation",
        "Heap Leaching",
        "Hydrometallurgy",
        "Electroplating",
        "Sintering"
      ],
      "construction_industry": [
        "Concrete Mixing",
        "Reinforcement",
        "Welding and Cutting",
        "Bricklaying",
        "Asphalt Paving"
      ],
      "electronics_and_semiconductor_industry": [
        "Etching",
        "Doping",
        "Photolithography",
        "Assembly",
        "Soldering"
      ],
      "environmental_and_waste_management": [
        "Water Treatment",
        "Recycling",
        "Incineration",
        "Composting",
        "Scrubbing"
      ]
    }
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

for (let key in industrial_process["industrial_processes"]) {
    console.log(industrial_process["industrial_processes"][key]);
    let industry = document.querySelector('#industry-process');
    industry.innerHTML += `<optgroup label="${key}"></optgroup>`
    let optGroup = document.querySelector('optgroup[label="'+key+'"]');
    industrial_process["industrial_processes"][key].forEach(value => {
        optGroup.innerHTML += `<option value="${value}">${value}</option>`
    });
}