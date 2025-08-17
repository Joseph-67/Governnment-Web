import mysql.connector
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.linear_model import LogisticRegression
from sklearn.pipeline import make_pipeline
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score

# --- Industry mapping ---
industries = {
    "Agriculture": ["Crop Production", "Livestock Farming", "Fisheries", "Forestry"],
    "Mining and Quarrying": ["Oil and Gas", "Coal Mining", "Limestone", "Gold"],
    "Energy and Power Generation": ["Hydroelectric", "Renewable Energy"],
    "Manufacturing": ["Food and Beverage", "Textile", "Plastics", "Chemicals", "Building Materials"],
    "Construction": ["Real Estate", "Infrastructure Projects"],
    "Petrochemicals": ["Refining Crude Oil", "Lubricants", "Petrochemical Products"],
    "Banking and Finance": ["Commercial Banks", "Fintech", "Insurance"],
    "Telecommunications": ["Mobile Network", "Internet Service"],
    "Information Technology": ["Software Development", "IT Infrastructure"],
    "Transport and Logistics": ["Freight", "Shipping", "Aviation"],
    "Retail and Wholesale Trade": ["E-commerce", "Consumer Goods"],
    "Media and Entertainment": ["Music", "Sports", "Consumer Goods Distribution"],
    "Healthcare": ["Pharmaceutical", "Hospitals", "Medical Equipment"],
    "Hospitality and Tourism": ["Hotels", "Ecotourism"],
    "Education": ["Universities", "EdTech"],
    "Professional Services": ["Legal", "Accounting", "Consulting"],
    "Nonprofit and NGOs": ["Development Organizations"],
    "Emerging Industries": ["Renewable Energy", "Agribusiness Technology", "Creative Arts"]
}

industry_keys = list(industries.keys())

# --- Database configuration ---
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'governmentapp'
}

# --- Fetch companies from DB ---
def fetch_companies():
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    cursor.execute("SELECT id, company_name, industry FROM companies")
    data = cursor.fetchall()
    cursor.close()
    conn.close()
    return pd.DataFrame(data, columns=['id', 'company_name', 'industry'])

# --- Keyword-based fallback ---
def keyword_industry(company_name):
    company_name = company_name.lower()
    for industry, keywords in industries.items():
        for keyword in keywords:
            if keyword.lower() in company_name:
                return industry
    return "Unknown"

# --- Train ML model ---
def train_model(df):
    df_train = df[df['industry'].notnull() & df['industry'].isin(industry_keys)]
    X = df_train['company_name']
    y = df_train['industry']
    
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
    
    model = make_pipeline(TfidfVectorizer(), LogisticRegression(max_iter=1000))
    model.fit(X_train, y_train)
    
    y_pred = model.predict(X_test)
    print("Model Accuracy:", accuracy_score(y_test, y_pred))
    
    return model

# --- Update company industry in DB ---
def update_company_industry(company_id, new_industry):
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    cursor.execute("UPDATE companies SET industry = %s WHERE id = %s", (new_industry, company_id))
    conn.commit()
    cursor.close()
    conn.close()

# --- Predict and update ---
def predict_and_update(df, model):
    for index, row in df.iterrows():
        company_id = row['id']
        company_name = row['company_name']
        current_industry = row['industry']
        
        predicted_industry = model.predict([company_name])[0]
        
        # Ensure predicted industry is valid
        if predicted_industry not in industry_keys:
            predicted_industry = keyword_industry(company_name)
        
        if current_industry != predicted_industry:
            update_company_industry(company_id, predicted_industry)
            print(f"Updated ID {company_id}: '{current_industry}' -> '{predicted_industry}'")
        else:
            print(f"ID {company_id}: Industry correct ('{current_industry}')")

# --- Main ---
if __name__ == "__main__":
    df_companies = fetch_companies()
    ml_model = train_model(df_companies)
    predict_and_update(df_companies, ml_model)
