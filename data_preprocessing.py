import pandas as pd

# Load dataset
data = pd.read_csv("C:\\datbasexampp\\htdocs\\Student_Performance_Prediction\\dataset\\student_data.csv")

# Show first rows
print(data.head())

# Check missing values
print(data.isnull().sum())

# Convert to required format
# Example: create result column (Pass/Fail)
data['result'] = data['math score'].apply(lambda x: 'Pass' if x >= 40 else 'Fail')

# Save cleaned data
data.to_csv("C:\\datbasexampp\\htdocs\\Student_Performance_Prediction\\dataset\\cleaned_data.csv", index=False)

print("Data cleaned!")