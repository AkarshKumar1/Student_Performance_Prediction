import sys
import joblib
import pandas as pd
import os

# Load models
base_dir = os.path.dirname(os.path.abspath(__file__))

grade_model = joblib.load(os.path.join(base_dir, "model.pkl"))
risk_model = joblib.load(os.path.join(base_dir, "risk_model.pkl"))

# Inputs
if len(sys.argv) < 4:
    math, reading, writing = 60, 70, 80
else:
    math = float(sys.argv[1])
    reading = float(sys.argv[2])
    writing = float(sys.argv[3])

# Input for model
input_data = pd.DataFrame([[reading, writing]],
                          columns=['reading', 'writing'])

# Predictions
grade = grade_model.predict(input_data)[0]
risk = risk_model.predict(input_data)[0]

# Output
print(grade)

if risk == 1:
    print("At-Risk Student")