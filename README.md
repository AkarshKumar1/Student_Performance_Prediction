# 🎓 Student Performance Prediction System

## 📌 Project Overview

- This project is a machine learning-based system that predicts student performance using academic scores such as reading and writing. Multiple models including Logistic Regression, Decision Tree, and Random Forest were trained and compared to select the best-performing model.

- The system classifies students into grade categories (A, B, C) and identifies at-risk students. It is deployed as a web application with a dashboard for tracking predictions and user inputs.

---

## 🌐 Live Demo

🔗 https://studentperformanceprediction.fwh.is  

---

## 🚀 Features

- 📊 Predict student grades (A / B / C)
- ⚠ Identify at-risk students using machine learning
- 🤖 Compare multiple ML algorithms:
  - Logistic Regression
  - Decision Tree
  - Random Forest
- 📈 Model evaluation using:
  - Accuracy
  - Confusion Matrix
  - Classification Report
- 🌐 Deployed ML model using Flask API (Render)
- 🗄 Store prediction results in MySQL database (InfinityFree)
- 📋 Interactive dashboard with:
  - Total students count
  - Grade-wise distribution (A / B / C)
  - Search & filtering functionality
  - Date & time tracking
- 🔄 Auto-refresh dashboard (JavaScript polling)

---

## 🧠 Machine Learning Workflow

1. Data Preprocessing  
2. Feature Engineering (average score, grade classification)  
3. Model Training (multiple algorithms)  
4. Model Evaluation  
5. Best Model Selection  
6. Deployment using Flask API  
7. Integration with web application  

---

## ⚙️ System Architecture

```bash
User → PHP Frontend → Render API → ML Model → Response → MySQL Database → Dashboard
```

---

## 📁 Project Structure

```
STUDENT_PERFORMANCE_PREDICTION/
│
├── app.py
├── requirements.txt
│
├── dataset/
│ ├── cleaned_data.csv
│ └── student_data.csv
│
├── model/
│ ├── model.pkl
│ ├── risk_model.pkl
│ ├── predict.py
│ └── train_model.py
│
├── screenshots/
│ ├── input-ui.png
│ ├── prediction-ui(1).png
│ └── dashboard-ui(1).png
│
├── web/
│ ├── dashboard.php
│ ├── db.php
│ ├── index.php
│ ├── predict.php
│ └── style.css
│
└── data_preprocessing.py
```

---

## 📸 Screenshots

### 🔹 Input Page
![Input](screenshots/input-ui.png)

### 🔹 Prediction Output
![Prediction](screenshots/prediction-ui(1).png)

### 🔹 Dashboard
![Dashboard](screenshots/dashboard-ui(1).png)

---

## 🛠 Tech Stack

- **Python** (Pandas, NumPy, Scikit-learn)
- **Flask** (API Deployment)
- **PHP**
- **MySQL**
- **HTML/CSS**
- **JavaScript (DOM + Auto-refresh)**

---

## ▶️ Run Locally (Optional)

1. Clone the repository  
2. Install dependencies  
3. Run Flask API  
4. Start XAMPP and open the project  

Or use the live demo above.

---

📊 Example Output

- Prediction: A
- Prediction: B
- Prediction: C At-Risk Student

---

🧠 Key Learnings

- Built an end-to-end machine learning pipeline
- Performed feature engineering and model comparison
- Deployed ML model using Flask API
- Integrated ML model with a web application
- Designed a dashboard with filtering and analytics
- Managed separate development and production environments

---

🚀 Future Improvements

- Add graphical visualizations (charts)
- Implement authentication system
- Improve UI using modern frameworks (Bootstrap/React)
- Deploy using a single full-stack framework (Flask/Django)

---

## ⚠️ Note

This project is for learning/demo purposes


---

## 👤 Author

Akarsh Kumar
B.Tech (AI & ML)

---

⭐ If you like this project, don’t forget to star the repository!
