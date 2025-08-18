import difflib
import pandas as pd
import mysql.connector
import logging
import numpy as np
import joblib  # ✅ Added for model save/load
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.pipeline import Pipeline
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report
from sklearn.ensemble import RandomForestClassifier
from sklearn.calibration import CalibratedClassifierCV
from imblearn.pipeline import Pipeline as ImbPipeline

# Optional import: spaCy
try:
    import spacy
    nlp = spacy.load("en_core_web_sm")
except Exception:
    nlp = None

# ==========================
# Setup Logging
# ==========================
logging.basicConfig(
    filename="industry_updates.log",
    level=logging.INFO,
    format="%(asctime)s - %(levelname)s - %(message)s"
)
logger = logging.getLogger(__name__)

# ==========================
# Industry Taxonomy
# ==========================
class IndustryTaxonomy:
    def __init__(self):
        self.taxonomy = { 
    "Agriculture": [ 
        "Crop Production",
        "Cereal Farming (Wheat, Rice, Maize, Barley, Sorghum)",
        "Legume Farming (Beans, Peas, Lentils)",
        "Root & Tuber Crops (Cassava, Yam, Potato, Sweet Potato)",
        "Oilseed Farming (Soybean, Sunflower, Groundnut, Sesame, Canola)",
        "Fruit Farming (Citrus, Mango, Apple, Banana, Berries, Grapes, Pineapple)",
        "Nut Farming (Cashew, Almond, Walnut, Pistachio)",
        "Vegetable Farming (Tomato, Onion, Pepper, Cabbage, Leafy Greens)",
        "Spices & Herbs (Ginger, Turmeric, Pepper, Clove, Cinnamon, Basil, Mint)",
        "Plantation Crops (Cocoa, Coffee, Tea, Rubber, Palm Oil)",
        "Sugarcane Farming",
        "Horticulture & Floriculture (Cut Flowers, Ornamentals, Landscaping Plants)",
        "Greenhouse & Hydroponic Farming",
        "Organic & Regenerative Farming",
        "Seed Production & Breeding",
        "Agrochemicals (Fertilizers, Pesticides, Biopesticides)",
        "Irrigation Systems & Drip Technology",
        "Agricultural Machinery & Implements",
        "Post-harvest Handling & Storage",
        "Grain Milling & Processing",
        "Livestock Farming (Beef, Dairy, Sheep, Goat)",
        "Poultry Farming (Broilers, Layers, Hatcheries)",
        "Pig Farming",
        "Aquaculture (Tilapia, Catfish, Shrimp, Oysters)",
        "Inland & Marine Capture Fisheries",
        "Apiculture (Honey, Beeswax, Royal Jelly)",
        "Sericulture (Silk)",
        "Forestry & Logging (Timber, Pulpwood, Bamboo, Rattan)",
        "Charcoal & Firewood Production",
        "AgriTech (Farm Management Software, Sensors, Drones)",
        "Extension Services & Agri Training",
        "Agri Co-ops & Outgrower Schemes",
        "Cold Chain & Farm Logistics"
    ], 

    "Mining and Quarrying": [
        "Crude Petroleum & Natural Gas Extraction",
        "Oil Sands & Shale Extraction",
        "Coal Mining (Anthracite, Bituminous, Lignite)",
        "Iron Ore Mining",
        "Copper Ore Mining",
        "Bauxite (Aluminium) Mining",
        "Nickel Ore Mining",
        "Zinc & Lead Mining",
        "Manganese Ore Mining",
        "Chromite Mining",
        "Gold Mining",
        "Silver Mining",
        "Platinum Group Metals Mining",
        "Diamond Mining",
        "Gemstones (Ruby, Sapphire, Emerald, Tanzanite)",
        "Limestone & Dolomite Quarrying",
        "Granite & Marble Quarrying",
        "Gypsum & Plaster Quarrying",
        "Phosphate & Potash Mining",
        "Salt Mining (Rock, Sea, Vacuum)",
        "Silica Sand & Quartz Mining",
        "Clay & Kaolin Mining",
        "Rare Earth Elements (Neodymium, Dysprosium)",
        "Lithium, Cobalt & Graphite Mining",
        "Sand & Gravel Quarrying",
        "Peat Extraction",
        "Mining Support Services (Drilling, Blasting, Surveying)",
        "Ore Beneficiation & Concentration",
        "Mine Rehabilitation & Environmental Services"
    ], 

    "Energy and Power Generation": [
        "Thermal Power (Gas, Coal, HFO)",
        "Hydroelectric Power",
        "Solar PV Farms",
        "Solar Thermal (CSP)",
        "Wind Power (Onshore, Offshore)",
        "Geothermal Power",
        "Biomass & Biogas Power",
        "Waste-to-Energy",
        "Nuclear Power Generation",
        "Mini-Grids & Off-Grid Systems",
        "Grid Transmission & Distribution",
        "Smart Grid & Metering",
        "Energy Trading & Market Operations",
        "Battery Energy Storage Systems",
        "Fuel Cells & Hydrogen Production (Green, Blue, Grey)",
        "EV Charging Infrastructure",
        "Energy Efficiency & ESCO Services",
        "Power Plant O&M",
        "Rooftop Solar & Distributed Generation"
    ], 

    "Manufacturing": [
        # Food, Beverage, Tobacco
        "Dairy Products (Milk, Cheese, Butter, Yogurt, Ice Cream)",
        "Meat Processing (Beef, Poultry, Pork, Sausages)",
        "Seafood Processing (Canning, Freezing)",
        "Grain & Cereal Milling (Flour, Breakfast Cereals)",
        "Edible Oils & Fats (Palm, Soy, Sunflower)",
        "Sugar Refining",
        "Bakery & Confectionery (Bread, Biscuits, Chocolate, Candy)",
        "Beverages (Soft Drinks, Bottled Water, Juices)",
        "Alcoholic Beverages (Beer, Wine, Spirits)",
        "Tobacco Products",

        # Textiles, Apparel & Leather
        "Spinning, Weaving & Knitting",
        "Dyeing & Finishing",
        "Garment Manufacturing (Men, Women, Children, Workwear)",
        "Technical Textiles",
        "Leather Tanning & Processing",
        "Footwear & Leather Goods",

        # Wood, Paper & Printing
        "Sawmilling & Wood Panels (Plywood, MDF)",
        "Doors, Windows & Flooring",
        "Paper & Pulp Mills",
        "Packaging Paper & Cardboard",
        "Tissue & Hygiene Paper",
        "Commercial Printing & Labels",

        # Chemicals, Plastics & Pharma
        "Basic Chemicals (Acids, Alkalis, Industrial Gases)",
        "Petrochemicals (Aromatics, Olefins, Polymers)",
        "Fertilizers & Agrochemicals",
        "Paints, Coatings & Adhesives",
        "Soaps, Detergents & Personal Care",
        "Plastics (PVC, PET, PE) & Rubber Products",
        "Pharmaceuticals (Formulations, APIs)",
        "Biotechnology Products",

        # Metals & Materials
        "Cement, Glass & Ceramics",
        "Basic Iron & Steel (Blast Furnace, EAF)",
        "Aluminium Smelting & Rolling",
        "Copper Smelting & Rolling",
        "Non-Ferrous Metals (Zinc, Nickel, Lead)",
        "Metal Fabrication (Cutting, Bending, Welding)",
        "Foundries & Casting",
        "Forging & Heat Treatment",
        "Metal Coating & Galvanizing",

        # Machinery & Electronics
        "Industrial Machinery & Equipment",
        "Pumps, Valves & Compressors",
        "HVAC Equipment",
        "Electrical Equipment (Motors, Transformers, Switchgear)",
        "Consumer Electronics (TVs, Audio, Appliances)",
        "Computer & Office Equipment",
        "Telecom Equipment",
        "Semiconductors & Electronic Components (PCB, IC Assembly)",
        "Batteries (Lead-Acid, Lithium-ion)",
        "Robotics & Automation",
        "3D Printing & Additive Manufacturing",

        # Vehicles & Transport
        "Automobile Assembly",
        "Auto Parts (Engines, Transmissions, Seats, Electronics)",
        "Motorcycles & Bicycles",
        "Shipbuilding & Repair",
        "Railway Rolling Stock & Equipment",
        "Aerospace & Aircraft Components",

        # Others
        "Household Appliances (White Goods, Small Appliances)",
        "Furniture Manufacturing (Wood, Metal, Upholstery)",
        "Jewelry & Precious Metal Products",
        "Sports Goods & Toys",
        "Medical Devices & Consumables",
        "Packaging (Plastic, Paper, Metal, Glass)",
        "Industrial Gases",
        "Additives & Specialty Chemicals"
    ], 

    "Construction and Real Estate": [
        "Residential Building Construction",
        "Commercial Building Construction",
        "Industrial & Warehouse Construction",
        "Civil Engineering (Roads, Bridges, Railways)",
        "Water & Sanitation Infrastructure",
        "Airports & Ports Construction",
        "Energy Infrastructure (Pipelines, Substations)",
        "Building Renovation & Retrofits",
        "Green Buildings & Certifications",
        "Property Development (Residential, Mixed-use)",
        "Property Management & Facilities Management",
        "Real Estate Brokerage & Valuation",
        "PropTech Platforms",
        "Land Surveying & Geomatics",
        "Demolition & Site Preparation",
        "Construction Materials Supply",
        "Construction Equipment Rental",
        "BIM & Construction Tech"
    ], 

    "Petrochemicals": [
        "Crude Oil Refining (Fuels, Naphtha, Diesel, Jet)",
        "Gas Processing (LNG, LPG, NGLs)",
        "Base Petrochemicals (Ethylene, Propylene, BTX)",
        "Polymers (PE, PP, PVC, PET, PS)",
        "Synthetic Rubber & Elastomers",
        "Solvents & Intermediates",
        "Lubricants & Greases",
        "Additives (Fuel, Lube, Polymer)",
        "Petrochemical Logistics & Storage",
        "Process Engineering & EPC",
        "Health, Safety & Environment Services"
    ], 

    "Banking and Finance": [
        "Commercial & Retail Banking",
        "Corporate & Investment Banking",
        "Microfinance & Inclusive Finance",
        "Digital Banking & Neobanks",
        "Payments & Fintech (Wallets, Switches, Gateways)",
        "Wealth & Asset Management",
        "Brokerage & Securities Dealing",
        "Stock Exchanges & Trading Venues",
        "Private Equity & Venture Capital",
        "Hedge Funds & Alternative Investments",
        "Insurance (Life, Health, General)",
        "Reinsurance",
        "Pension Funds & Retirement Plans",
        "Credit Bureaus & Scoring",
        "Remittances & FX Services",
        "RegTech & SupTech"
    ],

    "Telecommunications": [
        "Mobile Network Operators (2G–5G)",
        "Fixed Line & Fiber Operators",
        "Internet Service Providers",
        "Satellite Communications",
        "Subsea Cable Systems",
        "Towercos & Passive Infrastructure",
        "Data Centers & Colocation",
        "Cloud & Edge Services (IaaS, PaaS)",
        "MVNOs",
        "Network Equipment Vendors",
        "OSS/BSS & Telecom Software"
    ],

    "Information Technology": [
        "Software Development & Product",
        "Custom Software & SI",
        "Cloud Software (SaaS)",
        "DevOps & Platform Engineering",
        "Cybersecurity (MDR, SOC, IAM)",
        "Data Analytics & Big Data",
        "AI/ML Platforms & Services",
        "Blockchain & Web3 Applications",
        "AR/VR/XR Development",
        "Quantum Computing R&D",
        "IT Infrastructure & Networking",
        "Managed Services & IT Outsourcing",
        "IT Consulting & Architecture",
        "UI/UX & Product Design",
        "Digital Marketplaces & Platforms"
    ],

    "Transport and Logistics": [
        "Road Freight & Haulage",
        "Rail Freight",
        "Air Freight & Cargo Handling",
        "Maritime Shipping (Liner, Tramp, Bulk)",
        "Inland Container Depots & Dry Ports",
        "Ports & Terminal Operations",
        "Courier, Express & Parcel",
        "Postal Services",
        "Warehousing & Fulfilment",
        "Cold Chain Logistics",
        "3PL & 4PL Services",
        "Last-Mile Delivery",
        "Public Transport (Bus, Metro, BRT)",
        "Ride-hailing & Mobility Platforms",
        "Vehicle Leasing & Fleet Management",
        "Drones & UAV Logistics",
        "Logistics Tech & TMS/WMS"
    ],

    "Wholesale and Retail Trade": [
        "Wholesale of Agricultural Commodities",
        "Wholesale of Industrial Inputs",
        "Wholesale of Consumer Goods",
        "General Merchandise Wholesaling",
        "Supermarkets & Hypermarkets",
        "Convenience Stores",
        "Specialty Retail (Electronics, Furniture, Pharma)",
        "Fashion & Apparel Retail",
        "Automotive Dealers & Parts Retail",
        "E-commerce Marketplaces",
        "Direct Selling & Franchise Retail",
        "Duty Free & Travel Retail",
        "B2B Distribution",
        "Dropshipping & Cross-border E-commerce",
        "After-sales & Retail Services"
    ],

    "Media and Entertainment": [
        "Film Production & Studios",
        "TV Broadcasting & OTT",
        "Radio Broadcasting & Podcasts",
        "Music Production & Labels",
        "Live Events & Concerts",
        "Publishing (Books, Magazines, Newspapers)",
        "News & Digital Media",
        "Advertising Agencies & Media Buying",
        "Outdoor & DOOH Advertising",
        "Gaming Studios & Publishers",
        "Esports Teams & Events",
        "Creator Economy & Influencer Networks",
        "Post-production & VFX",
        "Animation & CGI"
    ],

    "Creative Economy": [
        "Fashion Design & Houses",
        "Textile Design & Craft",
        "Graphic & Digital Design",
        "Industrial & Product Design",
        "Interior & Set Design",
        "Photography & Videography",
        "Crafts & Artisan Products",
        "Cultural Festivals & Events",
        "Galleries & Creative Spaces",
        "Creative Tech Tools & Marketplaces"
    ],

    "Healthcare": [
        "Hospitals & Multi-specialty Clinics",
        "Primary Care & GP Practices",
        "Diagnostic Labs & Imaging Centers",
        "Pharmacies & E-Pharmacy",
        "Pharmaceutical Manufacturing & APIs",
        "Biotech R&D & Biologics",
        "Medical Devices (Consumables, Implants)",
        "Telemedicine & Virtual Care",
        "Health Insurance & HMOs",
        "Rehabilitation & Physiotherapy",
        "Mental Health Services",
        "Dental Clinics & Labs",
        "Eye Care & Optometry",
        "Nutraceuticals & Wellness Products",
        "Home Healthcare & Nursing",
        "Public Health Programs"
    ],

    "Hospitality and Tourism": [
        "Hotels & Resorts",
        "Short-stay & Serviced Apartments",
        "Restaurants, Cafes & Catering",
        "Event Venues & MICE",
        "Travel Agencies & Tour Operators",
        "Airlines & Cruise Lines (Tourism)",
        "Adventure & Eco-tourism",
        "Cultural & Heritage Tourism",
        "Theme Parks & Attractions",
        "Wellness, Spa & Medical Tourism",
        "Vacation Rentals & OTAs"
    ],

    "Education": [
        "Primary & Secondary Schools",
        "Universities & Colleges",
        "Vocational & Technical Institutes",
        "EdTech Platforms & LMS",
        "Test Prep & Tutoring",
        "Corporate Training & L&D",
        "Research Institutes & Labs",
        "Special Needs Education",
        "Education Support Services (Assessment, QA)"
    ],

    "Professional Services": [
        "Legal Services & Notaries",
        "Accounting, Audit & Tax",
        "Management Consulting",
        "Strategy & Corporate Finance Advisory",
        "Engineering & Technical Consulting",
        "Architecture & Urban Planning",
        "Environmental & Sustainability Consulting",
        "HR Services & Recruitment",
        "Marketing, PR & Communications",
        "Design Studios & Creative Agencies",
        "Testing, Inspection & Certification (TIC)"
    ],

    "Nonprofit and NGOs": [
        "International Development & Aid",
        "Humanitarian Relief & Disaster Response",
        "Health & Education NGOs",
        "Environmental & Conservation NGOs",
        "Human Rights & Advocacy",
        "Foundations & Philanthropy",
        "Social Enterprises",
        "Community-based Organizations",
        "Faith-based Organizations",
        "NGO Capacity Building & Training",
        "Grantmaking & Fundraising Organizations",
        "Think Tanks & Policy Research"
    ],

    "Government and Public Administration": [
        "Executive & Legislative Bodies",
        "Judiciary & Courts",
        "Tax Authorities & Customs",
        "Public Sector Agencies & Regulators",
        "Central Banks & Monetary Authorities",
        "Defense & National Security Agencies",
        "Public Safety & Emergency Services",
        "Municipal & Local Governments",
        "Diplomatic Missions & Foreign Affairs",
        "Civil Service & Administrative Services",
        "Public Works & Infrastructure Authorities"
    ],

    "Water Supply and Waste Management": [
        "Water Abstraction & Treatment",
        "Urban Water Supply & Distribution",
        "Rural Water Schemes",
        "Wastewater Collection & Treatment",
        "Desalination",
        "Solid Waste Collection",
        "Recycling & Materials Recovery",
        "Hazardous Waste Treatment",
        "Landfills & Waste-to-Energy",
        "Industrial Effluent Treatment",
        "Environmental Monitoring Services"
    ],

    "Arts, Culture and Recreation": [
        "Museums, Galleries & Exhibitions",
        "Libraries & Archives",
        "Performing Arts (Theatre, Dance, Opera)",
        "Cultural Heritage Preservation",
        "Amusement & Leisure Centers (Theme Parks, Arcades)",
        "Fitness & Sports Clubs",
        "Professional Sports Teams & Leagues",
        "Sports Facilities Management",
        "Zoos & Aquariums",
        "Botanical Gardens & Natural Parks",
        "Art Schools & Workshops",
        "Music Festivals & Cultural Events",
        "Recreational Tourism (Parks, Adventure, Outdoor Activities)"
    ],

    "Defense and Security": [
        "Defense Equipment Manufacturing (Weapons, Ammunition, Armored Vehicles)",
        "Naval Shipbuilding (Submarines, Frigates, Carriers)",
        "Aerospace & Military Aircraft Systems",
        "Missile Systems & Defense Electronics",
        "Cyber Defense & Intelligence Services",
        "Surveillance & Reconnaissance Systems (Drones, Satellites)",
        "Private Security & Guarding",
        "Security Systems & Integrators (CCTV, Access Control, Alarms)",
        "Defense Training & Simulation",
        "Dual-use Technologies (Civil & Military Applications)",
        "Border & Maritime Security Services",
        "Counterterrorism & Homeland Security",
        "Explosives & Ordnance Disposal",
        "Military Logistics & Support Services"
    ],

    "Household and Personal Services": [
        "Domestic Workers & Household Help",
        "Childcare & Daycare Services",
        "Elderly Care & Assisted Living",
        "Personal Grooming (Salons, Spas, Barbershops)",
        "Laundry & Dry Cleaning Services",
        "Funeral & Cremation Services",
        "Wedding & Event Planning",
        "Pet Care Services (Boarding, Grooming, Training)",
        "Astrology & Alternative Spiritual Services",
        "Private Tutoring & Home Lessons"
    ],

    "Emerging Industries": [
        "Renewable Energy Technologies (PV, Wind, Electrolyzers)",
        "Energy Storage & Advanced Batteries",
        "Green Hydrogen & Power-to-X",
        "Smart Cities & Urban Tech",
        "Space Technology (Satellites, Launch, Downstream Apps)",
        "Autonomous Vehicles & ADAS",
        "Advanced Robotics & Cobots",
        "AI Chips & Edge AI",
        "AR/VR/XR Platforms",
        "Metaverse & Virtual Worlds"]
        }

        self.aliases = {
            # =======================
            # Agriculture & Agro
            # =======================
            "Agro": "Agro-Processing",
            "Agro-Allied": "Agro-Processing",
            "AgriTech": "Agricultural Technology (AgriTech)",
            "Farm Processing": "Agro-Processing",
            "Agrochemicals": "Fertilizers & Agrochemicals",
            "Fertilizer": "Fertilizers & Agrochemicals",
            "Pesticide": "Fertilizers & Agrochemicals",
            "Livestock": "Livestock Farming",
            "Poultry": "Poultry Farming",
            "Dairy": "Dairy Farming",
            "Fishery": "Fisheries & Aquaculture",
            "Aquaculture": "Fisheries & Aquaculture",

            # =======================
            # Mining & Quarrying
            # =======================
            "Gold Mining": "Gold Ore Mining",
            "Coal Mining": "Coal Mining",
            "Iron Ore": "Iron Ore Mining",
            "Quarry": "Stone Quarrying",
            "Sand Mining": "Sand & Gravel Mining",
            "Crude Oil": "Crude Petroleum Extraction",
            "Petroleum": "Crude Petroleum Extraction",
            "Natural Gas": "Natural Gas Extraction",

            # =======================
            # Manufacturing
            # =======================
            # Textiles & Apparel
            "Textiles": "Spinning, Weaving & Knitting",
            "Fabric": "Spinning, Weaving & Knitting",
            "Fabrics": "Spinning, Weaving & Knitting",
            "Weaving": "Spinning, Weaving & Knitting",
            "Knitting": "Spinning, Weaving & Knitting",
            "Cloth": "Spinning, Weaving & Knitting",
            "Textile Mills": "Spinning, Weaving & Knitting",
            "Knitwear": "Spinning, Weaving & Knitting",
            "Denim": "Spinning, Weaving & Knitting",
            "Apparel": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Apparels": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Clothing": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Garment": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Garments": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Tailoring": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Fashion": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Embroidery": "Garment Manufacturing (Men, Women, Children, Workwear)",
            "Shoes": "Footwear Manufacturing",
            "Footwear": "Footwear Manufacturing",
            "Leatherwear": "Leather Goods",
            "Tannery": "Leather Goods",

            # Food & Beverages
            "Brewery": "Breweries",
            "Brewer": "Breweries",
            "Beer": "Breweries",
            "Soft Drinks": "Soft Drink Manufacturing",
            "Bottling": "Soft Drink Manufacturing",
            "Coca-Cola": "Soft Drink Manufacturing",
            "Pepsi": "Soft Drink Manufacturing",
            "Bakery": "Bakery Products",
            "Bread": "Bakery Products",
            "Biscuits": "Bakery Products",
            "Confectionery": "Confectionery Manufacturing",
            "Chocolate": "Confectionery Manufacturing",

            # Pharmaceuticals & Chemicals
            "Pharma": "Pharmaceuticals",
            "Pharm": "Pharmaceuticals",
            "Pharmaceutical": "Pharmaceuticals",
            "Drug Manufacturing": "Pharmaceuticals",
            "Medicines": "Pharmaceuticals",
            "Chemical": "Basic Chemicals",
            "Paint": "Paints & Coatings",
            "Cement": "Cement Manufacturing",

            # =======================
            # Construction & Real Estate
            # =======================
            "Building": "Building Construction",
            "Civil Works": "Civil Engineering",
            "Real Estate": "Real Estate Development",
            "Property": "Real Estate Development",
            "Housing": "Residential Real Estate",
            "Estate": "Real Estate Development",

            # =======================
            # IT & Telecom
            # =======================
            "ICT": "Information Technology Services",
            "Software": "Software Development",
            "Tech": "Information Technology Services",
            "IT": "Information Technology Services",
            "Fintech": "Financial Technology (FinTech)",
            "Edtech": "Educational Technology (EdTech)",
            "Telecom": "Telecommunication Services",
            "Telecommunications": "Telecommunication Services",
            "Telco": "Telecommunication Services",
            "ISP": "Internet Service Providers",
            "Data Center": "Data Centers",
            "Cloud": "Cloud Computing Services",

            # =======================
            # Finance & Banking
            # =======================
            "Bank": "Commercial Banking",
            "Banks": "Commercial Banking",
            "Microfinance": "Microfinance Banking",
            "Insurance": "Insurance Services",
            "Pension": "Pension Funds",
            "Stock Exchange": "Capital Markets",
            "Investment": "Investment Banking",
            "Venture Capital": "Venture Capital & Private Equity",
            "FinTech": "Financial Technology (FinTech)",

            # =======================
            # Healthcare
            # =======================
            "Hospital": "Hospitals",
            "Clinic": "Clinics",
            "Diagnostics": "Diagnostics & Laboratory Services",
            "Labs": "Diagnostics & Laboratory Services",
            "Pharmacy": "Pharmaceutical Retail",
            "Drugstore": "Pharmaceutical Retail",
            "Medical Devices": "Medical Equipment Manufacturing",

            # =======================
            # Retail & Trade
            # =======================
            "Wholesale": "Wholesale Trade",
            "Supermarket": "Supermarkets & Grocery Stores",
            "Retail": "Retail Trade",
            "Mall": "Shopping Malls",
            "E-commerce": "E-Commerce",
            "Online Shop": "E-Commerce",
            "Marketplace": "E-Commerce",

            # =======================
            # Transport & Logistics
            # =======================
            "Transport": "Transportation Services",
            "Trucking": "Trucking & Freight",
            "Logistics": "Logistics Services",
            "Courier": "Courier Services",
            "Shipping": "Maritime Shipping",
            "Airline": "Airlines",
            "Aviation": "Airlines",
            "Railway": "Railway Transport",
            "Metro": "Railway Transport",

            # =======================
            # Hospitality & Tourism
            # =======================
            "Hotel": "Hotels",
            "Resort": "Resorts",
            "Restaurant": "Restaurants",
            "Fast Food": "Quick Service Restaurants",
            "QSR": "Quick Service Restaurants",
            "Tourism": "Tourism Services",
            "Travel": "Travel Agencies",
            "Airbnb": "Vacation Rentals",
        }


        self.all_industries = [ind for inds in self.taxonomy.values() for ind in inds]

    def get_parent_industry(self, sub_industry):
        for parent, children in self.taxonomy.items():
            if sub_industry in children:
                return parent
        return None

    def resolve_alias(self, industry):
        return self.aliases.get(industry, industry)

# ==========================
# Preprocessing
# ==========================
def preprocess_text(text):
    if not isinstance(text, str):
        return ""

    text = text.lower()
    text = text.replace("\n", " ").strip()

    if nlp:
        doc = nlp(text)
        return " ".join([token.lemma_ for token in doc if not token.is_stop])
    return text

# ==========================
# ML Classifier
# ==========================
class IndustryClassifier:
    def __init__(self):
        self.pipeline = ImbPipeline([
            ('tfidf', TfidfVectorizer(preprocessor=preprocess_text)),
            ('clf', CalibratedClassifierCV(LogisticRegression(max_iter=1000)))
        ])
        self.is_trained = False

    def train(self, X, y):
        X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
        self.pipeline.fit(X_train, y_train)
        y_pred = self.pipeline.predict(X_test)
        logging.info("Model training complete. Classification report:\n%s", classification_report(y_test, y_pred))
        self.is_trained = True

    def predict_with_confidence(self, text):
        if not self.is_trained:
            raise ValueError("Model not trained")
        proba = self.pipeline.predict_proba([text])[0]
        classes = self.pipeline.classes_
        best_idx = np.argmax(proba)
        return classes[best_idx], proba[best_idx]

    def save_model(self, filepath):
        joblib.dump(self.pipeline, filepath)

    def load_model(self, filepath):
        self.pipeline = joblib.load(filepath)
        self.is_trained = True

# ==========================
# Database Handling
# ==========================
class CompanyDatabase:
    def __init__(self, host, user, password, database):
        self.conn = mysql.connector.connect(
            host=host, user=user, password=password, database=database
        )
        self.cursor = self.conn.cursor(dictionary=True)

    def fetch_companies(self, taxonomy: IndustryTaxonomy):
        query = f"""
        SELECT company_id, company_name, industry, industry_process, description
        FROM companies
        WHERE industry IS NULL OR industry = '' OR industry NOT IN ({','.join(['%s']*len(taxonomy.all_industries))})
        """
        self.cursor.execute(query, taxonomy.all_industries)
        return self.cursor.fetchall()

    def update_industry(self, company_id, result):
        query = "UPDATE companies SET industry = %s, industry_process = %s WHERE company_id = %s"
        self.cursor.execute(query, (result['industry'], result['industry_process'], company_id))
        self.conn.commit()

# ==========================
# Classification Logic
# ==========================
def classify_company(company_data, classifier: IndustryClassifier, taxonomy: IndustryTaxonomy):
    name = company_data.get('company_name', '')
    desc = company_data.get('description', '')
    existing_industry = company_data.get('industry')

    # Rule-based matching
    for industry in taxonomy.all_industries:
        if industry.lower() in name.lower() or industry.lower() in desc.lower():
            return {
                'industry': industry,
                'industry_process': taxonomy.get_parent_industry(industry),
                'method': 'rule_based',
                'confidence': 1.0
            }

    # Alias matching
    for alias, mapped_industry in taxonomy.aliases.items():
        if alias.lower() in name.lower() or alias.lower() in desc.lower():
            return {
                'industry': mapped_industry,
                'industry_process': taxonomy.get_parent_industry(mapped_industry),
                'method': 'alias',
                'confidence': 0.9
            }

    # ML prediction
    text = f"{name} {desc}"
    predicted, conf = classifier.predict_with_confidence(text)
    return {
        'industry': predicted,
        'industry_process': taxonomy.get_parent_industry(predicted),
        'method': 'ml_model',
        'confidence': conf
    }

# ==========================
# Main Execution
# ==========================
def main():
    taxonomy = IndustryTaxonomy()
    classifier = IndustryClassifier()

    # ✅ Load pre-trained model
    try:
        classifier.load_model("industry_model.pkl")
        logger.info("Loaded pre-trained industry model")
    except Exception as e:
        logger.error(f"Model load failed: {e}")
        return

    db = CompanyDatabase(host="localhost", user="root", password="", database="companies_db")
    companies = db.fetch_companies(taxonomy)

    for row in companies:
        try:
            result = classify_company(row, classifier, taxonomy)

            # ✅ Safer confidence threshold (0.7)
            if result['confidence'] >= 0.7:
                db.update_industry(row['company_id'], result)
                logger.info(
                    f"Updated company {row['company_id']}: {row.get('industry', '')} → {result['industry']} "
                    f"(method: {result['method']}, confidence: {result['confidence']:.2f})"
                )
            else:
                logger.warning(
                    f"Low confidence for company {row['company_id']}: confidence {result['confidence']:.2f} - skipping"
                )

        except Exception as e:
            logger.error(f"Error processing company {row['company_id']}: {e}")

if __name__ == "__main__":
    main()
