from flask import Flask, request, jsonify
import joblib
import pandas as pd

app = Flask(__name__)

model = joblib.load("model/model.pkl")
risk_model = joblib.load("model/risk_model.pkl")

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json

    reading = data['reading']
    writing = data['writing']

    input_data = pd.DataFrame([[reading, writing]],
                              columns=['reading', 'writing'])

    grade = model.predict(input_data)[0]
    risk = risk_model.predict(input_data)[0]

    return jsonify({
        "grade": grade,
        "risk": "At-Risk Student" if risk == 1 else "Safe"
    })

if __name__ == '__main__':
    app.run()