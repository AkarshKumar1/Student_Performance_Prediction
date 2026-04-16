import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import classification_report, confusion_matrix
import joblib
import os

# Load dataset
data = pd.read_csv(r"C:/datbasexampp/htdocs/Student_Performance_Prediction/dataset/cleaned_data.csv")

# Rename columns
data.rename(columns={
    'math score': 'math',
    'reading score': 'reading',
    'writing score': 'writing'
}, inplace=True)

# Create average
data['avg'] = (data['math'] + data['reading'] + data['writing']) / 3

# Grade function
def grade(avg):
    if avg >= 75:
        return 'A'
    elif avg >= 50:
        return 'B'
    else:
        return 'C'

data['result'] = data['avg'].apply(grade)

# 🔥 Create At-Risk label (ML target)
data['at_risk'] = data['avg'].apply(lambda x: 1 if x < 40 else 0)

# Features
X = data[['reading', 'writing']]

# Targets
y_grade = data['result']
y_risk = data['at_risk']

# Split for grade
X_train, X_test, y_train, y_test = train_test_split(
    X, y_grade, test_size=0.2, random_state=42
)

# Models
models = {
    "Logistic Regression": LogisticRegression(max_iter=200),
    "Decision Tree": DecisionTreeClassifier(),
    "Random Forest": RandomForestClassifier()
}

best_model = None
best_accuracy = 0
best_name = ""

# Train & evaluate (GRADE MODEL)
for name, model in models.items():
    model.fit(X_train, y_train)
    acc = model.score(X_test, y_test)

    print(f"\n🔹 {name} Grade Accuracy: {acc}")

    y_pred = model.predict(X_test)

    print("\nClassification Report:")
    print(classification_report(y_test, y_pred))

    print("Confusion Matrix:")
    print(confusion_matrix(y_test, y_pred))

    if acc > best_accuracy:
        best_accuracy = acc
        best_model = model
        best_name = name

# 🔥 Train At-Risk Model (separate model)
risk_model = RandomForestClassifier()
risk_model.fit(X, y_risk)

# Save models
base_dir = os.path.dirname(os.path.abspath(__file__))

grade_model_path = os.path.join(base_dir, "model.pkl")
risk_model_path = os.path.join(base_dir, "risk_model.pkl")

joblib.dump(best_model, grade_model_path)
joblib.dump(risk_model, risk_model_path)

print("\n✅ Best Grade Model:", best_name)
print("Grade Model Accuracy:", best_accuracy)
print("Grade model saved at:", grade_model_path)
print("Risk model saved at:", risk_model_path)