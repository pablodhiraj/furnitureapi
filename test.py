import numpy as np
import pandas as pd
import nltk
from nltk.stem.porter import PorterStemmer
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import pickle
import sys
# Read the product data from CSV
product = pd.read_csv('product.csv')

# Select specific columns from the product data
product = product[['id', 'name', 'description', 'user_id', 'store_name', 'category']]

# Add a new 'tags' column by combining description, category, and store_name
product['tags'] = product['description'] + product['category'] + ' ' + product['store_name']

# Select specific columns from the product data
product = product[['id', 'name', 'tags']]

# Convert the 'tags' column to lowercase
product['tags'] = product['tags'].apply(lambda x: x.lower())

# Initialize the PorterStemmer from NLTK
ps = PorterStemmer()

# Define a function to apply stemming to text
def stem(text):
    y = []
    for i in text.split():
        y.append(ps.stem(i))
    return " ".join(y)

# Apply stemming to the 'tags' column
product['tags'] = product['tags'].apply(stem)

# Initialize the CountVectorizer with max_features = 100
cv = CountVectorizer(max_features=100)

# Vectorize the 'tags' column
vectors = cv.fit_transform(product['tags']).toarray()


# Calculate the similarity using cosine distance
similarity = cosine_similarity(vectors)
input_string = sys.argv[1]
# Get the top 5 most similar products for the first product
product_index = product[product['name'] == input_string].index[0]
distances = similarity[product_index]
product_list = sorted(list(enumerate(distances)), reverse=True, key=lambda x: x[1])[1:6]

# Recommend similar products
for i in product_list:
    print(product['name'].iloc[i[0]])
    print(",")
