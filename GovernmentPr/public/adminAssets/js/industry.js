let industries = {
    "Agriculture": [
        "Crop Production",
        "Livestock Farming",
        "Fisheries & Aquaculture",
        "Forestry & Logging",
        "Agricultural Technology (AgriTech)",
        "Agro-Processing"
    ],

    "Mining and Quarrying": [
        "Oil and Gas Exploration",
        "Coal Mining",
        "Limestone & Cement Mining",
        "Gold Mining",
        "Tin, Iron Ore & Other Solid Minerals",
        "Quarrying (Stone, Sand, Gravel)"
    ],

    "Energy and Power Generation": [
        "Hydroelectric Power",
        "Solar Energy",
        "Wind Energy",
        "Geothermal Energy",
        "Biomass & Biofuels",
        "Nuclear Energy",
        "Thermal Power"
    ],

    "Manufacturing": [
        "Food and Beverage",
        "Textiles & Apparel",
        "Plastics & Rubber",
        "Chemicals & Fertilizers",
        "Building Materials (Cement, Glass, Ceramics)",
        "Automobile & Auto Parts",
        "Electronics & Electrical Equipment",
        "Metallurgy & Steel",
        "Paper & Packaging"
    ],

    "Furniture & Woodwork": [
        "Household Furniture",
        "Office Furniture",
        "Luxury & Custom Furniture",
        "Wood Products & Carpentry",
        "Mattresses & Upholstery",
        "Interior Design & Home Decor"
    ],

    "Construction & Real Estate": [
        "Residential Real Estate",
        "Commercial Real Estate",
        "Industrial Real Estate",
        "Infrastructure Projects (Roads, Bridges, Railways)",
        "Urban Development"
    ],

    "Petrochemicals": [
        "Crude Oil Refining",
        "Lubricants & Additives",
        "Plastics & Synthetics",
        "Petrochemical Products"
    ],

    "Banking, Finance & Insurance": [
        "Commercial Banking",
        "Microfinance",
        "Investment Banking",
        "Fintech & Digital Payments",
        "Pension Funds",
        "Insurance (Life, Health, General)",
        "Capital Markets & Securities"
    ],

    "Telecommunications": [
        "Mobile Networks",
        "Broadband & Internet Services",
        "Satellite Communications",
        "Data Centers & Cloud Hosting"
    ],

    "Information & Communication Technology (ICT)": [
        "Software Development",
        "IT Infrastructure & Networking",
        "Cybersecurity",
        "Artificial Intelligence & Machine Learning",
        "Blockchain & Web3",
        "Cloud Computing & SaaS",
        "IT Consulting"
    ],

    "Transport & Logistics": [
        "Road Freight & Haulage",
        "Maritime & Shipping",
        "Aviation & Airlines",
        "Rail Transport",
        "Courier & Delivery Services",
        "Warehousing & Supply Chain"
    ],

    "Retail & Wholesale Trade": [
        "E-commerce",
        "Supermarkets & Consumer Goods",
        "Wholesale Distribution",
        "Luxury & Fashion Retail"
    ],

    "Media, Entertainment & Creative Arts": [
        "Film & Television",
        "Music & Performing Arts",
        "Sports & Esports",
        "Advertising & Marketing",
        "Publishing & Print Media",
        "Digital Media & Content Creation"
    ],

    "Healthcare & Life Sciences": [
        "Pharmaceuticals",
        "Hospitals & Clinics",
        "Medical Equipment & Devices",
        "Biotechnology",
        "Health Insurance",
        "Telemedicine & Digital Health"
    ],

    "Hospitality & Tourism": [
        "Hotels & Resorts",
        "Restaurants & Food Services",
        "Travel Agencies",
        "Ecotourism & Cultural Tourism",
        "Events & Leisure"
    ],

    "Education": [
        "Primary & Secondary Education",
        "Universities & Higher Institutions",
        "Vocational & Technical Training",
        "EdTech & Online Learning"
    ],

    "Professional & Business Services": [
        "Legal Services",
        "Accounting & Auditing",
        "Consulting",
        "Human Resources & Recruitment",
        "Engineering Services",
        "Marketing & PR"
    ],

    "Nonprofit & NGOs": [
        "Development Organizations",
        "Charitable Foundations",
        "International NGOs",
        "Community-Based Organizations"
    ],

    "Government & Public Administration": [
        "Federal & State Agencies",
        "Local Government Authorities",
        "Regulatory Bodies",
        "Public Utilities"
    ],

    "Emerging Industries": [
        "Renewable Energy",
        "Agribusiness Technology",
        "Creative Arts & Digital Economy",
        "Space Technology",
        "Green Economy & Sustainability",
        "Smart Cities & IoT"
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