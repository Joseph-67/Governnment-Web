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
  

const industrySelect = document.querySelector('#industry');
industrySelect.innerHTML = ''; // Clear previous options

Object.entries(industries).forEach(([category, items]) => {
  const optGroup = document.createElement('optgroup');
  optGroup.label = category;
  items.forEach(item => {
    const option = document.createElement('option');
    option.value = item;
    option.textContent = item;
    optGroup.appendChild(option);
  });
  industrySelect.appendChild(optGroup);
});
const industryProcessSelect = document.querySelector('#industry-process');
industryProcessSelect.innerHTML = ''; // Clear previous options

Object.entries(industrial_process["industrial_processes"]).forEach(([key, values]) => {
  const optGroup = document.createElement('optgroup');
  optGroup.label = key;
  values.forEach(value => {
    const option = document.createElement('option');
    option.value = value;
    option.textContent = value;
    optGroup.appendChild(option);
  });
  industryProcessSelect.appendChild(optGroup);
});